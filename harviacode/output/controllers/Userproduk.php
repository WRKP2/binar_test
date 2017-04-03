<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userproduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Userproduk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'userproduk/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'userproduk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'userproduk/index.html';
            $config['first_url'] = base_url() . 'userproduk/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Userproduk_model->total_rows($q);
        $userproduk = $this->Userproduk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'userproduk_data' => $userproduk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('userproduk/userproduk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Userproduk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idmember' => $row->idmember,
		'idproduk' => $row->idproduk,
		'idjenisuser' => $row->idjenisuser,
		'tglinsert' => $row->tglinsert,
		'idpengadd' => $row->idpengadd,
	    );
            $this->load->view('userproduk/userproduk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('userproduk'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('userproduk/create_action'),
	    'idx' => set_value('idx'),
	    'idmember' => set_value('idmember'),
	    'idproduk' => set_value('idproduk'),
	    'idjenisuser' => set_value('idjenisuser'),
	    'tglinsert' => set_value('tglinsert'),
	    'idpengadd' => set_value('idpengadd'),
	);
        $this->load->view('userproduk/userproduk_form', $data);
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
		'idjenisuser' => $this->input->post('idjenisuser',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'idpengadd' => $this->input->post('idpengadd',TRUE),
	    );

            $this->Userproduk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('userproduk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Userproduk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('userproduk/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idmember' => set_value('idmember', $row->idmember),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'idjenisuser' => set_value('idjenisuser', $row->idjenisuser),
		'tglinsert' => set_value('tglinsert', $row->tglinsert),
		'idpengadd' => set_value('idpengadd', $row->idpengadd),
	    );
            $this->load->view('userproduk/userproduk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('userproduk'));
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
		'idjenisuser' => $this->input->post('idjenisuser',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'idpengadd' => $this->input->post('idpengadd',TRUE),
	    );

            $this->Userproduk_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('userproduk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Userproduk_model->get_by_id($id);

        if ($row) {
            $this->Userproduk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('userproduk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('userproduk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('idjenisuser', 'idjenisuser', 'trim|required');
	$this->form_validation->set_rules('tglinsert', 'tglinsert', 'trim|required');
	$this->form_validation->set_rules('idpengadd', 'idpengadd', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Userproduk.php */
/* Location: ./application/controllers/Userproduk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-01 17:35:33 */
/* http://harviacode.com */