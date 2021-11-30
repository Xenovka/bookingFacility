<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('auth');
    $this->load->library('form_validation');
    $this->load->library('session');
  }

  public function index() {
    $data['title'] = 'Booking Facility Website — Kelompok 2';

    $this->template->load('template/template_home', 'home', $data);
  }

  //Buka view register
  public function register() {
    $data['title'] = 'Booking Facility Website — Register';
    $this->template->load('template/template_home', 'pages/register', $data);
  }

  //Cek Rules Register
  public function registCheck() {
    $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[1]|max_length[255]|is_unique[user.username]');
    $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[1]|max_length[255]|valid_email');
    $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[1]|max_length[255]');
    if ($this->form_validation->run() == true) //Kalau sesuai rules insert ke DB
    {
      $username = $this->input->post('username');
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $this->auth->register($username, $email, $password);
      $this->session->set_flashdata('success_register', 'Proses Pendaftaran User Berhasil');
      redirect('home/login'); //Terus masuk ke login
    } else //Kalau ga sesuai balik ke register + bawa validation errornya
    {
      $this->session->set_flashdata('error', validation_errors());
      redirect('home/register');
    }
  }

  //Menampilkan view login
  public function login() {
    $data['title'] = 'Booking Facility Website — Login';

    $loginStatus = 0;
    $this->form_validation->set_rules('email', 'Email', "valid_email");

    if ($this->input->post('email') != null && $this->input->post('password') != NULL) {
      $loginStatus = $this->auth->login($this->input->post('email'), $this->input->post('password'));
    }


    if (!$this->form_validation->run() || !$loginStatus) {
      $this->template->load('template/template_home', 'pages/login', $data); //login gagal
    } else {
      redirect("admin");
    }
  }
}