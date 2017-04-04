<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Imagedetail_model extends CI_Model
{

    public $table = 'imagedetail';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,iddetailproduk,idkategoriproduk,linkimage,keteranganimage,rancode,tglinsert,tglupdate,idpegawai,idproduk,isprofile');
        $this->datatables->from('imagedetail');
        //add this line for join
        //$this->datatables->join('table2', 'imagedetail.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('imagedetail/read/$1'),'Read')." | ".anchor(site_url('imagedetail/update/$1'),'Update')." | ".anchor(site_url('imagedetail/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTimagedetail
    function getListimagedetail() {
        $xStr = "SELECT idx,".
 "iddetailproduk,".
 "idkategoriproduk,".
 "linkimage,".
 "keteranganimage,".
 "rancode,".
 "tglinsert,".
 "tglupdate,".
 "idpegawai,".
 "idproduk,".
 "isprofile from imagedetail";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailimagedetail
    function getDetailimagedetail($xidx) {
        $xStr = "SELECT idx,".
 "iddetailproduk,".
 "idkategoriproduk,".
 "linkimage,".
 "keteranganimage,".
 "rancode,".
 "tglinsert,".
 "tglupdate,".
 "idpegawai,".
 "idproduk,".
 "isprofile from imagedetail WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_imagedetail
    function Insertimagedetail($xidx,$xiddetailproduk,$xidkategoriproduk,$xlinkimage,$xketeranganimage,$xrancode,$xtglinsert,$xtglupdate,$xidpegawai,$xidproduk,$xisprofile) {
        $xStr = " INSERT INTO imagedetail( idx,".
 "iddetailproduk,".
 "idkategoriproduk,".
 "linkimage,".
 "keteranganimage,".
 "rancode,".
 "tglinsert,".
 "tglupdate,".
 "idpegawai,".
 "idproduk,".
 "isprofile ) VALUES ( '" . $xidx
 . "','" .$xiddetailproduk
 . "','" .$xidkategoriproduk
 . "','" .$xlinkimage
 . "','" .$xketeranganimage
 . "','" .$xrancode
 . "','" .$xtglinsert
 . "','" .$xtglupdate
 . "','" .$xidpegawai
 . "','" .$xidproduk
 . "','" .$xisprofile. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updateimagedetail
    function Updateimagedetail($xidx,$xiddetailproduk,$xidkategoriproduk,$xlinkimage,$xketeranganimage,$xrancode,$xtglinsert,$xtglupdate,$xidpegawai,$xidproduk,$xisprofile) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"iddetailproduk= '". $xiddetailproduk . "'," . 
		"idkategoriproduk= '". $xidkategoriproduk . "'," . 
		"linkimage= '". $xlinkimage . "'," . 
		"keteranganimage= '". $xketeranganimage . "'," . 
		"rancode= '". $xrancode . "'," . 
		"tglinsert= '". $xtglinsert . "'," . 
		"tglupdate= '". $xtglupdate . "'," . 
		"idpegawai= '". $xidpegawai . "'," . 
		"idproduk= '". $xidproduk . "'," . 
		"isprofile= '". $xisprofile . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletimagedetail
    function Deletimagedetail($xidx) {
        $xStr = " DELETE FROM imagedetail WHERE imagedetail.idx = '" . $xidx . "'";
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
	$this->db->or_like('iddetailproduk', $q);
	$this->db->or_like('idkategoriproduk', $q);
	$this->db->or_like('linkimage', $q);
	$this->db->or_like('keteranganimage', $q);
	$this->db->or_like('rancode', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('tglupdate', $q);
	$this->db->or_like('idpegawai', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('isprofile', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('iddetailproduk', $q);
	$this->db->or_like('idkategoriproduk', $q);
	$this->db->or_like('linkimage', $q);
	$this->db->or_like('keteranganimage', $q);
	$this->db->or_like('rancode', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('tglupdate', $q);
	$this->db->or_like('idpegawai', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('isprofile', $q);
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

