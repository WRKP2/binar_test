<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userproduk_model extends CI_Model
{

    public $table = 'userproduk';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,idmember,idproduk,idjenisuser,tglinsert,idpengadd');
        $this->datatables->from('userproduk');
        //add this line for join
        //$this->datatables->join('table2', 'userproduk.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('userproduk/read/$1'),'Read')." | ".anchor(site_url('userproduk/update/$1'),'Update')." | ".anchor(site_url('userproduk/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTuserproduk
    function getListuserproduk() {
        $xStr = "SELECT idx,".
 "idmember,".
 "idproduk,".
 "idjenisuser,".
 "tglinsert,".
 "idpengadd from userproduk";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailuserproduk
    function getDetailuserproduk($xidx) {
        $xStr = "SELECT idx,".
 "idmember,".
 "idproduk,".
 "idjenisuser,".
 "tglinsert,".
 "idpengadd from userproduk WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_userproduk
    function Insertuserproduk($xidx,$xidmember,$xidproduk,$xidjenisuser,$xtglinsert,$xidpengadd) {
        $xStr = " INSERT INTO userproduk( idx,".
 "idmember,".
 "idproduk,".
 "idjenisuser,".
 "tglinsert,".
 "idpengadd ) VALUES ( '" . $xidx
 . "','" .$xidmember
 . "','" .$xidproduk
 . "','" .$xidjenisuser
 . "','" .$xtglinsert
 . "','" .$xidpengadd. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updateuserproduk
    function Updateuserproduk($xidx,$xidmember,$xidproduk,$xidjenisuser,$xtglinsert,$xidpengadd) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"idmember= '". $xidmember . "'," . 
		"idproduk= '". $xidproduk . "'," . 
		"idjenisuser= '". $xidjenisuser . "'," . 
		"tglinsert= '". $xtglinsert . "'," . 
		"idpengadd= '". $xidpengadd . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletuserproduk
    function Deletuserproduk($xidx) {
        $xStr = " DELETE FROM userproduk WHERE userproduk.idx = '" . $xidx . "'";
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
	$this->db->or_like('idjenisuser', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('idpengadd', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('idjenisuser', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('idpengadd', $q);
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

