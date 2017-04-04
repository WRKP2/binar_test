<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Membervoucher_model extends CI_Model
{

    public $table = 'membervoucher';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // GET_LISTmembervoucher
    function getListmembervoucher() {
        $xStr = "SELECT idx,".
 "idmember,".
 "idvoucher,".
 "idproduk,".
 "tglpakai,".
 "isdipakai,".
 "idjenisvoucher,".
 "idreveral,".
 "isdipakaireveral from membervoucher";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailmembervoucher
    function getDetailmembervoucher($xidx) {
        $xStr = "SELECT idx,".
 "idmember,".
 "idvoucher,".
 "idproduk,".
 "tglpakai,".
 "isdipakai,".
 "idjenisvoucher,".
 "idreveral,".
 "isdipakaireveral from membervoucher WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_membervoucher
    function Insertmembervoucher($xidx,$xidmember,$xidvoucher,$xidproduk,$xtglpakai,$xisdipakai,$xidjenisvoucher,$xidreveral,$xisdipakaireveral) {
        $xStr = " INSERT INTO membervoucher( idx,".
 "idmember,".
 "idvoucher,".
 "idproduk,".
 "tglpakai,".
 "isdipakai,".
 "idjenisvoucher,".
 "idreveral,".
 "isdipakaireveral ) VALUES ( '" . $xidx
 . "','" .$xidmember
 . "','" .$xidvoucher
 . "','" .$xidproduk
 . "','" .$xtglpakai
 . "','" .$xisdipakai
 . "','" .$xidjenisvoucher
 . "','" .$xidreveral
 . "','" .$xisdipakaireveral. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatemembervoucher
    function Updatemembervoucher($xidx,$xidmember,$xidvoucher,$xidproduk,$xtglpakai,$xisdipakai,$xidjenisvoucher,$xidreveral,$xisdipakaireveral) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"idmember= '". $xidmember . "'," . 
		"idvoucher= '". $xidvoucher . "'," . 
		"idproduk= '". $xidproduk . "'," . 
		"tglpakai= '". $xtglpakai . "'," . 
		"isdipakai= '". $xisdipakai . "'," . 
		"idjenisvoucher= '". $xidjenisvoucher . "'," . 
		"idreveral= '". $xidreveral . "'," . 
		"isdipakaireveral= '". $xisdipakaireveral . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletmembervoucher
    function Deletmembervoucher($xidx) {
        $xStr = " DELETE FROM membervoucher WHERE membervoucher.idx = '" . $xidx . "'";
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
	$this->db->or_like('idmember', $q);
	$this->db->or_like('idvoucher', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('tglpakai', $q);
	$this->db->or_like('isdipakai', $q);
	$this->db->or_like('idjenisvoucher', $q);
	$this->db->or_like('idreveral', $q);
	$this->db->or_like('isdipakaireveral', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('idvoucher', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('tglpakai', $q);
	$this->db->or_like('isdipakai', $q);
	$this->db->or_like('idjenisvoucher', $q);
	$this->db->or_like('idreveral', $q);
	$this->db->or_like('isdipakaireveral', $q);
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

