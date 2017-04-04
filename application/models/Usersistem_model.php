<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usersistem_model extends CI_Model
{

    public $table = 'usersistem';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,npp,Nama,alamat,NoTelpon,user,password,statuspeg,photo,email,ym,isaktif,idusergroup,idkabupaten,idpropinsi,imehp');
        $this->datatables->from('usersistem');
        //add this line for join
        //$this->datatables->join('table2', 'usersistem.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('usersistem/read/$1'),'Read')." | ".anchor(site_url('usersistem/update/$1'),'Update')." | ".anchor(site_url('usersistem/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTusersistem
    function getListusersistem() {
        $xStr = "SELECT idx,".
 "npp,".
 "Nama,".
 "alamat,".
 "NoTelpon,".
 "user,".
 "password,".
 "statuspeg,".
 "photo,".
 "email,".
 "ym,".
 "isaktif,".
 "idusergroup,".
 "idkabupaten,".
 "idpropinsi,".
 "imehp from usersistem";
        $query = $this->db->query($xStr);
        
        return $query;
    }

    // GET_Detailusersistem
    function getDetailusersistem($xidx) {
        $xStr = "SELECT idx,".
 "npp,".
 "Nama,".
 "alamat,".
 "NoTelpon,".
 "user,".
 "password,".
 "statuspeg,".
 "photo,".
 "email,".
 "ym,".
 "isaktif,".
 "idusergroup,".
 "idkabupaten,".
 "idpropinsi,".
 "imehp from usersistem WHERE idx = '". $xidx ."'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_usersistem
    function Insertusersistem($xidx,$xnpp,$xNama,$xalamat,$xNoTelpon,$xuser,$xpassword,$xstatuspeg,$xphoto,$xemail,$xym,$xisaktif,$xidusergroup,$xidkabupaten,$xidpropinsi,$ximehp) {
        $xStr = " INSERT INTO usersistem( idx,".
 "npp,".
 "Nama,".
 "alamat,".
 "NoTelpon,".
 "user,".
 "password,".
 "statuspeg,".
 "photo,".
 "email,".
 "ym,".
 "isaktif,".
 "idusergroup,".
 "idkabupaten,".
 "idpropinsi,".
 "imehp ) VALUES ( '" . $xidx
 . "','" .$xnpp
 . "','" .$xNama
 . "','" .$xalamat
 . "','" .$xNoTelpon
 . "','" .$xuser
 . "','" .$xpassword
 . "','" .$xstatuspeg
 . "','" .$xphoto
 . "','" .$xemail
 . "','" .$xym
 . "','" .$xisaktif
 . "','" .$xidusergroup
 . "','" .$xidkabupaten
 . "','" .$xidpropinsi
 . "','" .$ximehp. "')";
        $query = $this->db->query($xStr);
        return $xidx; 
    }

    // updateusersistem
    function Updateusersistem($xidx,$xnpp,$xNama,$xalamat,$xNoTelpon,$xuser,$xpassword,$xstatuspeg,$xphoto,$xemail,$xym,$xisaktif,$xidusergroup,$xidkabupaten,$xidpropinsi,$ximehp) {
        $xStr = " UPDATE produk SET " . 
		"idx= '". $xidx . "'," . 
		"npp= '". $xnpp . "'," . 
		"Nama= '". $xNama . "'," . 
		"alamat= '". $xalamat . "'," . 
		"NoTelpon= '". $xNoTelpon . "'," . 
		"user= '". $xuser . "'," . 
		"password= '". $xpassword . "'," . 
		"statuspeg= '". $xstatuspeg . "'," . 
		"photo= '". $xphoto . "'," . 
		"email= '". $xemail . "'," . 
		"ym= '". $xym . "'," . 
		"isaktif= '". $xisaktif . "'," . 
		"idusergroup= '". $xidusergroup . "'," . 
		"idkabupaten= '". $xidkabupaten . "'," . 
		"idpropinsi= '". $xidpropinsi . "'," . 
		"imehp= '". $ximehp . "'," . "' WHERE idx = '". $xidx ."'";
 $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletusersistem
    function Deletusersistem($xidx) {
        $xStr = " DELETE FROM usersistem WHERE usersistem.idx = '" . $xidx . "'";
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
	$this->db->or_like('npp', $q);
	$this->db->or_like('Nama', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('NoTelpon', $q);
	$this->db->or_like('user', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('statuspeg', $q);
	$this->db->or_like('photo', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('ym', $q);
	$this->db->or_like('isaktif', $q);
	$this->db->or_like('idusergroup', $q);
	$this->db->or_like('idkabupaten', $q);
	$this->db->or_like('idpropinsi', $q);
	$this->db->or_like('imehp', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
	$this->db->or_like('npp', $q);
	$this->db->or_like('Nama', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('NoTelpon', $q);
	$this->db->or_like('user', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('statuspeg', $q);
	$this->db->or_like('photo', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('ym', $q);
	$this->db->or_like('isaktif', $q);
	$this->db->or_like('idusergroup', $q);
	$this->db->or_like('idkabupaten', $q);
	$this->db->or_like('idpropinsi', $q);
	$this->db->or_like('imehp', $q);
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

