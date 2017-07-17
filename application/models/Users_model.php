<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model {

    public $table = 'users';
    public $id = 'id';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    function getListusersAuto($xusers) {
        $xStr = "SELECT " .
                "*" .
                " FROM users WHERE nama like  '%" . $xusers . "%'";
        $query = $this->db->query($xStr);
        return $query;
    }

    // GET_LISTusers
    function getListusers() {
        $xStr = "SELECT id," .
                "ip_address," .
                "username," .
                "password," .
                "salt," .
                "email," .
                "activation_code," .
                "forgotten_password_code," .
                "forgotten_password_time," .
                "remember_code," .
                "created_on," .
                "last_login," .
                "active," .
                "first_name," .
                "last_name," .
                "company," .
                "phone from users";
        $query = $this->db->query($xStr);

        return $query;
    }

    // GET_Detailusers
    function getDetailusers($xid) {
        $xStr = "SELECT id," .
                "ip_address," .
                "username," .
                "password," .
                "salt," .
                "email," .
                "activation_code," .
                "forgotten_password_code," .
                "forgotten_password_time," .
                "remember_code," .
                "created_on," .
                "last_login," .
                "active," .
                "first_name," .
                "last_name," .
                "company," .
                "phone from users WHERE id = '" . $xid . "'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_users
    function Insertusers($xid, $xip_address, $xusername, $xpassword, $xsalt, $xemail, $xactivation_code, $xforgotten_password_code, $xforgotten_password_time, $xremember_code, $xcreated_on, $xlast_login, $xactive, $xfirst_name, $xlast_name, $xcompany, $xphone) {
        $xStr = " INSERT INTO users( id," .
                "ip_address," .
                "username," .
                "password," .
                "salt," .
                "email," .
                "activation_code," .
                "forgotten_password_code," .
                "forgotten_password_time," .
                "remember_code," .
                "created_on," .
                "last_login," .
                "active," .
                "first_name," .
                "last_name," .
                "company," .
                "phone ) VALUES ( '" . $xid
                . "','" . $xip_address
                . "','" . $xusername
                . "','" . $xpassword
                . "','" . $xsalt
                . "','" . $xemail
                . "','" . $xactivation_code
                . "','" . $xforgotten_password_code
                . "','" . $xforgotten_password_time
                . "','" . $xremember_code
                . "','" . $xcreated_on
                . "','" . $xlast_login
                . "','" . $xactive
                . "','" . $xfirst_name
                . "','" . $xlast_name
                . "','" . $xcompany
                . "','" . $xphone . "')";
        $query = $this->db->query($xStr);
        return $xid;
    }

    // updateusers
    function Updateusers($xid, $xip_address, $xusername, $xpassword, $xsalt, $xemail, $xactivation_code, $xforgotten_password_code, $xforgotten_password_time, $xremember_code, $xcreated_on, $xlast_login, $xactive, $xfirst_name, $xlast_name, $xcompany, $xphone) {
        $xStr = " UPDATE users SET " .
                "id= '" . $xid . "'," .
                "ip_address= '" . $xip_address . "'," .
                "username= '" . $xusername . "'," .
                "password= '" . $xpassword . "'," .
                "salt= '" . $xsalt . "'," .
                "email= '" . $xemail . "'," .
                "activation_code= '" . $xactivation_code . "'," .
                "forgotten_password_code= '" . $xforgotten_password_code . "'," .
                "forgotten_password_time= '" . $xforgotten_password_time . "'," .
                "remember_code= '" . $xremember_code . "'," .
                "created_on= '" . $xcreated_on . "'," .
                "last_login= '" . $xlast_login . "'," .
                "active= '" . $xactive . "'," .
                "first_name= '" . $xfirst_name . "'," .
                "last_name= '" . $xlast_name . "'," .
                "company= '" . $xcompany . "'," .
                "phone= '" . $xphone . "'" . " WHERE id = '" . $xid . "'";
        $query = $this->db->query($xStr);
        return $xid;
    }

    // deletusers
    function Deletusers($xid) {
        $xStr = " DELETE FROM users WHERE users.id = '" . $xid . "'";
        $query = $this->db->query($xStr);
    }

    function getLastIndexusers() {
        $xStr = "SELECT id," .
                "ip_address," .
                "username," .
                "password," .
                "salt," .
                "email," .
                "activation_code," .
                "forgotten_password_code," .
                "forgotten_password_time," .
                "remember_code," .
                "created_on," .
                "last_login," .
                "active," .
                "first_name," .
                "last_name," .
                "company," .
                "phone from users order by idx DESC limit 1 ";
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
        $this->db->or_like('ip_address', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('salt', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('activation_code', $q);
        $this->db->or_like('forgotten_password_code', $q);
        $this->db->or_like('forgotten_password_time', $q);
        $this->db->or_like('remember_code', $q);
        $this->db->or_like('created_on', $q);
        $this->db->or_like('last_login', $q);
        $this->db->or_like('active', $q);
        $this->db->or_like('first_name', $q);
        $this->db->or_like('last_name', $q);
        $this->db->or_like('company', $q);
        $this->db->or_like('phone', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('ip_address', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('salt', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('activation_code', $q);
        $this->db->or_like('forgotten_password_code', $q);
        $this->db->or_like('forgotten_password_time', $q);
        $this->db->or_like('remember_code', $q);
        $this->db->or_like('created_on', $q);
        $this->db->or_like('last_login', $q);
        $this->db->or_like('active', $q);
        $this->db->or_like('first_name', $q);
        $this->db->or_like('last_name', $q);
        $this->db->or_like('company', $q);
        $this->db->or_like('phone', $q);
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
