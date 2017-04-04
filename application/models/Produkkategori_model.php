<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produkkategori_model extends CI_Model
{

    public $table = 'produkkategori';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,idproduk,idkategori,tglinsert,idpegawai,iddetailproduk');
        $this->datatables->from('produkkategori');
        //add this line for join
        //$this->datatables->join('table2', 'produkkategori.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('produkkategori/read/$1'),'Read')." | ".anchor(site_url('produkkategori/update/$1'),'Update')." | ".anchor(site_url('produkkategori/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTprodukkategori
    function getListprodukkategori() {
        $xStr = "SELECT idx,".
 "idproduk,".
 "idkategori,".
 "tglinsert,".
 "idpegawai,".
 "iddetailproduk from produkkategori";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailprodukkategori
    function getDetailprodukkategori($xidx) {
        $xStr = "SELECT idx,".
 "idproduk,".
 "idkategori,".
 "tglinsert,".
 "idpegawai,".
 "iddetailproduk from produkkategori WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_produkkategori
    function Insertprodukkategori($xidx,$xidproduk,$xidkategori,$xtglinsert,$xidpegawai,$xiddetailproduk) {
        $xStr = " INSERT INTO produkkategori( idx,".
 "idproduk,".
 "idkategori,".
 "tglinsert,".
 "idpegawai,".
 "iddetailproduk ) VALUES ( '" . $xidx
 . "','" .$xidproduk
 . "','" .$xidkategori
 . "','" .$xtglinsert
 . "','" .$xidpegawai
 . "','" .$xiddetailproduk. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updateprodukkategori
    function Updateprodukkategori($xidx,$xidproduk,$xidkategori,$xtglinsert,$xidpegawai,$xiddetailproduk) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"idproduk= '". $xidproduk . "'," . 
		"idkategori= '". $xidkategori . "'," . 
		"tglinsert= '". $xtglinsert . "'," . 
		"idpegawai= '". $xidpegawai . "'," . 
		"iddetailproduk= '". $xiddetailproduk . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletprodukkategori
    function Deletprodukkategori($xidx) {
        $xStr = " DELETE FROM produkkategori WHERE produkkategori.idx = '" . $xidx . "'";
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
	$this->db->or_like('idkategori', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('idpegawai', $q);
	$this->db->or_like('iddetailproduk', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('idkategori', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('idpegawai', $q);
	$this->db->or_like('iddetailproduk', $q);
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

