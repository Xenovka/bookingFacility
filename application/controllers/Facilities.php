<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Facilities extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('grocery_crud_model'); //Model untuk facility
  }

  public function index(){
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

    $output = $crud->render();
    $data['title'] = 'Booking Facility Website — Facility Listing';
    $data['crud'] = get_object_vars($output);
    $this->template->load('template/template_navbar', 'pages/FacilityListing', $data);
  }
}