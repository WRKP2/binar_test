<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Groups_model extends CI_Model {

    public $table = 'groups';
    public $id = 'id';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    function getListgroupsAuto($xgroups) {
        $xStr = "SELECT " .
                "*" .
                " FROM groups WHERE name like  '%" . $xgroups . "%'";
        $query = $this->db->query($xStr);
        return $query;
    }

    // GET_LISTgroups
    function getListgroups() {
        $xStr = "SELECT id," .
                "name," .
                "description from groups";
        $query = $this->db->query($xStr);

        return $query;
    }

    // GET_Detailgroups
    function getDetailgroups($xid) {
        $xStr = "SELECT id," .
                "name," .
                "description from groups WHERE id = '" . $xid . "'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_groups
    function Insertgroups($xid, $xname, $xdescription) {
        $xStr = " INSERT INTO groups( id," .
                "name," .
                "description ) VALUES ( '" . $xid
                . "','" . $xname
                . "','" . $xdescription . "')";
        $query = $this->db->query($xStr);
        return $xid;
    }

    // updategroups
    function Updategroups($xid, $xname, $xdescription) {
        $xStr = " UPDATE groups SET " .
                "id= '" . $xid . "'," .
                "name= '" . $xname . "'," .
                "description= '" . $xdescription . "'" . " WHERE id = '" . $xid . "'";
        $query = $this->db->query($xStr);
        return $xid;
    }

    // deletgroups
    function Deletgroups($xid) {
        $xStr = " DELETE FROM groups WHERE groups.id = '" . $xid . "'";
        $query = $this->db->query($xStr);
    }

    function getLastIndexgroups() {
        $xStr = "SELECT id," .
                "name," .
                "description from groups order by idx DESC limit 1 ";
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
        $this->db->or_like('name', $q);
        $this->db->or_like('description', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('description', $q);
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
