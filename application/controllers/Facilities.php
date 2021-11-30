<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Facilities extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('facility'); //Model untuk facility
  }

  public function index(){
    $data = [
      'title' => 'Booking Facility Website — Facility Listing'
    ];

    $data['facility'] = $this->facility->getAllfacility();
    $data['header'] = $this->load->view("templates/header");
    $data['footer'] = $this->load->view("templates/footer");
    $this->template->load('template/template_home', 'pages/facility/FacilityListing', $data);
  }

  public function deleteFacility($id) {
    $this->facility->deleteFacility($id);
    redirect(site_url("facilities"));
  }

  public function editFacility($id) {
    $data = [
      'title' => 'Booking Facility Website — Edit Facility'
    ];
      $data['facility'] = $this->facility->getOneFacility($id);
      $data['header'] = $this->load->view("templates/header");
      $data['footer'] = $this->load->view("templates/footer");
      $this->template->load('template/template_home', 'pages/facility/editFacility', $data);
  }

  public function editCheck(){
    $this->form_validation->set_rules('FacilityName', 'FacilityName', 'trim|required|min_length[1]|max_length[255]');
    $FacilityID = $this->input->post('FacilityID');
    if ($this->form_validation->run() == true) //Kalau sesuai rules update ke DB
    {
      $Facilityname = $this->input->post('FacilityName');
      $this->facility->edit($FacilityID, $Facilityname);
      $this->session->set_flashdata('success_edit', 'Proses Pendaftaran Facility Berhasil');
      redirect('facilities'); //Terus masuk ke facilities
    } else //Kalau ga sesuai balik ke edit page + bawa validation errornya
    {
      $this->session->set_flashdata('error', validation_errors());
      redirect('facilities/editFacility/'.$FacilityID);
    }
  }
}