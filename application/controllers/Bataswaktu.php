<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bataswaktu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bataswaktu_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('bataswaktu/bataswaktu_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Bataswaktu_model->json();
    }

    public function read($id) 
    {
        $row = $this->Bataswaktu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'bataswaktu' => $row->bataswaktu,
	    );
            $this->load->view('bataswaktu/bataswaktu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bataswaktu'));
        }
    }

//=========READ=========
        

public function readbataswaktuAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['bataswaktu'] = "";

		$this->load->model('Bataswaktu_model');
                
		$response = array();
                
		$xQuery = $this->Bataswaktu_model->getListbataswaktu();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['bataswaktu'] = $row->bataswaktu;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatebataswaktuAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xbataswaktu = $_POST['edbataswaktu'];

		$this->load->model('Bataswaktu_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Bataswaktu_model->Updatebataswaktu($xidx,$xbataswaktu);
		} else {
            //===INSERT===
            
		$xStr = $this->Bataswaktu_model->Insertbataswaktu($xidx,$xbataswaktu);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletbataswaktuAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Bataswaktu_model');
        $this->Bataswaktu_model->Deletbataswaktu($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailbataswaktuAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Bataswaktu_model');
        $this->Bataswaktu_model->getDetailbataswaktu($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['bataswaktu'] = $row->bataswaktu;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bataswaktu/create_action'),
	    'idx' => set_value('idx'),
	    'bataswaktu' => set_value('bataswaktu'),
	);
        $this->load->view('bataswaktu/bataswaktu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'bataswaktu' => $this->input->post('bataswaktu',TRUE),
	    );

            $this->Bataswaktu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bataswaktu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bataswaktu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bataswaktu/update_action'),
		'idx' => set_value('idx', $row->idx),
		'bataswaktu' => set_value('bataswaktu', $row->bataswaktu),
	    );
            $this->load->view('bataswaktu/bataswaktu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bataswaktu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'bataswaktu' => $this->input->post('bataswaktu',TRUE),
	    );

            $this->Bataswaktu_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bataswaktu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bataswaktu_model->get_by_id($id);

        if ($row) {
            $this->Bataswaktu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bataswaktu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bataswaktu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('bataswaktu', 'bataswaktu', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

