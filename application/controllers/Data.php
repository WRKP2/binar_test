<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->render('data/data_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Data_model->json();
    }

    public function read($id) 
    {
        $row = $this->Data_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no' => $row->no,
		'ID' => $row->ID,
		'nama' => $row->nama,
		'asal' => $row->asal,
		'gabung' => $row->gabung,
	    );
            $this->render('data/data_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data'));
        }
    }


 //=========Autocomplete========= 
        public function get_data_search() {
        $q = $this->input->post('q',TRUE); 
        $term = $_POST['term'];
        if(!empty($term)){
        $query = $this->Data_model->getListdataAuto($term); //query model
        $hasilnya       =  array();
        foreach ($query->result() as $d) {
            $hasilnya[]     = array(
                'label' => $d->no.'-'.$d->name,  
                'value' => $d->name
            );
        }
        echo json_encode($hasilnya);  
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('data/create_action'),
	    'no' => set_value('no'),
	    'ID' => set_value('ID'),
	    'nama' => set_value('nama'),
	    'asal' => set_value('asal'),
	    'gabung' => set_value('gabung'),
	);
        $this->render('data/data_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ID' => $this->input->post('ID',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'asal' => $this->input->post('asal',TRUE),
		'gabung' => $this->input->post('gabung',TRUE),
	    );

            $this->Data_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Data_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data/update_action'),
		'no' => set_value('no', $row->no),
		'ID' => set_value('ID', $row->ID),
		'nama' => set_value('nama', $row->nama),
		'asal' => set_value('asal', $row->asal),
		'gabung' => set_value('gabung', $row->gabung),
	    );
            $this->render('data/data_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no', TRUE));
        } else {
            $data = array(
		'ID' => $this->input->post('ID',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'asal' => $this->input->post('asal',TRUE),
		'gabung' => $this->input->post('gabung',TRUE),
	    );

            $this->Data_model->update($this->input->post('no', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_model->get_by_id($id);

        if ($row) {
            $this->Data_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ID', 'id', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('asal', 'asal', 'trim|required');
	$this->form_validation->set_rules('gabung', 'gabung', 'trim|required');

	$this->form_validation->set_rules('no', 'no', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

