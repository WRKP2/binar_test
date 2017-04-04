<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenisvoucher_model extends CI_Model
{

    public $table = 'jenisvoucher';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // GET_LISTjenisvoucher
    function getListjenisvoucher() {
        $xStr = "SELECT idx,".
 "jenisvoucher,".
 "keterangan from jenisvoucher";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailjenisvoucher
    function getDetailjenisvoucher($xidx) {
        $xStr = "SELECT idx,".
 "jenisvoucher,".
 "keterangan from jenisvoucher WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_jenisvoucher
    function Insertjenisvoucher($xidx,$xjenisvoucher,$xketerangan) {
        $xStr = " INSERT INTO jenisvoucher( idx,".
 "jenisvoucher,".
 "keterangan ) VALUES ( '" . $xidx
 . "','" .$xjenisvoucher
 . "','" .$xketerangan. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatejenisvoucher
    function Updatejenisvoucher($xidx,$xjenisvoucher,$xketerangan) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"jenisvoucher= '". $xjenisvoucher . "'," . 
		"keterangan= '". $xketerangan . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletjenisvoucher
    function Deletjenisvoucher($xidx) {
        $xStr = " DELETE FROM jenisvoucher WHERE jenisvoucher.idx = '" . $xidx . "'";
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
	$this->db->or_like('jenisvoucher', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('jenisvoucher', $q);
	$this->db->or_like('keterangan', $q);
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

