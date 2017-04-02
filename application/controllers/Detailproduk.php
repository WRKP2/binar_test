<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detailproduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detailproduk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'detailproduk/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'detailproduk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'detailproduk/index.html';
            $config['first_url'] = base_url() . 'detailproduk/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Detailproduk_model->total_rows($q);
        $detailproduk = $this->Detailproduk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detailproduk_data' => $detailproduk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('detailproduk/detailproduk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Detailproduk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idproduk' => $row->idproduk,
		'idkategoriproduk' => $row->idkategoriproduk,
		'juduldetailproduk' => $row->juduldetailproduk,
		'diskripsiproduk' => $row->diskripsiproduk,
		'rate' => $row->rate,
		'ratediscount' => $row->ratediscount,
		'rancode' => $row->rancode,
		'tglinsert' => $row->tglinsert,
		'tglupdate' => $row->tglupdate,
		'idpegawai' => $row->idpegawai,
		'kapasitas' => $row->kapasitas,
		'standartpemakaian' => $row->standartpemakaian,
		'standart' => $row->standart,
		'idsatuan' => $row->idsatuan,
		'isfavorit' => $row->isfavorit,
		'idmember' => $row->idmember,
	    );
            $this->load->view('detailproduk/detailproduk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailproduk'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detailproduk/create_action'),
	    'idx' => set_value('idx'),
	    'idproduk' => set_value('idproduk'),
	    'idkategoriproduk' => set_value('idkategoriproduk'),
	    'juduldetailproduk' => set_value('juduldetailproduk'),
	    'diskripsiproduk' => set_value('diskripsiproduk'),
	    'rate' => set_value('rate'),
	    'ratediscount' => set_value('ratediscount'),
	    'rancode' => set_value('rancode'),
	    'tglinsert' => set_value('tglinsert'),
	    'tglupdate' => set_value('tglupdate'),
	    'idpegawai' => set_value('idpegawai'),
	    'kapasitas' => set_value('kapasitas'),
	    'standartpemakaian' => set_value('standartpemakaian'),
	    'standart' => set_value('standart'),
	    'idsatuan' => set_value('idsatuan'),
	    'isfavorit' => set_value('isfavorit'),
	    'idmember' => set_value('idmember'),
	);
        $this->load->view('detailproduk/detailproduk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idproduk' => $this->input->post('idproduk',TRUE),
		'idkategoriproduk' => $this->input->post('idkategoriproduk',TRUE),
		'juduldetailproduk' => $this->input->post('juduldetailproduk',TRUE),
		'diskripsiproduk' => $this->input->post('diskripsiproduk',TRUE),
		'rate' => $this->input->post('rate',TRUE),
		'ratediscount' => $this->input->post('ratediscount',TRUE),
		'rancode' => $this->input->post('rancode',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
		'kapasitas' => $this->input->post('kapasitas',TRUE),
		'standartpemakaian' => $this->input->post('standartpemakaian',TRUE),
		'standart' => $this->input->post('standart',TRUE),
		'idsatuan' => $this->input->post('idsatuan',TRUE),
		'isfavorit' => $this->input->post('isfavorit',TRUE),
		'idmember' => $this->input->post('idmember',TRUE),
	    );

            $this->Detailproduk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detailproduk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detailproduk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detailproduk/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'idkategoriproduk' => set_value('idkategoriproduk', $row->idkategoriproduk),
		'juduldetailproduk' => set_value('juduldetailproduk', $row->juduldetailproduk),
		'diskripsiproduk' => set_value('diskripsiproduk', $row->diskripsiproduk),
		'rate' => set_value('rate', $row->rate),
		'ratediscount' => set_value('ratediscount', $row->ratediscount),
		'rancode' => set_value('rancode', $row->rancode),
		'tglinsert' => set_value('tglinsert', $row->tglinsert),
		'tglupdate' => set_value('tglupdate', $row->tglupdate),
		'idpegawai' => set_value('idpegawai', $row->idpegawai),
		'kapasitas' => set_value('kapasitas', $row->kapasitas),
		'standartpemakaian' => set_value('standartpemakaian', $row->standartpemakaian),
		'standart' => set_value('standart', $row->standart),
		'idsatuan' => set_value('idsatuan', $row->idsatuan),
		'isfavorit' => set_value('isfavorit', $row->isfavorit),
		'idmember' => set_value('idmember', $row->idmember),
	    );
            $this->load->view('detailproduk/detailproduk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailproduk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'idproduk' => $this->input->post('idproduk',TRUE),
		'idkategoriproduk' => $this->input->post('idkategoriproduk',TRUE),
		'juduldetailproduk' => $this->input->post('juduldetailproduk',TRUE),
		'diskripsiproduk' => $this->input->post('diskripsiproduk',TRUE),
		'rate' => $this->input->post('rate',TRUE),
		'ratediscount' => $this->input->post('ratediscount',TRUE),
		'rancode' => $this->input->post('rancode',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
		'kapasitas' => $this->input->post('kapasitas',TRUE),
		'standartpemakaian' => $this->input->post('standartpemakaian',TRUE),
		'standart' => $this->input->post('standart',TRUE),
		'idsatuan' => $this->input->post('idsatuan',TRUE),
		'isfavorit' => $this->input->post('isfavorit',TRUE),
		'idmember' => $this->input->post('idmember',TRUE),
	    );

            $this->Detailproduk_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detailproduk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detailproduk_model->get_by_id($id);

        if ($row) {
            $this->Detailproduk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detailproduk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailproduk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('idkategoriproduk', 'idkategoriproduk', 'trim|required');
	$this->form_validation->set_rules('juduldetailproduk', 'juduldetailproduk', 'trim|required');
	$this->form_validation->set_rules('diskripsiproduk', 'diskripsiproduk', 'trim|required');
	$this->form_validation->set_rules('rate', 'rate', 'trim|required');
	$this->form_validation->set_rules('ratediscount', 'ratediscount', 'trim|required');
	$this->form_validation->set_rules('rancode', 'rancode', 'trim|required');
	$this->form_validation->set_rules('tglinsert', 'tglinsert', 'trim|required');
	$this->form_validation->set_rules('tglupdate', 'tglupdate', 'trim|required');
	$this->form_validation->set_rules('idpegawai', 'idpegawai', 'trim|required');
	$this->form_validation->set_rules('kapasitas', 'kapasitas', 'trim|required');
	$this->form_validation->set_rules('standartpemakaian', 'standartpemakaian', 'trim|required');
	$this->form_validation->set_rules('standart', 'standart', 'trim|required');
	$this->form_validation->set_rules('idsatuan', 'idsatuan', 'trim|required');
	$this->form_validation->set_rules('isfavorit', 'isfavorit', 'trim|required');
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Detailproduk.php */
/* Location: ./application/controllers/Detailproduk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-02 15:37:08 */
/* http://harviacode.com */