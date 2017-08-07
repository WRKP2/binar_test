<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_groups extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_groups_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'users_groups/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users_groups/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users_groups/index.html';
            $config['first_url'] = base_url() . 'users_groups/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_groups_model->total_rows($q);
        $users_groups = $this->Users_groups_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_groups_data' => $users_groups,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->render('users_groups/users_groups_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Users_groups_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'user_id' => $row->user_id,
		'group_id' => $row->group_id,
	    );
            $this->render('users_groups/users_groups_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users_groups'));
        }
    }


 //=========Autocomplete========= 
        public function get_users_groups_search() {
        $q = $this->input->post('q',TRUE); 
        $term = $_POST['term'];
        if(!empty($term)){
        $query = $this->Users_groups_model->getListusers_groupsAuto($term); //query model
        $hasilnya       =  array();
        foreach ($query->result() as $d) {
            $hasilnya[]     = array(
                'label' => $d->id.'-'.$d->user_id,  
                'value' => $d->user_id
            );
        }
        echo json_encode($hasilnya);  
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('users_groups/create_action'),
	    'id' => set_value('id'),
	    'user_id' => set_value('user_id'),
	    'group_id' => set_value('group_id'),
	);
        $this->render('users_groups/users_groups_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'user_id' => $this->input->post('user_id',TRUE),
		'group_id' => $this->input->post('group_id',TRUE),
	    );

            $this->Users_groups_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users_groups'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_groups_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users_groups/update_action'),
		'id' => set_value('id', $row->id),
		'user_id' => set_value('user_id', $row->user_id),
		'group_id' => set_value('group_id', $row->group_id),
	    );
            $this->render('users_groups/users_groups_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users_groups'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'user_id' => $this->input->post('user_id',TRUE),
		'group_id' => $this->input->post('group_id',TRUE),
	    );

            $this->Users_groups_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users_groups'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_groups_model->get_by_id($id);

        if ($row) {
            $this->Users_groups_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users_groups'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users_groups'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
	$this->form_validation->set_rules('group_id', 'group id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

