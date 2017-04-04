<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Memberproduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Memberproduk_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('memberproduk/memberproduk_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Memberproduk_model->json();
    }

    public function read($id) 
    {
        $row = $this->Memberproduk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idproduk' => $row->idproduk,
		'idmember' => $row->idmember,
		'tgljadimember' => $row->tgljadimember,
		'isfromrekomendasi' => $row->isfromrekomendasi,
		'idreveral' => $row->idreveral,
	    );
            $this->load->view('memberproduk/memberproduk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('memberproduk'));
        }
    }

//=========READ=========
        

public function readmemberprodukAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['idproduk'] = "";
		 $this->json_data['idmember'] = "";
		 $this->json_data['tgljadimember'] = "";
		 $this->json_data['isfromrekomendasi'] = "";
		 $this->json_data['idreveral'] = "";

		$this->load->model('Memberproduk_model');
                
		$response = array();
                
		$xQuery = $this->Memberproduk_model->getListmemberproduk();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['idproduk'] = $row->idproduk;
			 $this->json_data['idmember'] = $row->idmember;
			 $this->json_data['tgljadimember'] = $row->tgljadimember;
			 $this->json_data['isfromrekomendasi'] = $row->isfromrekomendasi;
			 $this->json_data['idreveral'] = $row->idreveral;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatememberprodukAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xidproduk = $_POST['edidproduk'];
		 $xidmember = $_POST['edidmember'];
		 $xtgljadimember = $_POST['edtgljadimember'];
		 $xisfromrekomendasi = $_POST['edisfromrekomendasi'];
		 $xidreveral = $_POST['edidreveral'];

		$this->load->model('Memberproduk_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Memberproduk_model->Updatememberproduk($xidx,$xidproduk,$xidmember,$xtgljadimember,$xisfromrekomendasi,$xidreveral);
		} else {
            //===INSERT===
            
		$xStr = $this->Memberproduk_model->Insertmemberproduk($xidx,$xidproduk,$xidmember,$xtgljadimember,$xisfromrekomendasi,$xidreveral);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletmemberprodukAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Memberproduk_model');
        $this->Memberproduk_model->Deletmemberproduk($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailmemberprodukAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Memberproduk_model');
        $this->Memberproduk_model->getDetailmemberproduk($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['idproduk'] = $row->idproduk;
		$this->json_data['idmember'] = $row->idmember;
		$this->json_data['tgljadimember'] = $row->tgljadimember;
		$this->json_data['isfromrekomendasi'] = $row->isfromrekomendasi;
		$this->json_data['idreveral'] = $row->idreveral;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('memberproduk/create_action'),
	    'idx' => set_value('idx'),
	    'idproduk' => set_value('idproduk'),
	    'idmember' => set_value('idmember'),
	    'tgljadimember' => set_value('tgljadimember'),
	    'isfromrekomendasi' => set_value('isfromrekomendasi'),
	    'idreveral' => set_value('idreveral'),
	);
        $this->load->view('memberproduk/memberproduk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idproduk' => $this->input->post('idproduk',TRUE),
		'idmember' => $this->input->post('idmember',TRUE),
		'tgljadimember' => $this->input->post('tgljadimember',TRUE),
		'isfromrekomendasi' => $this->input->post('isfromrekomendasi',TRUE),
		'idreveral' => $this->input->post('idreveral',TRUE),
	    );

            $this->Memberproduk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('memberproduk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Memberproduk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('memberproduk/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'idmember' => set_value('idmember', $row->idmember),
		'tgljadimember' => set_value('tgljadimember', $row->tgljadimember),
		'isfromrekomendasi' => set_value('isfromrekomendasi', $row->isfromrekomendasi),
		'idreveral' => set_value('idreveral', $row->idreveral),
	    );
            $this->load->view('memberproduk/memberproduk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('memberproduk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'idproduk' => $this->input->post('idproduk',TRUE),
		'idmember' => $this->input->post('idmember',TRUE),
		'tgljadimember' => $this->input->post('tgljadimember',TRUE),
		'isfromrekomendasi' => $this->input->post('isfromrekomendasi',TRUE),
		'idreveral' => $this->input->post('idreveral',TRUE),
	    );

            $this->Memberproduk_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('memberproduk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Memberproduk_model->get_by_id($id);

        if ($row) {
            $this->Memberproduk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('memberproduk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('memberproduk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('tgljadimember', 'tgljadimember', 'trim|required');
	$this->form_validation->set_rules('isfromrekomendasi', 'isfromrekomendasi', 'trim|required');
	$this->form_validation->set_rules('idreveral', 'idreveral', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

