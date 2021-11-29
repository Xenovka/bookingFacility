<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('auth');
  }

  public function index(){
    $data = [
        'title' => 'Booking Facility Website — User Listing'
      ];
  
      $data['user'] = $this->auth->getAllUser();
      $data['header'] = $this->load->view("templates/header");
      $data['footer'] = $this->load->view("templates/footer");
      $this->template->load('template/template_home', 'pages/UserListing', $data);
  }

  public function deleteUser($id) {
    $this->auth->deleteUser($id);
    redirect(site_url("admin"));
  }
}