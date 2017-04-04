<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rekomendasi_model extends CI_Model
{

    public $table = 'rekomendasi';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // GET_LISTrekomendasi
    function getListrekomendasi() {
        $xStr = "SELECT idx,".
 "idproduk,".
 "idperekomendasi,".
 "idmemberyangdirekomendasi,".
 "tglrekomendassi,".
 "longlatacept,".
 "issetujurekom from rekomendasi";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailrekomendasi
    function getDetailrekomendasi($xidx) {
        $xStr = "SELECT idx,".
 "idproduk,".
 "idperekomendasi,".
 "idmemberyangdirekomendasi,".
 "tglrekomendassi,".
 "longlatacept,".
 "issetujurekom from rekomendasi WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_rekomendasi
    function Insertrekomendasi($xidx,$xidproduk,$xidperekomendasi,$xidmemberyangdirekomendasi,$xtglrekomendassi,$xlonglatacept,$xissetujurekom) {
        $xStr = " INSERT INTO rekomendasi( idx,".
 "idproduk,".
 "idperekomendasi,".
 "idmemberyangdirekomendasi,".
 "tglrekomendassi,".
 "longlatacept,".
 "issetujurekom ) VALUES ( '" . $xidx
 . "','" .$xidproduk
 . "','" .$xidperekomendasi
 . "','" .$xidmemberyangdirekomendasi
 . "','" .$xtglrekomendassi
 . "','" .$xlonglatacept
 . "','" .$xissetujurekom. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updaterekomendasi
    function Updaterekomendasi($xidx,$xidproduk,$xidperekomendasi,$xidmemberyangdirekomendasi,$xtglrekomendassi,$xlonglatacept,$xissetujurekom) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"idproduk= '". $xidproduk . "'," . 
		"idperekomendasi= '". $xidperekomendasi . "'," . 
		"idmemberyangdirekomendasi= '". $xidmemberyangdirekomendasi . "'," . 
		"tglrekomendassi= '". $xtglrekomendassi . "'," . 
		"longlatacept= '". $xlonglatacept . "'," . 
		"issetujurekom= '". $xissetujurekom . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletrekomendasi
    function Deletrekomendasi($xidx) {
        $xStr = " DELETE FROM rekomendasi WHERE rekomendasi.idx = '" . $xidx . "'";
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
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('idperekomendasi', $q);
	$this->db->or_like('idmemberyangdirekomendasi', $q);
	$this->db->or_like('tglrekomendassi', $q);
	$this->db->or_like('longlatacept', $q);
	$this->db->or_like('issetujurekom', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('idperekomendasi', $q);
	$this->db->or_like('idmemberyangdirekomendasi', $q);
	$this->db->or_like('tglrekomendassi', $q);
	$this->db->or_like('longlatacept', $q);
	$this->db->or_like('issetujurekom', $q);
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

