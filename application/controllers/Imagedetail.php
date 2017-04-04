<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Imagedetail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Imagedetail_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('imagedetail/imagedetail_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Imagedetail_model->json();
    }

    public function read($id) 
    {
        $row = $this->Imagedetail_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'iddetailproduk' => $row->iddetailproduk,
		'idkategoriproduk' => $row->idkategoriproduk,
		'linkimage' => $row->linkimage,
		'keteranganimage' => $row->keteranganimage,
		'rancode' => $row->rancode,
		'tglinsert' => $row->tglinsert,
		'tglupdate' => $row->tglupdate,
		'idpegawai' => $row->idpegawai,
		'idproduk' => $row->idproduk,
		'isprofile' => $row->isprofile,
	    );
            $this->load->view('imagedetail/imagedetail_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('imagedetail'));
        }
    }

//=========READ=========
        

public function readimagedetailAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['iddetailproduk'] = "";
		 $this->json_data['idkategoriproduk'] = "";
		 $this->json_data['linkimage'] = "";
		 $this->json_data['keteranganimage'] = "";
		 $this->json_data['rancode'] = "";
		 $this->json_data['tglinsert'] = "";
		 $this->json_data['tglupdate'] = "";
		 $this->json_data['idpegawai'] = "";
		 $this->json_data['idproduk'] = "";
		 $this->json_data['isprofile'] = "";

		$this->load->model('Imagedetail_model');
                
		$response = array();
                
		$xQuery = $this->Imagedetail_model->getListimagedetail();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['iddetailproduk'] = $row->iddetailproduk;
			 $this->json_data['idkategoriproduk'] = $row->idkategoriproduk;
			 $this->json_data['linkimage'] = $row->linkimage;
			 $this->json_data['keteranganimage'] = $row->keteranganimage;
			 $this->json_data['rancode'] = $row->rancode;
			 $this->json_data['tglinsert'] = $row->tglinsert;
			 $this->json_data['tglupdate'] = $row->tglupdate;
			 $this->json_data['idpegawai'] = $row->idpegawai;
			 $this->json_data['idproduk'] = $row->idproduk;
			 $this->json_data['isprofile'] = $row->isprofile;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdateimagedetailAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xiddetailproduk = $_POST['ediddetailproduk'];
		 $xidkategoriproduk = $_POST['edidkategoriproduk'];
		 $xlinkimage = $_POST['edlinkimage'];
		 $xketeranganimage = $_POST['edketeranganimage'];
		 $xrancode = $_POST['edrancode'];
		 $xtglinsert = $_POST['edtglinsert'];
		 $xtglupdate = $_POST['edtglupdate'];
		 $xidpegawai = $_POST['edidpegawai'];
		 $xidproduk = $_POST['edidproduk'];
		 $xisprofile = $_POST['edisprofile'];

		$this->load->model('Imagedetail_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Imagedetail_model->Updateimagedetail($xidx,$xiddetailproduk,$xidkategoriproduk,$xlinkimage,$xketeranganimage,$xrancode,$xtglinsert,$xtglupdate,$xidpegawai,$xidproduk,$xisprofile);
		} else {
            //===INSERT===
            
		$xStr = $this->Imagedetail_model->Insertimagedetail($xidx,$xiddetailproduk,$xidkategoriproduk,$xlinkimage,$xketeranganimage,$xrancode,$xtglinsert,$xtglupdate,$xidpegawai,$xidproduk,$xisprofile);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletimagedetailAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Imagedetail_model');
        $this->Imagedetail_model->Deletimagedetail($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailimagedetailAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Imagedetail_model');
        $this->Imagedetail_model->getDetailimagedetail($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['iddetailproduk'] = $row->iddetailproduk;
		$this->json_data['idkategoriproduk'] = $row->idkategoriproduk;
		$this->json_data['linkimage'] = $row->linkimage;
		$this->json_data['keteranganimage'] = $row->keteranganimage;
		$this->json_data['rancode'] = $row->rancode;
		$this->json_data['tglinsert'] = $row->tglinsert;
		$this->json_data['tglupdate'] = $row->tglupdate;
		$this->json_data['idpegawai'] = $row->idpegawai;
		$this->json_data['idproduk'] = $row->idproduk;
		$this->json_data['isprofile'] = $row->isprofile;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('imagedetail/create_action'),
	    'idx' => set_value('idx'),
	    'iddetailproduk' => set_value('iddetailproduk'),
	    'idkategoriproduk' => set_value('idkategoriproduk'),
	    'linkimage' => set_value('linkimage'),
	    'keteranganimage' => set_value('keteranganimage'),
	    'rancode' => set_value('rancode'),
	    'tglinsert' => set_value('tglinsert'),
	    'tglupdate' => set_value('tglupdate'),
	    'idpegawai' => set_value('idpegawai'),
	    'idproduk' => set_value('idproduk'),
	    'isprofile' => set_value('isprofile'),
	);
        $this->load->view('imagedetail/imagedetail_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'iddetailproduk' => $this->input->post('iddetailproduk',TRUE),
		'idkategoriproduk' => $this->input->post('idkategoriproduk',TRUE),
		'linkimage' => $this->input->post('linkimage',TRUE),
		'keteranganimage' => $this->input->post('keteranganimage',TRUE),
		'rancode' => $this->input->post('rancode',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'isprofile' => $this->input->post('isprofile',TRUE),
	    );

            $this->Imagedetail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('imagedetail'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Imagedetail_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('imagedetail/update_action'),
		'idx' => set_value('idx', $row->idx),
		'iddetailproduk' => set_value('iddetailproduk', $row->iddetailproduk),
		'idkategoriproduk' => set_value('idkategoriproduk', $row->idkategoriproduk),
		'linkimage' => set_value('linkimage', $row->linkimage),
		'keteranganimage' => set_value('keteranganimage', $row->keteranganimage),
		'rancode' => set_value('rancode', $row->rancode),
		'tglinsert' => set_value('tglinsert', $row->tglinsert),
		'tglupdate' => set_value('tglupdate', $row->tglupdate),
		'idpegawai' => set_value('idpegawai', $row->idpegawai),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'isprofile' => set_value('isprofile', $row->isprofile),
	    );
            $this->load->view('imagedetail/imagedetail_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('imagedetail'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'iddetailproduk' => $this->input->post('iddetailproduk',TRUE),
		'idkategoriproduk' => $this->input->post('idkategoriproduk',TRUE),
		'linkimage' => $this->input->post('linkimage',TRUE),
		'keteranganimage' => $this->input->post('keteranganimage',TRUE),
		'rancode' => $this->input->post('rancode',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'isprofile' => $this->input->post('isprofile',TRUE),
	    );

            $this->Imagedetail_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('imagedetail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Imagedetail_model->get_by_id($id);

        if ($row) {
            $this->Imagedetail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('imagedetail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('imagedetail'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('iddetailproduk', 'iddetailproduk', 'trim|required');
	$this->form_validation->set_rules('idkategoriproduk', 'idkategoriproduk', 'trim|required');
	$this->form_validation->set_rules('linkimage', 'linkimage', 'trim|required');
	$this->form_validation->set_rules('keteranganimage', 'keteranganimage', 'trim|required');
	$this->form_validation->set_rules('rancode', 'rancode', 'trim|required');
	$this->form_validation->set_rules('tglinsert', 'tglinsert', 'trim|required');
	$this->form_validation->set_rules('tglupdate', 'tglupdate', 'trim|required');
	$this->form_validation->set_rules('idpegawai', 'idpegawai', 'trim|required');
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('isprofile', 'isprofile', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

