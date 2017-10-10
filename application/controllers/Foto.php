<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Foto extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Foto_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'foto/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'foto/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'foto/index.html';
            $config['first_url'] = base_url() . 'foto/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Foto_model->total_rows($q);
        $foto = $this->Foto_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'foto_data' => $foto,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'title' => 'Foto',
            'js' => 'foto_ajax',
            'css_file' => 'foto_css',
    
        );    $this->render('foto/foto_list', $data);}

    public function read($id) 
    {
        $row = $this->Foto_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_foto' => $row->nama_foto,
		'token' => $row->token,
	    );
            $this->render('foto/foto_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('foto'));
        }
    }


 //=========Autocomplete========= 
        public function get_foto_search() {
        $q = $this->input->post('q',TRUE); 
        $term = $_POST['term'];
        if(!empty($term)){
        $query = $this->Foto_model->getListfotoAuto($term); //query model
        $hasilnya       =  array();
        foreach ($query->result() as $d) {
            $hasilnya[]     = array(
                'label' => $d->id.'-'.$d-> nama_foto,  
                'value' => $d-> nama_foto//masukan value autocompliet (harus sama dengan model)
            );
        }
        echo json_encode($hasilnya);  
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('foto/create_action'),
	    'id' => set_value('id'),
	    'nama_foto' => set_value('nama_foto'),
	    'token' => set_value('token'),
	);
        $this->render('foto/foto_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_foto' => $this->input->post('nama_foto',TRUE),
		'token' => $this->input->post('token',TRUE),
	    );

            $this->Foto_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('foto'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Foto_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('foto/update_action'),
		'id' => set_value('id', $row->id),
		'nama_foto' => set_value('nama_foto', $row->nama_foto),
		'token' => set_value('token', $row->token),
	    );
            $this->render('foto/foto_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('foto'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_foto' => $this->input->post('nama_foto',TRUE),
		'token' => $this->input->post('token',TRUE),
	    );

            $this->Foto_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('foto'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Foto_model->get_by_id($id);

        if ($row) {
            $this->Foto_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('foto'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('foto'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_foto', 'nama foto', 'trim|required');
	$this->form_validation->set_rules('token', 'token', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

