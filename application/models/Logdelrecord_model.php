<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logdelrecord_model extends CI_Model
{

    public $table = 'logdelrecord';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // GET_LISTlogdelrecord
    function getListlogdelrecord() {
        $xStr = "SELECT idx,".
 "idxhapus,".
 "keterangan,".
 "nmtable,".
 "tgllog,".
 "ideksekusi from logdelrecord";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detaillogdelrecord
    function getDetaillogdelrecord($xidx) {
        $xStr = "SELECT idx,".
 "idxhapus,".
 "keterangan,".
 "nmtable,".
 "tgllog,".
 "ideksekusi from logdelrecord WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_logdelrecord
    function Insertlogdelrecord($xidx,$xidxhapus,$xketerangan,$xnmtable,$xtgllog,$xideksekusi) {
        $xStr = " INSERT INTO logdelrecord( idx,".
 "idxhapus,".
 "keterangan,".
 "nmtable,".
 "tgllog,".
 "ideksekusi ) VALUES ( '" . $xidx
 . "','" .$xidxhapus
 . "','" .$xketerangan
 . "','" .$xnmtable
 . "','" .$xtgllog
 . "','" .$xideksekusi. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatelogdelrecord
    function Updatelogdelrecord($xidx,$xidxhapus,$xketerangan,$xnmtable,$xtgllog,$xideksekusi) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"idxhapus= '". $xidxhapus . "'," . 
		"keterangan= '". $xketerangan . "'," . 
		"nmtable= '". $xnmtable . "'," . 
		"tgllog= '". $xtgllog . "'," . 
		"ideksekusi= '". $xideksekusi . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletlogdelrecord
    function Deletlogdelrecord($xidx) {
        $xStr = " DELETE FROM logdelrecord WHERE logdelrecord.idx = '" . $xidx . "'";
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
	$this->db->or_like('idxhapus', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('nmtable', $q);
	$this->db->or_like('tgllog', $q);
	$this->db->or_like('ideksekusi', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('idxhapus', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('nmtable', $q);
	$this->db->or_like('tgllog', $q);
	$this->db->or_like('ideksekusi', $q);
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

