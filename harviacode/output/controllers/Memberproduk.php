<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Memberproduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Memberproduk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'memberproduk/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'memberproduk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'memberproduk/index.html';
            $config['first_url'] = base_url() . 'memberproduk/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Memberproduk_model->total_rows($q);
        $memberproduk = $this->Memberproduk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'memberproduk_data' => $memberproduk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('memberproduk/memberproduk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Memberproduk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idproduk' => $row->idproduk,
		'idmember' => $row->idmember,
		'tgljadimember' => $row->tgljadimember,
		'isfromrekomendasi' => $row->isfromrekomendasi,
		'idreveral' => $row->idreveral,
	    );
            $this->load->view('memberproduk/memberproduk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('memberproduk'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('memberproduk/create_action'),
	    'idx' => set_value('idx'),
	    'idproduk' => set_value('idproduk'),
	    'idmember' => set_value('idmember'),
	    'tgljadimember' => set_value('tgljadimember'),
	    'isfromrekomendasi' => set_value('isfromrekomendasi'),
	    'idreveral' => set_value('idreveral'),
	);
        $this->load->view('memberproduk/memberproduk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idproduk' => $this->input->post('idproduk',TRUE),
		'idmember' => $this->input->post('idmember',TRUE),
		'tgljadimember' => $this->input->post('tgljadimember',TRUE),
		'isfromrekomendasi' => $this->input->post('isfromrekomendasi',TRUE),
		'idreveral' => $this->input->post('idreveral',TRUE),
	    );

            $this->Memberproduk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('memberproduk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Memberproduk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('memberproduk/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'idmember' => set_value('idmember', $row->idmember),
		'tgljadimember' => set_value('tgljadimember', $row->tgljadimember),
		'isfromrekomendasi' => set_value('isfromrekomendasi', $row->isfromrekomendasi),
		'idreveral' => set_value('idreveral', $row->idreveral),
	    );
            $this->load->view('memberproduk/memberproduk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('memberproduk'));
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
		'idmember' => $this->input->post('idmember',TRUE),
		'tgljadimember' => $this->input->post('tgljadimember',TRUE),
		'isfromrekomendasi' => $this->input->post('isfromrekomendasi',TRUE),
		'idreveral' => $this->input->post('idreveral',TRUE),
	    );

            $this->Memberproduk_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('memberproduk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Memberproduk_model->get_by_id($id);

        if ($row) {
            $this->Memberproduk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('memberproduk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('memberproduk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('tgljadimember', 'tgljadimember', 'trim|required');
	$this->form_validation->set_rules('isfromrekomendasi', 'isfromrekomendasi', 'trim|required');
	$this->form_validation->set_rules('idreveral', 'idreveral', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Memberproduk.php */
/* Location: ./application/controllers/Memberproduk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-01 17:35:30 */
/* http://harviacode.com */