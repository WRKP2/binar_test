<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inboxfcm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Inboxfcm_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'inboxfcm/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'inboxfcm/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'inboxfcm/index.html';
            $config['first_url'] = base_url() . 'inboxfcm/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Inboxfcm_model->total_rows($q);
        $inboxfcm = $this->Inboxfcm_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'inboxfcm_data' => $inboxfcm,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('inboxfcm/inboxfcm_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Inboxfcm_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idmember' => $row->idmember,
		'judul' => $row->judul,
		'message' => $row->message,
		'tglmessage' => $row->tglmessage,
		'isterbaca' => $row->isterbaca,
		'idmenuandroid' => $row->idmenuandroid,
	    );
            $this->load->view('inboxfcm/inboxfcm_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('inboxfcm'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('inboxfcm/create_action'),
	    'idx' => set_value('idx'),
	    'idmember' => set_value('idmember'),
	    'judul' => set_value('judul'),
	    'message' => set_value('message'),
	    'tglmessage' => set_value('tglmessage'),
	    'isterbaca' => set_value('isterbaca'),
	    'idmenuandroid' => set_value('idmenuandroid'),
	);
        $this->load->view('inboxfcm/inboxfcm_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idmember' => $this->input->post('idmember',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'message' => $this->input->post('message',TRUE),
		'tglmessage' => $this->input->post('tglmessage',TRUE),
		'isterbaca' => $this->input->post('isterbaca',TRUE),
		'idmenuandroid' => $this->input->post('idmenuandroid',TRUE),
	    );

            $this->Inboxfcm_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('inboxfcm'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Inboxfcm_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('inboxfcm/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idmember' => set_value('idmember', $row->idmember),
		'judul' => set_value('judul', $row->judul),
		'message' => set_value('message', $row->message),
		'tglmessage' => set_value('tglmessage', $row->tglmessage),
		'isterbaca' => set_value('isterbaca', $row->isterbaca),
		'idmenuandroid' => set_value('idmenuandroid', $row->idmenuandroid),
	    );
            $this->load->view('inboxfcm/inboxfcm_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('inboxfcm'));
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
		'judul' => $this->input->post('judul',TRUE),
		'message' => $this->input->post('message',TRUE),
		'tglmessage' => $this->input->post('tglmessage',TRUE),
		'isterbaca' => $this->input->post('isterbaca',TRUE),
		'idmenuandroid' => $this->input->post('idmenuandroid',TRUE),
	    );

            $this->Inboxfcm_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('inboxfcm'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Inboxfcm_model->get_by_id($id);

        if ($row) {
            $this->Inboxfcm_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('inboxfcm'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('inboxfcm'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('message', 'message', 'trim|required');
	$this->form_validation->set_rules('tglmessage', 'tglmessage', 'trim|required');
	$this->form_validation->set_rules('isterbaca', 'isterbaca', 'trim|required');
	$this->form_validation->set_rules('idmenuandroid', 'idmenuandroid', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Inboxfcm.php */
/* Location: ./application/controllers/Inboxfcm.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-01 17:35:28 */
/* http://harviacode.com */