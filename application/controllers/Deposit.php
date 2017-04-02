<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Deposit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Deposit_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'deposit/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'deposit/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'deposit/index.html';
            $config['first_url'] = base_url() . 'deposit/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Deposit_model->total_rows($q);
        $deposit = $this->Deposit_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'deposit_data' => $deposit,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('deposit/deposit_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Deposit_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idmember' => $row->idmember,
		'tgltrx' => $row->tgltrx,
		'saldoawal' => $row->saldoawal,
		'saldomasuk' => $row->saldomasuk,
		'saldokeluar' => $row->saldokeluar,
		'saldoakhir' => $row->saldoakhir,
		'keterangansistem' => $row->keterangansistem,
	    );
            $this->load->view('deposit/deposit_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('deposit'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('deposit/create_action'),
	    'idx' => set_value('idx'),
	    'idmember' => set_value('idmember'),
	    'tgltrx' => set_value('tgltrx'),
	    'saldoawal' => set_value('saldoawal'),
	    'saldomasuk' => set_value('saldomasuk'),
	    'saldokeluar' => set_value('saldokeluar'),
	    'saldoakhir' => set_value('saldoakhir'),
	    'keterangansistem' => set_value('keterangansistem'),
	);
        $this->load->view('deposit/deposit_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idmember' => $this->input->post('idmember',TRUE),
		'tgltrx' => $this->input->post('tgltrx',TRUE),
		'saldoawal' => $this->input->post('saldoawal',TRUE),
		'saldomasuk' => $this->input->post('saldomasuk',TRUE),
		'saldokeluar' => $this->input->post('saldokeluar',TRUE),
		'saldoakhir' => $this->input->post('saldoakhir',TRUE),
		'keterangansistem' => $this->input->post('keterangansistem',TRUE),
	    );

            $this->Deposit_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('deposit'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Deposit_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('deposit/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idmember' => set_value('idmember', $row->idmember),
		'tgltrx' => set_value('tgltrx', $row->tgltrx),
		'saldoawal' => set_value('saldoawal', $row->saldoawal),
		'saldomasuk' => set_value('saldomasuk', $row->saldomasuk),
		'saldokeluar' => set_value('saldokeluar', $row->saldokeluar),
		'saldoakhir' => set_value('saldoakhir', $row->saldoakhir),
		'keterangansistem' => set_value('keterangansistem', $row->keterangansistem),
	    );
            $this->load->view('deposit/deposit_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('deposit'));
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
		'tgltrx' => $this->input->post('tgltrx',TRUE),
		'saldoawal' => $this->input->post('saldoawal',TRUE),
		'saldomasuk' => $this->input->post('saldomasuk',TRUE),
		'saldokeluar' => $this->input->post('saldokeluar',TRUE),
		'saldoakhir' => $this->input->post('saldoakhir',TRUE),
		'keterangansistem' => $this->input->post('keterangansistem',TRUE),
	    );

            $this->Deposit_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('deposit'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Deposit_model->get_by_id($id);

        if ($row) {
            $this->Deposit_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('deposit'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('deposit'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('tgltrx', 'tgltrx', 'trim|required');
	$this->form_validation->set_rules('saldoawal', 'saldoawal', 'trim|required');
	$this->form_validation->set_rules('saldomasuk', 'saldomasuk', 'trim|required');
	$this->form_validation->set_rules('saldokeluar', 'saldokeluar', 'trim|required');
	$this->form_validation->set_rules('saldoakhir', 'saldoakhir', 'trim|required');
	$this->form_validation->set_rules('keterangansistem', 'keterangansistem', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Deposit.php */
/* Location: ./application/controllers/Deposit.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-02 15:37:07 */
/* http://harviacode.com */