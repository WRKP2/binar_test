<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategoriproduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategoriproduk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kategoriproduk/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kategoriproduk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kategoriproduk/index.html';
            $config['first_url'] = base_url() . 'kategoriproduk/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kategoriproduk_model->total_rows($q);
        $kategoriproduk = $this->Kategoriproduk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kategoriproduk_data' => $kategoriproduk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('kategoriproduk/kategoriproduk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kategoriproduk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'Kategori' => $row->Kategori,
		'icon' => $row->icon,
	    );
            $this->load->view('kategoriproduk/kategoriproduk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategoriproduk'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kategoriproduk/create_action'),
	    'idx' => set_value('idx'),
	    'Kategori' => set_value('Kategori'),
	    'icon' => set_value('icon'),
	);
        $this->load->view('kategoriproduk/kategoriproduk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Kategori' => $this->input->post('Kategori',TRUE),
		'icon' => $this->input->post('icon',TRUE),
	    );

            $this->Kategoriproduk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kategoriproduk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kategoriproduk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kategoriproduk/update_action'),
		'idx' => set_value('idx', $row->idx),
		'Kategori' => set_value('Kategori', $row->Kategori),
		'icon' => set_value('icon', $row->icon),
	    );
            $this->load->view('kategoriproduk/kategoriproduk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategoriproduk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'Kategori' => $this->input->post('Kategori',TRUE),
		'icon' => $this->input->post('icon',TRUE),
	    );

            $this->Kategoriproduk_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kategoriproduk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kategoriproduk_model->get_by_id($id);

        if ($row) {
            $this->Kategoriproduk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kategoriproduk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategoriproduk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Kategori', 'kategori', 'trim|required');
	$this->form_validation->set_rules('icon', 'icon', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kategoriproduk.php */
/* Location: ./application/controllers/Kategoriproduk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-02 15:37:11 */
/* http://harviacode.com */