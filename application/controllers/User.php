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
    $crud->set_theme('tablestrap');

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
    $crud->display_as('ReqFacilityID','Requested Facility');
    $crud->callback_add_field('RequesterID',array($this, 'insert_requester'));
    $crud->callback_add_field('Status',array($this, 'insert_status'));
    $crud->callback_add_field('ReqFacilityID',array($this, 'insert_facilityName'));
    $crud->callback_add_field('StartTime',array($this, 'insert_StartTime'));
    $crud->callback_add_field('EndTime',array($this, 'insert_EndTime'));
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

  public function insert_facilityName($value, $primary_key) {
    return '<input type="text" maxlength="50" value="'.$this->manage->getFacilityName($_GET['FID']).'" name="ReqFacilityID" style="width:462px" disabled>
    <input type="text" maxlength="50" value="'.$_GET['FID'].'" name="ReqFacilityID" style="width:462px" hidden>';
  }

  public function insert_requester($value, $primary_key){
    return '<input type="text" maxlength="50" value="'.$_SESSION['account']['UserID'].'" name="RequesterID" style="width:462px" disabled>
    <input type="text" maxlength="50" value="'.$_SESSION['account']['UserID'].'" name="RequesterID" style="width:462px" hidden>';
  }

  public function insert_status($value, $primary_key){
    return '<input type="text" maxlength="50" value="Waiting For Approval" name="Status" style="width:462px" disabled>
    <input type="text" maxlength="50" value="Waiting For Approval" name="Status" style="width:462px" hidden>';
  }

  public function insert_StartTime(){
    return '<input type="time" name="StartTime" style="width:462px">';
  }

  public function insert_EndTime(){
    return '<input type="time" name="EndTime" style="width:462px">';
  }

  public function facilityDetail($id){
    $this->Auth->validateUserRole();
    $data['role'] = 'user';
    $this->load->library('grocery_CRUD');
    $crud = new grocery_CRUD();
    $crud->set_table('facility');
    $crud->set_theme('tablestrap');

    $output = $crud->render();
    $data['title'] = 'Booking Facility Website — Facility Datail';
    $data['crud'] = get_object_vars($output);
    $data['facility'] = $this->manage->printOneFacility($id);
    $this->template->load('template/template_navbar', 'pages/FacilityDetail', $data);
  }
}