<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usergroup_model extends CI_Model
{

    public $table = 'usergroup';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,NmUserGroup');
        $this->datatables->from('usergroup');
        //add this line for join
        //$this->datatables->join('table2', 'usergroup.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('usergroup/read/$1'),'Read')." | ".anchor(site_url('usergroup/update/$1'),'Update')." | ".anchor(site_url('usergroup/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTusergroup
    function getListusergroup() {
        $xStr = "SELECT idx,".
 "NmUserGroup from usergroup";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailusergroup
    function getDetailusergroup($xidx) {
        $xStr = "SELECT idx,".
 "NmUserGroup from usergroup WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_usergroup
    function Insertusergroup($xidx,$xNmUserGroup) {
        $xStr = " INSERT INTO usergroup( idx,".
 "NmUserGroup ) VALUES ( '" . $xidx
 . "','" .$xNmUserGroup. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updateusergroup
    function Updateusergroup($xidx,$xNmUserGroup) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"NmUserGroup= '". $xNmUserGroup . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletusergroup
    function Deletusergroup($xidx) {
        $xStr = " DELETE FROM usergroup WHERE usergroup.idx = '" . $xidx . "'";
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
	$this->db->or_like('NmUserGroup', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('NmUserGroup', $q);
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

