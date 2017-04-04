<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenispembayaran_model extends CI_Model
{

    public $table = 'jenispembayaran';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,jenispembayaran,jenispembayaranING');
        $this->datatables->from('jenispembayaran');
        //add this line for join
        //$this->datatables->join('table2', 'jenispembayaran.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('jenispembayaran/read/$1'),'Read')." | ".anchor(site_url('jenispembayaran/update/$1'),'Update')." | ".anchor(site_url('jenispembayaran/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTjenispembayaran
    function getListjenispembayaran() {
        $xStr = "SELECT idx,".
 "jenispembayaran,".
 "jenispembayaranING from jenispembayaran";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailjenispembayaran
    function getDetailjenispembayaran($xidx) {
        $xStr = "SELECT idx,".
 "jenispembayaran,".
 "jenispembayaranING from jenispembayaran WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_jenispembayaran
    function Insertjenispembayaran($xidx,$xjenispembayaran,$xjenispembayaranING) {
        $xStr = " INSERT INTO jenispembayaran( idx,".
 "jenispembayaran,".
 "jenispembayaranING ) VALUES ( '" . $xidx
 . "','" .$xjenispembayaran
 . "','" .$xjenispembayaranING. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatejenispembayaran
    function Updatejenispembayaran($xidx,$xjenispembayaran,$xjenispembayaranING) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"jenispembayaran= '". $xjenispembayaran . "'," . 
		"jenispembayaranING= '". $xjenispembayaranING . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletjenispembayaran
    function Deletjenispembayaran($xidx) {
        $xStr = " DELETE FROM jenispembayaran WHERE jenispembayaran.idx = '" . $xidx . "'";
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
	$this->db->or_like('jenispembayaran', $q);
	$this->db->or_like('jenispembayaranING', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('jenispembayaran', $q);
	$this->db->or_like('jenispembayaranING', $q);
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

