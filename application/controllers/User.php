<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('grocery_crud_model');
    $this->load->model('manage');
    $this->load->model('Auth');
    $this->load->helper('cookie');
  }

  public function index(){
    redirect('user/facilities');
  }

  public function facilities(){
    $this->Auth->validateUserRole();
    $data['role'] = 'user';
    $this->load->library('grocery_CRUD');
    $crud = new grocery_CRUD();
    $crud->set_table('facility');

    $output = $crud->render();
    $data['title'] = 'Booking Facility Website — Facility Listing';
    $data['crud'] = get_object_vars($output);
    $data['facility'] = $this->manage->printAllFacility();
    $this->template->load('template/template_navbar', 'pages/UserFacilityList', $data);
  }

  public function requests(){
    if(isset($_SESSION['after_insert'])) {      
      $config = [
        "Date" => implode("-", array_reverse(explode("/", $_SESSION['after_insert']['Date']))),
        "RequestID" => null,
        "RequesterID" => $_SESSION['after_insert']['RequesterID'],
        "ReqFacilityID" => $_SESSION['after_insert']['ReqFacilityID'],
        "StartTime" => $_SESSION['after_insert']['StartTime'],
        "EndTime" => $_SESSION['after_insert']['EndTime']
      ];

      $this->db->insert("requests", $config);

      unset($_SESSION['after_insert']);
    }
    $this->Auth->validateUserRole();
    $data['role'] = 'user';
    $this->load->library('grocery_CRUD');
    $crud = new grocery_CRUD();
    $crud->where(['reserveduser.RequesterID' => $_SESSION['account']['UserID']]);
    $crud->set_theme('tablestrap');
    $crud->set_table('reserveduser');
    $crud->set_subject('Request');
    $crud->columns('RequestID','ReqFacilityID','Date','StartTime','EndTime','Status');
    $crud->change_field_type('StartTime','time');
    $crud->change_field_type('EndTime','time');
    $crud->set_relation('ReqFacilityID','facility','FacilityName');
    $crud->display_as('ReqFacilityID','Requested Facility');
    $crud->callback_add_field('RequesterID',array($this, 'insert_requester'));//Masukkin UserID nya gimana ya? wkwk
    $crud->callback_add_field('Status',array($this, 'insert_status'));
    $crud->callback_after_insert(array($this, 'duplicate_to_requests'));
    // $crud->callback_before_insert(array($this,'clone'));
    // $crud->callback_before_update(array($this, 'clone'));
    // $crud->callback_before_delete(array($this, 'clone'));
    // $crud->callback_before_upload(array($this, 'clone'));
    // $crud->callback_before_clone(array($this, 'clone'));
    $crud->unset_edit();
    $crud->unset_delete();
    $crud->unset_print();
    $crud->unset_export();
    $crud->unset_read();

    $output = $crud->render();
    $data['crud'] = get_object_vars($output);
    $data['title'] = 'Booking Facility Website — Request Listing';
    $this->template->load('template/template_navbar', 'pages/RequestListing', $data);
  }

  public function insert_requester($value, $primary_key){
    return '<input type="text" maxlength="50" value="'.$_SESSION['account']['UserID'].'" name="RequesterID" style="width:462px" disabled>
    <input type="text" maxlength="50" value="'.$_SESSION['account']['UserID'].'" name="RequesterID" style="width:462px" hidden>';
  }

  public function insert_status($value, $primary_key){
    return '<input type="text" maxlength="50" value="Waiting For Approval" name="Status" style="width:462px" disabled>
    <input type="text" maxlength="50" value="Waiting For Approval" name="Status" style="width:462px" hidden>';
  }

  public function duplicate_to_requests($post_array, $primary_key) {
    $_SESSION['after_insert'] = $post_array;
  }

  public function facilityDetail($id){
    $this->Auth->validateUserRole();
    $data['role'] = 'user';
    $this->load->library('grocery_CRUD');
    $crud = new grocery_CRUD();
    $crud->set_table('facility');

    $output = $crud->render();
    $data['title'] = 'Booking Facility Website — Facility Datail';
    $data['crud'] = get_object_vars($output);
    $data['facility'] = $this->manage->printOneFacility($id);
    $this->template->load('template/template_navbar', 'pages/FacilityDetail', $data);
  }
}