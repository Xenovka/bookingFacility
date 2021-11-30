<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('grocery_crud_model'); //Model untuk user
  }

  public function index(){
    $data = [
        'title' => 'Booking Facility Website — User Listing'
      ];
  
      $this->load->library('grocery_CRUD');
      $crud = new grocery_CRUD();
      $crud->set_theme('tablestrap');
      $crud->set_table('user');
      $crud->set_subject('User');
<<<<<<< Updated upstream
      $crud->columns('Username', 'Email', 'Role'); //Tampilkan semua kecuali password
      $crud->change_field_type('Password','assword');
      $crud->edit_fields('Username', 'Email', 'Role');
=======
      $crud->columns('UserID','Username', 'Email', 'Role'); //Tampilkan semua kecuali password
      $crud->change_field_type('Password','password');
      $crud->edit_fields('Username', 'Email', 'Role');
      $crud->add_fields('Username', 'Email', 'Password', 'Role');
>>>>>>> Stashed changes

      //Untuk hash password
      $crud->callback_before_insert(array($this,'encrypt_password_callback'));
      $crud->callback_before_update(array($this,'encrypt_password_callback'));

      $output = $crud->render();
      $data['crud'] = get_object_vars($output);
      $data['style'] = $this->load->view('include/style', $data, TRUE);
      $data['script'] = $this->load->view('include/script', $data, TRUE);      
      $data['header'] = $this->load->view("templates/header");
      $data['footer'] = $this->load->view("templates/footer");
      $this->template->load('template/template_home', 'pages/user/UserListing', $data);
  }

  function encrypt_password_callback($post_array, $primary_key = null){
    $post_array['Password'] = password_hash($post_array['Password'], PASSWORD_DEFAULT);
    return $post_array;
  }
}