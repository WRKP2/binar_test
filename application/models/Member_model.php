<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member_model extends CI_Model {

    public $table = 'member';
    public $id = 'idx';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('idx,Nama,Alamat,NoTelpon,idtoken,email,tglinsert,isblokir,idjenismember,password,photoUrl,tokenmember');
        $this->datatables->from('member');
        //add this line for join
        //$this->datatables->join('table2', 'member.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('member/read/$1'), 'Read') . " | " . anchor(site_url('member/update/$1'), 'Update') . " | " . anchor(site_url('member/delete/$1'), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'idx');
        return $this->datatables->generate();
    }

    // GET_LISTmember
    function getListmember() {
        $xStr = "SELECT idx," .
                "Nama," .
                "Alamat," .
                "NoTelpon," .
                "idtoken," .
                "email," .
                "tglinsert," .
                "isblokir," .
                "idjenismember," .
                "password," .
                "photoUrl," .
                "tokenmember from member";
        $query = $this->db->query($xStr);

        return $query;
    }

    // GET_Detailmember
    function getDetailmember($xidx) {
        $xStr = "SELECT idx," .
                "Nama," .
                "Alamat," .
                "NoTelpon," .
                "idtoken," .
                "email," .
                "tglinsert," .
                "isblokir," .
                "idjenismember," .
                "password," .
                "photoUrl," .
                "tokenmember from member WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        $row = $query->row();
        return $row;
    }

    // Insert_member
    function Insertmember($xidx, $xNama, $xAlamat, $xNoTelpon, $xidtoken, $xemail, $xtglinsert, $xisblokir, $xidjenismember, $xpassword, $xphotoUrl, $xtokenmember) {
        $xStr = " INSERT INTO member( idx," .
                "Nama," .
                "Alamat," .
                "NoTelpon," .
                "idtoken," .
                "email," .
                "tglinsert," .
                "isblokir," .
                "idjenismember," .
                "password," .
                "photoUrl," .
                "tokenmember ) VALUES ( '" . $xidx
                . "','" . $xNama
                . "','" . $xAlamat
                . "','" . $xNoTelpon
                . "','" . $xidtoken
                . "','" . $xemail
                . "','" . $xtglinsert
                . "','" . $xisblokir
                . "','" . $xidjenismember
                . "','" . $xpassword
                . "','" . $xphotoUrl
                . "','" . $xtokenmember . "')";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    // updatemember
    function Updatemember($xidx, $xNama, $xAlamat, $xNoTelpon, $xidtoken, $xemail, $xtglinsert, $xisblokir, $xidjenismember, $xpassword, $xphotoUrl, $xtokenmember) {
        $xStr = " UPDATE produk SET " .
                "idx= '" . $xidx . "'," .
                "Nama= '" . $xNama . "'," .
                "Alamat= '" . $xAlamat . "'," .
                "NoTelpon= '" . $xNoTelpon . "'," .
                "idtoken= '" . $xidtoken . "'," .
                "email= '" . $xemail . "'," .
                "tglinsert= '" . $xtglinsert . "'," .
                "isblokir= '" . $xisblokir . "'," .
                "idjenismember= '" . $xidjenismember . "'," .
                "password= '" . $xpassword . "'," .
                "photoUrl= '" . $xphotoUrl . "'," .
                "tokenmember= '" . $xtokenmember . "'," . "' WHERE idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
        return $xidx;
    }

    // deletmember
    function Deletmember($xidx) {
        $xStr = " DELETE FROM member WHERE member.idx = '" . $xidx . "'";
        $query = $this->db->query($xStr);
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
        $this->db->like('idx', $q);
        $this->db->or_like('Nama', $q);
        $this->db->or_like('Alamat', $q);
        $this->db->or_like('NoTelpon', $q);
        $this->db->or_like('idtoken', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('tglinsert', $q);
        $this->db->or_like('isblokir', $q);
        $this->db->or_like('idjenismember', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('photoUrl', $q);
        $this->db->or_like('tokenmember', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idx', $q);
        $this->db->or_like('Nama', $q);
        $this->db->or_like('Alamat', $q);
        $this->db->or_like('NoTelpon', $q);
        $this->db->or_like('idtoken', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('tglinsert', $q);
        $this->db->or_like('isblokir', $q);
        $this->db->or_like('idjenismember', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('photoUrl', $q);
        $this->db->or_like('tokenmember', $q);
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
