<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('auth'); //Model untuk user
  }

  public function index(){
    $data = [
        'title' => 'Booking Facility Website — User Listing'
      ];
  
      $data['user'] = $this->auth->getAllUser();
      $data['header'] = $this->load->view("templates/header");
      $data['footer'] = $this->load->view("templates/footer");
      $this->template->load('template/template_home', 'pages/user/UserListing', $data);
  }

  public function deleteUser($id) {
    $this->auth->deleteUser($id);
    redirect(site_url("admin"));
  }

  public function editUser($id) {
    $data = [
      'title' => 'Booking Facility Website — Edit User'
    ];
      $data['user'] = $this->auth->getOneUser($id);
      $data['header'] = $this->load->view("templates/header");
      $data['footer'] = $this->load->view("templates/footer");
      $this->template->load('template/template_home', 'pages/user/editUser', $data);
  }

  public function editCheck(){
    $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[1]|max_length[255]');
    $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[1]|max_length[255]|valid_email');
    $userID = $this->input->post('UserID');
    if ($this->form_validation->run() == true) //Kalau sesuai rules update ke DB
    {
      $username = $this->input->post('username');
      $email = $this->input->post('email');
      $this->auth->edit($userID, $username, $email);
      $this->session->set_flashdata('success_edit', 'Proses Pendaftaran User Berhasil');
      redirect('admin'); //Terus masuk ke admin
    } else //Kalau ga sesuai balik ke edit page + bawa validation errornya
    {
      $this->session->set_flashdata('error', validation_errors());
      redirect('admin/editUser/'.$userID);
    }
  }

  public function addUser(){
    $data = [
      'title' => 'Booking Facility Website — Add User'
    ];
    $data['header'] = $this->load->view("templates/header");
    $data['footer'] = $this->load->view("templates/footer");
    $this->template->load('template/template_home', 'pages/user/addUser', $data);
  }

  public function addCheck(){
    $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[1]|max_length[255]|is_unique[user.username]');
    $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[1]|max_length[255]|valid_email');
    $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[1]|max_length[255]');
    $this->form_validation->set_rules('role', 'role', 'trim|required');
    if ($this->form_validation->run() == true) //Kalau sesuai rules insert ke DB
    {
      $username = $this->input->post('username');
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $role = $this->input->post('role');
      $this->auth->add($username, $email, $password, $role);
      $this->session->set_flashdata('success_add', 'Proses Pendaftaran User Berhasil');
      redirect('admin'); //Terus masuk ke login
    } else //Kalau ga sesuai balik ke add + bawa validation errornya
    {
      $this->session->set_flashdata('error', validation_errors());
      redirect('admin/addUser');
    }
  }
}