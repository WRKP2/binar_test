<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public $table = 'menu';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    function getListmenuAuto($xmenu) {
        $xStr = "SELECT " .
                "*" .
                " FROM menu WHERE NAMA_MENU like  '%" . $xmenu . "%'";
        $query = $this->db->query($xStr);
        return $query;
    }

    // GET_LISTmenu
    function getListmenu() {
        $xStr = "SELECT ID," .
                "NAMA_MENU," .
                "ID_RESTORAN," .
                "HARGA," .
                "FOTO_MENU," .
                "KETERANGAN from menu";
        $query = $this->db->query($xStr);

        return $query;
    }

    // GET_Detailmenu
    function getDetailmenu($xID) {
        $xStr = "SELECT ID," .
                "NAMA_MENU," .
                "ID_RESTORAN," .
                "HARGA," .
                "FOTO_MENU," .
                "KETERANGAN from menu WHERE ID = '" . $xID . "'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_menu
    function Insertmenu($xID, $xNAMA_MENU, $xID_RESTORAN, $xHARGA, $xFOTO_MENU, $xKETERANGAN) {
        $xStr = " INSERT INTO menu( ID," .
                "NAMA_MENU," .
                "ID_RESTORAN," .
                "HARGA," .
                "FOTO_MENU," .
                "KETERANGAN ) VALUES ( '" . $xID
                . "','" . $xNAMA_MENU
                . "','" . $xID_RESTORAN
                . "','" . $xHARGA
                . "','" . $xFOTO_MENU
                . "','" . $xKETERANGAN . "')";
        $query = $this->db->query($xStr);
        return $xID;
    }

    // updatemenu
    function Updatemenu($xID, $xNAMA_MENU, $xID_RESTORAN, $xHARGA, $xFOTO_MENU, $xKETERANGAN) {
        $xStr = " UPDATE menu SET " .
                "ID= '" . $xID . "'," .
                "NAMA_MENU= '" . $xNAMA_MENU . "'," .
                "ID_RESTORAN= '" . $xID_RESTORAN . "'," .
                "HARGA= '" . $xHARGA . "'," .
                "FOTO_MENU= '" . $xFOTO_MENU . "'," .
                "KETERANGAN= '" . $xKETERANGAN . "'" . " WHERE ID = '" . $xID . "'";
        $query = $this->db->query($xStr);
        return $xID;
    }

    // deletmenu
    function Deletmenu($xID) {
        $xStr = " DELETE FROM menu WHERE menu.ID = '" . $xID . "'";
        $query = $this->db->query($xStr);
    }

    function getLastIndexmenu() {
        $xStr = "SELECT ID," .
                "NAMA_MENU," .
                "ID_RESTORAN," .
                "HARGA," .
                "FOTO_MENU," .
                "KETERANGAN from menu order by idx DESC limit 1 ";
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
        $this->db->like('ID', $q);
        $this->db->or_like('NAMA_MENU', $q);
        $this->db->or_like('ID_RESTORAN', $q);
        $this->db->or_like('HARGA', $q);
        $this->db->or_like('FOTO_MENU', $q);
        $this->db->or_like('KETERANGAN', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID', $q);
        $this->db->or_like('NAMA_MENU', $q);
        $this->db->or_like('ID_RESTORAN', $q);
        $this->db->or_like('HARGA', $q);
        $this->db->or_like('FOTO_MENU', $q);
        $this->db->or_like('KETERANGAN', $q);
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
