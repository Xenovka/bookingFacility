<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Requests extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('grocery_crud_model'); //Model untuk user
  }

  public function index(){
    $data = [
        'title' => 'Booking Facility Website — Request Listing'
      ];
  
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

      $output = $crud->render();
      $data['crud'] = get_object_vars($output);
      $data['style'] = $this->load->view('include/style', $data, TRUE);
      $data['script'] = $this->load->view('include/script', $data, TRUE);      
      $data['header'] = $this->load->view("templates/header");
      $data['footer'] = $this->load->view("templates/footer");
      $this->template->load('template/template_home', 'pages/RequestListing', $data);
  }
}