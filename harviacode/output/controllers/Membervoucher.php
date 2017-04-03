<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Membervoucher extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Membervoucher_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'membervoucher/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'membervoucher/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'membervoucher/index.html';
            $config['first_url'] = base_url() . 'membervoucher/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Membervoucher_model->total_rows($q);
        $membervoucher = $this->Membervoucher_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'membervoucher_data' => $membervoucher,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('membervoucher/membervoucher_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Membervoucher_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idmember' => $row->idmember,
		'idvoucher' => $row->idvoucher,
		'idproduk' => $row->idproduk,
		'tglpakai' => $row->tglpakai,
		'isdipakai' => $row->isdipakai,
		'idjenisvoucher' => $row->idjenisvoucher,
		'idreveral' => $row->idreveral,
		'isdipakaireveral' => $row->isdipakaireveral,
	    );
            $this->load->view('membervoucher/membervoucher_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('membervoucher'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('membervoucher/create_action'),
	    'idx' => set_value('idx'),
	    'idmember' => set_value('idmember'),
	    'idvoucher' => set_value('idvoucher'),
	    'idproduk' => set_value('idproduk'),
	    'tglpakai' => set_value('tglpakai'),
	    'isdipakai' => set_value('isdipakai'),
	    'idjenisvoucher' => set_value('idjenisvoucher'),
	    'idreveral' => set_value('idreveral'),
	    'isdipakaireveral' => set_value('isdipakaireveral'),
	);
        $this->load->view('membervoucher/membervoucher_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idmember' => $this->input->post('idmember',TRUE),
		'idvoucher' => $this->input->post('idvoucher',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'tglpakai' => $this->input->post('tglpakai',TRUE),
		'isdipakai' => $this->input->post('isdipakai',TRUE),
		'idjenisvoucher' => $this->input->post('idjenisvoucher',TRUE),
		'idreveral' => $this->input->post('idreveral',TRUE),
		'isdipakaireveral' => $this->input->post('isdipakaireveral',TRUE),
	    );

            $this->Membervoucher_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('membervoucher'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Membervoucher_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('membervoucher/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idmember' => set_value('idmember', $row->idmember),
		'idvoucher' => set_value('idvoucher', $row->idvoucher),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'tglpakai' => set_value('tglpakai', $row->tglpakai),
		'isdipakai' => set_value('isdipakai', $row->isdipakai),
		'idjenisvoucher' => set_value('idjenisvoucher', $row->idjenisvoucher),
		'idreveral' => set_value('idreveral', $row->idreveral),
		'isdipakaireveral' => set_value('isdipakaireveral', $row->isdipakaireveral),
	    );
            $this->load->view('membervoucher/membervoucher_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('membervoucher'));
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
		'idvoucher' => $this->input->post('idvoucher',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'tglpakai' => $this->input->post('tglpakai',TRUE),
		'isdipakai' => $this->input->post('isdipakai',TRUE),
		'idjenisvoucher' => $this->input->post('idjenisvoucher',TRUE),
		'idreveral' => $this->input->post('idreveral',TRUE),
		'isdipakaireveral' => $this->input->post('isdipakaireveral',TRUE),
	    );

            $this->Membervoucher_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('membervoucher'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Membervoucher_model->get_by_id($id);

        if ($row) {
            $this->Membervoucher_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('membervoucher'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('membervoucher'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('idvoucher', 'idvoucher', 'trim|required');
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('tglpakai', 'tglpakai', 'trim|required');
	$this->form_validation->set_rules('isdipakai', 'isdipakai', 'trim|required');
	$this->form_validation->set_rules('idjenisvoucher', 'idjenisvoucher', 'trim|required');
	$this->form_validation->set_rules('idreveral', 'idreveral', 'trim|required');
	$this->form_validation->set_rules('isdipakaireveral', 'isdipakaireveral', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Membervoucher.php */
/* Location: ./application/controllers/Membervoucher.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-01 17:35:30 */
/* http://harviacode.com */