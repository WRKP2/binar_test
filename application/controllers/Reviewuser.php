<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reviewuser extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Reviewuser_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'reviewuser/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'reviewuser/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'reviewuser/index.html';
            $config['first_url'] = base_url() . 'reviewuser/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Reviewuser_model->total_rows($q);
        $reviewuser = $this->Reviewuser_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'reviewuser_data' => $reviewuser,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('reviewuser/reviewuser_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Reviewuser_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idmember' => $row->idmember,
		'idproduk' => $row->idproduk,
		'review' => $row->review,
		'star' => $row->star,
		'tglreview' => $row->tglreview,
	    );
            $this->load->view('reviewuser/reviewuser_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('reviewuser'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('reviewuser/create_action'),
	    'idx' => set_value('idx'),
	    'idmember' => set_value('idmember'),
	    'idproduk' => set_value('idproduk'),
	    'review' => set_value('review'),
	    'star' => set_value('star'),
	    'tglreview' => set_value('tglreview'),
	);
        $this->load->view('reviewuser/reviewuser_form', $data);
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
		'review' => $this->input->post('review',TRUE),
		'star' => $this->input->post('star',TRUE),
		'tglreview' => $this->input->post('tglreview',TRUE),
	    );

            $this->Reviewuser_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('reviewuser'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Reviewuser_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('reviewuser/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idmember' => set_value('idmember', $row->idmember),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'review' => set_value('review', $row->review),
		'star' => set_value('star', $row->star),
		'tglreview' => set_value('tglreview', $row->tglreview),
	    );
            $this->load->view('reviewuser/reviewuser_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('reviewuser'));
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
		'review' => $this->input->post('review',TRUE),
		'star' => $this->input->post('star',TRUE),
		'tglreview' => $this->input->post('tglreview',TRUE),
	    );

            $this->Reviewuser_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('reviewuser'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Reviewuser_model->get_by_id($id);

        if ($row) {
            $this->Reviewuser_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('reviewuser'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('reviewuser'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('review', 'review', 'trim|required');
	$this->form_validation->set_rules('star', 'star', 'trim|required');
	$this->form_validation->set_rules('tglreview', 'tglreview', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Reviewuser.php */
/* Location: ./application/controllers/Reviewuser.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-02 15:37:17 */
/* http://harviacode.com */