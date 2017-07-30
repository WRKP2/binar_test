<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contoh_Tabel_menu_model extends CI_Model
{

    public $table = 'tabel_menu';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }function getListtabel_menuAuto($xtabel_menu) {
        $xStr = "SELECT " .
                "*" .
                " FROM tabel_menu WHERE judul_menu like  '%" . $xtabel_menu . "%'";
        $query = $this->db->query($xStr);
        return $query;
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('judul_menu', $q);
	$this->db->or_like('link', $q);
	$this->db->or_like('icon', $q);
	$this->db->or_like('is_main_menu', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('judul_menu', $q);
	$this->db->or_like('link', $q);
	$this->db->or_like('icon', $q);
	$this->db->or_like('is_main_menu', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
