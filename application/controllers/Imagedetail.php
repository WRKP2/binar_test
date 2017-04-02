<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Imagedetail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Imagedetail_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'imagedetail/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'imagedetail/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'imagedetail/index.html';
            $config['first_url'] = base_url() . 'imagedetail/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Imagedetail_model->total_rows($q);
        $imagedetail = $this->Imagedetail_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'imagedetail_data' => $imagedetail,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('imagedetail/imagedetail_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Imagedetail_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'iddetailproduk' => $row->iddetailproduk,
		'idkategoriproduk' => $row->idkategoriproduk,
		'linkimage' => $row->linkimage,
		'keteranganimage' => $row->keteranganimage,
		'rancode' => $row->rancode,
		'tglinsert' => $row->tglinsert,
		'tglupdate' => $row->tglupdate,
		'idpegawai' => $row->idpegawai,
		'idproduk' => $row->idproduk,
		'isprofile' => $row->isprofile,
	    );
            $this->load->view('imagedetail/imagedetail_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('imagedetail'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('imagedetail/create_action'),
	    'idx' => set_value('idx'),
	    'iddetailproduk' => set_value('iddetailproduk'),
	    'idkategoriproduk' => set_value('idkategoriproduk'),
	    'linkimage' => set_value('linkimage'),
	    'keteranganimage' => set_value('keteranganimage'),
	    'rancode' => set_value('rancode'),
	    'tglinsert' => set_value('tglinsert'),
	    'tglupdate' => set_value('tglupdate'),
	    'idpegawai' => set_value('idpegawai'),
	    'idproduk' => set_value('idproduk'),
	    'isprofile' => set_value('isprofile'),
	);
        $this->load->view('imagedetail/imagedetail_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'iddetailproduk' => $this->input->post('iddetailproduk',TRUE),
		'idkategoriproduk' => $this->input->post('idkategoriproduk',TRUE),
		'linkimage' => $this->input->post('linkimage',TRUE),
		'keteranganimage' => $this->input->post('keteranganimage',TRUE),
		'rancode' => $this->input->post('rancode',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'isprofile' => $this->input->post('isprofile',TRUE),
	    );

            $this->Imagedetail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('imagedetail'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Imagedetail_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('imagedetail/update_action'),
		'idx' => set_value('idx', $row->idx),
		'iddetailproduk' => set_value('iddetailproduk', $row->iddetailproduk),
		'idkategoriproduk' => set_value('idkategoriproduk', $row->idkategoriproduk),
		'linkimage' => set_value('linkimage', $row->linkimage),
		'keteranganimage' => set_value('keteranganimage', $row->keteranganimage),
		'rancode' => set_value('rancode', $row->rancode),
		'tglinsert' => set_value('tglinsert', $row->tglinsert),
		'tglupdate' => set_value('tglupdate', $row->tglupdate),
		'idpegawai' => set_value('idpegawai', $row->idpegawai),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'isprofile' => set_value('isprofile', $row->isprofile),
	    );
            $this->load->view('imagedetail/imagedetail_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('imagedetail'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'iddetailproduk' => $this->input->post('iddetailproduk',TRUE),
		'idkategoriproduk' => $this->input->post('idkategoriproduk',TRUE),
		'linkimage' => $this->input->post('linkimage',TRUE),
		'keteranganimage' => $this->input->post('keteranganimage',TRUE),
		'rancode' => $this->input->post('rancode',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'isprofile' => $this->input->post('isprofile',TRUE),
	    );

            $this->Imagedetail_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('imagedetail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Imagedetail_model->get_by_id($id);

        if ($row) {
            $this->Imagedetail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('imagedetail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('imagedetail'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('iddetailproduk', 'iddetailproduk', 'trim|required');
	$this->form_validation->set_rules('idkategoriproduk', 'idkategoriproduk', 'trim|required');
	$this->form_validation->set_rules('linkimage', 'linkimage', 'trim|required');
	$this->form_validation->set_rules('keteranganimage', 'keteranganimage', 'trim|required');
	$this->form_validation->set_rules('rancode', 'rancode', 'trim|required');
	$this->form_validation->set_rules('tglinsert', 'tglinsert', 'trim|required');
	$this->form_validation->set_rules('tglupdate', 'tglupdate', 'trim|required');
	$this->form_validation->set_rules('idpegawai', 'idpegawai', 'trim|required');
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('isprofile', 'isprofile', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Imagedetail.php */
/* Location: ./application/controllers/Imagedetail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-02 15:37:08 */
/* http://harviacode.com */