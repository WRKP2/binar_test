<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategoriproduk_model extends CI_Model
{

    public $table = 'kategoriproduk';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,Kategori,icon');
        $this->datatables->from('kategoriproduk');
        //add this line for join
        //$this->datatables->join('table2', 'kategoriproduk.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('kategoriproduk/read/$1'),'Read')." | ".anchor(site_url('kategoriproduk/update/$1'),'Update')." | ".anchor(site_url('kategoriproduk/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTkategoriproduk
    function getListkategoriproduk() {
        $xStr = "SELECT idx,".
 "Kategori,".
 "icon from kategoriproduk";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailkategoriproduk
    function getDetailkategoriproduk($xidx) {
        $xStr = "SELECT idx,".
 "Kategori,".
 "icon from kategoriproduk WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_kategoriproduk
    function Insertkategoriproduk($xidx,$xKategori,$xicon) {
        $xStr = " INSERT INTO kategoriproduk( idx,".
 "Kategori,".
 "icon ) VALUES ( '" . $xidx
 . "','" .$xKategori
 . "','" .$xicon. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatekategoriproduk
    function Updatekategoriproduk($xidx,$xKategori,$xicon) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"Kategori= '". $xKategori . "'," . 
		"icon= '". $xicon . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletkategoriproduk
    function Deletkategoriproduk($xidx) {
        $xStr = " DELETE FROM kategoriproduk WHERE kategoriproduk.idx = '" . $xidx . "'";
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
	$this->db->or_like('Kategori', $q);
	$this->db->or_like('icon', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('Kategori', $q);
	$this->db->or_like('icon', $q);
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

