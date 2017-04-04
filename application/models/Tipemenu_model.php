<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tipemenu_model extends CI_Model
{

    public $table = 'tipemenu';
    public $id = '';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idTipeMenu,NmTipeMenu');
        $this->datatables->from('tipemenu');
        //add this line for join
        //$this->datatables->join('table2', 'tipemenu.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('tipemenu/read/$1'),'Read')." | ".anchor(site_url('tipemenu/update/$1'),'Update')." | ".anchor(site_url('tipemenu/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), '');
        return $this->datatables->generate();
    }

    // GET_LISTtipemenu
    function getListtipemenu() {
        $xStr = "SELECT idTipeMenu,".
 "NmTipeMenu from tipemenu";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailtipemenu
    function getDetailtipemenu($x) {
        $xStr = "SELECT idTipeMenu,".
 "NmTipeMenu from tipemenu WHERE  = '". $x ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_tipemenu
    function Inserttipemenu($xidTipeMenu,$xNmTipeMenu) {
        $xStr = " INSERT INTO tipemenu( idTipeMenu,".
 "NmTipeMenu ) VALUES ( '" . $xidTipeMenu
 . "','" .$xNmTipeMenu. "')";
        $query = $this->db->query($xStr);
        return $x; 
    }

    // updatetipemenu
    function Updatetipemenu($xidTipeMenu,$xNmTipeMenu) {
        $xStr = " UPDATE produk SET " . 
		"idTipeMenu= '". $xidTipeMenu . "'," . 
		"NmTipeMenu= '". $xNmTipeMenu . "'," . "' WHERE  = '". $x ."'";
 $query = $this->db->query($xStr);
        return $x;
    }

    // delettipemenu
    function Delettipemenu($x) {
        $xStr = " DELETE FROM tipemenu WHERE tipemenu. = '" . $x . "'";
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
        $this->db->like('', $q);
	$this->db->or_like('idTipeMenu', $q);
	$this->db->or_like('NmTipeMenu', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('', $q);
	$this->db->or_like('idTipeMenu', $q);
	$this->db->or_like('NmTipeMenu', $q);
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

