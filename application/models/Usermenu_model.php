<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usermenu_model extends CI_Model
{

    public $table = 'usermenu';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // GET_LISTusermenu
    function getListusermenu() {
        $xStr = "SELECT idx,".
 "iduser,".
 "idmenu,".
 "idaplikasi from usermenu";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailusermenu
    function getDetailusermenu($xidx) {
        $xStr = "SELECT idx,".
 "iduser,".
 "idmenu,".
 "idaplikasi from usermenu WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_usermenu
    function Insertusermenu($xidx,$xiduser,$xidmenu,$xidaplikasi) {
        $xStr = " INSERT INTO usermenu( idx,".
 "iduser,".
 "idmenu,".
 "idaplikasi ) VALUES ( '" . $xidx
 . "','" .$xiduser
 . "','" .$xidmenu
 . "','" .$xidaplikasi. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updateusermenu
    function Updateusermenu($xidx,$xiduser,$xidmenu,$xidaplikasi) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"iduser= '". $xiduser . "'," . 
		"idmenu= '". $xidmenu . "'," . 
		"idaplikasi= '". $xidaplikasi . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletusermenu
    function Deletusermenu($xidx) {
        $xStr = " DELETE FROM usermenu WHERE usermenu.idx = '" . $xidx . "'";
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
	$this->db->or_like('iduser', $q);
	$this->db->or_like('idmenu', $q);
	$this->db->or_like('idaplikasi', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('iduser', $q);
	$this->db->or_like('idmenu', $q);
	$this->db->or_like('idaplikasi', $q);
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

