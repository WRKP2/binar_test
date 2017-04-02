<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jeniskategoridetail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jeniskategoridetail_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jeniskategoridetail/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jeniskategoridetail/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jeniskategoridetail/index.html';
            $config['first_url'] = base_url() . 'jeniskategoridetail/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jeniskategoridetail_model->total_rows($q);
        $jeniskategoridetail = $this->Jeniskategoridetail_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jeniskategoridetail_data' => $jeniskategoridetail,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('jeniskategoridetail/jeniskategoridetail_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jeniskategoridetail_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'namajeniskategoridetail' => $row->namajeniskategoridetail,
	    );
            $this->load->view('jeniskategoridetail/jeniskategoridetail_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jeniskategoridetail'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jeniskategoridetail/create_action'),
	    'idx' => set_value('idx'),
	    'namajeniskategoridetail' => set_value('namajeniskategoridetail'),
	);
        $this->load->view('jeniskategoridetail/jeniskategoridetail_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'namajeniskategoridetail' => $this->input->post('namajeniskategoridetail',TRUE),
	    );

            $this->Jeniskategoridetail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jeniskategoridetail'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jeniskategoridetail_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jeniskategoridetail/update_action'),
		'idx' => set_value('idx', $row->idx),
		'namajeniskategoridetail' => set_value('namajeniskategoridetail', $row->namajeniskategoridetail),
	    );
            $this->load->view('jeniskategoridetail/jeniskategoridetail_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jeniskategoridetail'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'namajeniskategoridetail' => $this->input->post('namajeniskategoridetail',TRUE),
	    );

            $this->Jeniskategoridetail_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jeniskategoridetail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jeniskategoridetail_model->get_by_id($id);

        if ($row) {
            $this->Jeniskategoridetail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jeniskategoridetail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jeniskategoridetail'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('namajeniskategoridetail', 'namajeniskategoridetail', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jeniskategoridetail.php */
/* Location: ./application/controllers/Jeniskategoridetail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-02 15:37:09 */
/* http://harviacode.com */