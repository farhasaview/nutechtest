<?php

class ModelBarang extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  public function allBarang() {
    $sql = "SELECT * FROM tbl_barang ORDER BY id DESC";
    $query = $this->db->query($sql);
    $result = $query->result_array();
    return $result;
  }

  public function findData($tbl, $keyword, $valueKeyword) {
    $sql = "SELECT * FROM $tbl WHERE $keyword = $valueKeyword";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $result = $query->result();
      return $result[0];
    } else {
      return null;
    }
    $query->free_result();
  }

  public function insertData($tbl, $data) {
    $this->db->insert($tbl, $data);
  }

  public function deleteData($tbl, $kataKunci, $id) {
    $sql = "DELETE FROM $tbl WHERE $kataKunci = $id";
    $this->db->query($sql);
  }

  public function updateData($tbl, $data, $where, $id) {
    $this->db->where($where, $id);
    $this->db->update($tbl, $data);
  }

  public function cekNamaBarang($tabel,$value){
    return $this->db->select('nama')
             ->from($tabel)
             ->where('nama',$value)
             ->get()->result();
  }

}