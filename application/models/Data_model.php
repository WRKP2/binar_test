<?php

if (!defined('BASEPATH')){
    exit('No direct script access allowed');
}
class Data_model extends CI_Model {

    public $table = 'data';
    public $id = 'no';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('no,ID,nama,asal,gabung');
        $this->datatables->from('data');
        //add this line for join
        //$this->datatables->join('table2', 'data.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('data/read/$1'), 'Read') . " | " . anchor(site_url('data/update/$1'), 'Update') . " | " . anchor(site_url('data/delete/$1'), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'no');
        return $this->datatables->generate();
    }

    // GET_LISTdata
    function getListdata() {
        $xStr = "SELECT no," .
                "ID," .
                "nama," .
                "asal," .
                "gabung from data";
        $query = $this->db->query($xStr);

        return $query;
    }

    // GET_Detaildata
    function getDetaildata($xno) {
        $xStr = "SELECT no," .
                "ID," .
                "nama," .
                "asal," .
                "gabung from data WHERE no = '" . $xno . "'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_data
    function Insertdata($xno, $xID, $xnama, $xasal, $xgabung) {
        $xStr = " INSERT INTO data( no," .
                "ID," .
                "nama," .
                "asal," .
                "gabung ) VALUES ( '" . $xno
                . "','" . $xID
                . "','" . $xnama
                . "','" . $xasal
                . "','" . $xgabung . "')";
        $query = $this->db->query($xStr);
        return $xno;
    }

    // updatedata
    function Updatedata($xno, $xID, $xnama, $xasal, $xgabung) {
        $xStr = " UPDATE produk SET " .
                "no= '" . $xno . "'," .
                "ID= '" . $xID . "'," .
                "nama= '" . $xnama . "'," .
                "asal= '" . $xasal . "'," .
                "gabung= '" . $xgabung . "'," . "' WHERE no = '" . $xno . "'";
        $query = $this->db->query($xStr);
        return $xno;
    }

    // deletdata
    function Deletdata($xno) {
        $xStr = " DELETE FROM data WHERE data.no = '" . $xno . "'";
        $query = $this->db->query($xStr);
    }

    function getLastIndexdata() {
        $xStr = "SELECT no," .
                "ID," .
                "nama," .
                "asal," .
                "gabung from data order by idx DESC limit 1 ";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('no', $q);
        $this->db->or_like('ID', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('asal', $q);
        $this->db->or_like('gabung', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('no', $q);
        $this->db->or_like('ID', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('asal', $q);
        $this->db->or_like('gabung', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
