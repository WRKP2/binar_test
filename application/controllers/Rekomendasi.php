<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rekomendasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rekomendasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'rekomendasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'rekomendasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'rekomendasi/index.html';
            $config['first_url'] = base_url() . 'rekomendasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Rekomendasi_model->total_rows($q);
        $rekomendasi = $this->Rekomendasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'rekomendasi_data' => $rekomendasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('rekomendasi/rekomendasi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Rekomendasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idproduk' => $row->idproduk,
		'idperekomendasi' => $row->idperekomendasi,
		'idmemberyangdirekomendasi' => $row->idmemberyangdirekomendasi,
		'tglrekomendassi' => $row->tglrekomendassi,
		'longlatacept' => $row->longlatacept,
		'issetujurekom' => $row->issetujurekom,
	    );
            $this->load->view('rekomendasi/rekomendasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rekomendasi'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rekomendasi/create_action'),
	    'idx' => set_value('idx'),
	    'idproduk' => set_value('idproduk'),
	    'idperekomendasi' => set_value('idperekomendasi'),
	    'idmemberyangdirekomendasi' => set_value('idmemberyangdirekomendasi'),
	    'tglrekomendassi' => set_value('tglrekomendassi'),
	    'longlatacept' => set_value('longlatacept'),
	    'issetujurekom' => set_value('issetujurekom'),
	);
        $this->load->view('rekomendasi/rekomendasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idproduk' => $this->input->post('idproduk',TRUE),
		'idperekomendasi' => $this->input->post('idperekomendasi',TRUE),
		'idmemberyangdirekomendasi' => $this->input->post('idmemberyangdirekomendasi',TRUE),
		'tglrekomendassi' => $this->input->post('tglrekomendassi',TRUE),
		'longlatacept' => $this->input->post('longlatacept',TRUE),
		'issetujurekom' => $this->input->post('issetujurekom',TRUE),
	    );

            $this->Rekomendasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('rekomendasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Rekomendasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rekomendasi/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'idperekomendasi' => set_value('idperekomendasi', $row->idperekomendasi),
		'idmemberyangdirekomendasi' => set_value('idmemberyangdirekomendasi', $row->idmemberyangdirekomendasi),
		'tglrekomendassi' => set_value('tglrekomendassi', $row->tglrekomendassi),
		'longlatacept' => set_value('longlatacept', $row->longlatacept),
		'issetujurekom' => set_value('issetujurekom', $row->issetujurekom),
	    );
            $this->load->view('rekomendasi/rekomendasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rekomendasi'));
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
		'idperekomendasi' => $this->input->post('idperekomendasi',TRUE),
		'idmemberyangdirekomendasi' => $this->input->post('idmemberyangdirekomendasi',TRUE),
		'tglrekomendassi' => $this->input->post('tglrekomendassi',TRUE),
		'longlatacept' => $this->input->post('longlatacept',TRUE),
		'issetujurekom' => $this->input->post('issetujurekom',TRUE),
	    );

            $this->Rekomendasi_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rekomendasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Rekomendasi_model->get_by_id($id);

        if ($row) {
            $this->Rekomendasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rekomendasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rekomendasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('idperekomendasi', 'idperekomendasi', 'trim|required');
	$this->form_validation->set_rules('idmemberyangdirekomendasi', 'idmemberyangdirekomendasi', 'trim|required');
	$this->form_validation->set_rules('tglrekomendassi', 'tglrekomendassi', 'trim|required');
	$this->form_validation->set_rules('longlatacept', 'longlatacept', 'trim|required');
	$this->form_validation->set_rules('issetujurekom', 'issetujurekom', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Rekomendasi.php */
/* Location: ./application/controllers/Rekomendasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-02 15:37:17 */
/* http://harviacode.com */