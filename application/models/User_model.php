<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    public $table = 'user';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    // GET_LISTuser
    function getListuser() {
        $xStr = "SELECT idx," .
                "nama," .
                "alamat," .
                "user," .
                "password from user";
        $query = $this->db->query($xStr);

        return $query;
    }

    // GET_Detailuser
    function getDetailuser($xidx) {
        $xStr = "SELECT idx," .
                "nama," .
                "alamat," .
                "user," .
                "password from user WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_user
    function Insertuser($xidx, $xnama, $xalamat, $xuser, $xpassword) {
        $xStr = " INSERT INTO user( idx," .
                "nama," .
                "alamat," .
                "user," .
                "password ) VALUES ( '" . $xidx
                . "','" . $xnama
                . "','" . $xalamat
                . "','" . $xuser
                . "','" . $xpassword . "')";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    // updateuser
    function Updateuser($xidx, $xnama, $xalamat, $xuser, $xpassword) {
        $xStr = " UPDATE user SET " .
                "idx= '" . $xidx . "'," .
                "nama= '" . $xnama . "'," .
                "alamat= '" . $xalamat . "'," .
                "user= '" . $xuser . "'," .
                "password= '" . $xpassword . "'," . "' WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletuser
    function Deletuser($xidx) {
        $xStr = " DELETE FROM user WHERE user.idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
    }

    function getLastIndexuser() {
        $xStr = "SELECT idx," .
                "nama," .
                "alamat," .
                "user," .
                "password from user order by idx DESC limit 1 ";
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
        $this->db->like('idx', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('user', $q);
        $this->db->or_like('password', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('user', $q);
        $this->db->or_like('password', $q);
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
