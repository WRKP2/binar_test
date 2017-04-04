<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Marketingproduk_model extends CI_Model
{

    public $table = 'marketingproduk';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,idmember,idproduk,tgldaftar');
        $this->datatables->from('marketingproduk');
        //add this line for join
        //$this->datatables->join('table2', 'marketingproduk.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('marketingproduk/read/$1'),'Read')." | ".anchor(site_url('marketingproduk/update/$1'),'Update')." | ".anchor(site_url('marketingproduk/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTmarketingproduk
    function getListmarketingproduk() {
        $xStr = "SELECT idx,".
 "idmember,".
 "idproduk,".
 "tgldaftar from marketingproduk";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailmarketingproduk
    function getDetailmarketingproduk($xidx) {
        $xStr = "SELECT idx,".
 "idmember,".
 "idproduk,".
 "tgldaftar from marketingproduk WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_marketingproduk
    function Insertmarketingproduk($xidx,$xidmember,$xidproduk,$xtgldaftar) {
        $xStr = " INSERT INTO marketingproduk( idx,".
 "idmember,".
 "idproduk,".
 "tgldaftar ) VALUES ( '" . $xidx
 . "','" .$xidmember
 . "','" .$xidproduk
 . "','" .$xtgldaftar. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatemarketingproduk
    function Updatemarketingproduk($xidx,$xidmember,$xidproduk,$xtgldaftar) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"idmember= '". $xidmember . "'," . 
		"idproduk= '". $xidproduk . "'," . 
		"tgldaftar= '". $xtgldaftar . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletmarketingproduk
    function Deletmarketingproduk($xidx) {
        $xStr = " DELETE FROM marketingproduk WHERE marketingproduk.idx = '" . $xidx . "'";
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
	$this->db->or_like('idmember', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('tgldaftar', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('tgldaftar', $q);
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

