<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Marketingproduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Marketingproduk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'marketingproduk/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'marketingproduk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'marketingproduk/index.html';
            $config['first_url'] = base_url() . 'marketingproduk/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Marketingproduk_model->total_rows($q);
        $marketingproduk = $this->Marketingproduk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'marketingproduk_data' => $marketingproduk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('marketingproduk/marketingproduk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Marketingproduk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idmember' => $row->idmember,
		'idproduk' => $row->idproduk,
		'tgldaftar' => $row->tgldaftar,
	    );
            $this->load->view('marketingproduk/marketingproduk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('marketingproduk'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('marketingproduk/create_action'),
	    'idx' => set_value('idx'),
	    'idmember' => set_value('idmember'),
	    'idproduk' => set_value('idproduk'),
	    'tgldaftar' => set_value('tgldaftar'),
	);
        $this->load->view('marketingproduk/marketingproduk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idmember' => $this->input->post('idmember',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'tgldaftar' => $this->input->post('tgldaftar',TRUE),
	    );

            $this->Marketingproduk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('marketingproduk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Marketingproduk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('marketingproduk/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idmember' => set_value('idmember', $row->idmember),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'tgldaftar' => set_value('tgldaftar', $row->tgldaftar),
	    );
            $this->load->view('marketingproduk/marketingproduk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('marketingproduk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'idmember' => $this->input->post('idmember',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'tgldaftar' => $this->input->post('tgldaftar',TRUE),
	    );

            $this->Marketingproduk_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('marketingproduk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Marketingproduk_model->get_by_id($id);

        if ($row) {
            $this->Marketingproduk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('marketingproduk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('marketingproduk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('tgldaftar', 'tgldaftar', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Marketingproduk.php */
/* Location: ./application/controllers/Marketingproduk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-02 15:37:12 */
/* http://harviacode.com */