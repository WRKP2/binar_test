<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Resto_model extends CI_Model {

    public $table = 'resto';
    public $id = 'id';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    function getListrestoAuto($xresto) {
        $xStr = "SELECT " .
                "*" .
                " FROM resto WHERE  Nama_Resto like  '%" . $xresto . "%'";
        $query = $this->db->query($xStr);
        return $query;
    }

    // GET_LISTresto
    function getListresto() {
        $xStr = "SELECT id," .
                "Nama_Resto," .
                "Alamat," .
                "no_tlp from resto";
        $query = $this->db->query($xStr);

        return $query;
    }

    // GET_Detailresto
    function getDetailresto($xid) {
        $xStr = "SELECT id," .
                "Nama_Resto," .
                "Alamat," .
                "no_tlp from resto WHERE id = '" . $xid . "'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_resto
    function Insertresto($xid, $xNama_Resto, $xAlamat, $xno_tlp) {
        $xStr = " INSERT INTO resto( id," .
                "Nama_Resto," .
                "Alamat," .
                "no_tlp ) VALUES ( '" . $xid
                . "','" . $xNama_Resto
                . "','" . $xAlamat
                . "','" . $xno_tlp . "')";
        $query = $this->db->query($xStr);
        return $xid;
    }

    // updateresto
    function Updateresto($xid, $xNama_Resto, $xAlamat, $xno_tlp) {
        $xStr = " UPDATE resto SET " .
                "id= '" . $xid . "'," .
                "Nama_Resto= '" . $xNama_Resto . "'," .
                "Alamat= '" . $xAlamat . "'," .
                "no_tlp= '" . $xno_tlp . "'" . " WHERE id = '" . $xid . "'";
        $query = $this->db->query($xStr);
        return $xid;
    }

    // deletresto
    function Deletresto($xid) {
        $xStr = " DELETE FROM resto WHERE resto.id = '" . $xid . "'";
        $query = $this->db->query($xStr);
    }

    function getLastIndexresto() {
        $xStr = "SELECT id," .
                "Nama_Resto," .
                "Alamat," .
                "no_tlp from resto order by idx DESC limit 1 ";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
        $this->db->or_like('Nama_Resto', $q);
        $this->db->or_like('Alamat', $q);
        $this->db->or_like('no_tlp', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('Nama_Resto', $q);
        $this->db->or_like('Alamat', $q);
        $this->db->or_like('no_tlp', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
