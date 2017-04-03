<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produkpromo_model extends CI_Model
{

    public $table = 'produkpromo';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // GET_LIST_ALLprodukpromo
    function getListprodukpromo() {
        $xStr = "SELECT idx,".
 "idproduk,".
 "tglawalpromo,".
 "tglakhirpromo,".
 "isaktif,".
 "idmemberpengaju,".
 "isbayarpromo,".
 "tglbayarpromo,".
 "ketpromo,".
 "tglinsert,".
 "tglupdate,".
 "idpegawai from produkpromo";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailprodukpromo
    function getDetailprodukpromo($xidx) {
        $xStr = "SELECT idx,".
 "idproduk,".
 "tglawalpromo,".
 "tglakhirpromo,".
 "isaktif,".
 "idmemberpengaju,".
 "isbayarpromo,".
 "tglbayarpromo,".
 "ketpromo,".
 "tglinsert,".
 "tglupdate,".
 "idpegawai from produkpromo WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_produkpromo
    function Insertprodukpromo($xidx,$xidproduk,$xtglawalpromo,$xtglakhirpromo,$xisaktif,$xidmemberpengaju,$xisbayarpromo,$xtglbayarpromo,$xketpromo,$xtglinsert,$xtglupdate,$xidpegawai) {
        $xStr = " INSERT INTO produkpromo( idx,".
 "idproduk,".
 "tglawalpromo,".
 "tglakhirpromo,".
 "isaktif,".
 "idmemberpengaju,".
 "isbayarpromo,".
 "tglbayarpromo,".
 "ketpromo,".
 "tglinsert,".
 "tglupdate,".
 "idpegawai ) VALUES ( '" . $xidx
 . "','" .$xidproduk
 . "','" .$xtglawalpromo
 . "','" .$xtglakhirpromo
 . "','" .$xisaktif
 . "','" .$xidmemberpengaju
 . "','" .$xisbayarpromo
 . "','" .$xtglbayarpromo
 . "','" .$xketpromo
 . "','" .$xtglinsert
 . "','" .$xtglupdate
 . "','" .$xidpegawai. "')";
        $query = $this->db->query($xStr);
        return $idx; 
    }

    // updateprodukpromo
    function Updateprodukpromo($xidx,$xidproduk,$xtglawalpromo,$xtglakhirpromo,$xisaktif,$xidmemberpengaju,$xisbayarpromo,$xtglbayarpromo,$xketpromo,$xtglinsert,$xtglupdate,$xidpegawai) {
        $xStr = " UPDATE produk SET ". 
		"idx= '". $xidx . "'," . 
		"idproduk= '". $xidproduk . "'," . 
		"tglawalpromo= '". $xtglawalpromo . "'," . 
		"tglakhirpromo= '". $xtglakhirpromo . "'," . 
		"isaktif= '". $xisaktif . "'," . 
		"idmemberpengaju= '". $xidmemberpengaju . "'," . 
		"isbayarpromo= '". $xisbayarpromo . "'," . 
		"tglbayarpromo= '". $xtglbayarpromo . "'," . 
		"ketpromo= '". $xketpromo . "'," . 
		"tglinsert= '". $xtglinsert . "'," . 
		"tglupdate= '". $xtglupdate . "'," . 
		"idpegawai= '". $xidpegawai . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletprodukpromo
    function Deletprodukpromo($xidx) {
        $xStr = " DELETE FROM produkpromo WHERE produkpromo.idx = '" . $xidx . "'";
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
	$this->db->or_like('tglawalpromo', $q);
	$this->db->or_like('tglakhirpromo', $q);
	$this->db->or_like('isaktif', $q);
	$this->db->or_like('idmemberpengaju', $q);
	$this->db->or_like('isbayarpromo', $q);
	$this->db->or_like('tglbayarpromo', $q);
	$this->db->or_like('ketpromo', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('tglupdate', $q);
	$this->db->or_like('idpegawai', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('tglawalpromo', $q);
	$this->db->or_like('tglakhirpromo', $q);
	$this->db->or_like('isaktif', $q);
	$this->db->or_like('idmemberpengaju', $q);
	$this->db->or_like('isbayarpromo', $q);
	$this->db->or_like('tglbayarpromo', $q);
	$this->db->or_like('ketpromo', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('tglupdate', $q);
	$this->db->or_like('idpegawai', $q);
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

/* End of file Produkpromo_model.php */
/* Location: ./application/models/Produkpromo_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-01 17:35:31 */
/* http://harviacode.com */