<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Management extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('grocery_crud_model'); //Model untuk user
  }

  public function index(){
    redirect('management/facilities');
  }

  public function facilities(){
    $this->load->library('grocery_CRUD');
    $crud = new grocery_CRUD();
    $crud->set_theme('tablestrap');
    $crud->set_table('facility');
    $crud->set_subject('Facility');
    $crud->columns('FacilityID', 'FacilityName', 'Image');
    $crud->display_as('FacilityName','Facility Name');
    $crud->display_as('FacilityID','Facility ID');
    $crud->change_field_type('Password','password');
    $crud->edit_fields('FacilityName', 'Image');
    $crud->set_field_upload('Image','assets/images/facility');
    $crud->unset_print();
    $crud->unset_export();
    $crud->unset_read();
    $crud->unset_clone();

    $output = $crud->render();
    $data['title'] = 'Booking Facility Website — Facility Listing';
    $data['crud'] = get_object_vars($output);
    $this->template->load('template/template_navbar', 'pages/FacilityListing', $data);
  }

  public function requests(){  
    $this->load->library('grocery_CRUD');
    $crud = new grocery_CRUD();
    $crud->set_theme('tablestrap');
    $crud->set_table('requests');
    $crud->set_subject('Request');
    $crud->change_field_type('StartTime','time');
    $crud->change_field_type('EndTime','time');
    $crud->set_relation('RequesterID','user','Username');
    $crud->set_relation('ReqFacilityID','facility','FacilityName');
    $crud->unset_add();
    $crud->unset_edit();
    $crud->unset_delete();
    $crud->unset_print();
    $crud->unset_export();
    $crud->unset_read();

    //Tambah custom action
    $crud->add_action('Accept', '', 'management/accept'); 
    $crud->add_action('Decline', '', 'management/decline'); //tambahin 1 argument lagi buat class

    $output = $crud->render();
    $data['crud'] = get_object_vars($output);
    $data['title'] = 'Booking Facility Website — Request Listing';
    $this->template->load('template/template_navbar', 'pages/RequestListing', $data);
}
}