<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('grocery_crud_model');
    $this->load->model('manage');
  }

  public function index(){
    redirect('user/facilities');
  }

  public function facilities(){
    $this->load->library('grocery_CRUD');
    $crud = new grocery_CRUD();
    $crud->set_table('facility');

    $output = $crud->render();
    $data['title'] = 'Booking Facility Website — Facility Listing';
    $data['crud'] = get_object_vars($output);
    $this->template->load('template/template_navbar_user', 'pages/UserFacilityList', $data);
  }

  public function reserved(){
    $this->load->library('grocery_CRUD');
    $crud = new grocery_CRUD();
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
    $this->template->load('template/template_navbar_user', 'pages/RequestListing', $data);
  }

  public function insert_requester($value, $primary_key){
    return '<input type="text" maxlength="50" value="1" name="RequesterID" style="width:462px" disabled>
    <input type="text" maxlength="50" value="1" name="RequesterID" style="width:462px" hidden>';
  }

  public function insert_status($value, $primary_key){
    return '<input type="text" maxlength="50" value="Wait" name="Status" style="width:462px" disabled>
    <input type="text" maxlength="50" value="Wait" name="Status" style="width:462px" hidden>';
  }

  // public function clone($post_array, $primary_key){
  //   $post_array['Status']='Accept';
      
  //   return $post_array;
  // }
}