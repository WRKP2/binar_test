<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usergroup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usergroup_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'usergroup/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'usergroup/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'usergroup/index.html';
            $config['first_url'] = base_url() . 'usergroup/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Usergroup_model->total_rows($q);
        $usergroup = $this->Usergroup_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'usergroup_data' => $usergroup,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('usergroup/usergroup_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Usergroup_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'NmUserGroup' => $row->NmUserGroup,
	    );
            $this->load->view('usergroup/usergroup_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usergroup'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('usergroup/create_action'),
	    'idx' => set_value('idx'),
	    'NmUserGroup' => set_value('NmUserGroup'),
	);
        $this->load->view('usergroup/usergroup_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NmUserGroup' => $this->input->post('NmUserGroup',TRUE),
	    );

            $this->Usergroup_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('usergroup'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Usergroup_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('usergroup/update_action'),
		'idx' => set_value('idx', $row->idx),
		'NmUserGroup' => set_value('NmUserGroup', $row->NmUserGroup),
	    );
            $this->load->view('usergroup/usergroup_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usergroup'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'NmUserGroup' => $this->input->post('NmUserGroup',TRUE),
	    );

            $this->Usergroup_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('usergroup'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Usergroup_model->get_by_id($id);

        if ($row) {
            $this->Usergroup_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('usergroup'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usergroup'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('NmUserGroup', 'nmusergroup', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Usergroup.php */
/* Location: ./application/controllers/Usergroup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-02 15:37:19 */
/* http://harviacode.com */