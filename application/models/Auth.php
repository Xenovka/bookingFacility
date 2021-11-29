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
      if (!$query) return 0;
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

  public function getAllUser() {
    $this->listUser = $this->db->query("SELECT * FROM user");
    $this->listUser = $this->listUser->result_array();
    return $this->listUser;
  }

  public function getOneUser($id) {
    $this->listUser = $this->db->query("SELECT * FROM user WHERE UserID = $id");
    $this->listUser = $this->listUser->result_array();
    return $this->listUser;
  }

  public function deleteUser($id) {
    $query = $this->db->query("DELETE FROM user WHERE UserID = '$id'");
  }

  public function edit($id, $user, $email){
    $this->db->query("UPDATE user SET Username='$user' WHERE UserID = '$id'");
    $this->db->query("UPDATE user SET Email='$email' WHERE UserID = '$id'");
  }
}
