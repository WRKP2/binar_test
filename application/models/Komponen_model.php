<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Komponen_model extends CI_Model
{

    public $table = 'komponen';
    public $id = 'idkomponen';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idkomponen,NmKomponen,isshow');
        $this->datatables->from('komponen');
        //add this line for join
        //$this->datatables->join('table2', 'komponen.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('komponen/read/$1'),'Read')." | ".anchor(site_url('komponen/update/$1'),'Update')." | ".anchor(site_url('komponen/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idkomponen');
        return $this->datatables->generate();
    }

    // GET_LISTkomponen
    function getListkomponen() {
        $xStr = "SELECT idkomponen,".
 "NmKomponen,".
 "isshow from komponen";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailkomponen
    function getDetailkomponen($xidkomponen) {
        $xStr = "SELECT idkomponen,".
 "NmKomponen,".
 "isshow from komponen WHERE idkomponen = '". $xidkomponen ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_komponen
    function Insertkomponen($xidkomponen,$xNmKomponen,$xisshow) {
        $xStr = " INSERT INTO komponen( idkomponen,".
 "NmKomponen,".
 "isshow ) VALUES ( '" . $xidkomponen
 . "','" .$xNmKomponen
 . "','" .$xisshow. "')";
        $query = $this->db->query($xStr);
        return $xidkomponen; 
    }

    // updatekomponen
    function Updatekomponen($xidkomponen,$xNmKomponen,$xisshow) {
        $xStr = " UPDATE produk SET " . 
		"idkomponen= '". $xidkomponen . "'," . 
		"NmKomponen= '". $xNmKomponen . "'," . 
		"isshow= '". $xisshow . "'," . "' WHERE idkomponen = '". $xidkomponen ."'";
 $query = $this->db->query($xStr);
        return $xidkomponen;
    }

    // deletkomponen
    function Deletkomponen($xidkomponen) {
        $xStr = " DELETE FROM komponen WHERE komponen.idkomponen = '" . $xidkomponen . "'";
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
        $this->db->like('idkomponen', $q);
	$this->db->or_like('NmKomponen', $q);
	$this->db->or_like('isshow', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idkomponen', $q);
	$this->db->or_like('NmKomponen', $q);
	$this->db->or_like('isshow', $q);
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

