<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    public $table = 'transaksi';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // GET_LIST_ALLtransaksi
    function getListtransaksi() {
        $xStr = "SELECT idx,".
 "idbooking,".
 "tglbooking,".
 "tglbatalbooking,".
 "keteranganbatal,".
 "harganormal,".
 "hargadiscount,".
 "idvoucher,".
 "idmember,".
 "idpegawai,".
 "spesialrequest,".
 "tglupdate,".
 "idjenisbayar,".
 "tglbayar,".
 "hargadibayar,".
 "isfinal,".
 "nominalvoucher from transaksi";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailtransaksi
    function getDetailtransaksi($xidx) {
        $xStr = "SELECT idx,".
 "idbooking,".
 "tglbooking,".
 "tglbatalbooking,".
 "keteranganbatal,".
 "harganormal,".
 "hargadiscount,".
 "idvoucher,".
 "idmember,".
 "idpegawai,".
 "spesialrequest,".
 "tglupdate,".
 "idjenisbayar,".
 "tglbayar,".
 "hargadibayar,".
 "isfinal,".
 "nominalvoucher from transaksi WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_transaksi
    function Inserttransaksi($xidx,$xidbooking,$xtglbooking,$xtglbatalbooking,$xketeranganbatal,$xharganormal,$xhargadiscount,$xidvoucher,$xidmember,$xidpegawai,$xspesialrequest,$xtglupdate,$xidjenisbayar,$xtglbayar,$xhargadibayar,$xisfinal,$xnominalvoucher) {
        $xStr = " INSERT INTO transaksi( idx,".
 "idbooking,".
 "tglbooking,".
 "tglbatalbooking,".
 "keteranganbatal,".
 "harganormal,".
 "hargadiscount,".
 "idvoucher,".
 "idmember,".
 "idpegawai,".
 "spesialrequest,".
 "tglupdate,".
 "idjenisbayar,".
 "tglbayar,".
 "hargadibayar,".
 "isfinal,".
 "nominalvoucher ) VALUES ( '" . $xidx
 . "','" .$xidbooking
 . "','" .$xtglbooking
 . "','" .$xtglbatalbooking
 . "','" .$xketeranganbatal
 . "','" .$xharganormal
 . "','" .$xhargadiscount
 . "','" .$xidvoucher
 . "','" .$xidmember
 . "','" .$xidpegawai
 . "','" .$xspesialrequest
 . "','" .$xtglupdate
 . "','" .$xidjenisbayar
 . "','" .$xtglbayar
 . "','" .$xhargadibayar
 . "','" .$xisfinal
 . "','" .$xnominalvoucher. "')";
        $query = $this->db->query($xStr);
        return $idx; 
    }

    // updatetransaksi
    function Updatetransaksi($xidx,$xidbooking,$xtglbooking,$xtglbatalbooking,$xketeranganbatal,$xharganormal,$xhargadiscount,$xidvoucher,$xidmember,$xidpegawai,$xspesialrequest,$xtglupdate,$xidjenisbayar,$xtglbayar,$xhargadibayar,$xisfinal,$xnominalvoucher) {
        $xStr = " UPDATE produk SET ". 
		"idx= '". $xidx . "'," . 
		"idbooking= '". $xidbooking . "'," . 
		"tglbooking= '". $xtglbooking . "'," . 
		"tglbatalbooking= '". $xtglbatalbooking . "'," . 
		"keteranganbatal= '". $xketeranganbatal . "'," . 
		"harganormal= '". $xharganormal . "'," . 
		"hargadiscount= '". $xhargadiscount . "'," . 
		"idvoucher= '". $xidvoucher . "'," . 
		"idmember= '". $xidmember . "'," . 
		"idpegawai= '". $xidpegawai . "'," . 
		"spesialrequest= '". $xspesialrequest . "'," . 
		"tglupdate= '". $xtglupdate . "'," . 
		"idjenisbayar= '". $xidjenisbayar . "'," . 
		"tglbayar= '". $xtglbayar . "'," . 
		"hargadibayar= '". $xhargadibayar . "'," . 
		"isfinal= '". $xisfinal . "'," . 
		"nominalvoucher= '". $xnominalvoucher . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // delettransaksi
    function Delettransaksi($xidx) {
        $xStr = " DELETE FROM transaksi WHERE transaksi.idx = '" . $xidx . "'";
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
	$this->db->or_like('idbooking', $q);
	$this->db->or_like('tglbooking', $q);
	$this->db->or_like('tglbatalbooking', $q);
	$this->db->or_like('keteranganbatal', $q);
	$this->db->or_like('harganormal', $q);
	$this->db->or_like('hargadiscount', $q);
	$this->db->or_like('idvoucher', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('idpegawai', $q);
	$this->db->or_like('spesialrequest', $q);
	$this->db->or_like('tglupdate', $q);
	$this->db->or_like('idjenisbayar', $q);
	$this->db->or_like('tglbayar', $q);
	$this->db->or_like('hargadibayar', $q);
	$this->db->or_like('isfinal', $q);
	$this->db->or_like('nominalvoucher', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('idbooking', $q);
	$this->db->or_like('tglbooking', $q);
	$this->db->or_like('tglbatalbooking', $q);
	$this->db->or_like('keteranganbatal', $q);
	$this->db->or_like('harganormal', $q);
	$this->db->or_like('hargadiscount', $q);
	$this->db->or_like('idvoucher', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('idpegawai', $q);
	$this->db->or_like('spesialrequest', $q);
	$this->db->or_like('tglupdate', $q);
	$this->db->or_like('idjenisbayar', $q);
	$this->db->or_like('tglbayar', $q);
	$this->db->or_like('hargadibayar', $q);
	$this->db->or_like('isfinal', $q);
	$this->db->or_like('nominalvoucher', $q);
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

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-02 15:37:19 */
/* http://harviacode.com */