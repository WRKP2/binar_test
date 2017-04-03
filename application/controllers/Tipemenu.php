<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tipemenu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tipemenu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tipemenu/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tipemenu/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tipemenu/index.html';
            $config['first_url'] = base_url() . 'tipemenu/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tipemenu_model->total_rows($q);
        $tipemenu = $this->Tipemenu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tipemenu_data' => $tipemenu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('tipemenu/tipemenu_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tipemenu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idTipeMenu' => $row->idTipeMenu,
		'NmTipeMenu' => $row->NmTipeMenu,
	    );
            $this->load->view('tipemenu/tipemenu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tipemenu'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tipemenu/create_action'),
	    'idTipeMenu' => set_value('idTipeMenu'),
	    'NmTipeMenu' => set_value('NmTipeMenu'),
	);
        $this->load->view('tipemenu/tipemenu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idTipeMenu' => $this->input->post('idTipeMenu',TRUE),
		'NmTipeMenu' => $this->input->post('NmTipeMenu',TRUE),
	    );

            $this->Tipemenu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tipemenu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tipemenu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tipemenu/update_action'),
		'idTipeMenu' => set_value('idTipeMenu', $row->idTipeMenu),
		'NmTipeMenu' => set_value('NmTipeMenu', $row->NmTipeMenu),
	    );
            $this->load->view('tipemenu/tipemenu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tipemenu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'idTipeMenu' => $this->input->post('idTipeMenu',TRUE),
		'NmTipeMenu' => $this->input->post('NmTipeMenu',TRUE),
	    );

            $this->Tipemenu_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tipemenu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tipemenu_model->get_by_id($id);

        if ($row) {
            $this->Tipemenu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tipemenu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tipemenu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idTipeMenu', 'idtipemenu', 'trim|required');
	$this->form_validation->set_rules('NmTipeMenu', 'nmtipemenu', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tipemenu.php */
/* Location: ./application/controllers/Tipemenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-02 15:37:18 */
/* http://harviacode.com */