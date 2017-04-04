<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userproduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Userproduk_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('userproduk/userproduk_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Userproduk_model->json();
    }

    public function read($id) 
    {
        $row = $this->Userproduk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idmember' => $row->idmember,
		'idproduk' => $row->idproduk,
		'idjenisuser' => $row->idjenisuser,
		'tglinsert' => $row->tglinsert,
		'idpengadd' => $row->idpengadd,
	    );
            $this->load->view('userproduk/userproduk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('userproduk'));
        }
    }

//=========READ=========
        

public function readuserprodukAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['idmember'] = "";
		 $this->json_data['idproduk'] = "";
		 $this->json_data['idjenisuser'] = "";
		 $this->json_data['tglinsert'] = "";
		 $this->json_data['idpengadd'] = "";

		$this->load->model('Userproduk_model');
                
		$response = array();
                
		$xQuery = $this->Userproduk_model->getListuserproduk();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['idmember'] = $row->idmember;
			 $this->json_data['idproduk'] = $row->idproduk;
			 $this->json_data['idjenisuser'] = $row->idjenisuser;
			 $this->json_data['tglinsert'] = $row->tglinsert;
			 $this->json_data['idpengadd'] = $row->idpengadd;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdateuserprodukAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xidmember = $_POST['edidmember'];
		 $xidproduk = $_POST['edidproduk'];
		 $xidjenisuser = $_POST['edidjenisuser'];
		 $xtglinsert = $_POST['edtglinsert'];
		 $xidpengadd = $_POST['edidpengadd'];

		$this->load->model('Userproduk_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Userproduk_model->Updateuserproduk($xidx,$xidmember,$xidproduk,$xidjenisuser,$xtglinsert,$xidpengadd);
		} else {
            //===INSERT===
            
		$xStr = $this->Userproduk_model->Insertuserproduk($xidx,$xidmember,$xidproduk,$xidjenisuser,$xtglinsert,$xidpengadd);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletuserprodukAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Userproduk_model');
        $this->Userproduk_model->Deletuserproduk($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailuserprodukAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Userproduk_model');
        $this->Userproduk_model->getDetailuserproduk($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['idmember'] = $row->idmember;
		$this->json_data['idproduk'] = $row->idproduk;
		$this->json_data['idjenisuser'] = $row->idjenisuser;
		$this->json_data['tglinsert'] = $row->tglinsert;
		$this->json_data['idpengadd'] = $row->idpengadd;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('userproduk/create_action'),
	    'idx' => set_value('idx'),
	    'idmember' => set_value('idmember'),
	    'idproduk' => set_value('idproduk'),
	    'idjenisuser' => set_value('idjenisuser'),
	    'tglinsert' => set_value('tglinsert'),
	    'idpengadd' => set_value('idpengadd'),
	);
        $this->load->view('userproduk/userproduk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idmember' => $this->input->post('idmember',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'idjenisuser' => $this->input->post('idjenisuser',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'idpengadd' => $this->input->post('idpengadd',TRUE),
	    );

            $this->Userproduk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('userproduk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Userproduk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('userproduk/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idmember' => set_value('idmember', $row->idmember),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'idjenisuser' => set_value('idjenisuser', $row->idjenisuser),
		'tglinsert' => set_value('tglinsert', $row->tglinsert),
		'idpengadd' => set_value('idpengadd', $row->idpengadd),
	    );
            $this->load->view('userproduk/userproduk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('userproduk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'idmember' => $this->input->post('idmember',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'idjenisuser' => $this->input->post('idjenisuser',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'idpengadd' => $this->input->post('idpengadd',TRUE),
	    );

            $this->Userproduk_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('userproduk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Userproduk_model->get_by_id($id);

        if ($row) {
            $this->Userproduk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('userproduk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('userproduk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('idjenisuser', 'idjenisuser', 'trim|required');
	$this->form_validation->set_rules('tglinsert', 'tglinsert', 'trim|required');
	$this->form_validation->set_rules('idpengadd', 'idpengadd', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

