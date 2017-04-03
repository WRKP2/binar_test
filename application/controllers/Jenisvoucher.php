<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenisvoucher extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenisvoucher_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenisvoucher/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenisvoucher/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenisvoucher/index.html';
            $config['first_url'] = base_url() . 'jenisvoucher/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenisvoucher_model->total_rows($q);
        $jenisvoucher = $this->Jenisvoucher_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenisvoucher_data' => $jenisvoucher,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('jenisvoucher/jenisvoucher_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenisvoucher_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'jenisvoucher' => $row->jenisvoucher,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('jenisvoucher/jenisvoucher_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisvoucher'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenisvoucher/create_action'),
	    'idx' => set_value('idx'),
	    'jenisvoucher' => set_value('jenisvoucher'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->load->view('jenisvoucher/jenisvoucher_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenisvoucher' => $this->input->post('jenisvoucher',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Jenisvoucher_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenisvoucher'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenisvoucher_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenisvoucher/update_action'),
		'idx' => set_value('idx', $row->idx),
		'jenisvoucher' => set_value('jenisvoucher', $row->jenisvoucher),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->load->view('jenisvoucher/jenisvoucher_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisvoucher'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'jenisvoucher' => $this->input->post('jenisvoucher',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Jenisvoucher_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenisvoucher'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenisvoucher_model->get_by_id($id);

        if ($row) {
            $this->Jenisvoucher_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenisvoucher'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisvoucher'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenisvoucher', 'jenisvoucher', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenisvoucher.php */
/* Location: ./application/controllers/Jenisvoucher.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-02 15:37:11 */
/* http://harviacode.com */