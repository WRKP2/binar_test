<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaksi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi/index.html';
            $config['first_url'] = base_url() . 'transaksi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Transaksi_model->total_rows($q);
        $transaksi = $this->Transaksi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'transaksi_data' => $transaksi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('transaksi/transaksi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idbooking' => $row->idbooking,
		'tglbooking' => $row->tglbooking,
		'tglbatalbooking' => $row->tglbatalbooking,
		'keteranganbatal' => $row->keteranganbatal,
		'harganormal' => $row->harganormal,
		'hargadiscount' => $row->hargadiscount,
		'idvoucher' => $row->idvoucher,
		'idmember' => $row->idmember,
		'idpegawai' => $row->idpegawai,
		'spesialrequest' => $row->spesialrequest,
		'tglupdate' => $row->tglupdate,
		'idjenisbayar' => $row->idjenisbayar,
		'tglbayar' => $row->tglbayar,
		'hargadibayar' => $row->hargadibayar,
		'isfinal' => $row->isfinal,
		'nominalvoucher' => $row->nominalvoucher,
	    );
            $this->load->view('transaksi/transaksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi/create_action'),
	    'idx' => set_value('idx'),
	    'idbooking' => set_value('idbooking'),
	    'tglbooking' => set_value('tglbooking'),
	    'tglbatalbooking' => set_value('tglbatalbooking'),
	    'keteranganbatal' => set_value('keteranganbatal'),
	    'harganormal' => set_value('harganormal'),
	    'hargadiscount' => set_value('hargadiscount'),
	    'idvoucher' => set_value('idvoucher'),
	    'idmember' => set_value('idmember'),
	    'idpegawai' => set_value('idpegawai'),
	    'spesialrequest' => set_value('spesialrequest'),
	    'tglupdate' => set_value('tglupdate'),
	    'idjenisbayar' => set_value('idjenisbayar'),
	    'tglbayar' => set_value('tglbayar'),
	    'hargadibayar' => set_value('hargadibayar'),
	    'isfinal' => set_value('isfinal'),
	    'nominalvoucher' => set_value('nominalvoucher'),
	);
        $this->load->view('transaksi/transaksi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idbooking' => $this->input->post('idbooking',TRUE),
		'tglbooking' => $this->input->post('tglbooking',TRUE),
		'tglbatalbooking' => $this->input->post('tglbatalbooking',TRUE),
		'keteranganbatal' => $this->input->post('keteranganbatal',TRUE),
		'harganormal' => $this->input->post('harganormal',TRUE),
		'hargadiscount' => $this->input->post('hargadiscount',TRUE),
		'idvoucher' => $this->input->post('idvoucher',TRUE),
		'idmember' => $this->input->post('idmember',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
		'spesialrequest' => $this->input->post('spesialrequest',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'idjenisbayar' => $this->input->post('idjenisbayar',TRUE),
		'tglbayar' => $this->input->post('tglbayar',TRUE),
		'hargadibayar' => $this->input->post('hargadibayar',TRUE),
		'isfinal' => $this->input->post('isfinal',TRUE),
		'nominalvoucher' => $this->input->post('nominalvoucher',TRUE),
	    );

            $this->Transaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idbooking' => set_value('idbooking', $row->idbooking),
		'tglbooking' => set_value('tglbooking', $row->tglbooking),
		'tglbatalbooking' => set_value('tglbatalbooking', $row->tglbatalbooking),
		'keteranganbatal' => set_value('keteranganbatal', $row->keteranganbatal),
		'harganormal' => set_value('harganormal', $row->harganormal),
		'hargadiscount' => set_value('hargadiscount', $row->hargadiscount),
		'idvoucher' => set_value('idvoucher', $row->idvoucher),
		'idmember' => set_value('idmember', $row->idmember),
		'idpegawai' => set_value('idpegawai', $row->idpegawai),
		'spesialrequest' => set_value('spesialrequest', $row->spesialrequest),
		'tglupdate' => set_value('tglupdate', $row->tglupdate),
		'idjenisbayar' => set_value('idjenisbayar', $row->idjenisbayar),
		'tglbayar' => set_value('tglbayar', $row->tglbayar),
		'hargadibayar' => set_value('hargadibayar', $row->hargadibayar),
		'isfinal' => set_value('isfinal', $row->isfinal),
		'nominalvoucher' => set_value('nominalvoucher', $row->nominalvoucher),
	    );
            $this->load->view('transaksi/transaksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'idbooking' => $this->input->post('idbooking',TRUE),
		'tglbooking' => $this->input->post('tglbooking',TRUE),
		'tglbatalbooking' => $this->input->post('tglbatalbooking',TRUE),
		'keteranganbatal' => $this->input->post('keteranganbatal',TRUE),
		'harganormal' => $this->input->post('harganormal',TRUE),
		'hargadiscount' => $this->input->post('hargadiscount',TRUE),
		'idvoucher' => $this->input->post('idvoucher',TRUE),
		'idmember' => $this->input->post('idmember',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
		'spesialrequest' => $this->input->post('spesialrequest',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'idjenisbayar' => $this->input->post('idjenisbayar',TRUE),
		'tglbayar' => $this->input->post('tglbayar',TRUE),
		'hargadibayar' => $this->input->post('hargadibayar',TRUE),
		'isfinal' => $this->input->post('isfinal',TRUE),
		'nominalvoucher' => $this->input->post('nominalvoucher',TRUE),
	    );

            $this->Transaksi_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idbooking', 'idbooking', 'trim|required');
	$this->form_validation->set_rules('tglbooking', 'tglbooking', 'trim|required');
	$this->form_validation->set_rules('tglbatalbooking', 'tglbatalbooking', 'trim|required');
	$this->form_validation->set_rules('keteranganbatal', 'keteranganbatal', 'trim|required');
	$this->form_validation->set_rules('harganormal', 'harganormal', 'trim|required');
	$this->form_validation->set_rules('hargadiscount', 'hargadiscount', 'trim|required');
	$this->form_validation->set_rules('idvoucher', 'idvoucher', 'trim|required');
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('idpegawai', 'idpegawai', 'trim|required');
	$this->form_validation->set_rules('spesialrequest', 'spesialrequest', 'trim|required');
	$this->form_validation->set_rules('tglupdate', 'tglupdate', 'trim|required');
	$this->form_validation->set_rules('idjenisbayar', 'idjenisbayar', 'trim|required');
	$this->form_validation->set_rules('tglbayar', 'tglbayar', 'trim|required');
	$this->form_validation->set_rules('hargadibayar', 'hargadibayar', 'trim|required');
	$this->form_validation->set_rules('isfinal', 'isfinal', 'trim|required');
	$this->form_validation->set_rules('nominalvoucher', 'nominalvoucher', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-01 17:35:32 */
/* http://harviacode.com */