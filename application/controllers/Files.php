<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Files extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Files_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'files/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'files/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'files/index.html';
            $config['first_url'] = base_url() . 'files/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Files_model->total_rows($q);
        $files = $this->Files_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'files_data' => $files,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'title' => 'Files',
            'js' => 'files_ajax',
            'css_file' => 'files_css',
    
        );    $this->render('files/files_list', $data);}

    public function read($id) 
    {
        $row = $this->Files_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'filename' => $row->filename,
		'title' => $row->title,
	    );
            $this->render('files/files_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('files'));
        }
    }


 //=========Autocomplete========= 
        public function get_files_search() {
        $q = $this->input->post('q',TRUE); 
        $term = $_POST['term'];
        if(!empty($term)){
        $query = $this->Files_model->getListfilesAuto($term); //query model
        $hasilnya       =  array();
        foreach ($query->result() as $d) {
            $hasilnya[]     = array(
                'label' => $d->id.'-'.$d-> filename,  
                'value' => $d-> filename//masukan value autocompliet (harus sama dengan model)
            );
        }
        echo json_encode($hasilnya);  
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('files/create_action'),
	    'id' => set_value('id'),
	    'filename' => set_value('filename'),
	    'title' => set_value('title'),
	);
        $this->render('files/files_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'filename' => $this->input->post('filename',TRUE),
		'title' => $this->input->post('title',TRUE),
	    );

            $this->Files_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('files'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Files_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('files/update_action'),
		'id' => set_value('id', $row->id),
		'filename' => set_value('filename', $row->filename),
		'title' => set_value('title', $row->title),
	    );
            $this->render('files/files_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('files'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'filename' => $this->input->post('filename',TRUE),
		'title' => $this->input->post('title',TRUE),
	    );

            $this->Files_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('files'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Files_model->get_by_id($id);

        if ($row) {
            $this->Files_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('files'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('files'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('filename', 'filename', 'trim|required');
	$this->form_validation->set_rules('title', 'title', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

