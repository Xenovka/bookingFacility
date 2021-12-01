<?php
class Manage extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function deleteRequest($id){
    $this->db->query("DELETE FROM requests WHERE RequestID = '$id'");
  }

  public function acceptReserved($id){
    $this->db->query("UPDATE reserveduser SET Status = 'Accepted' WHERE RequestID = '$id'");
  }

  public function declineReserved($id){
    $this->db->query("UPDATE reserveduser SET Status = 'Declined' WHERE RequestID = '$id'");
  }
}