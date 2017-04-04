<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Memberproduk_model extends CI_Model
{

    public $table = 'memberproduk';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,idproduk,idmember,tgljadimember,isfromrekomendasi,idreveral');
        $this->datatables->from('memberproduk');
        //add this line for join
        //$this->datatables->join('table2', 'memberproduk.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('memberproduk/read/$1'),'Read')." | ".anchor(site_url('memberproduk/update/$1'),'Update')." | ".anchor(site_url('memberproduk/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTmemberproduk
    function getListmemberproduk() {
        $xStr = "SELECT idx,".
 "idproduk,".
 "idmember,".
 "tgljadimember,".
 "isfromrekomendasi,".
 "idreveral from memberproduk";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailmemberproduk
    function getDetailmemberproduk($xidx) {
        $xStr = "SELECT idx,".
 "idproduk,".
 "idmember,".
 "tgljadimember,".
 "isfromrekomendasi,".
 "idreveral from memberproduk WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_memberproduk
    function Insertmemberproduk($xidx,$xidproduk,$xidmember,$xtgljadimember,$xisfromrekomendasi,$xidreveral) {
        $xStr = " INSERT INTO memberproduk( idx,".
 "idproduk,".
 "idmember,".
 "tgljadimember,".
 "isfromrekomendasi,".
 "idreveral ) VALUES ( '" . $xidx
 . "','" .$xidproduk
 . "','" .$xidmember
 . "','" .$xtgljadimember
 . "','" .$xisfromrekomendasi
 . "','" .$xidreveral. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatememberproduk
    function Updatememberproduk($xidx,$xidproduk,$xidmember,$xtgljadimember,$xisfromrekomendasi,$xidreveral) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"idproduk= '". $xidproduk . "'," . 
		"idmember= '". $xidmember . "'," . 
		"tgljadimember= '". $xtgljadimember . "'," . 
		"isfromrekomendasi= '". $xisfromrekomendasi . "'," . 
		"idreveral= '". $xidreveral . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletmemberproduk
    function Deletmemberproduk($xidx) {
        $xStr = " DELETE FROM memberproduk WHERE memberproduk.idx = '" . $xidx . "'";
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
	$this->db->or_like('idmember', $q);
	$this->db->or_like('tgljadimember', $q);
	$this->db->or_like('isfromrekomendasi', $q);
	$this->db->or_like('idreveral', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('tgljadimember', $q);
	$this->db->or_like('isfromrekomendasi', $q);
	$this->db->or_like('idreveral', $q);
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

