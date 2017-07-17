<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_groups_model extends CI_Model {

    public $table = 'users_groups';
    public $id = 'id';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    function getListusers_groupsAuto($xusers_groups) {
        $xStr = "SELECT " .
                "*" .
                " FROM users_groups WHERE user_id like  '%" . $xusers_groups . "%'";
        $query = $this->db->query($xStr);
        return $query;
    }

    // GET_LISTusers_groups
    function getListusers_groups() {
        $xStr = "SELECT id," .
                "user_id," .
                "group_id from users_groups";
        $query = $this->db->query($xStr);

        return $query;
    }

    // GET_Detailusers_groups
    function getDetailusers_groups($xid) {
        $xStr = "SELECT id," .
                "user_id," .
                "group_id from users_groups WHERE id = '" . $xid . "'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_users_groups
    function Insertusers_groups($xid, $xuser_id, $xgroup_id) {
        $xStr = " INSERT INTO users_groups( id," .
                "user_id," .
                "group_id ) VALUES ( '" . $xid
                . "','" . $xuser_id
                . "','" . $xgroup_id . "')";
        $query = $this->db->query($xStr);
        return $xid;
    }

    // updateusers_groups
    function Updateusers_groups($xid, $xuser_id, $xgroup_id) {
        $xStr = " UPDATE users_groups SET " .
                "id= '" . $xid . "'," .
                "user_id= '" . $xuser_id . "'," .
                "group_id= '" . $xgroup_id . "'" . " WHERE id = '" . $xid . "'";
        $query = $this->db->query($xStr);
        return $xid;
    }

    // deletusers_groups
    function Deletusers_groups($xid) {
        $xStr = " DELETE FROM users_groups WHERE users_groups.id = '" . $xid . "'";
        $query = $this->db->query($xStr);
    }

    function getLastIndexusers_groups() {
        $xStr = "SELECT id," .
                "user_id," .
                "group_id from users_groups order by idx DESC limit 1 ";
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
        $this->db->or_like('user_id', $q);
        $this->db->or_like('group_id', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('user_id', $q);
        $this->db->or_like('group_id', $q);
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
