<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logdelrecord extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Logdelrecord_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'logdelrecord/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'logdelrecord/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'logdelrecord/index.html';
            $config['first_url'] = base_url() . 'logdelrecord/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Logdelrecord_model->total_rows($q);
        $logdelrecord = $this->Logdelrecord_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'logdelrecord_data' => $logdelrecord,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('logdelrecord/logdelrecord_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Logdelrecord_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idxhapus' => $row->idxhapus,
		'keterangan' => $row->keterangan,
		'nmtable' => $row->nmtable,
		'tgllog' => $row->tgllog,
		'ideksekusi' => $row->ideksekusi,
	    );
            $this->load->view('logdelrecord/logdelrecord_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('logdelrecord'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('logdelrecord/create_action'),
	    'idx' => set_value('idx'),
	    'idxhapus' => set_value('idxhapus'),
	    'keterangan' => set_value('keterangan'),
	    'nmtable' => set_value('nmtable'),
	    'tgllog' => set_value('tgllog'),
	    'ideksekusi' => set_value('ideksekusi'),
	);
        $this->load->view('logdelrecord/logdelrecord_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idxhapus' => $this->input->post('idxhapus',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'nmtable' => $this->input->post('nmtable',TRUE),
		'tgllog' => $this->input->post('tgllog',TRUE),
		'ideksekusi' => $this->input->post('ideksekusi',TRUE),
	    );

            $this->Logdelrecord_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('logdelrecord'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Logdelrecord_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('logdelrecord/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idxhapus' => set_value('idxhapus', $row->idxhapus),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'nmtable' => set_value('nmtable', $row->nmtable),
		'tgllog' => set_value('tgllog', $row->tgllog),
		'ideksekusi' => set_value('ideksekusi', $row->ideksekusi),
	    );
            $this->load->view('logdelrecord/logdelrecord_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('logdelrecord'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'idxhapus' => $this->input->post('idxhapus',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'nmtable' => $this->input->post('nmtable',TRUE),
		'tgllog' => $this->input->post('tgllog',TRUE),
		'ideksekusi' => $this->input->post('ideksekusi',TRUE),
	    );

            $this->Logdelrecord_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('logdelrecord'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Logdelrecord_model->get_by_id($id);

        if ($row) {
            $this->Logdelrecord_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('logdelrecord'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('logdelrecord'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idxhapus', 'idxhapus', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('nmtable', 'nmtable', 'trim|required');
	$this->form_validation->set_rules('tgllog', 'tgllog', 'trim|required');
	$this->form_validation->set_rules('ideksekusi', 'ideksekusi', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Logdelrecord.php */
/* Location: ./application/controllers/Logdelrecord.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-01 17:35:30 */
/* http://harviacode.com */