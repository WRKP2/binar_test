<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenisfasilitas_model extends CI_Model
{

    public $table = 'jenisfasilitas';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,jenisfasilitas,imgfasilitas');
        $this->datatables->from('jenisfasilitas');
        //add this line for join
        //$this->datatables->join('table2', 'jenisfasilitas.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('jenisfasilitas/read/$1'),'Read')." | ".anchor(site_url('jenisfasilitas/update/$1'),'Update')." | ".anchor(site_url('jenisfasilitas/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTjenisfasilitas
    function getListjenisfasilitas() {
        $xStr = "SELECT idx,".
 "jenisfasilitas,".
 "imgfasilitas from jenisfasilitas";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailjenisfasilitas
    function getDetailjenisfasilitas($xidx) {
        $xStr = "SELECT idx,".
 "jenisfasilitas,".
 "imgfasilitas from jenisfasilitas WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_jenisfasilitas
    function Insertjenisfasilitas($xidx,$xjenisfasilitas,$ximgfasilitas) {
        $xStr = " INSERT INTO jenisfasilitas( idx,".
 "jenisfasilitas,".
 "imgfasilitas ) VALUES ( '" . $xidx
 . "','" .$xjenisfasilitas
 . "','" .$ximgfasilitas. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatejenisfasilitas
    function Updatejenisfasilitas($xidx,$xjenisfasilitas,$ximgfasilitas) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"jenisfasilitas= '". $xjenisfasilitas . "'," . 
		"imgfasilitas= '". $ximgfasilitas . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletjenisfasilitas
    function Deletjenisfasilitas($xidx) {
        $xStr = " DELETE FROM jenisfasilitas WHERE jenisfasilitas.idx = '" . $xidx . "'";
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
	$this->db->or_like('jenisfasilitas', $q);
	$this->db->or_like('imgfasilitas', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('jenisfasilitas', $q);
	$this->db->or_like('imgfasilitas', $q);
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

