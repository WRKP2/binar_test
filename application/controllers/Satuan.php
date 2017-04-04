<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Satuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Satuan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('satuan/satuan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Satuan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Satuan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'satuan' => $row->satuan,
	    );
            $this->load->view('satuan/satuan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('satuan'));
        }
    }

//=========READ=========
        

public function readsatuanAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['satuan'] = "";

		$this->load->model('Satuan_model');
                
		$response = array();
                
		$xQuery = $this->Satuan_model->getListsatuan();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['satuan'] = $row->satuan;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatesatuanAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xsatuan = $_POST['edsatuan'];

		$this->load->model('Satuan_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Satuan_model->Updatesatuan($xidx,$xsatuan);
		} else {
            //===INSERT===
            
		$xStr = $this->Satuan_model->Insertsatuan($xidx,$xsatuan);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletsatuanAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Satuan_model');
        $this->Satuan_model->Deletsatuan($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailsatuanAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Satuan_model');
        $this->Satuan_model->getDetailsatuan($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['satuan'] = $row->satuan;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('satuan/create_action'),
	    'idx' => set_value('idx'),
	    'satuan' => set_value('satuan'),
	);
        $this->load->view('satuan/satuan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'satuan' => $this->input->post('satuan',TRUE),
	    );

            $this->Satuan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('satuan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Satuan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('satuan/update_action'),
		'idx' => set_value('idx', $row->idx),
		'satuan' => set_value('satuan', $row->satuan),
	    );
            $this->load->view('satuan/satuan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('satuan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'satuan' => $this->input->post('satuan',TRUE),
	    );

            $this->Satuan_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('satuan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Satuan_model->get_by_id($id);

        if ($row) {
            $this->Satuan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('satuan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('satuan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

