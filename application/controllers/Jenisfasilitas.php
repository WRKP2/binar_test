<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenisfasilitas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenisfasilitas_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('jenisfasilitas/jenisfasilitas_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Jenisfasilitas_model->json();
    }

    public function read($id) 
    {
        $row = $this->Jenisfasilitas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'jenisfasilitas' => $row->jenisfasilitas,
		'imgfasilitas' => $row->imgfasilitas,
	    );
            $this->load->view('jenisfasilitas/jenisfasilitas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisfasilitas'));
        }
    }

//=========READ=========
        

public function readjenisfasilitasAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['jenisfasilitas'] = "";
		 $this->json_data['imgfasilitas'] = "";

		$this->load->model('Jenisfasilitas_model');
                
		$response = array();
                
		$xQuery = $this->Jenisfasilitas_model->getListjenisfasilitas();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['jenisfasilitas'] = $row->jenisfasilitas;
			 $this->json_data['imgfasilitas'] = $row->imgfasilitas;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatejenisfasilitasAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xjenisfasilitas = $_POST['edjenisfasilitas'];
		 $ximgfasilitas = $_POST['edimgfasilitas'];

		$this->load->model('Jenisfasilitas_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Jenisfasilitas_model->Updatejenisfasilitas($xidx,$xjenisfasilitas,$ximgfasilitas);
		} else {
            //===INSERT===
            
		$xStr = $this->Jenisfasilitas_model->Insertjenisfasilitas($xidx,$xjenisfasilitas,$ximgfasilitas);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletjenisfasilitasAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Jenisfasilitas_model');
        $this->Jenisfasilitas_model->Deletjenisfasilitas($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailjenisfasilitasAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Jenisfasilitas_model');
        $this->Jenisfasilitas_model->getDetailjenisfasilitas($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['jenisfasilitas'] = $row->jenisfasilitas;
		$this->json_data['imgfasilitas'] = $row->imgfasilitas;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenisfasilitas/create_action'),
	    'idx' => set_value('idx'),
	    'jenisfasilitas' => set_value('jenisfasilitas'),
	    'imgfasilitas' => set_value('imgfasilitas'),
	);
        $this->load->view('jenisfasilitas/jenisfasilitas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenisfasilitas' => $this->input->post('jenisfasilitas',TRUE),
		'imgfasilitas' => $this->input->post('imgfasilitas',TRUE),
	    );

            $this->Jenisfasilitas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenisfasilitas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenisfasilitas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenisfasilitas/update_action'),
		'idx' => set_value('idx', $row->idx),
		'jenisfasilitas' => set_value('jenisfasilitas', $row->jenisfasilitas),
		'imgfasilitas' => set_value('imgfasilitas', $row->imgfasilitas),
	    );
            $this->load->view('jenisfasilitas/jenisfasilitas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisfasilitas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'jenisfasilitas' => $this->input->post('jenisfasilitas',TRUE),
		'imgfasilitas' => $this->input->post('imgfasilitas',TRUE),
	    );

            $this->Jenisfasilitas_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenisfasilitas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenisfasilitas_model->get_by_id($id);

        if ($row) {
            $this->Jenisfasilitas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenisfasilitas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisfasilitas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenisfasilitas', 'jenisfasilitas', 'trim|required');
	$this->form_validation->set_rules('imgfasilitas', 'imgfasilitas', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

