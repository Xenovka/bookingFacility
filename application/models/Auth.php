<?php
class Auth extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  function register($username, $email, $password) {
    $data_user = array(
      'username' => $username,
      'email' => $email,
      'password' => password_hash($password, PASSWORD_DEFAULT)
    );
    $this->db->insert('User', $data_user);
  }

  public function login($email, $password) {
    if ($query = $this->db->get_where('user', ['email' => $email])) {
      $query = $query->result_array();
      if (!$query) {
        $_SESSION['error'] = "Data yang anda masukkan salah!";
        return 0;
      }
      $query = $query[0];
    }


    if (password_verify($password, $query['Password']) && $query['Email'] == $email) {
      $_SESSION['account'] = $query;
      return 1;
    } else {
      $_SESSION['error'] = "Data yang anda masukkan salah!";
      return 0;
    }
  }
}
