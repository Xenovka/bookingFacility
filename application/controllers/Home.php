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

  public function logout() {
    session_unset();
    session_destroy();
    redirect("Home");
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
    
    $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
    if($recaptchaResponse != '')
		{
			$userIp=$this->input->ip_address();
     
      $secret = $this->config->item('google_secret');
   
      $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
      $ch = curl_init(); 
      curl_setopt($ch, CURLOPT_URL, $url); 
      // curl_setopt($ch, CURLOPT_POST, true); 
      // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($check)); 
      // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
      $output = curl_exec($ch); 
      curl_close($ch);      
      $status= json_decode($output, true);
      if ($status['success']) {
        if ($this->form_validation->run() == true) //Kalau sesuai rules insert ke DB
        {
          $username = $this->input->post('username');
          $email = $this->input->post('email');
          $password = $this->input->post('password');
          $this->auth->register($username, $email, $password);
          $this->session->set_flashdata('success_register', 'Proses Pendaftaran User Berhasil');
        } else //Kalau ga sesuai balik ke register + bawa validation errornya
        {
          $this->session->set_flashdata('error', validation_errors());
          redirect('home/register');
        }
        $this->session->set_flashdata('success_captcha', 'Register Success');
        redirect('home/login'); //Terus masuk ke login;
      }else{
          $this->session->set_flashdata('fail_captcha', 'Sorry Google Recaptcha Unsuccessful!!');
          redirect('home/register');
      }
    }else{
      $this->session->set_flashdata('fail_captcha', 'Sorry Google Recaptcha Unsuccessful!!');
      redirect('home/register');
    }
  }

  //Menampilkan view login
  public function login() {
    if(isset($_SESSION['account'])) {
      redirect("{$this->auth->checkPermission($_SESSION['account']['Role'])}");
    }
    $data['title'] = 'Booking Facility Website — Login';

    $loginStatus = 0;
    $this->form_validation->set_rules('email', 'Email', "valid_email");

    if ($this->input->post('email') != null && $this->input->post('password') != NULL) {
      $loginStatus = $this->auth->login($this->input->post('email'), $this->input->post('password'));
    }

    if (!$this->form_validation->run() || !$loginStatus) {
      $this->template->load('template/template_home', 'pages/login', $data); //login gagal
    } else if($_SESSION['account']['Role'] == 1) {
      redirect("admin");
    } else if($_SESSION['account']['Role'] == 2) {
      redirect("management");
    } else if($_SESSION['account']['Role'] == 3) {
      redirect("user");
    }
  }
}