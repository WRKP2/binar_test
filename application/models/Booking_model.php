<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking_model extends CI_Model
{

    public $table = 'booking';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // GET_LISTbooking
    function getListbooking() {
        $xStr = "SELECT idx,".
 "tglbooking,".
 "idproduk,".
 "iddetailproduk,".
 "idkategoriproduk,".
 "idmember,".
 "tglperuntukandari,".
 "tglperuntukansampai,".
 "jmldewasa,".
 "jmlanak,".
 "jmlhewan,".
 "keterangantambahn,".
 "jmltransfer,".
 "idjenispembayaran,".
 "nomorkartu,".
 "tgltransfer,".
 "tglinsert,".
 "tglupdate,".
 "status,".
 "harga,".
 "hargadiscount,".
 "jmlhari from booking";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailbooking
    function getDetailbooking($xidx) {
        $xStr = "SELECT idx,".
 "tglbooking,".
 "idproduk,".
 "iddetailproduk,".
 "idkategoriproduk,".
 "idmember,".
 "tglperuntukandari,".
 "tglperuntukansampai,".
 "jmldewasa,".
 "jmlanak,".
 "jmlhewan,".
 "keterangantambahn,".
 "jmltransfer,".
 "idjenispembayaran,".
 "nomorkartu,".
 "tgltransfer,".
 "tglinsert,".
 "tglupdate,".
 "status,".
 "harga,".
 "hargadiscount,".
 "jmlhari from booking WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_booking
    function Insertbooking($xidx,$xtglbooking,$xidproduk,$xiddetailproduk,$xidkategoriproduk,$xidmember,$xtglperuntukandari,$xtglperuntukansampai,$xjmldewasa,$xjmlanak,$xjmlhewan,$xketerangantambahn,$xjmltransfer,$xidjenispembayaran,$xnomorkartu,$xtgltransfer,$xtglinsert,$xtglupdate,$xstatus,$xharga,$xhargadiscount,$xjmlhari) {
        $xStr = " INSERT INTO booking( idx,".
 "tglbooking,".
 "idproduk,".
 "iddetailproduk,".
 "idkategoriproduk,".
 "idmember,".
 "tglperuntukandari,".
 "tglperuntukansampai,".
 "jmldewasa,".
 "jmlanak,".
 "jmlhewan,".
 "keterangantambahn,".
 "jmltransfer,".
 "idjenispembayaran,".
 "nomorkartu,".
 "tgltransfer,".
 "tglinsert,".
 "tglupdate,".
 "status,".
 "harga,".
 "hargadiscount,".
 "jmlhari ) VALUES ( '" . $xidx
 . "','" .$xtglbooking
 . "','" .$xidproduk
 . "','" .$xiddetailproduk
 . "','" .$xidkategoriproduk
 . "','" .$xidmember
 . "','" .$xtglperuntukandari
 . "','" .$xtglperuntukansampai
 . "','" .$xjmldewasa
 . "','" .$xjmlanak
 . "','" .$xjmlhewan
 . "','" .$xketerangantambahn
 . "','" .$xjmltransfer
 . "','" .$xidjenispembayaran
 . "','" .$xnomorkartu
 . "','" .$xtgltransfer
 . "','" .$xtglinsert
 . "','" .$xtglupdate
 . "','" .$xstatus
 . "','" .$xharga
 . "','" .$xhargadiscount
 . "','" .$xjmlhari. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatebooking
    function Updatebooking($xidx,$xtglbooking,$xidproduk,$xiddetailproduk,$xidkategoriproduk,$xidmember,$xtglperuntukandari,$xtglperuntukansampai,$xjmldewasa,$xjmlanak,$xjmlhewan,$xketerangantambahn,$xjmltransfer,$xidjenispembayaran,$xnomorkartu,$xtgltransfer,$xtglinsert,$xtglupdate,$xstatus,$xharga,$xhargadiscount,$xjmlhari) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"tglbooking= '". $xtglbooking . "'," . 
		"idproduk= '". $xidproduk . "'," . 
		"iddetailproduk= '". $xiddetailproduk . "'," . 
		"idkategoriproduk= '". $xidkategoriproduk . "'," . 
		"idmember= '". $xidmember . "'," . 
		"tglperuntukandari= '". $xtglperuntukandari . "'," . 
		"tglperuntukansampai= '". $xtglperuntukansampai . "'," . 
		"jmldewasa= '". $xjmldewasa . "'," . 
		"jmlanak= '". $xjmlanak . "'," . 
		"jmlhewan= '". $xjmlhewan . "'," . 
		"keterangantambahn= '". $xketerangantambahn . "'," . 
		"jmltransfer= '". $xjmltransfer . "'," . 
		"idjenispembayaran= '". $xidjenispembayaran . "'," . 
		"nomorkartu= '". $xnomorkartu . "'," . 
		"tgltransfer= '". $xtgltransfer . "'," . 
		"tglinsert= '". $xtglinsert . "'," . 
		"tglupdate= '". $xtglupdate . "'," . 
		"status= '". $xstatus . "'," . 
		"harga= '". $xharga . "'," . 
		"hargadiscount= '". $xhargadiscount . "'," . 
		"jmlhari= '". $xjmlhari . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletbooking
    function Deletbooking($xidx) {
        $xStr = " DELETE FROM booking WHERE booking.idx = '" . $xidx . "'";
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
	$this->db->or_like('tglbooking', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('iddetailproduk', $q);
	$this->db->or_like('idkategoriproduk', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('tglperuntukandari', $q);
	$this->db->or_like('tglperuntukansampai', $q);
	$this->db->or_like('jmldewasa', $q);
	$this->db->or_like('jmlanak', $q);
	$this->db->or_like('jmlhewan', $q);
	$this->db->or_like('keterangantambahn', $q);
	$this->db->or_like('jmltransfer', $q);
	$this->db->or_like('idjenispembayaran', $q);
	$this->db->or_like('nomorkartu', $q);
	$this->db->or_like('tgltransfer', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('tglupdate', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('harga', $q);
	$this->db->or_like('hargadiscount', $q);
	$this->db->or_like('jmlhari', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('tglbooking', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('iddetailproduk', $q);
	$this->db->or_like('idkategoriproduk', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('tglperuntukandari', $q);
	$this->db->or_like('tglperuntukansampai', $q);
	$this->db->or_like('jmldewasa', $q);
	$this->db->or_like('jmlanak', $q);
	$this->db->or_like('jmlhewan', $q);
	$this->db->or_like('keterangantambahn', $q);
	$this->db->or_like('jmltransfer', $q);
	$this->db->or_like('idjenispembayaran', $q);
	$this->db->or_like('nomorkartu', $q);
	$this->db->or_like('tgltransfer', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('tglupdate', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('harga', $q);
	$this->db->or_like('hargadiscount', $q);
	$this->db->or_like('jmlhari', $q);
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

