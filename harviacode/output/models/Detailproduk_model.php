<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detailproduk_model extends CI_Model
{

    public $table = 'detailproduk';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // GET_LIST_ALLdetailproduk
    function getListdetailproduk() {
        $xStr = "SELECT idx,".
 "idproduk,".
 "idkategoriproduk,".
 "juduldetailproduk,".
 "diskripsiproduk,".
 "rate,".
 "ratediscount,".
 "rancode,".
 "tglinsert,".
 "tglupdate,".
 "idpegawai,".
 "kapasitas,".
 "standartpemakaian,".
 "standart,".
 "idsatuan,".
 "isfavorit,".
 "idmember from detailproduk";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detaildetailproduk
    function getDetaildetailproduk($xidx) {
        $xStr = "SELECT idx,".
 "idproduk,".
 "idkategoriproduk,".
 "juduldetailproduk,".
 "diskripsiproduk,".
 "rate,".
 "ratediscount,".
 "rancode,".
 "tglinsert,".
 "tglupdate,".
 "idpegawai,".
 "kapasitas,".
 "standartpemakaian,".
 "standart,".
 "idsatuan,".
 "isfavorit,".
 "idmember from detailproduk WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_detailproduk
    function Insertdetailproduk($xidx,$xidproduk,$xidkategoriproduk,$xjuduldetailproduk,$xdiskripsiproduk,$xrate,$xratediscount,$xrancode,$xtglinsert,$xtglupdate,$xidpegawai,$xkapasitas,$xstandartpemakaian,$xstandart,$xidsatuan,$xisfavorit,$xidmember) {
        $xStr = " INSERT INTO detailproduk( idx,".
 "idproduk,".
 "idkategoriproduk,".
 "juduldetailproduk,".
 "diskripsiproduk,".
 "rate,".
 "ratediscount,".
 "rancode,".
 "tglinsert,".
 "tglupdate,".
 "idpegawai,".
 "kapasitas,".
 "standartpemakaian,".
 "standart,".
 "idsatuan,".
 "isfavorit,".
 "idmember ) VALUES ( '" . $xidx
 . "','" .$xidproduk
 . "','" .$xidkategoriproduk
 . "','" .$xjuduldetailproduk
 . "','" .$xdiskripsiproduk
 . "','" .$xrate
 . "','" .$xratediscount
 . "','" .$xrancode
 . "','" .$xtglinsert
 . "','" .$xtglupdate
 . "','" .$xidpegawai
 . "','" .$xkapasitas
 . "','" .$xstandartpemakaian
 . "','" .$xstandart
 . "','" .$xidsatuan
 . "','" .$xisfavorit
 . "','" .$xidmember. "')";
        $query = $this->db->query($xStr);
        return $idx; 
    }

    // updatedetailproduk
    function Updatedetailproduk($xidx,$xidproduk,$xidkategoriproduk,$xjuduldetailproduk,$xdiskripsiproduk,$xrate,$xratediscount,$xrancode,$xtglinsert,$xtglupdate,$xidpegawai,$xkapasitas,$xstandartpemakaian,$xstandart,$xidsatuan,$xisfavorit,$xidmember) {
        $xStr = " UPDATE produk SET ". 
		"idx= '". $xidx . "'," . 
		"idproduk= '". $xidproduk . "'," . 
		"idkategoriproduk= '". $xidkategoriproduk . "'," . 
		"juduldetailproduk= '". $xjuduldetailproduk . "'," . 
		"diskripsiproduk= '". $xdiskripsiproduk . "'," . 
		"rate= '". $xrate . "'," . 
		"ratediscount= '". $xratediscount . "'," . 
		"rancode= '". $xrancode . "'," . 
		"tglinsert= '". $xtglinsert . "'," . 
		"tglupdate= '". $xtglupdate . "'," . 
		"idpegawai= '". $xidpegawai . "'," . 
		"kapasitas= '". $xkapasitas . "'," . 
		"standartpemakaian= '". $xstandartpemakaian . "'," . 
		"standart= '". $xstandart . "'," . 
		"idsatuan= '". $xidsatuan . "'," . 
		"isfavorit= '". $xisfavorit . "'," . 
		"idmember= '". $xidmember . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletdetailproduk
    function Deletdetailproduk($xidx) {
        $xStr = " DELETE FROM detailproduk WHERE detailproduk.idx = '" . $xidx . "'";
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
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('idkategoriproduk', $q);
	$this->db->or_like('juduldetailproduk', $q);
	$this->db->or_like('diskripsiproduk', $q);
	$this->db->or_like('rate', $q);
	$this->db->or_like('ratediscount', $q);
	$this->db->or_like('rancode', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('tglupdate', $q);
	$this->db->or_like('idpegawai', $q);
	$this->db->or_like('kapasitas', $q);
	$this->db->or_like('standartpemakaian', $q);
	$this->db->or_like('standart', $q);
	$this->db->or_like('idsatuan', $q);
	$this->db->or_like('isfavorit', $q);
	$this->db->or_like('idmember', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('idkategoriproduk', $q);
	$this->db->or_like('juduldetailproduk', $q);
	$this->db->or_like('diskripsiproduk', $q);
	$this->db->or_like('rate', $q);
	$this->db->or_like('ratediscount', $q);
	$this->db->or_like('rancode', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('tglupdate', $q);
	$this->db->or_like('idpegawai', $q);
	$this->db->or_like('kapasitas', $q);
	$this->db->or_like('standartpemakaian', $q);
	$this->db->or_like('standart', $q);
	$this->db->or_like('idsatuan', $q);
	$this->db->or_like('isfavorit', $q);
	$this->db->or_like('idmember', $q);
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

/* End of file Detailproduk_model.php */
/* Location: ./application/models/Detailproduk_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-01 17:35:27 */
/* http://harviacode.com */