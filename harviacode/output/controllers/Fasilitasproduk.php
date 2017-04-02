<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fasilitasproduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Fasilitasproduk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'fasilitasproduk/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'fasilitasproduk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'fasilitasproduk/index.html';
            $config['first_url'] = base_url() . 'fasilitasproduk/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Fasilitasproduk_model->total_rows($q);
        $fasilitasproduk = $this->Fasilitasproduk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'fasilitasproduk_data' => $fasilitasproduk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('fasilitasproduk/fasilitasproduk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Fasilitasproduk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idjenisfasilitas' => $row->idjenisfasilitas,
		'idproduk' => $row->idproduk,
		'tglinsert' => $row->tglinsert,
		'idmemberinsert' => $row->idmemberinsert,
	    );
            $this->load->view('fasilitasproduk/fasilitasproduk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fasilitasproduk'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('fasilitasproduk/create_action'),
	    'idx' => set_value('idx'),
	    'idjenisfasilitas' => set_value('idjenisfasilitas'),
	    'idproduk' => set_value('idproduk'),
	    'tglinsert' => set_value('tglinsert'),
	    'idmemberinsert' => set_value('idmemberinsert'),
	);
        $this->load->view('fasilitasproduk/fasilitasproduk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idjenisfasilitas' => $this->input->post('idjenisfasilitas',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'idmemberinsert' => $this->input->post('idmemberinsert',TRUE),
	    );

            $this->Fasilitasproduk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('fasilitasproduk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Fasilitasproduk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('fasilitasproduk/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idjenisfasilitas' => set_value('idjenisfasilitas', $row->idjenisfasilitas),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'tglinsert' => set_value('tglinsert', $row->tglinsert),
		'idmemberinsert' => set_value('idmemberinsert', $row->idmemberinsert),
	    );
            $this->load->view('fasilitasproduk/fasilitasproduk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fasilitasproduk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'idjenisfasilitas' => $this->input->post('idjenisfasilitas',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'idmemberinsert' => $this->input->post('idmemberinsert',TRUE),
	    );

            $this->Fasilitasproduk_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('fasilitasproduk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Fasilitasproduk_model->get_by_id($id);

        if ($row) {
            $this->Fasilitasproduk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('fasilitasproduk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fasilitasproduk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idjenisfasilitas', 'idjenisfasilitas', 'trim|required');
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('tglinsert', 'tglinsert', 'trim|required');
	$this->form_validation->set_rules('idmemberinsert', 'idmemberinsert', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Fasilitasproduk.php */
/* Location: ./application/controllers/Fasilitasproduk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-01 17:35:27 */
/* http://harviacode.com */