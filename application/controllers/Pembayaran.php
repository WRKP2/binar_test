<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembayaran_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('pembayaran/pembayaran_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pembayaran_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pembayaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idmember' => $row->idmember,
		'idproduk' => $row->idproduk,
		'tglbayar' => $row->tglbayar,
		'isverifieduserproduk' => $row->isverifieduserproduk,
		'idjenispembayaran' => $row->idjenispembayaran,
	    );
            $this->load->view('pembayaran/pembayaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

//=========READ=========
        

public function readpembayaranAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['idmember'] = "";
		 $this->json_data['idproduk'] = "";
		 $this->json_data['tglbayar'] = "";
		 $this->json_data['isverifieduserproduk'] = "";
		 $this->json_data['idjenispembayaran'] = "";

		$this->load->model('Pembayaran_model');
                
		$response = array();
                
		$xQuery = $this->Pembayaran_model->getListpembayaran();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['idmember'] = $row->idmember;
			 $this->json_data['idproduk'] = $row->idproduk;
			 $this->json_data['tglbayar'] = $row->tglbayar;
			 $this->json_data['isverifieduserproduk'] = $row->isverifieduserproduk;
			 $this->json_data['idjenispembayaran'] = $row->idjenispembayaran;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatepembayaranAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xidmember = $_POST['edidmember'];
		 $xidproduk = $_POST['edidproduk'];
		 $xtglbayar = $_POST['edtglbayar'];
		 $xisverifieduserproduk = $_POST['edisverifieduserproduk'];
		 $xidjenispembayaran = $_POST['edidjenispembayaran'];

		$this->load->model('Pembayaran_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Pembayaran_model->Updatepembayaran($xidx,$xidmember,$xidproduk,$xtglbayar,$xisverifieduserproduk,$xidjenispembayaran);
		} else {
            //===INSERT===
            
		$xStr = $this->Pembayaran_model->Insertpembayaran($xidx,$xidmember,$xidproduk,$xtglbayar,$xisverifieduserproduk,$xidjenispembayaran);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletpembayaranAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Pembayaran_model');
        $this->Pembayaran_model->Deletpembayaran($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailpembayaranAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Pembayaran_model');
        $this->Pembayaran_model->getDetailpembayaran($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['idmember'] = $row->idmember;
		$this->json_data['idproduk'] = $row->idproduk;
		$this->json_data['tglbayar'] = $row->tglbayar;
		$this->json_data['isverifieduserproduk'] = $row->isverifieduserproduk;
		$this->json_data['idjenispembayaran'] = $row->idjenispembayaran;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembayaran/create_action'),
	    'idx' => set_value('idx'),
	    'idmember' => set_value('idmember'),
	    'idproduk' => set_value('idproduk'),
	    'tglbayar' => set_value('tglbayar'),
	    'isverifieduserproduk' => set_value('isverifieduserproduk'),
	    'idjenispembayaran' => set_value('idjenispembayaran'),
	);
        $this->load->view('pembayaran/pembayaran_form', $data);
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
		'tglbayar' => $this->input->post('tglbayar',TRUE),
		'isverifieduserproduk' => $this->input->post('isverifieduserproduk',TRUE),
		'idjenispembayaran' => $this->input->post('idjenispembayaran',TRUE),
	    );

            $this->Pembayaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembayaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembayaran/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idmember' => set_value('idmember', $row->idmember),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'tglbayar' => set_value('tglbayar', $row->tglbayar),
		'isverifieduserproduk' => set_value('isverifieduserproduk', $row->isverifieduserproduk),
		'idjenispembayaran' => set_value('idjenispembayaran', $row->idjenispembayaran),
	    );
            $this->load->view('pembayaran/pembayaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
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
		'tglbayar' => $this->input->post('tglbayar',TRUE),
		'isverifieduserproduk' => $this->input->post('isverifieduserproduk',TRUE),
		'idjenispembayaran' => $this->input->post('idjenispembayaran',TRUE),
	    );

            $this->Pembayaran_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembayaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pembayaran_model->get_by_id($id);

        if ($row) {
            $this->Pembayaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembayaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('tglbayar', 'tglbayar', 'trim|required');
	$this->form_validation->set_rules('isverifieduserproduk', 'isverifieduserproduk', 'trim|required');
	$this->form_validation->set_rules('idjenispembayaran', 'idjenispembayaran', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

