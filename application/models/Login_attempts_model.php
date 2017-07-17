<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_attempts_model extends CI_Model
{

    public $table = 'login_attempts';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }function getListlogin_attemptsAuto($xlogin_attempts) {
        $xStr = "SELECT " .
                "*" .
                " FROM login_attempts WHERE login like  '%" . $xlogin_attempts . "%'";
        $query = $this->db->query($xStr);
        return $query;
    }

    // GET_LISTlogin_attempts
    function getListlogin_attempts() {
        $xStr = "SELECT id,".
 "ip_address,".
 "login,".
 "time from login_attempts";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detaillogin_attempts
    function getDetaillogin_attempts($xid) {
        $xStr = "SELECT id,".
 "ip_address,".
 "login,".
 "time from login_attempts WHERE id = '". $xid ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_login_attempts
    function Insertlogin_attempts($xid,$xip_address,$xlogin,$xtime) {
        $xStr = " INSERT INTO login_attempts( id,".
 "ip_address,".
 "login,".
 "time ) VALUES ( '" . $xid
 . "','" .$xip_address
 . "','" .$xlogin
 . "','" .$xtime. "')";
        $query = $this->db->query($xStr);
        return $xid; 
    }

    // updatelogin_attempts
    function Updatelogin_attempts($xid,$xip_address,$xlogin,$xtime) {
        $xStr = " UPDATE login_attempts SET " . 
		"id= '". $xid . "'," . 
		"ip_address= '". $xip_address . "'," . 
		"login= '". $xlogin . "'," . 
		"time= '". $xtime . "'" . " WHERE id = '". $xid ."'";
 $query = $this->db->query($xStr);
        return $xid;
    }

    // deletlogin_attempts
    function Deletlogin_attempts($xid) {
        $xStr = " DELETE FROM login_attempts WHERE login_attempts.id = '" . $xid . "'";
        $query = $this->db->query($xStr);
    }
function getLastIndexlogin_attempts(){ 
        $xStr = "SELECT id,".
 "ip_address,".
 "login,".
 "time from login_attempts order by idx DESC limit 1 ";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
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
        $this->db->like('id', $q);
	$this->db->or_like('ip_address', $q);
	$this->db->or_like('login', $q);
	$this->db->or_like('time', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('ip_address', $q);
	$this->db->or_like('login', $q);
	$this->db->or_like('time', $q);
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

