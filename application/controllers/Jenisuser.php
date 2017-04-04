<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenisuser extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenisuser_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('jenisuser/jenisuser_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Jenisuser_model->json();
    }

    public function read($id) 
    {
        $row = $this->Jenisuser_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'jenisuser' => $row->jenisuser,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('jenisuser/jenisuser_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisuser'));
        }
    }

//=========READ=========
        

public function readjenisuserAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['jenisuser'] = "";
		 $this->json_data['keterangan'] = "";

		$this->load->model('Jenisuser_model');
                
		$response = array();
                
		$xQuery = $this->Jenisuser_model->getListjenisuser();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['jenisuser'] = $row->jenisuser;
			 $this->json_data['keterangan'] = $row->keterangan;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatejenisuserAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xjenisuser = $_POST['edjenisuser'];
		 $xketerangan = $_POST['edketerangan'];

		$this->load->model('Jenisuser_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Jenisuser_model->Updatejenisuser($xidx,$xjenisuser,$xketerangan);
		} else {
            //===INSERT===
            
		$xStr = $this->Jenisuser_model->Insertjenisuser($xidx,$xjenisuser,$xketerangan);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletjenisuserAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Jenisuser_model');
        $this->Jenisuser_model->Deletjenisuser($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailjenisuserAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Jenisuser_model');
        $this->Jenisuser_model->getDetailjenisuser($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['jenisuser'] = $row->jenisuser;
		$this->json_data['keterangan'] = $row->keterangan;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenisuser/create_action'),
	    'idx' => set_value('idx'),
	    'jenisuser' => set_value('jenisuser'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->load->view('jenisuser/jenisuser_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenisuser' => $this->input->post('jenisuser',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Jenisuser_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenisuser'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenisuser_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenisuser/update_action'),
		'idx' => set_value('idx', $row->idx),
		'jenisuser' => set_value('jenisuser', $row->jenisuser),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->load->view('jenisuser/jenisuser_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisuser'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'jenisuser' => $this->input->post('jenisuser',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Jenisuser_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenisuser'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenisuser_model->get_by_id($id);

        if ($row) {
            $this->Jenisuser_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenisuser'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisuser'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenisuser', 'jenisuser', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

