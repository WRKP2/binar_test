<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Komponen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Komponen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'komponen/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'komponen/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'komponen/index.html';
            $config['first_url'] = base_url() . 'komponen/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Komponen_model->total_rows($q);
        $komponen = $this->Komponen_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'komponen_data' => $komponen,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('komponen/komponen_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Komponen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idkomponen' => $row->idkomponen,
		'NmKomponen' => $row->NmKomponen,
		'isshow' => $row->isshow,
	    );
            $this->load->view('komponen/komponen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('komponen'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('komponen/create_action'),
	    'idkomponen' => set_value('idkomponen'),
	    'NmKomponen' => set_value('NmKomponen'),
	    'isshow' => set_value('isshow'),
	);
        $this->load->view('komponen/komponen_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NmKomponen' => $this->input->post('NmKomponen',TRUE),
		'isshow' => $this->input->post('isshow',TRUE),
	    );

            $this->Komponen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('komponen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Komponen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('komponen/update_action'),
		'idkomponen' => set_value('idkomponen', $row->idkomponen),
		'NmKomponen' => set_value('NmKomponen', $row->NmKomponen),
		'isshow' => set_value('isshow', $row->isshow),
	    );
            $this->load->view('komponen/komponen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('komponen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idkomponen', TRUE));
        } else {
            $data = array(
		'NmKomponen' => $this->input->post('NmKomponen',TRUE),
		'isshow' => $this->input->post('isshow',TRUE),
	    );

            $this->Komponen_model->update($this->input->post('idkomponen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('komponen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Komponen_model->get_by_id($id);

        if ($row) {
            $this->Komponen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('komponen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('komponen'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('NmKomponen', 'nmkomponen', 'trim|required');
	$this->form_validation->set_rules('isshow', 'isshow', 'trim|required');

	$this->form_validation->set_rules('idkomponen', 'idkomponen', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Komponen.php */
/* Location: ./application/controllers/Komponen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-02 15:37:12 */
/* http://harviacode.com */