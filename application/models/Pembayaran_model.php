<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{

    public $table = 'pembayaran';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,idmember,idproduk,tglbayar,isverifieduserproduk,idjenispembayaran');
        $this->datatables->from('pembayaran');
        //add this line for join
        //$this->datatables->join('table2', 'pembayaran.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('pembayaran/read/$1'),'Read')." | ".anchor(site_url('pembayaran/update/$1'),'Update')." | ".anchor(site_url('pembayaran/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTpembayaran
    function getListpembayaran() {
        $xStr = "SELECT idx,".
 "idmember,".
 "idproduk,".
 "tglbayar,".
 "isverifieduserproduk,".
 "idjenispembayaran from pembayaran";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailpembayaran
    function getDetailpembayaran($xidx) {
        $xStr = "SELECT idx,".
 "idmember,".
 "idproduk,".
 "tglbayar,".
 "isverifieduserproduk,".
 "idjenispembayaran from pembayaran WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_pembayaran
    function Insertpembayaran($xidx,$xidmember,$xidproduk,$xtglbayar,$xisverifieduserproduk,$xidjenispembayaran) {
        $xStr = " INSERT INTO pembayaran( idx,".
 "idmember,".
 "idproduk,".
 "tglbayar,".
 "isverifieduserproduk,".
 "idjenispembayaran ) VALUES ( '" . $xidx
 . "','" .$xidmember
 . "','" .$xidproduk
 . "','" .$xtglbayar
 . "','" .$xisverifieduserproduk
 . "','" .$xidjenispembayaran. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updatepembayaran
    function Updatepembayaran($xidx,$xidmember,$xidproduk,$xtglbayar,$xisverifieduserproduk,$xidjenispembayaran) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"idmember= '". $xidmember . "'," . 
		"idproduk= '". $xidproduk . "'," . 
		"tglbayar= '". $xtglbayar . "'," . 
		"isverifieduserproduk= '". $xisverifieduserproduk . "'," . 
		"idjenispembayaran= '". $xidjenispembayaran . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletpembayaran
    function Deletpembayaran($xidx) {
        $xStr = " DELETE FROM pembayaran WHERE pembayaran.idx = '" . $xidx . "'";
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
	$this->db->or_like('tglbayar', $q);
	$this->db->or_like('isverifieduserproduk', $q);
	$this->db->or_like('idjenispembayaran', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('idmember', $q);
	$this->db->or_like('idproduk', $q);
	$this->db->or_like('tglbayar', $q);
	$this->db->or_like('isverifieduserproduk', $q);
	$this->db->or_like('idjenispembayaran', $q);
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

