<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Satuan_model extends CI_Model
{

    public $table = 'satuan';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // GET_LISTsatuan
    function getListsatuan() {
        $xStr = "SELECT idx,".
 "satuan from satuan";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailsatuan
    function getDetailsatuan($xidx) {
        $xStr = "SELECT idx,".
 "satuan from satuan WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_satuan
    function Insertsatuan($xidx,$xsatuan) {
        $xStr = " INSERT INTO satuan( idx,".
 "satuan ) VALUES ( '" . $xidx
 . "','" .$xsatuan. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatesatuan
    function Updatesatuan($xidx,$xsatuan) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"satuan= '". $xsatuan . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletsatuan
    function Deletsatuan($xidx) {
        $xStr = " DELETE FROM satuan WHERE satuan.idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
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
        $this->db->like('idx', $q);
	$this->db->or_like('satuan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('satuan', $q);
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

