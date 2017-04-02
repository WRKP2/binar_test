<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Voucher_model extends CI_Model
{

    public $table = 'voucher';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // GET_LIST_ALLvoucher
    function getListvoucher() {
        $xStr = "SELECT idx,".
 "voucher,".
 "nominal,".
 "prosentase,".
 "tglberlakudari,".
 "tglberlakusampai,".
 "idmember,".
 "isterpakai,".
 "tglpakai,".
 "linkimage,".
 "idproduk,".
 "jumlahmaxpengguna,".
 "penjelasan,".
 "idjenisvoucher,".
 "aktifjmlrekomendasi,".
 "dayvoucher from voucher";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailvoucher
    function getDetailvoucher($xidx) {
        $xStr = "SELECT idx,".
 "voucher,".
 "nominal,".
 "prosentase,".
 "tglberlakudari,".
 "tglberlakusampai,".
 "idmember,".
 "isterpakai,".
 "tglpakai,".
 "linkimage,".
 "idproduk,".
 "jumlahmaxpengguna,".
 "penjelasan,".
 "idjenisvoucher,".
 "aktifjmlrekomendasi,".
 "dayvoucher from voucher WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_voucher
    function Insertvoucher($xidx,$xvoucher,$xnominal,$xprosentase,$xtglberlakudari,$xtglberlakusampai,$xidmember,$xisterpakai,$xtglpakai,$xlinkimage,$xidproduk,$xjumlahmaxpengguna,$xpenjelasan,$xidjenisvoucher,$xaktifjmlrekomendasi,$xdayvoucher) {
        $xStr = " INSERT INTO voucher( idx,".
 "voucher,".
 "nominal,".
 "prosentase,".
 "tglberlakudari,".
 "tglberlakusampai,".
 "idmember,".
 "isterpakai,".
 "tglpakai,".
 "linkimage,".
 "idproduk,".
 "jumlahmaxpengguna,".
 "penjelasan,".
 "idjenisvoucher,".
 "aktifjmlrekomendasi,".
 "dayvoucher ) VALUES ( '" . $xidx
 . "','" .$xvoucher
 . "','" .$xnominal
 . "','" .$xprosentase
 . "','" .$xtglberlakudari
 . "','" .$xtglberlakusampai
 . "','" .$xidmember
 . "','" .$xisterpakai
 . "','" .$xtglpakai
 . "','" .$xlinkimage
 . "','" .$xidproduk
 . "','" .$xjumlahmaxpengguna
 . "','" .$xpenjelasan
 . "','" .$xidjenisvoucher
 . "','" .$xaktifjmlrekomendasi
 . "','" .$xdayvoucher. "')";
        $query = $this->db->query($xStr);
        return $idx; 
    }

    // updatevoucher
    function Updatevoucher($xidx,$xvoucher,$xnominal,$xprosentase,$xtglberlakudari,$xtglberlakusampai,$xidmember,$xisterpakai,$xtglpakai,$xlinkimage,$xidproduk,$xjumlahmaxpengguna,$xpenjelasan,$xidjenisvoucher,$xaktifjmlrekomendasi,$xdayvoucher) {
        $xStr = " UPDATE produk SET ". 
		"idx= '". $xidx . "'," . 
		"voucher= '". $xvoucher . "'," . 
		"nominal= '". $xnominal . "'," . 
		"prosentase= '". $xprosentase . "'," . 
		"tglberlakudari= '". $xtglberlakudari . "'," . 
		"tglberlakusampai= '". $xtglberlakusampai . "'," . 
		"idmember= '". $xidmember . "'," . 
		"isterpakai= '". $xisterpakai . "'," . 
		"tglpakai= '". $xtglpakai . "'," . 
		"linkimage= '". $xlinkimage . "'," . 
		"idproduk= '". $xidproduk . "'," . 
		"jumlahmaxpengguna= '". $xjumlahmaxpengguna . "'," . 
		"penjelasan= '". $xpenjelasan . "'," . 
		"idjenisvoucher= '". $xidjenisvoucher . "'," . 
		"aktifjmlrekomendasi= '". $xaktifjmlrekomendasi . "'," . 
		"dayvoucher= '". $xdayvoucher . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletvoucher
    function Deletvoucher($xidx) {
        $xStr = " DELETE FROM voucher WHERE voucher.idx = '" . $xidx . "'";
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
	$this->db->or_like('voucher', $q);
	$this->db->or_like('nominal', $q);
	$this->db->or_like('prosentase', $q);
	$this->db->or_like('tglberlakudari', $q);
	$this->db->or_like('tglberlakusampai', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('isterpakai', $q);
	$this->db->or_like('tglpakai', $q);
	$this->db->or_like('linkimage', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('jumlahmaxpengguna', $q);
	$this->db->or_like('penjelasan', $q);
	$this->db->or_like('idjenisvoucher', $q);
	$this->db->or_like('aktifjmlrekomendasi', $q);
	$this->db->or_like('dayvoucher', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('voucher', $q);
	$this->db->or_like('nominal', $q);
	$this->db->or_like('prosentase', $q);
	$this->db->or_like('tglberlakudari', $q);
	$this->db->or_like('tglberlakusampai', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('isterpakai', $q);
	$this->db->or_like('tglpakai', $q);
	$this->db->or_like('linkimage', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('jumlahmaxpengguna', $q);
	$this->db->or_like('penjelasan', $q);
	$this->db->or_like('idjenisvoucher', $q);
	$this->db->or_like('aktifjmlrekomendasi', $q);
	$this->db->or_like('dayvoucher', $q);
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

/* End of file Voucher_model.php */
/* Location: ./application/models/Voucher_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-01 17:35:33 */
/* http://harviacode.com */