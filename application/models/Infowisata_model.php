<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Infowisata_model extends CI_Model
{

    public $table = 'infowisata';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,judulinfo,deskripsihtml,imgutama,mapadress,tglinsert,tglupdate,idpegawai');
        $this->datatables->from('infowisata');
        //add this line for join
        //$this->datatables->join('table2', 'infowisata.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('infowisata/read/$1'),'Read')." | ".anchor(site_url('infowisata/update/$1'),'Update')." | ".anchor(site_url('infowisata/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTinfowisata
    function getListinfowisata() {
        $xStr = "SELECT idx,".
 "judulinfo,".
 "deskripsihtml,".
 "imgutama,".
 "mapadress,".
 "tglinsert,".
 "tglupdate,".
 "idpegawai from infowisata";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailinfowisata
    function getDetailinfowisata($xidx) {
        $xStr = "SELECT idx,".
 "judulinfo,".
 "deskripsihtml,".
 "imgutama,".
 "mapadress,".
 "tglinsert,".
 "tglupdate,".
 "idpegawai from infowisata WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_infowisata
    function Insertinfowisata($xidx,$xjudulinfo,$xdeskripsihtml,$ximgutama,$xmapadress,$xtglinsert,$xtglupdate,$xidpegawai) {
        $xStr = " INSERT INTO infowisata( idx,".
 "judulinfo,".
 "deskripsihtml,".
 "imgutama,".
 "mapadress,".
 "tglinsert,".
 "tglupdate,".
 "idpegawai ) VALUES ( '" . $xidx
 . "','" .$xjudulinfo
 . "','" .$xdeskripsihtml
 . "','" .$ximgutama
 . "','" .$xmapadress
 . "','" .$xtglinsert
 . "','" .$xtglupdate
 . "','" .$xidpegawai. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updateinfowisata
    function Updateinfowisata($xidx,$xjudulinfo,$xdeskripsihtml,$ximgutama,$xmapadress,$xtglinsert,$xtglupdate,$xidpegawai) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"judulinfo= '". $xjudulinfo . "'," . 
		"deskripsihtml= '". $xdeskripsihtml . "'," . 
		"imgutama= '". $ximgutama . "'," . 
		"mapadress= '". $xmapadress . "'," . 
		"tglinsert= '". $xtglinsert . "'," . 
		"tglupdate= '". $xtglupdate . "'," . 
		"idpegawai= '". $xidpegawai . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletinfowisata
    function Deletinfowisata($xidx) {
        $xStr = " DELETE FROM infowisata WHERE infowisata.idx = '" . $xidx . "'";
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
	$this->db->or_like('judulinfo', $q);
	$this->db->or_like('deskripsihtml', $q);
	$this->db->or_like('imgutama', $q);
	$this->db->or_like('mapadress', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('tglupdate', $q);
	$this->db->or_like('idpegawai', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('judulinfo', $q);
	$this->db->or_like('deskripsihtml', $q);
	$this->db->or_like('imgutama', $q);
	$this->db->or_like('mapadress', $q);
	$this->db->or_like('tglinsert', $q);
	$this->db->or_like('tglupdate', $q);
	$this->db->or_like('idpegawai', $q);
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

