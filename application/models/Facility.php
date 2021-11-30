<?php
class Facility extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function getAllFacility() {
    $this->listFacility = $this->db->query("SELECT * FROM Facility");
    $this->listFacility = $this->listFacility->result_array();
    return $this->listFacility;
  }

//   public function getOneUser($id) {
//     $this->listUser = $this->db->query("SELECT * FROM user WHERE UserID = $id");
//     $this->listUser = $this->listUser->result_array();
//     return $this->listUser;
//   }

//   public function deleteUser($id) {
//     $query = $this->db->query("DELETE FROM user WHERE UserID = '$id'");
//   }

//   public function edit($id, $user, $email){
//     $this->db->query("UPDATE user SET Username='$user' WHERE UserID = '$id'");
//     $this->db->query("UPDATE user SET Email='$email' WHERE UserID = '$id'");
//   }
}
