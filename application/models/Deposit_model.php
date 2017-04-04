<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Deposit_model extends CI_Model
{

    public $table = 'deposit';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // GET_LISTdeposit
    function getListdeposit() {
        $xStr = "SELECT idx,".
 "idmember,".
 "tgltrx,".
 "saldoawal,".
 "saldomasuk,".
 "saldokeluar,".
 "saldoakhir,".
 "keterangansistem from deposit";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detaildeposit
    function getDetaildeposit($xidx) {
        $xStr = "SELECT idx,".
 "idmember,".
 "tgltrx,".
 "saldoawal,".
 "saldomasuk,".
 "saldokeluar,".
 "saldoakhir,".
 "keterangansistem from deposit WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_deposit
    function Insertdeposit($xidx,$xidmember,$xtgltrx,$xsaldoawal,$xsaldomasuk,$xsaldokeluar,$xsaldoakhir,$xketerangansistem) {
        $xStr = " INSERT INTO deposit( idx,".
 "idmember,".
 "tgltrx,".
 "saldoawal,".
 "saldomasuk,".
 "saldokeluar,".
 "saldoakhir,".
 "keterangansistem ) VALUES ( '" . $xidx
 . "','" .$xidmember
 . "','" .$xtgltrx
 . "','" .$xsaldoawal
 . "','" .$xsaldomasuk
 . "','" .$xsaldokeluar
 . "','" .$xsaldoakhir
 . "','" .$xketerangansistem. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatedeposit
    function Updatedeposit($xidx,$xidmember,$xtgltrx,$xsaldoawal,$xsaldomasuk,$xsaldokeluar,$xsaldoakhir,$xketerangansistem) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"idmember= '". $xidmember . "'," . 
		"tgltrx= '". $xtgltrx . "'," . 
		"saldoawal= '". $xsaldoawal . "'," . 
		"saldomasuk= '". $xsaldomasuk . "'," . 
		"saldokeluar= '". $xsaldokeluar . "'," . 
		"saldoakhir= '". $xsaldoakhir . "'," . 
		"keterangansistem= '". $xketerangansistem . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletdeposit
    function Deletdeposit($xidx) {
        $xStr = " DELETE FROM deposit WHERE deposit.idx = '" . $xidx . "'";
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
	$this->db->or_like('tgltrx', $q);
	$this->db->or_like('saldoawal', $q);
	$this->db->or_like('saldomasuk', $q);
	$this->db->or_like('saldokeluar', $q);
	$this->db->or_like('saldoakhir', $q);
	$this->db->or_like('keterangansistem', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('tgltrx', $q);
	$this->db->or_like('saldoawal', $q);
	$this->db->or_like('saldomasuk', $q);
	$this->db->or_like('saldokeluar', $q);
	$this->db->or_like('saldoakhir', $q);
	$this->db->or_like('keterangansistem', $q);
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

