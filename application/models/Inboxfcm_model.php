<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inboxfcm_model extends CI_Model
{

    public $table = 'inboxfcm';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,idmember,judul,message,tglmessage,isterbaca,idmenuandroid');
        $this->datatables->from('inboxfcm');
        //add this line for join
        //$this->datatables->join('table2', 'inboxfcm.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('inboxfcm/read/$1'),'Read')." | ".anchor(site_url('inboxfcm/update/$1'),'Update')." | ".anchor(site_url('inboxfcm/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTinboxfcm
    function getListinboxfcm() {
        $xStr = "SELECT idx,".
 "idmember,".
 "judul,".
 "message,".
 "tglmessage,".
 "isterbaca,".
 "idmenuandroid from inboxfcm";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailinboxfcm
    function getDetailinboxfcm($xidx) {
        $xStr = "SELECT idx,".
 "idmember,".
 "judul,".
 "message,".
 "tglmessage,".
 "isterbaca,".
 "idmenuandroid from inboxfcm WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_inboxfcm
    function Insertinboxfcm($xidx,$xidmember,$xjudul,$xmessage,$xtglmessage,$xisterbaca,$xidmenuandroid) {
        $xStr = " INSERT INTO inboxfcm( idx,".
 "idmember,".
 "judul,".
 "message,".
 "tglmessage,".
 "isterbaca,".
 "idmenuandroid ) VALUES ( '" . $xidx
 . "','" .$xidmember
 . "','" .$xjudul
 . "','" .$xmessage
 . "','" .$xtglmessage
 . "','" .$xisterbaca
 . "','" .$xidmenuandroid. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updateinboxfcm
    function Updateinboxfcm($xidx,$xidmember,$xjudul,$xmessage,$xtglmessage,$xisterbaca,$xidmenuandroid) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"idmember= '". $xidmember . "'," . 
		"judul= '". $xjudul . "'," . 
		"message= '". $xmessage . "'," . 
		"tglmessage= '". $xtglmessage . "'," . 
		"isterbaca= '". $xisterbaca . "'," . 
		"idmenuandroid= '". $xidmenuandroid . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletinboxfcm
    function Deletinboxfcm($xidx) {
        $xStr = " DELETE FROM inboxfcm WHERE inboxfcm.idx = '" . $xidx . "'";
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
	$this->db->or_like('judul', $q);
	$this->db->or_like('message', $q);
	$this->db->or_like('tglmessage', $q);
	$this->db->or_like('isterbaca', $q);
	$this->db->or_like('idmenuandroid', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('judul', $q);
	$this->db->or_like('message', $q);
	$this->db->or_like('tglmessage', $q);
	$this->db->or_like('isterbaca', $q);
	$this->db->or_like('idmenuandroid', $q);
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

