<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produkkategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Produkkategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'produkkategori/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'produkkategori/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'produkkategori/index.html';
            $config['first_url'] = base_url() . 'produkkategori/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Produkkategori_model->total_rows($q);
        $produkkategori = $this->Produkkategori_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'produkkategori_data' => $produkkategori,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('produkkategori/produkkategori_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Produkkategori_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idproduk' => $row->idproduk,
		'idkategori' => $row->idkategori,
		'tglinsert' => $row->tglinsert,
		'idpegawai' => $row->idpegawai,
		'iddetailproduk' => $row->iddetailproduk,
	    );
            $this->load->view('produkkategori/produkkategori_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produkkategori'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('produkkategori/create_action'),
	    'idx' => set_value('idx'),
	    'idproduk' => set_value('idproduk'),
	    'idkategori' => set_value('idkategori'),
	    'tglinsert' => set_value('tglinsert'),
	    'idpegawai' => set_value('idpegawai'),
	    'iddetailproduk' => set_value('iddetailproduk'),
	);
        $this->load->view('produkkategori/produkkategori_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idproduk' => $this->input->post('idproduk',TRUE),
		'idkategori' => $this->input->post('idkategori',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
		'iddetailproduk' => $this->input->post('iddetailproduk',TRUE),
	    );

            $this->Produkkategori_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('produkkategori'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Produkkategori_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('produkkategori/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'idkategori' => set_value('idkategori', $row->idkategori),
		'tglinsert' => set_value('tglinsert', $row->tglinsert),
		'idpegawai' => set_value('idpegawai', $row->idpegawai),
		'iddetailproduk' => set_value('iddetailproduk', $row->iddetailproduk),
	    );
            $this->load->view('produkkategori/produkkategori_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produkkategori'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'idproduk' => $this->input->post('idproduk',TRUE),
		'idkategori' => $this->input->post('idkategori',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
		'iddetailproduk' => $this->input->post('iddetailproduk',TRUE),
	    );

            $this->Produkkategori_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('produkkategori'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Produkkategori_model->get_by_id($id);

        if ($row) {
            $this->Produkkategori_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produkkategori'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produkkategori'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('idkategori', 'idkategori', 'trim|required');
	$this->form_validation->set_rules('tglinsert', 'tglinsert', 'trim|required');
	$this->form_validation->set_rules('idpegawai', 'idpegawai', 'trim|required');
	$this->form_validation->set_rules('iddetailproduk', 'iddetailproduk', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Produkkategori.php */
/* Location: ./application/controllers/Produkkategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-01 17:35:31 */
/* http://harviacode.com */