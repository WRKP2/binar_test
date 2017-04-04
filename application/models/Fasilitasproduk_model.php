<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fasilitasproduk_model extends CI_Model
{

    public $table = 'fasilitasproduk';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,idjenisfasilitas,idproduk,tglinsert,idmemberinsert');
        $this->datatables->from('fasilitasproduk');
        //add this line for join
        //$this->datatables->join('table2', 'fasilitasproduk.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('fasilitasproduk/read/$1'),'Read')." | ".anchor(site_url('fasilitasproduk/update/$1'),'Update')." | ".anchor(site_url('fasilitasproduk/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTfasilitasproduk
    function getListfasilitasproduk() {
        $xStr = "SELECT idx,".
 "idjenisfasilitas,".
 "idproduk,".
 "tglinsert,".
 "idmemberinsert from fasilitasproduk";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailfasilitasproduk
    function getDetailfasilitasproduk($xidx) {
        $xStr = "SELECT idx,".
 "idjenisfasilitas,".
 "idproduk,".
 "tglinsert,".
 "idmemberinsert from fasilitasproduk WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_fasilitasproduk
    function Insertfasilitasproduk($xidx,$xidjenisfasilitas,$xidproduk,$xtglinsert,$xidmemberinsert) {
        $xStr = " INSERT INTO fasilitasproduk( idx,".
 "idjenisfasilitas,".
 "idproduk,".
 "tglinsert,".
 "idmemberinsert ) VALUES ( '" . $xidx
 . "','" .$xidjenisfasilitas
 . "','" .$xidproduk
 . "','" .$xtglinsert
 . "','" .$xidmemberinsert. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatefasilitasproduk
    function Updatefasilitasproduk($xidx,$xidjenisfasilitas,$xidproduk,$xtglinsert,$xidmemberinsert) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"idjenisfasilitas= '". $xidjenisfasilitas . "'," . 
		"idproduk= '". $xidproduk . "'," . 
		"tglinsert= '". $xtglinsert . "'," . 
		"idmemberinsert= '". $xidmemberinsert . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletfasilitasproduk
    function Deletfasilitasproduk($xidx) {
        $xStr = " DELETE FROM fasilitasproduk WHERE fasilitasproduk.idx = '" . $xidx . "'";
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
	$this->db->or_like('idjenisfasilitas', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('idmemberinsert', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('idjenisfasilitas', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('idmemberinsert', $q);
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

