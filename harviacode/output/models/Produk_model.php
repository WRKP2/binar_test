<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk_model extends CI_Model
{

    public $table = 'produk';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // GET_LIST_ALLproduk
    function getListproduk() {
        $xStr = "SELECT idx,".
 "JudulProduk,".
 "idKategoriProduk,".
 "idmember,".
 "Keterangan,".
 "phonekontak,".
 "NamaKontak,".
 "DiskripsiProduk,".
 "mapaddress,".
 "buka,".
 "tutup,".
 "rate,".
 "ratediscount,".
 "rancode,".
 "tglinsert,".
 "tglupdate,".
 "idpegawai,".
 "kapasitas,".
 "standartpemakaian,".
 "idsatuan,".
 "Token,".
 "city,".
 "kabupaten,".
 "state,".
 "isberbayar,".
 "tglterakhirbayar,".
 "star,".
 "isverifikasi,".
 "tglverifikasi,".
 "idpemverifikasi,".
 "isaktif,".
 "lskategori,".
 "menutext,".
 "kategoritext from produk";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailproduk
    function getDetailproduk($xidx) {
        $xStr = "SELECT idx,".
 "JudulProduk,".
 "idKategoriProduk,".
 "idmember,".
 "Keterangan,".
 "phonekontak,".
 "NamaKontak,".
 "DiskripsiProduk,".
 "mapaddress,".
 "buka,".
 "tutup,".
 "rate,".
 "ratediscount,".
 "rancode,".
 "tglinsert,".
 "tglupdate,".
 "idpegawai,".
 "kapasitas,".
 "standartpemakaian,".
 "idsatuan,".
 "Token,".
 "city,".
 "kabupaten,".
 "state,".
 "isberbayar,".
 "tglterakhirbayar,".
 "star,".
 "isverifikasi,".
 "tglverifikasi,".
 "idpemverifikasi,".
 "isaktif,".
 "lskategori,".
 "menutext,".
 "kategoritext from produk WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_produk
    function Insertproduk($xidx,$xJudulProduk,$xidKategoriProduk,$xidmember,$xKeterangan,$xphonekontak,$xNamaKontak,$xDiskripsiProduk,$xmapaddress,$xbuka,$xtutup,$xrate,$xratediscount,$xrancode,$xtglinsert,$xtglupdate,$xidpegawai,$xkapasitas,$xstandartpemakaian,$xidsatuan,$xToken,$xcity,$xkabupaten,$xstate,$xisberbayar,$xtglterakhirbayar,$xstar,$xisverifikasi,$xtglverifikasi,$xidpemverifikasi,$xisaktif,$xlskategori,$xmenutext,$xkategoritext) {
        $xStr = " INSERT INTO produk( idx,".
 "JudulProduk,".
 "idKategoriProduk,".
 "idmember,".
 "Keterangan,".
 "phonekontak,".
 "NamaKontak,".
 "DiskripsiProduk,".
 "mapaddress,".
 "buka,".
 "tutup,".
 "rate,".
 "ratediscount,".
 "rancode,".
 "tglinsert,".
 "tglupdate,".
 "idpegawai,".
 "kapasitas,".
 "standartpemakaian,".
 "idsatuan,".
 "Token,".
 "city,".
 "kabupaten,".
 "state,".
 "isberbayar,".
 "tglterakhirbayar,".
 "star,".
 "isverifikasi,".
 "tglverifikasi,".
 "idpemverifikasi,".
 "isaktif,".
 "lskategori,".
 "menutext,".
 "kategoritext ) VALUES ( '" . $xidx
 . "','" .$xJudulProduk
 . "','" .$xidKategoriProduk
 . "','" .$xidmember
 . "','" .$xKeterangan
 . "','" .$xphonekontak
 . "','" .$xNamaKontak
 . "','" .$xDiskripsiProduk
 . "','" .$xmapaddress
 . "','" .$xbuka
 . "','" .$xtutup
 . "','" .$xrate
 . "','" .$xratediscount
 . "','" .$xrancode
 . "','" .$xtglinsert
 . "','" .$xtglupdate
 . "','" .$xidpegawai
 . "','" .$xkapasitas
 . "','" .$xstandartpemakaian
 . "','" .$xidsatuan
 . "','" .$xToken
 . "','" .$xcity
 . "','" .$xkabupaten
 . "','" .$xstate
 . "','" .$xisberbayar
 . "','" .$xtglterakhirbayar
 . "','" .$xstar
 . "','" .$xisverifikasi
 . "','" .$xtglverifikasi
 . "','" .$xidpemverifikasi
 . "','" .$xisaktif
 . "','" .$xlskategori
 . "','" .$xmenutext
 . "','" .$xkategoritext. "')";
        $query = $this->db->query($xStr);
        return $idx; 
    }

    // updateproduk
    function Updateproduk($xidx,$xJudulProduk,$xidKategoriProduk,$xidmember,$xKeterangan,$xphonekontak,$xNamaKontak,$xDiskripsiProduk,$xmapaddress,$xbuka,$xtutup,$xrate,$xratediscount,$xrancode,$xtglinsert,$xtglupdate,$xidpegawai,$xkapasitas,$xstandartpemakaian,$xidsatuan,$xToken,$xcity,$xkabupaten,$xstate,$xisberbayar,$xtglterakhirbayar,$xstar,$xisverifikasi,$xtglverifikasi,$xidpemverifikasi,$xisaktif,$xlskategori,$xmenutext,$xkategoritext) {
        $xStr = " UPDATE produk SET ". 
		"idx= '". $xidx . "'," . 
		"JudulProduk= '". $xJudulProduk . "'," . 
		"idKategoriProduk= '". $xidKategoriProduk . "'," . 
		"idmember= '". $xidmember . "'," . 
		"Keterangan= '". $xKeterangan . "'," . 
		"phonekontak= '". $xphonekontak . "'," . 
		"NamaKontak= '". $xNamaKontak . "'," . 
		"DiskripsiProduk= '". $xDiskripsiProduk . "'," . 
		"mapaddress= '". $xmapaddress . "'," . 
		"buka= '". $xbuka . "'," . 
		"tutup= '". $xtutup . "'," . 
		"rate= '". $xrate . "'," . 
		"ratediscount= '". $xratediscount . "'," . 
		"rancode= '". $xrancode . "'," . 
		"tglinsert= '". $xtglinsert . "'," . 
		"tglupdate= '". $xtglupdate . "'," . 
		"idpegawai= '". $xidpegawai . "'," . 
		"kapasitas= '". $xkapasitas . "'," . 
		"standartpemakaian= '". $xstandartpemakaian . "'," . 
		"idsatuan= '". $xidsatuan . "'," . 
		"Token= '". $xToken . "'," . 
		"city= '". $xcity . "'," . 
		"kabupaten= '". $xkabupaten . "'," . 
		"state= '". $xstate . "'," . 
		"isberbayar= '". $xisberbayar . "'," . 
		"tglterakhirbayar= '". $xtglterakhirbayar . "'," . 
		"star= '". $xstar . "'," . 
		"isverifikasi= '". $xisverifikasi . "'," . 
		"tglverifikasi= '". $xtglverifikasi . "'," . 
		"idpemverifikasi= '". $xidpemverifikasi . "'," . 
		"isaktif= '". $xisaktif . "'," . 
		"lskategori= '". $xlskategori . "'," . 
		"menutext= '". $xmenutext . "'," . 
		"kategoritext= '". $xkategoritext . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletproduk
    function Deletproduk($xidx) {
        $xStr = " DELETE FROM produk WHERE produk.idx = '" . $xidx . "'";
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
	$this->db->or_like('JudulProduk', $q);
	$this->db->or_like('idKategoriProduk', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('Keterangan', $q);
	$this->db->or_like('phonekontak', $q);
	$this->db->or_like('NamaKontak', $q);
	$this->db->or_like('DiskripsiProduk', $q);
	$this->db->or_like('mapaddress', $q);
	$this->db->or_like('buka', $q);
	$this->db->or_like('tutup', $q);
	$this->db->or_like('rate', $q);
	$this->db->or_like('ratediscount', $q);
	$this->db->or_like('rancode', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('tglupdate', $q);
	$this->db->or_like('idpegawai', $q);
	$this->db->or_like('kapasitas', $q);
	$this->db->or_like('standartpemakaian', $q);
	$this->db->or_like('idsatuan', $q);
	$this->db->or_like('Token', $q);
	$this->db->or_like('city', $q);
	$this->db->or_like('kabupaten', $q);
	$this->db->or_like('state', $q);
	$this->db->or_like('isberbayar', $q);
	$this->db->or_like('tglterakhirbayar', $q);
	$this->db->or_like('star', $q);
	$this->db->or_like('isverifikasi', $q);
	$this->db->or_like('tglverifikasi', $q);
	$this->db->or_like('idpemverifikasi', $q);
	$this->db->or_like('isaktif', $q);
	$this->db->or_like('lskategori', $q);
	$this->db->or_like('menutext', $q);
	$this->db->or_like('kategoritext', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('JudulProduk', $q);
	$this->db->or_like('idKategoriProduk', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('Keterangan', $q);
	$this->db->or_like('phonekontak', $q);
	$this->db->or_like('NamaKontak', $q);
	$this->db->or_like('DiskripsiProduk', $q);
	$this->db->or_like('mapaddress', $q);
	$this->db->or_like('buka', $q);
	$this->db->or_like('tutup', $q);
	$this->db->or_like('rate', $q);
	$this->db->or_like('ratediscount', $q);
	$this->db->or_like('rancode', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('tglupdate', $q);
	$this->db->or_like('idpegawai', $q);
	$this->db->or_like('kapasitas', $q);
	$this->db->or_like('standartpemakaian', $q);
	$this->db->or_like('idsatuan', $q);
	$this->db->or_like('Token', $q);
	$this->db->or_like('city', $q);
	$this->db->or_like('kabupaten', $q);
	$this->db->or_like('state', $q);
	$this->db->or_like('isberbayar', $q);
	$this->db->or_like('tglterakhirbayar', $q);
	$this->db->or_like('star', $q);
	$this->db->or_like('isverifikasi', $q);
	$this->db->or_like('tglverifikasi', $q);
	$this->db->or_like('idpemverifikasi', $q);
	$this->db->or_like('isaktif', $q);
	$this->db->or_like('lskategori', $q);
	$this->db->or_like('menutext', $q);
	$this->db->or_like('kategoritext', $q);
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

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-01 17:35:31 */
/* http://harviacode.com */