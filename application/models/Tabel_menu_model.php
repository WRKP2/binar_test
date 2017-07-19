<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

<<<<<<< HEAD
class Tabel_menu_model extends CI_Model
{
=======
class Tabel_menu_model extends CI_Model {
>>>>>>> 15dd86578eaa334cfae85f9694f63ca60c2aceaf

    public $table = 'tabel_menu';
    public $id = 'id';
    public $order = 'DESC';

<<<<<<< HEAD
    function __construct()
    {
        parent::__construct();
    }function getListtabel_menuAuto($xtabel_menu) {
=======
    function __construct() {
        parent::__construct();
    }

    function getListtabel_menuAuto($xtabel_menu) {
>>>>>>> 15dd86578eaa334cfae85f9694f63ca60c2aceaf
        $xStr = "SELECT " .
                "*" .
                " FROM tabel_menu WHERE judul_menu like  '%" . $xtabel_menu . "%'";
        $query = $this->db->query($xStr);
        return $query;
    }

    // GET_LISTtabel_menu
    function getListtabel_menu() {
<<<<<<< HEAD
        $xStr = "SELECT id,".
 "judul_menu,".
 "link,".
 "icon,".
 "is_main_menu from tabel_menu";
        $query = $this->db->query($xStr);
        
=======
        $xStr = "SELECT id," .
                "judul_menu," .
                "link," .
                "icon," .
                "is_main_menu from tabel_menu";
        $query = $this->db->query($xStr);

>>>>>>> 15dd86578eaa334cfae85f9694f63ca60c2aceaf
        return $query;
    }

    // GET_Detailtabel_menu
    function getDetailtabel_menu($xid) {
<<<<<<< HEAD
        $xStr = "SELECT id,".
 "judul_menu,".
 "link,".
 "icon,".
 "is_main_menu from tabel_menu WHERE id = '". $xid ."'";
=======
        $xStr = "SELECT id," .
                "judul_menu," .
                "link," .
                "icon," .
                "is_main_menu from tabel_menu WHERE id = '" . $xid . "'";
>>>>>>> 15dd86578eaa334cfae85f9694f63ca60c2aceaf
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_tabel_menu
<<<<<<< HEAD
    function Inserttabel_menu($xid,$xjudul_menu,$xlink,$xicon,$xis_main_menu) {
        $xStr = " INSERT INTO tabel_menu( id,".
 "judul_menu,".
 "link,".
 "icon,".
 "is_main_menu ) VALUES ( '" . $xid
 . "','" .$xjudul_menu
 . "','" .$xlink
 . "','" .$xicon
 . "','" .$xis_main_menu. "')";
        $query = $this->db->query($xStr);
        return $xid; 
    }

    // updatetabel_menu
    function Updatetabel_menu($xid,$xjudul_menu,$xlink,$xicon,$xis_main_menu) {
        $xStr = " UPDATE tabel_menu SET " . 
		"id= '". $xid . "'," . 
		"judul_menu= '". $xjudul_menu . "'," . 
		"link= '". $xlink . "'," . 
		"icon= '". $xicon . "'," . 
		"is_main_menu= '". $xis_main_menu . "'" . " WHERE id = '". $xid ."'";
 $query = $this->db->query($xStr);
=======
    function Inserttabel_menu($xid, $xjudul_menu, $xlink, $xicon, $xis_main_menu) {
        $xStr = " INSERT INTO tabel_menu( id," .
                "judul_menu," .
                "link," .
                "icon," .
                "is_main_menu ) VALUES ( '" . $xid
                . "','" . $xjudul_menu
                . "','" . $xlink
                . "','" . $xicon
                . "','" . $xis_main_menu . "')";
        $query = $this->db->query($xStr);
        return $xid;
    }

    // updatetabel_menu
    function Updatetabel_menu($xid, $xjudul_menu, $xlink, $xicon, $xis_main_menu) {
        $xStr = " UPDATE tabel_menu SET " .
                "id= '" . $xid . "'," .
                "judul_menu= '" . $xjudul_menu . "'," .
                "link= '" . $xlink . "'," .
                "icon= '" . $xicon . "'," .
                "is_main_menu= '" . $xis_main_menu . "'" . " WHERE id = '" . $xid . "'";
        $query = $this->db->query($xStr);
>>>>>>> 15dd86578eaa334cfae85f9694f63ca60c2aceaf
        return $xid;
    }

    // delettabel_menu
    function Delettabel_menu($xid) {
        $xStr = " DELETE FROM tabel_menu WHERE tabel_menu.id = '" . $xid . "'";
        $query = $this->db->query($xStr);
    }
<<<<<<< HEAD
function getLastIndextabel_menu(){ 
        $xStr = "SELECT id,".
 "judul_menu,".
 "link,".
 "icon,".
 "is_main_menu from tabel_menu order by idx DESC limit 1 ";
=======

    function getLastIndextabel_menu() {
        $xStr = "SELECT id," .
                "judul_menu," .
                "link," .
                "icon," .
                "is_main_menu from tabel_menu order by idx DESC limit 1 ";
>>>>>>> 15dd86578eaa334cfae85f9694f63ca60c2aceaf
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // get all
<<<<<<< HEAD
    function get_all()
    {
=======
    function get_all() {
>>>>>>> 15dd86578eaa334cfae85f9694f63ca60c2aceaf
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
<<<<<<< HEAD
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('judul_menu', $q);
	$this->db->or_like('link', $q);
	$this->db->or_like('icon', $q);
	$this->db->or_like('is_main_menu', $q);
	$this->db->from($this->table);
=======
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
        $this->db->or_like('judul_menu', $q);
        $this->db->or_like('link', $q);
        $this->db->or_like('icon', $q);
        $this->db->or_like('is_main_menu', $q);
        $this->db->from($this->table);
>>>>>>> 15dd86578eaa334cfae85f9694f63ca60c2aceaf
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
<<<<<<< HEAD
	$this->db->or_like('judul_menu', $q);
	$this->db->or_like('link', $q);
	$this->db->or_like('icon', $q);
	$this->db->or_like('is_main_menu', $q);
	$this->db->limit($limit, $start);
=======
        $this->db->or_like('judul_menu', $q);
        $this->db->or_like('link', $q);
        $this->db->or_like('icon', $q);
        $this->db->or_like('is_main_menu', $q);
        $this->db->limit($limit, $start);
>>>>>>> 15dd86578eaa334cfae85f9694f63ca60c2aceaf
        return $this->db->get($this->table)->result();
    }

    // insert data
<<<<<<< HEAD
    function insert($data)
    {
=======
    function insert($data) {
>>>>>>> 15dd86578eaa334cfae85f9694f63ca60c2aceaf
        $this->db->insert($this->table, $data);
    }

    // update data
<<<<<<< HEAD
    function update($id, $data)
    {
=======
    function update($id, $data) {
>>>>>>> 15dd86578eaa334cfae85f9694f63ca60c2aceaf
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
<<<<<<< HEAD
    function delete($id)
    {
=======
    function delete($id) {
>>>>>>> 15dd86578eaa334cfae85f9694f63ca60c2aceaf
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
<<<<<<< HEAD

=======
>>>>>>> 15dd86578eaa334cfae85f9694f63ca60c2aceaf
