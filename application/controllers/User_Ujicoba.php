<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_Ujicoba extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model_Ujicoba');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user_ujicoba/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user_ujicoba/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user_ujicoba/index.html';
            $config['first_url'] = base_url() . 'user_ujicoba/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model_Ujicoba->total_rows($q);
        $user_ujicoba = $this->User_model_Ujicoba->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_ujicoba_data' => $user_ujicoba,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'title' => 'User_Ujicoba',
            'js' => 'user_ajax',
        );    $this->render('user_ujicoba/user_list', $data);}

    public function read($id) 
    {
        $row = $this->User_model_Ujicoba->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'nama' => $row->nama,
		'alamat' => $row->alamat,
		'user' => $row->user,
		'password' => $row->password,
	    );
            $this->render('user_ujicoba/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_ujicoba'));
        }
    }


 //=========Autocomplete========= 
        public function get_user_search() {
        $q = $this->input->post('q',TRUE); 
        $term = $_POST['term'];
        if(!empty($term)){
        $query = $this->User_model_Ujicoba->getListuserAuto($term); //query model
        $hasilnya       =  array();
        foreach ($query->result() as $d) {
            $hasilnya[]     = array(
                'label' => $d->idx.'-'.$d->nama,  
                'value' => $d->nama
            );
        }
        echo json_encode($hasilnya);  
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user_ujicoba/create_action'),
	    'idx' => set_value('idx'),
	    'nama' => set_value('nama'),
	    'alamat' => set_value('alamat'),
	    'user' => set_value('user'),
	    'password' => set_value('password'),
	);
        $this->render('user_ujicoba/user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'user' => $this->input->post('user',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->User_model_Ujicoba->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user_ujicoba'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model_Ujicoba->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user_ujicoba/update_action'),
		'idx' => set_value('idx', $row->idx),
		'nama' => set_value('nama', $row->nama),
		'alamat' => set_value('alamat', $row->alamat),
		'user' => set_value('user', $row->user),
		'password' => set_value('password', $row->password),
	    );
            $this->render('user_ujicoba/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_ujicoba'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'user' => $this->input->post('user',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->User_model_Ujicoba->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user_ujicoba'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model_Ujicoba->get_by_id($id);

        if ($row) {
            $this->User_model_Ujicoba->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user_ujicoba'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_ujicoba'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('user', 'user', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

