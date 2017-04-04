<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jeniskategoridetail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jeniskategoridetail_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('jeniskategoridetail/jeniskategoridetail_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Jeniskategoridetail_model->json();
    }

    public function read($id) 
    {
        $row = $this->Jeniskategoridetail_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'namajeniskategoridetail' => $row->namajeniskategoridetail,
	    );
            $this->load->view('jeniskategoridetail/jeniskategoridetail_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jeniskategoridetail'));
        }
    }

//=========READ=========
        

public function readjeniskategoridetailAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['namajeniskategoridetail'] = "";

		$this->load->model('Jeniskategoridetail_model');
                
		$response = array();
                
		$xQuery = $this->Jeniskategoridetail_model->getListjeniskategoridetail();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['namajeniskategoridetail'] = $row->namajeniskategoridetail;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatejeniskategoridetailAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xnamajeniskategoridetail = $_POST['ednamajeniskategoridetail'];

		$this->load->model('Jeniskategoridetail_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Jeniskategoridetail_model->Updatejeniskategoridetail($xidx,$xnamajeniskategoridetail);
		} else {
            //===INSERT===
            
		$xStr = $this->Jeniskategoridetail_model->Insertjeniskategoridetail($xidx,$xnamajeniskategoridetail);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletjeniskategoridetailAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Jeniskategoridetail_model');
        $this->Jeniskategoridetail_model->Deletjeniskategoridetail($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailjeniskategoridetailAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Jeniskategoridetail_model');
        $this->Jeniskategoridetail_model->getDetailjeniskategoridetail($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['namajeniskategoridetail'] = $row->namajeniskategoridetail;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jeniskategoridetail/create_action'),
	    'idx' => set_value('idx'),
	    'namajeniskategoridetail' => set_value('namajeniskategoridetail'),
	);
        $this->load->view('jeniskategoridetail/jeniskategoridetail_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'namajeniskategoridetail' => $this->input->post('namajeniskategoridetail',TRUE),
	    );

            $this->Jeniskategoridetail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jeniskategoridetail'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jeniskategoridetail_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jeniskategoridetail/update_action'),
		'idx' => set_value('idx', $row->idx),
		'namajeniskategoridetail' => set_value('namajeniskategoridetail', $row->namajeniskategoridetail),
	    );
            $this->load->view('jeniskategoridetail/jeniskategoridetail_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jeniskategoridetail'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'namajeniskategoridetail' => $this->input->post('namajeniskategoridetail',TRUE),
	    );

            $this->Jeniskategoridetail_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jeniskategoridetail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jeniskategoridetail_model->get_by_id($id);

        if ($row) {
            $this->Jeniskategoridetail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jeniskategoridetail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jeniskategoridetail'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('namajeniskategoridetail', 'namajeniskategoridetail', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

