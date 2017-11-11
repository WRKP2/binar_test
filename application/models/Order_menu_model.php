<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order_menu_model extends CI_Model {

    public $table = 'order_menu';
    public $id = 'ID';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    function getListorder_menuAuto($xorder_menu) {
        $xStr = "SELECT " .
                "*" .
                " FROM order_menu WHERE ALAMAT_PENGIRIMAN like  '%" . $xorder_menu . "%'";
        $query = $this->db->query($xStr);
        return $query;
    }

    // GET_LISTorder_menu
    function getListorder_menu() {
        $xStr = "SELECT ID," .
                "ID_RESTO," .
                "ID_MENU," .
                "ID_USERAPP," .
                "JUMLAH," .
                "ORDER_DATE," .
                "STATUS," .
                "ALAMAT_PENGIRIMAN from order_menu";
        $query = $this->db->query($xStr);

        return $query;
    }

    // GET_Detailorder_menu
    function getDetailorder_menu($xID) {
        $xStr = "SELECT ID," .
                "ID_RESTO," .
                "ID_MENU," .
                "ID_USERAPP," .
                "JUMLAH," .
                "ORDER_DATE," .
                "STATUS," .
                "ALAMAT_PENGIRIMAN from order_menu WHERE ID = '" . $xID . "'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_order_menu
    function Insertorder_menu($xID, $xID_RESTO, $xID_MENU, $xID_USERAPP, $xJUMLAH, $xORDER_DATE, $xSTATUS, $xALAMAT_PENGIRIMAN) {
        $xStr = " INSERT INTO order_menu( ID," .
                "ID_RESTO," .
                "ID_MENU," .
                "ID_USERAPP," .
                "JUMLAH," .
                "ORDER_DATE," .
                "STATUS," .
                "ALAMAT_PENGIRIMAN ) VALUES ( '" . $xID
                . "','" . $xID_RESTO
                . "','" . $xID_MENU
                . "','" . $xID_USERAPP
                . "','" . $xJUMLAH
                . "','" . $xORDER_DATE
                . "','" . $xSTATUS
                . "','" . $xALAMAT_PENGIRIMAN . "')";
        $query = $this->db->query($xStr);
        return $xID;
    }

    // updateorder_menu
    function Updateorder_menu($xID, $xID_RESTO, $xID_MENU, $xID_USERAPP, $xJUMLAH, $xORDER_DATE, $xSTATUS, $xALAMAT_PENGIRIMAN) {
        $xStr = " UPDATE order_menu SET " .
                "ID= '" . $xID . "'," .
                "ID_RESTO= '" . $xID_RESTO . "'," .
                "ID_MENU= '" . $xID_MENU . "'," .
                "ID_USERAPP= '" . $xID_USERAPP . "'," .
                "JUMLAH= '" . $xJUMLAH . "'," .
                "ORDER_DATE= '" . $xORDER_DATE . "'," .
                "STATUS= '" . $xSTATUS . "'," .
                "ALAMAT_PENGIRIMAN= '" . $xALAMAT_PENGIRIMAN . "'" . " WHERE ID = '" . $xID . "'";
        $query = $this->db->query($xStr);
        return $xID;
    }

    // deletorder_menu
    function Deletorder_menu($xID) {
        $xStr = " DELETE FROM order_menu WHERE order_menu.ID = '" . $xID . "'";
        $query = $this->db->query($xStr);
    }

    function getLastIndexorder_menu() {
        $xStr = "SELECT ID," .
                "ID_RESTO," .
                "ID_MENU," .
                "ID_USERAPP," .
                "JUMLAH," .
                "ORDER_DATE," .
                "STATUS," .
                "ALAMAT_PENGIRIMAN from order_menu order by idx DESC limit 1 ";
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
        $this->db->or_like('ID_RESTO', $q);
        $this->db->or_like('ID_MENU', $q);
        $this->db->or_like('ID_USERAPP', $q);
        $this->db->or_like('JUMLAH', $q);
        $this->db->or_like('ORDER_DATE', $q);
        $this->db->or_like('STATUS', $q);
        $this->db->or_like('ALAMAT_PENGIRIMAN', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID', $q);
        $this->db->or_like('ID_RESTO', $q);
        $this->db->or_like('ID_MENU', $q);
        $this->db->or_like('ID_USERAPP', $q);
        $this->db->or_like('JUMLAH', $q);
        $this->db->or_like('ORDER_DATE', $q);
        $this->db->or_like('STATUS', $q);
        $this->db->or_like('ALAMAT_PENGIRIMAN', $q);
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
