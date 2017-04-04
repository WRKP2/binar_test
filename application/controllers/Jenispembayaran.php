<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenispembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenispembayaran_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('jenispembayaran/jenispembayaran_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Jenispembayaran_model->json();
    }

    public function read($id) 
    {
        $row = $this->Jenispembayaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'jenispembayaran' => $row->jenispembayaran,
		'jenispembayaranING' => $row->jenispembayaranING,
	    );
            $this->load->view('jenispembayaran/jenispembayaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispembayaran'));
        }
    }

//=========READ=========
        

public function readjenispembayaranAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['jenispembayaran'] = "";
		 $this->json_data['jenispembayaranING'] = "";

		$this->load->model('Jenispembayaran_model');
                
		$response = array();
                
		$xQuery = $this->Jenispembayaran_model->getListjenispembayaran();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['jenispembayaran'] = $row->jenispembayaran;
			 $this->json_data['jenispembayaranING'] = $row->jenispembayaranING;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatejenispembayaranAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xjenispembayaran = $_POST['edjenispembayaran'];
		 $xjenispembayaranING = $_POST['edjenispembayaranING'];

		$this->load->model('Jenispembayaran_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Jenispembayaran_model->Updatejenispembayaran($xidx,$xjenispembayaran,$xjenispembayaranING);
		} else {
            //===INSERT===
            
		$xStr = $this->Jenispembayaran_model->Insertjenispembayaran($xidx,$xjenispembayaran,$xjenispembayaranING);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletjenispembayaranAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Jenispembayaran_model');
        $this->Jenispembayaran_model->Deletjenispembayaran($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailjenispembayaranAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Jenispembayaran_model');
        $this->Jenispembayaran_model->getDetailjenispembayaran($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['jenispembayaran'] = $row->jenispembayaran;
		$this->json_data['jenispembayaranING'] = $row->jenispembayaranING;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenispembayaran/create_action'),
	    'idx' => set_value('idx'),
	    'jenispembayaran' => set_value('jenispembayaran'),
	    'jenispembayaranING' => set_value('jenispembayaranING'),
	);
        $this->load->view('jenispembayaran/jenispembayaran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenispembayaran' => $this->input->post('jenispembayaran',TRUE),
		'jenispembayaranING' => $this->input->post('jenispembayaranING',TRUE),
	    );

            $this->Jenispembayaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenispembayaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenispembayaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenispembayaran/update_action'),
		'idx' => set_value('idx', $row->idx),
		'jenispembayaran' => set_value('jenispembayaran', $row->jenispembayaran),
		'jenispembayaranING' => set_value('jenispembayaranING', $row->jenispembayaranING),
	    );
            $this->load->view('jenispembayaran/jenispembayaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispembayaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'jenispembayaran' => $this->input->post('jenispembayaran',TRUE),
		'jenispembayaranING' => $this->input->post('jenispembayaranING',TRUE),
	    );

            $this->Jenispembayaran_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenispembayaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenispembayaran_model->get_by_id($id);

        if ($row) {
            $this->Jenispembayaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenispembayaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispembayaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenispembayaran', 'jenispembayaran', 'trim|required');
	$this->form_validation->set_rules('jenispembayaranING', 'jenispembayaraning', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

