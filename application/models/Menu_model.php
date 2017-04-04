<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    public $table = 'menu';
    public $id = 'idmenu';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idmenu,nmmenu,tipemenu,idkomponen,iduser,parentmenu,urlci,urut,jmlgambar,settingform,idaplikasi,isumum');
        $this->datatables->from('menu');
        //add this line for join
        //$this->datatables->join('table2', 'menu.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('menu/read/$1'),'Read')." | ".anchor(site_url('menu/update/$1'),'Update')." | ".anchor(site_url('menu/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idmenu');
        return $this->datatables->generate();
    }

    // GET_LISTmenu
    function getListmenu() {
        $xStr = "SELECT idmenu,".
 "nmmenu,".
 "tipemenu,".
 "idkomponen,".
 "iduser,".
 "parentmenu,".
 "urlci,".
 "urut,".
 "jmlgambar,".
 "settingform,".
 "idaplikasi,".
 "isumum from menu";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailmenu
    function getDetailmenu($xidmenu) {
        $xStr = "SELECT idmenu,".
 "nmmenu,".
 "tipemenu,".
 "idkomponen,".
 "iduser,".
 "parentmenu,".
 "urlci,".
 "urut,".
 "jmlgambar,".
 "settingform,".
 "idaplikasi,".
 "isumum from menu WHERE idmenu = '". $xidmenu ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_menu
    function Insertmenu($xidmenu,$xnmmenu,$xtipemenu,$xidkomponen,$xiduser,$xparentmenu,$xurlci,$xurut,$xjmlgambar,$xsettingform,$xidaplikasi,$xisumum) {
        $xStr = " INSERT INTO menu( idmenu,".
 "nmmenu,".
 "tipemenu,".
 "idkomponen,".
 "iduser,".
 "parentmenu,".
 "urlci,".
 "urut,".
 "jmlgambar,".
 "settingform,".
 "idaplikasi,".
 "isumum ) VALUES ( '" . $xidmenu
 . "','" .$xnmmenu
 . "','" .$xtipemenu
 . "','" .$xidkomponen
 . "','" .$xiduser
 . "','" .$xparentmenu
 . "','" .$xurlci
 . "','" .$xurut
 . "','" .$xjmlgambar
 . "','" .$xsettingform
 . "','" .$xidaplikasi
 . "','" .$xisumum. "')";
        $query = $this->db->query($xStr);
        return $xidmenu; 
    }

    // updatemenu
    function Updatemenu($xidmenu,$xnmmenu,$xtipemenu,$xidkomponen,$xiduser,$xparentmenu,$xurlci,$xurut,$xjmlgambar,$xsettingform,$xidaplikasi,$xisumum) {
        $xStr = " UPDATE produk SET " . 
		"idmenu= '". $xidmenu . "'," . 
		"nmmenu= '". $xnmmenu . "'," . 
		"tipemenu= '". $xtipemenu . "'," . 
		"idkomponen= '". $xidkomponen . "'," . 
		"iduser= '". $xiduser . "'," . 
		"parentmenu= '". $xparentmenu . "'," . 
		"urlci= '". $xurlci . "'," . 
		"urut= '". $xurut . "'," . 
		"jmlgambar= '". $xjmlgambar . "'," . 
		"settingform= '". $xsettingform . "'," . 
		"idaplikasi= '". $xidaplikasi . "'," . 
		"isumum= '". $xisumum . "'," . "' WHERE idmenu = '". $xidmenu ."'";
 $query = $this->db->query($xStr);
        return $xidmenu;
    }

    // deletmenu
    function Deletmenu($xidmenu) {
        $xStr = " DELETE FROM menu WHERE menu.idmenu = '" . $xidmenu . "'";
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
        $this->db->like('idmenu', $q);
	$this->db->or_like('nmmenu', $q);
	$this->db->or_like('tipemenu', $q);
	$this->db->or_like('idkomponen', $q);
	$this->db->or_like('iduser', $q);
	$this->db->or_like('parentmenu', $q);
	$this->db->or_like('urlci', $q);
	$this->db->or_like('urut', $q);
	$this->db->or_like('jmlgambar', $q);
	$this->db->or_like('settingform', $q);
	$this->db->or_like('idaplikasi', $q);
	$this->db->or_like('isumum', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idmenu', $q);
	$this->db->or_like('nmmenu', $q);
	$this->db->or_like('tipemenu', $q);
	$this->db->or_like('idkomponen', $q);
	$this->db->or_like('iduser', $q);
	$this->db->or_like('parentmenu', $q);
	$this->db->or_like('urlci', $q);
	$this->db->or_like('urut', $q);
	$this->db->or_like('jmlgambar', $q);
	$this->db->or_like('settingform', $q);
	$this->db->or_like('idaplikasi', $q);
	$this->db->or_like('isumum', $q);
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

