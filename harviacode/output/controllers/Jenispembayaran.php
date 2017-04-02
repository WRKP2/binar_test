<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenispembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenispembayaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenispembayaran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenispembayaran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenispembayaran/index.html';
            $config['first_url'] = base_url() . 'jenispembayaran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenispembayaran_model->total_rows($q);
        $jenispembayaran = $this->Jenispembayaran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenispembayaran_data' => $jenispembayaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('jenispembayaran/jenispembayaran_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenispembayaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'jenispembayaran' => $row->jenispembayaran,
		'jenispembayaranING' => $row->jenispembayaranING,
	    );
            $this->load->view('jenispembayaran/jenispembayaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispembayaran'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenispembayaran/create_action'),
	    'idx' => set_value('idx'),
	    'jenispembayaran' => set_value('jenispembayaran'),
	    'jenispembayaranING' => set_value('jenispembayaranING'),
	);
        $this->load->view('jenispembayaran/jenispembayaran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenispembayaran' => $this->input->post('jenispembayaran',TRUE),
		'jenispembayaranING' => $this->input->post('jenispembayaranING',TRUE),
	    );

            $this->Jenispembayaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenispembayaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenispembayaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenispembayaran/update_action'),
		'idx' => set_value('idx', $row->idx),
		'jenispembayaran' => set_value('jenispembayaran', $row->jenispembayaran),
		'jenispembayaranING' => set_value('jenispembayaranING', $row->jenispembayaranING),
	    );
            $this->load->view('jenispembayaran/jenispembayaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispembayaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'jenispembayaran' => $this->input->post('jenispembayaran',TRUE),
		'jenispembayaranING' => $this->input->post('jenispembayaranING',TRUE),
	    );

            $this->Jenispembayaran_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenispembayaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenispembayaran_model->get_by_id($id);

        if ($row) {
            $this->Jenispembayaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenispembayaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispembayaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenispembayaran', 'jenispembayaran', 'trim|required');
	$this->form_validation->set_rules('jenispembayaranING', 'jenispembayaraning', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenispembayaran.php */
/* Location: ./application/controllers/Jenispembayaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-01 17:35:28 */
/* http://harviacode.com */