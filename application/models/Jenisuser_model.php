<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenisuser_model extends CI_Model
{

    public $table = 'jenisuser';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,jenisuser,keterangan');
        $this->datatables->from('jenisuser');
        //add this line for join
        //$this->datatables->join('table2', 'jenisuser.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('jenisuser/read/$1'),'Read')." | ".anchor(site_url('jenisuser/update/$1'),'Update')." | ".anchor(site_url('jenisuser/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTjenisuser
    function getListjenisuser() {
        $xStr = "SELECT idx,".
 "jenisuser,".
 "keterangan from jenisuser";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailjenisuser
    function getDetailjenisuser($xidx) {
        $xStr = "SELECT idx,".
 "jenisuser,".
 "keterangan from jenisuser WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_jenisuser
    function Insertjenisuser($xidx,$xjenisuser,$xketerangan) {
        $xStr = " INSERT INTO jenisuser( idx,".
 "jenisuser,".
 "keterangan ) VALUES ( '" . $xidx
 . "','" .$xjenisuser
 . "','" .$xketerangan. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatejenisuser
    function Updatejenisuser($xidx,$xjenisuser,$xketerangan) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"jenisuser= '". $xjenisuser . "'," . 
		"keterangan= '". $xketerangan . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletjenisuser
    function Deletjenisuser($xidx) {
        $xStr = " DELETE FROM jenisuser WHERE jenisuser.idx = '" . $xidx . "'";
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
	$this->db->or_like('jenisuser', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('jenisuser', $q);
	$this->db->or_like('keterangan', $q);
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

