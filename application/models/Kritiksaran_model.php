<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kritiksaran_model extends CI_Model
{

    public $table = 'kritiksaran';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // GET_LISTkritiksaran
    function getListkritiksaran() {
        $xStr = "SELECT idx,".
 "idmember,".
 "Saran,".
 "tglsaran from kritiksaran";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailkritiksaran
    function getDetailkritiksaran($xidx) {
        $xStr = "SELECT idx,".
 "idmember,".
 "Saran,".
 "tglsaran from kritiksaran WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_kritiksaran
    function Insertkritiksaran($xidx,$xidmember,$xSaran,$xtglsaran) {
        $xStr = " INSERT INTO kritiksaran( idx,".
 "idmember,".
 "Saran,".
 "tglsaran ) VALUES ( '" . $xidx
 . "','" .$xidmember
 . "','" .$xSaran
 . "','" .$xtglsaran. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatekritiksaran
    function Updatekritiksaran($xidx,$xidmember,$xSaran,$xtglsaran) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"idmember= '". $xidmember . "'," . 
		"Saran= '". $xSaran . "'," . 
		"tglsaran= '". $xtglsaran . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletkritiksaran
    function Deletkritiksaran($xidx) {
        $xStr = " DELETE FROM kritiksaran WHERE kritiksaran.idx = '" . $xidx . "'";
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
	$this->db->or_like('idmember', $q);
	$this->db->or_like('Saran', $q);
	$this->db->or_like('tglsaran', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('Saran', $q);
	$this->db->or_like('tglsaran', $q);
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

