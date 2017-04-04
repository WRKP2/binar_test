<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenispoint_model extends CI_Model
{

    public $table = 'jenispoint';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,jenispoint');
        $this->datatables->from('jenispoint');
        //add this line for join
        //$this->datatables->join('table2', 'jenispoint.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('jenispoint/read/$1'),'Read')." | ".anchor(site_url('jenispoint/update/$1'),'Update')." | ".anchor(site_url('jenispoint/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTjenispoint
    function getListjenispoint() {
        $xStr = "SELECT idx,".
 "jenispoint from jenispoint";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailjenispoint
    function getDetailjenispoint($xidx) {
        $xStr = "SELECT idx,".
 "jenispoint from jenispoint WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_jenispoint
    function Insertjenispoint($xidx,$xjenispoint) {
        $xStr = " INSERT INTO jenispoint( idx,".
 "jenispoint ) VALUES ( '" . $xidx
 . "','" .$xjenispoint. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatejenispoint
    function Updatejenispoint($xidx,$xjenispoint) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"jenispoint= '". $xjenispoint . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletjenispoint
    function Deletjenispoint($xidx) {
        $xStr = " DELETE FROM jenispoint WHERE jenispoint.idx = '" . $xidx . "'";
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
	$this->db->or_like('jenispoint', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('jenispoint', $q);
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

