<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_app_model extends CI_Model {

    public $table = 'user_app';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    function getListuser_appAuto($xuser_app) {
        $xStr = "SELECT " .
                "*" .
                " FROM user_app WHERE NAMA like  '%" . $xuser_app . "%'";
        $query = $this->db->query($xStr);
        return $query;
    }

    // GET_LISTuser_app
    function getListuser_app() {
        $xStr = "SELECT ID," .
                "NAMA," .
                "ALAMAT," .
                "EMAIL," .
                "PASWORD from user_app";
        $query = $this->db->query($xStr);

        return $query;
    }

    // GET_Detailuser_app
    function getDetailuser_app($xID) {
        $xStr = "SELECT ID," .
                "NAMA," .
                "ALAMAT," .
                "EMAIL," .
                "PASWORD from user_app WHERE ID = '" . $xID . "'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_user_app
    function Insertuser_app($xID, $xNAMA, $xALAMAT, $xEMAIL, $xPASWORD) {
        $xStr = " INSERT INTO user_app( ID," .
                "NAMA," .
                "ALAMAT," .
                "EMAIL," .
                "PASWORD ) VALUES ( '" . $xID
                . "','" . $xNAMA
                . "','" . $xALAMAT
                . "','" . $xEMAIL
                . "','" . $xPASWORD . "')";
        $query = $this->db->query($xStr);
        return $xID;
    }

    // updateuser_app
    function Updateuser_app($xID, $xNAMA, $xALAMAT, $xEMAIL, $xPASWORD) {
        $xStr = " UPDATE user_app SET " .
                "ID= '" . $xID . "'," .
                "NAMA= '" . $xNAMA . "'," .
                "ALAMAT= '" . $xALAMAT . "'," .
                "EMAIL= '" . $xEMAIL . "'," .
                "PASWORD= '" . $xPASWORD . "'" . " WHERE ID = '" . $xID . "'";
        $query = $this->db->query($xStr);
        return $xID;
    }

    // deletuser_app
    function Deletuser_app($xID) {
        $xStr = " DELETE FROM user_app WHERE user_app.ID = '" . $xID . "'";
        $query = $this->db->query($xStr);
    }

    function getLastIndexuser_app() {
        $xStr = "SELECT ID," .
                "NAMA," .
                "ALAMAT," .
                "EMAIL," .
                "PASWORD from user_app order by idx DESC limit 1 ";
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
        $this->db->like('ID', $q);
        $this->db->or_like('NAMA', $q);
        $this->db->or_like('ALAMAT', $q);
        $this->db->or_like('EMAIL', $q);
        $this->db->or_like('PASWORD', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID', $q);
        $this->db->or_like('NAMA', $q);
        $this->db->or_like('ALAMAT', $q);
        $this->db->or_like('EMAIL', $q);
        $this->db->or_like('PASWORD', $q);
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
