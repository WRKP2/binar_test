<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenisvoucher extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenisvoucher_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('jenisvoucher/jenisvoucher_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Jenisvoucher_model->json();
    }

    public function read($id) 
    {
        $row = $this->Jenisvoucher_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'jenisvoucher' => $row->jenisvoucher,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('jenisvoucher/jenisvoucher_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisvoucher'));
        }
    }

//=========READ=========
        

public function readjenisvoucherAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['jenisvoucher'] = "";
		 $this->json_data['keterangan'] = "";

		$this->load->model('Jenisvoucher_model');
                
		$response = array();
                
		$xQuery = $this->Jenisvoucher_model->getListjenisvoucher();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['jenisvoucher'] = $row->jenisvoucher;
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
        

public function simpanupdatejenisvoucherAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xjenisvoucher = $_POST['edjenisvoucher'];
		 $xketerangan = $_POST['edketerangan'];

		$this->load->model('Jenisvoucher_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Jenisvoucher_model->Updatejenisvoucher($xidx,$xjenisvoucher,$xketerangan);
		} else {
            //===INSERT===
            
		$xStr = $this->Jenisvoucher_model->Insertjenisvoucher($xidx,$xjenisvoucher,$xketerangan);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletjenisvoucherAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Jenisvoucher_model');
        $this->Jenisvoucher_model->Deletjenisvoucher($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailjenisvoucherAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Jenisvoucher_model');
        $this->Jenisvoucher_model->getDetailjenisvoucher($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['jenisvoucher'] = $row->jenisvoucher;
		$this->json_data['keterangan'] = $row->keterangan;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenisvoucher/create_action'),
	    'idx' => set_value('idx'),
	    'jenisvoucher' => set_value('jenisvoucher'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->load->view('jenisvoucher/jenisvoucher_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenisvoucher' => $this->input->post('jenisvoucher',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Jenisvoucher_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenisvoucher'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenisvoucher_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenisvoucher/update_action'),
		'idx' => set_value('idx', $row->idx),
		'jenisvoucher' => set_value('jenisvoucher', $row->jenisvoucher),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->load->view('jenisvoucher/jenisvoucher_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisvoucher'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'jenisvoucher' => $this->input->post('jenisvoucher',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Jenisvoucher_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenisvoucher'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenisvoucher_model->get_by_id($id);

        if ($row) {
            $this->Jenisvoucher_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenisvoucher'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisvoucher'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenisvoucher', 'jenisvoucher', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

