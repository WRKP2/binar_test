<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Membervoucher extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Membervoucher_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('membervoucher/membervoucher_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Membervoucher_model->json();
    }

    public function read($id) 
    {
        $row = $this->Membervoucher_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idmember' => $row->idmember,
		'idvoucher' => $row->idvoucher,
		'idproduk' => $row->idproduk,
		'tglpakai' => $row->tglpakai,
		'isdipakai' => $row->isdipakai,
		'idjenisvoucher' => $row->idjenisvoucher,
		'idreveral' => $row->idreveral,
		'isdipakaireveral' => $row->isdipakaireveral,
	    );
            $this->load->view('membervoucher/membervoucher_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('membervoucher'));
        }
    }

//=========READ=========
        

public function readmembervoucherAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['idmember'] = "";
		 $this->json_data['idvoucher'] = "";
		 $this->json_data['idproduk'] = "";
		 $this->json_data['tglpakai'] = "";
		 $this->json_data['isdipakai'] = "";
		 $this->json_data['idjenisvoucher'] = "";
		 $this->json_data['idreveral'] = "";
		 $this->json_data['isdipakaireveral'] = "";

		$this->load->model('Membervoucher_model');
                
		$response = array();
                
		$xQuery = $this->Membervoucher_model->getListmembervoucher();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['idmember'] = $row->idmember;
			 $this->json_data['idvoucher'] = $row->idvoucher;
			 $this->json_data['idproduk'] = $row->idproduk;
			 $this->json_data['tglpakai'] = $row->tglpakai;
			 $this->json_data['isdipakai'] = $row->isdipakai;
			 $this->json_data['idjenisvoucher'] = $row->idjenisvoucher;
			 $this->json_data['idreveral'] = $row->idreveral;
			 $this->json_data['isdipakaireveral'] = $row->isdipakaireveral;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatemembervoucherAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xidmember = $_POST['edidmember'];
		 $xidvoucher = $_POST['edidvoucher'];
		 $xidproduk = $_POST['edidproduk'];
		 $xtglpakai = $_POST['edtglpakai'];
		 $xisdipakai = $_POST['edisdipakai'];
		 $xidjenisvoucher = $_POST['edidjenisvoucher'];
		 $xidreveral = $_POST['edidreveral'];
		 $xisdipakaireveral = $_POST['edisdipakaireveral'];

		$this->load->model('Membervoucher_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Membervoucher_model->Updatemembervoucher($xidx,$xidmember,$xidvoucher,$xidproduk,$xtglpakai,$xisdipakai,$xidjenisvoucher,$xidreveral,$xisdipakaireveral);
		} else {
            //===INSERT===
            
		$xStr = $this->Membervoucher_model->Insertmembervoucher($xidx,$xidmember,$xidvoucher,$xidproduk,$xtglpakai,$xisdipakai,$xidjenisvoucher,$xidreveral,$xisdipakaireveral);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletmembervoucherAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Membervoucher_model');
        $this->Membervoucher_model->Deletmembervoucher($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailmembervoucherAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Membervoucher_model');
        $this->Membervoucher_model->getDetailmembervoucher($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['idmember'] = $row->idmember;
		$this->json_data['idvoucher'] = $row->idvoucher;
		$this->json_data['idproduk'] = $row->idproduk;
		$this->json_data['tglpakai'] = $row->tglpakai;
		$this->json_data['isdipakai'] = $row->isdipakai;
		$this->json_data['idjenisvoucher'] = $row->idjenisvoucher;
		$this->json_data['idreveral'] = $row->idreveral;
		$this->json_data['isdipakaireveral'] = $row->isdipakaireveral;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('membervoucher/create_action'),
	    'idx' => set_value('idx'),
	    'idmember' => set_value('idmember'),
	    'idvoucher' => set_value('idvoucher'),
	    'idproduk' => set_value('idproduk'),
	    'tglpakai' => set_value('tglpakai'),
	    'isdipakai' => set_value('isdipakai'),
	    'idjenisvoucher' => set_value('idjenisvoucher'),
	    'idreveral' => set_value('idreveral'),
	    'isdipakaireveral' => set_value('isdipakaireveral'),
	);
        $this->load->view('membervoucher/membervoucher_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idmember' => $this->input->post('idmember',TRUE),
		'idvoucher' => $this->input->post('idvoucher',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'tglpakai' => $this->input->post('tglpakai',TRUE),
		'isdipakai' => $this->input->post('isdipakai',TRUE),
		'idjenisvoucher' => $this->input->post('idjenisvoucher',TRUE),
		'idreveral' => $this->input->post('idreveral',TRUE),
		'isdipakaireveral' => $this->input->post('isdipakaireveral',TRUE),
	    );

            $this->Membervoucher_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('membervoucher'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Membervoucher_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('membervoucher/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idmember' => set_value('idmember', $row->idmember),
		'idvoucher' => set_value('idvoucher', $row->idvoucher),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'tglpakai' => set_value('tglpakai', $row->tglpakai),
		'isdipakai' => set_value('isdipakai', $row->isdipakai),
		'idjenisvoucher' => set_value('idjenisvoucher', $row->idjenisvoucher),
		'idreveral' => set_value('idreveral', $row->idreveral),
		'isdipakaireveral' => set_value('isdipakaireveral', $row->isdipakaireveral),
	    );
            $this->load->view('membervoucher/membervoucher_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('membervoucher'));
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
		'idvoucher' => $this->input->post('idvoucher',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'tglpakai' => $this->input->post('tglpakai',TRUE),
		'isdipakai' => $this->input->post('isdipakai',TRUE),
		'idjenisvoucher' => $this->input->post('idjenisvoucher',TRUE),
		'idreveral' => $this->input->post('idreveral',TRUE),
		'isdipakaireveral' => $this->input->post('isdipakaireveral',TRUE),
	    );

            $this->Membervoucher_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('membervoucher'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Membervoucher_model->get_by_id($id);

        if ($row) {
            $this->Membervoucher_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('membervoucher'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('membervoucher'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('idvoucher', 'idvoucher', 'trim|required');
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('tglpakai', 'tglpakai', 'trim|required');
	$this->form_validation->set_rules('isdipakai', 'isdipakai', 'trim|required');
	$this->form_validation->set_rules('idjenisvoucher', 'idjenisvoucher', 'trim|required');
	$this->form_validation->set_rules('idreveral', 'idreveral', 'trim|required');
	$this->form_validation->set_rules('isdipakaireveral', 'isdipakaireveral', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

