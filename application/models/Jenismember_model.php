<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenismember_model extends CI_Model
{

    public $table = 'jenismember';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,JenisMember');
        $this->datatables->from('jenismember');
        //add this line for join
        //$this->datatables->join('table2', 'jenismember.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('jenismember/read/$1'),'Read')." | ".anchor(site_url('jenismember/update/$1'),'Update')." | ".anchor(site_url('jenismember/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTjenismember
    function getListjenismember() {
        $xStr = "SELECT idx,".
 "JenisMember from jenismember";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailjenismember
    function getDetailjenismember($xidx) {
        $xStr = "SELECT idx,".
 "JenisMember from jenismember WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_jenismember
    function Insertjenismember($xidx,$xJenisMember) {
        $xStr = " INSERT INTO jenismember( idx,".
 "JenisMember ) VALUES ( '" . $xidx
 . "','" .$xJenisMember. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatejenismember
    function Updatejenismember($xidx,$xJenisMember) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"JenisMember= '". $xJenisMember . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletjenismember
    function Deletjenismember($xidx) {
        $xStr = " DELETE FROM jenismember WHERE jenismember.idx = '" . $xidx . "'";
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
	$this->db->or_like('JenisMember', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('JenisMember', $q);
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

