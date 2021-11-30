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

  public function getOneFacility($id) {
    $this->listFacility = $this->db->query("SELECT * FROM facility WHERE FacilityID = $id");
    $this->listFacility = $this->listFacility->result_array();
    return $this->listFacility;
  }

  public function deleteFacility($id) {
    $query = $this->db->query("DELETE FROM facility WHERE FacilityID = '$id'");
  }

  public function edit($id, $name){
    $this->db->query("UPDATE facility SET FacilityName='$name' WHERE FacilityID = '$id'");
  }

  public function add($FacilityName, $image){
    $data_Facility = array(
      'FacilityName' => $FacilityName,
      'Image' => $image
    );
    $this->db->insert('Facility', $data_Facility);
  }
}
