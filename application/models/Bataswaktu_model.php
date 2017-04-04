<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bataswaktu_model extends CI_Model
{

    public $table = 'bataswaktu';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,bataswaktu');
        $this->datatables->from('bataswaktu');
        //add this line for join
        //$this->datatables->join('table2', 'bataswaktu.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('bataswaktu/read/$1'),'Read')." | ".anchor(site_url('bataswaktu/update/$1'),'Update')." | ".anchor(site_url('bataswaktu/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTbataswaktu
    function getListbataswaktu() {
        $xStr = "SELECT idx,".
 "bataswaktu from bataswaktu";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailbataswaktu
    function getDetailbataswaktu($xidx) {
        $xStr = "SELECT idx,".
 "bataswaktu from bataswaktu WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_bataswaktu
    function Insertbataswaktu($xidx,$xbataswaktu) {
        $xStr = " INSERT INTO bataswaktu( idx,".
 "bataswaktu ) VALUES ( '" . $xidx
 . "','" .$xbataswaktu. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatebataswaktu
    function Updatebataswaktu($xidx,$xbataswaktu) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"bataswaktu= '". $xbataswaktu . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletbataswaktu
    function Deletbataswaktu($xidx) {
        $xStr = " DELETE FROM bataswaktu WHERE bataswaktu.idx = '" . $xidx . "'";
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
	$this->db->or_like('bataswaktu', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('bataswaktu', $q);
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

