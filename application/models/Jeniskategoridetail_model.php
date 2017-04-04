<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jeniskategoridetail_model extends CI_Model
{

    public $table = 'jeniskategoridetail';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // GET_LISTjeniskategoridetail
    function getListjeniskategoridetail() {
        $xStr = "SELECT idx,".
 "namajeniskategoridetail from jeniskategoridetail";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailjeniskategoridetail
    function getDetailjeniskategoridetail($xidx) {
        $xStr = "SELECT idx,".
 "namajeniskategoridetail from jeniskategoridetail WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_jeniskategoridetail
    function Insertjeniskategoridetail($xidx,$xnamajeniskategoridetail) {
        $xStr = " INSERT INTO jeniskategoridetail( idx,".
 "namajeniskategoridetail ) VALUES ( '" . $xidx
 . "','" .$xnamajeniskategoridetail. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatejeniskategoridetail
    function Updatejeniskategoridetail($xidx,$xnamajeniskategoridetail) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"namajeniskategoridetail= '". $xnamajeniskategoridetail . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletjeniskategoridetail
    function Deletjeniskategoridetail($xidx) {
        $xStr = " DELETE FROM jeniskategoridetail WHERE jeniskategoridetail.idx = '" . $xidx . "'";
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
	$this->db->or_like('namajeniskategoridetail', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('namajeniskategoridetail', $q);
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

