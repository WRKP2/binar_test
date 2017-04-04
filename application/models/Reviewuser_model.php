<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reviewuser_model extends CI_Model
{

    public $table = 'reviewuser';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // GET_LISTreviewuser
    function getListreviewuser() {
        $xStr = "SELECT idx,".
 "idmember,".
 "idproduk,".
 "review,".
 "star,".
 "tglreview from reviewuser";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailreviewuser
    function getDetailreviewuser($xidx) {
        $xStr = "SELECT idx,".
 "idmember,".
 "idproduk,".
 "review,".
 "star,".
 "tglreview from reviewuser WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_reviewuser
    function Insertreviewuser($xidx,$xidmember,$xidproduk,$xreview,$xstar,$xtglreview) {
        $xStr = " INSERT INTO reviewuser( idx,".
 "idmember,".
 "idproduk,".
 "review,".
 "star,".
 "tglreview ) VALUES ( '" . $xidx
 . "','" .$xidmember
 . "','" .$xidproduk
 . "','" .$xreview
 . "','" .$xstar
 . "','" .$xtglreview. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatereviewuser
    function Updatereviewuser($xidx,$xidmember,$xidproduk,$xreview,$xstar,$xtglreview) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"idmember= '". $xidmember . "'," . 
		"idproduk= '". $xidproduk . "'," . 
		"review= '". $xreview . "'," . 
		"star= '". $xstar . "'," . 
		"tglreview= '". $xtglreview . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletreviewuser
    function Deletreviewuser($xidx) {
        $xStr = " DELETE FROM reviewuser WHERE reviewuser.idx = '" . $xidx . "'";
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
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('review', $q);
	$this->db->or_like('star', $q);
	$this->db->or_like('tglreview', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('review', $q);
	$this->db->or_like('star', $q);
	$this->db->or_like('tglreview', $q);
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

