<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('transaksi/transaksi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Transaksi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idbooking' => $row->idbooking,
		'tglbooking' => $row->tglbooking,
		'tglbatalbooking' => $row->tglbatalbooking,
		'keteranganbatal' => $row->keteranganbatal,
		'harganormal' => $row->harganormal,
		'hargadiscount' => $row->hargadiscount,
		'idvoucher' => $row->idvoucher,
		'idmember' => $row->idmember,
		'idpegawai' => $row->idpegawai,
		'spesialrequest' => $row->spesialrequest,
		'tglupdate' => $row->tglupdate,
		'idjenisbayar' => $row->idjenisbayar,
		'tglbayar' => $row->tglbayar,
		'hargadibayar' => $row->hargadibayar,
		'isfinal' => $row->isfinal,
		'nominalvoucher' => $row->nominalvoucher,
	    );
            $this->load->view('transaksi/transaksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

//=========READ=========
        

public function readtransaksiAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['idbooking'] = "";
		 $this->json_data['tglbooking'] = "";
		 $this->json_data['tglbatalbooking'] = "";
		 $this->json_data['keteranganbatal'] = "";
		 $this->json_data['harganormal'] = "";
		 $this->json_data['hargadiscount'] = "";
		 $this->json_data['idvoucher'] = "";
		 $this->json_data['idmember'] = "";
		 $this->json_data['idpegawai'] = "";
		 $this->json_data['spesialrequest'] = "";
		 $this->json_data['tglupdate'] = "";
		 $this->json_data['idjenisbayar'] = "";
		 $this->json_data['tglbayar'] = "";
		 $this->json_data['hargadibayar'] = "";
		 $this->json_data['isfinal'] = "";
		 $this->json_data['nominalvoucher'] = "";

		$this->load->model('Transaksi_model');
                
		$response = array();
                
		$xQuery = $this->Transaksi_model->getListtransaksi();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['idbooking'] = $row->idbooking;
			 $this->json_data['tglbooking'] = $row->tglbooking;
			 $this->json_data['tglbatalbooking'] = $row->tglbatalbooking;
			 $this->json_data['keteranganbatal'] = $row->keteranganbatal;
			 $this->json_data['harganormal'] = $row->harganormal;
			 $this->json_data['hargadiscount'] = $row->hargadiscount;
			 $this->json_data['idvoucher'] = $row->idvoucher;
			 $this->json_data['idmember'] = $row->idmember;
			 $this->json_data['idpegawai'] = $row->idpegawai;
			 $this->json_data['spesialrequest'] = $row->spesialrequest;
			 $this->json_data['tglupdate'] = $row->tglupdate;
			 $this->json_data['idjenisbayar'] = $row->idjenisbayar;
			 $this->json_data['tglbayar'] = $row->tglbayar;
			 $this->json_data['hargadibayar'] = $row->hargadibayar;
			 $this->json_data['isfinal'] = $row->isfinal;
			 $this->json_data['nominalvoucher'] = $row->nominalvoucher;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatetransaksiAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xidbooking = $_POST['edidbooking'];
		 $xtglbooking = $_POST['edtglbooking'];
		 $xtglbatalbooking = $_POST['edtglbatalbooking'];
		 $xketeranganbatal = $_POST['edketeranganbatal'];
		 $xharganormal = $_POST['edharganormal'];
		 $xhargadiscount = $_POST['edhargadiscount'];
		 $xidvoucher = $_POST['edidvoucher'];
		 $xidmember = $_POST['edidmember'];
		 $xidpegawai = $_POST['edidpegawai'];
		 $xspesialrequest = $_POST['edspesialrequest'];
		 $xtglupdate = $_POST['edtglupdate'];
		 $xidjenisbayar = $_POST['edidjenisbayar'];
		 $xtglbayar = $_POST['edtglbayar'];
		 $xhargadibayar = $_POST['edhargadibayar'];
		 $xisfinal = $_POST['edisfinal'];
		 $xnominalvoucher = $_POST['ednominalvoucher'];

		$this->load->model('Transaksi_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Transaksi_model->Updatetransaksi($xidx,$xidbooking,$xtglbooking,$xtglbatalbooking,$xketeranganbatal,$xharganormal,$xhargadiscount,$xidvoucher,$xidmember,$xidpegawai,$xspesialrequest,$xtglupdate,$xidjenisbayar,$xtglbayar,$xhargadibayar,$xisfinal,$xnominalvoucher);
		} else {
            //===INSERT===
            
		$xStr = $this->Transaksi_model->Inserttransaksi($xidx,$xidbooking,$xtglbooking,$xtglbatalbooking,$xketeranganbatal,$xharganormal,$xhargadiscount,$xidvoucher,$xidmember,$xidpegawai,$xspesialrequest,$xtglupdate,$xidjenisbayar,$xtglbayar,$xhargadibayar,$xisfinal,$xnominalvoucher);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function delettransaksiAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Transaksi_model');
        $this->Transaksi_model->Delettransaksi($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailtransaksiAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Transaksi_model');
        $this->Transaksi_model->getDetailtransaksi($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['idbooking'] = $row->idbooking;
		$this->json_data['tglbooking'] = $row->tglbooking;
		$this->json_data['tglbatalbooking'] = $row->tglbatalbooking;
		$this->json_data['keteranganbatal'] = $row->keteranganbatal;
		$this->json_data['harganormal'] = $row->harganormal;
		$this->json_data['hargadiscount'] = $row->hargadiscount;
		$this->json_data['idvoucher'] = $row->idvoucher;
		$this->json_data['idmember'] = $row->idmember;
		$this->json_data['idpegawai'] = $row->idpegawai;
		$this->json_data['spesialrequest'] = $row->spesialrequest;
		$this->json_data['tglupdate'] = $row->tglupdate;
		$this->json_data['idjenisbayar'] = $row->idjenisbayar;
		$this->json_data['tglbayar'] = $row->tglbayar;
		$this->json_data['hargadibayar'] = $row->hargadibayar;
		$this->json_data['isfinal'] = $row->isfinal;
		$this->json_data['nominalvoucher'] = $row->nominalvoucher;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi/create_action'),
	    'idx' => set_value('idx'),
	    'idbooking' => set_value('idbooking'),
	    'tglbooking' => set_value('tglbooking'),
	    'tglbatalbooking' => set_value('tglbatalbooking'),
	    'keteranganbatal' => set_value('keteranganbatal'),
	    'harganormal' => set_value('harganormal'),
	    'hargadiscount' => set_value('hargadiscount'),
	    'idvoucher' => set_value('idvoucher'),
	    'idmember' => set_value('idmember'),
	    'idpegawai' => set_value('idpegawai'),
	    'spesialrequest' => set_value('spesialrequest'),
	    'tglupdate' => set_value('tglupdate'),
	    'idjenisbayar' => set_value('idjenisbayar'),
	    'tglbayar' => set_value('tglbayar'),
	    'hargadibayar' => set_value('hargadibayar'),
	    'isfinal' => set_value('isfinal'),
	    'nominalvoucher' => set_value('nominalvoucher'),
	);
        $this->load->view('transaksi/transaksi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idbooking' => $this->input->post('idbooking',TRUE),
		'tglbooking' => $this->input->post('tglbooking',TRUE),
		'tglbatalbooking' => $this->input->post('tglbatalbooking',TRUE),
		'keteranganbatal' => $this->input->post('keteranganbatal',TRUE),
		'harganormal' => $this->input->post('harganormal',TRUE),
		'hargadiscount' => $this->input->post('hargadiscount',TRUE),
		'idvoucher' => $this->input->post('idvoucher',TRUE),
		'idmember' => $this->input->post('idmember',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
		'spesialrequest' => $this->input->post('spesialrequest',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'idjenisbayar' => $this->input->post('idjenisbayar',TRUE),
		'tglbayar' => $this->input->post('tglbayar',TRUE),
		'hargadibayar' => $this->input->post('hargadibayar',TRUE),
		'isfinal' => $this->input->post('isfinal',TRUE),
		'nominalvoucher' => $this->input->post('nominalvoucher',TRUE),
	    );

            $this->Transaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idbooking' => set_value('idbooking', $row->idbooking),
		'tglbooking' => set_value('tglbooking', $row->tglbooking),
		'tglbatalbooking' => set_value('tglbatalbooking', $row->tglbatalbooking),
		'keteranganbatal' => set_value('keteranganbatal', $row->keteranganbatal),
		'harganormal' => set_value('harganormal', $row->harganormal),
		'hargadiscount' => set_value('hargadiscount', $row->hargadiscount),
		'idvoucher' => set_value('idvoucher', $row->idvoucher),
		'idmember' => set_value('idmember', $row->idmember),
		'idpegawai' => set_value('idpegawai', $row->idpegawai),
		'spesialrequest' => set_value('spesialrequest', $row->spesialrequest),
		'tglupdate' => set_value('tglupdate', $row->tglupdate),
		'idjenisbayar' => set_value('idjenisbayar', $row->idjenisbayar),
		'tglbayar' => set_value('tglbayar', $row->tglbayar),
		'hargadibayar' => set_value('hargadibayar', $row->hargadibayar),
		'isfinal' => set_value('isfinal', $row->isfinal),
		'nominalvoucher' => set_value('nominalvoucher', $row->nominalvoucher),
	    );
            $this->load->view('transaksi/transaksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'idbooking' => $this->input->post('idbooking',TRUE),
		'tglbooking' => $this->input->post('tglbooking',TRUE),
		'tglbatalbooking' => $this->input->post('tglbatalbooking',TRUE),
		'keteranganbatal' => $this->input->post('keteranganbatal',TRUE),
		'harganormal' => $this->input->post('harganormal',TRUE),
		'hargadiscount' => $this->input->post('hargadiscount',TRUE),
		'idvoucher' => $this->input->post('idvoucher',TRUE),
		'idmember' => $this->input->post('idmember',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
		'spesialrequest' => $this->input->post('spesialrequest',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'idjenisbayar' => $this->input->post('idjenisbayar',TRUE),
		'tglbayar' => $this->input->post('tglbayar',TRUE),
		'hargadibayar' => $this->input->post('hargadibayar',TRUE),
		'isfinal' => $this->input->post('isfinal',TRUE),
		'nominalvoucher' => $this->input->post('nominalvoucher',TRUE),
	    );

            $this->Transaksi_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idbooking', 'idbooking', 'trim|required');
	$this->form_validation->set_rules('tglbooking', 'tglbooking', 'trim|required');
	$this->form_validation->set_rules('tglbatalbooking', 'tglbatalbooking', 'trim|required');
	$this->form_validation->set_rules('keteranganbatal', 'keteranganbatal', 'trim|required');
	$this->form_validation->set_rules('harganormal', 'harganormal', 'trim|required');
	$this->form_validation->set_rules('hargadiscount', 'hargadiscount', 'trim|required');
	$this->form_validation->set_rules('idvoucher', 'idvoucher', 'trim|required');
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('idpegawai', 'idpegawai', 'trim|required');
	$this->form_validation->set_rules('spesialrequest', 'spesialrequest', 'trim|required');
	$this->form_validation->set_rules('tglupdate', 'tglupdate', 'trim|required');
	$this->form_validation->set_rules('idjenisbayar', 'idjenisbayar', 'trim|required');
	$this->form_validation->set_rules('tglbayar', 'tglbayar', 'trim|required');
	$this->form_validation->set_rules('hargadibayar', 'hargadibayar', 'trim|required');
	$this->form_validation->set_rules('isfinal', 'isfinal', 'trim|required');
	$this->form_validation->set_rules('nominalvoucher', 'nominalvoucher', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

