<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Memberpoint_model extends CI_Model
{

    public $table = 'memberpoint';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,idmember,point,tglinsert,idjenispoint');
        $this->datatables->from('memberpoint');
        //add this line for join
        //$this->datatables->join('table2', 'memberpoint.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('memberpoint/read/$1'),'Read')." | ".anchor(site_url('memberpoint/update/$1'),'Update')." | ".anchor(site_url('memberpoint/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTmemberpoint
    function getListmemberpoint() {
        $xStr = "SELECT idx,".
 "idmember,".
 "point,".
 "tglinsert,".
 "idjenispoint from memberpoint";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailmemberpoint
    function getDetailmemberpoint($xidx) {
        $xStr = "SELECT idx,".
 "idmember,".
 "point,".
 "tglinsert,".
 "idjenispoint from memberpoint WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_memberpoint
    function Insertmemberpoint($xidx,$xidmember,$xpoint,$xtglinsert,$xidjenispoint) {
        $xStr = " INSERT INTO memberpoint( idx,".
 "idmember,".
 "point,".
 "tglinsert,".
 "idjenispoint ) VALUES ( '" . $xidx
 . "','" .$xidmember
 . "','" .$xpoint
 . "','" .$xtglinsert
 . "','" .$xidjenispoint. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatememberpoint
    function Updatememberpoint($xidx,$xidmember,$xpoint,$xtglinsert,$xidjenispoint) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"idmember= '". $xidmember . "'," . 
		"point= '". $xpoint . "'," . 
		"tglinsert= '". $xtglinsert . "'," . 
		"idjenispoint= '". $xidjenispoint . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletmemberpoint
    function Deletmemberpoint($xidx) {
        $xStr = " DELETE FROM memberpoint WHERE memberpoint.idx = '" . $xidx . "'";
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
	$this->db->or_like('point', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('idjenispoint', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('point', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('idjenispoint', $q);
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

