<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenisfasilitas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenisfasilitas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenisfasilitas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenisfasilitas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenisfasilitas/index.html';
            $config['first_url'] = base_url() . 'jenisfasilitas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenisfasilitas_model->total_rows($q);
        $jenisfasilitas = $this->Jenisfasilitas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenisfasilitas_data' => $jenisfasilitas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('jenisfasilitas/jenisfasilitas_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenisfasilitas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'jenisfasilitas' => $row->jenisfasilitas,
		'imgfasilitas' => $row->imgfasilitas,
	    );
            $this->load->view('jenisfasilitas/jenisfasilitas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisfasilitas'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenisfasilitas/create_action'),
	    'idx' => set_value('idx'),
	    'jenisfasilitas' => set_value('jenisfasilitas'),
	    'imgfasilitas' => set_value('imgfasilitas'),
	);
        $this->load->view('jenisfasilitas/jenisfasilitas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenisfasilitas' => $this->input->post('jenisfasilitas',TRUE),
		'imgfasilitas' => $this->input->post('imgfasilitas',TRUE),
	    );

            $this->Jenisfasilitas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenisfasilitas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenisfasilitas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenisfasilitas/update_action'),
		'idx' => set_value('idx', $row->idx),
		'jenisfasilitas' => set_value('jenisfasilitas', $row->jenisfasilitas),
		'imgfasilitas' => set_value('imgfasilitas', $row->imgfasilitas),
	    );
            $this->load->view('jenisfasilitas/jenisfasilitas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisfasilitas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'jenisfasilitas' => $this->input->post('jenisfasilitas',TRUE),
		'imgfasilitas' => $this->input->post('imgfasilitas',TRUE),
	    );

            $this->Jenisfasilitas_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenisfasilitas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenisfasilitas_model->get_by_id($id);

        if ($row) {
            $this->Jenisfasilitas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenisfasilitas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisfasilitas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenisfasilitas', 'jenisfasilitas', 'trim|required');
	$this->form_validation->set_rules('imgfasilitas', 'imgfasilitas', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenisfasilitas.php */
/* Location: ./application/controllers/Jenisfasilitas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-02 15:37:09 */
/* http://harviacode.com */