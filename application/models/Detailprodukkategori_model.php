<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detailprodukkategori_model extends CI_Model
{

    public $table = 'detailprodukkategori';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,iddetailproduk,idkategori,tglinsert,idpegawai');
        $this->datatables->from('detailprodukkategori');
        //add this line for join
        //$this->datatables->join('table2', 'detailprodukkategori.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('detailprodukkategori/read/$1'),'Read')." | ".anchor(site_url('detailprodukkategori/update/$1'),'Update')." | ".anchor(site_url('detailprodukkategori/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTdetailprodukkategori
    function getListdetailprodukkategori() {
        $xStr = "SELECT idx,".
 "iddetailproduk,".
 "idkategori,".
 "tglinsert,".
 "idpegawai from detailprodukkategori";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detaildetailprodukkategori
    function getDetaildetailprodukkategori($xidx) {
        $xStr = "SELECT idx,".
 "iddetailproduk,".
 "idkategori,".
 "tglinsert,".
 "idpegawai from detailprodukkategori WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_detailprodukkategori
    function Insertdetailprodukkategori($xidx,$xiddetailproduk,$xidkategori,$xtglinsert,$xidpegawai) {
        $xStr = " INSERT INTO detailprodukkategori( idx,".
 "iddetailproduk,".
 "idkategori,".
 "tglinsert,".
 "idpegawai ) VALUES ( '" . $xidx
 . "','" .$xiddetailproduk
 . "','" .$xidkategori
 . "','" .$xtglinsert
 . "','" .$xidpegawai. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatedetailprodukkategori
    function Updatedetailprodukkategori($xidx,$xiddetailproduk,$xidkategori,$xtglinsert,$xidpegawai) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"iddetailproduk= '". $xiddetailproduk . "'," . 
		"idkategori= '". $xidkategori . "'," . 
		"tglinsert= '". $xtglinsert . "'," . 
		"idpegawai= '". $xidpegawai . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletdetailprodukkategori
    function Deletdetailprodukkategori($xidx) {
        $xStr = " DELETE FROM detailprodukkategori WHERE detailprodukkategori.idx = '" . $xidx . "'";
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
	$this->db->or_like('idkategori', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('idpegawai', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('iddetailproduk', $q);
	$this->db->or_like('idkategori', $q);
	$this->db->or_like('tglinsert', $q);
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

