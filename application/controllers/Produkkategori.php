<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produkkategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Produkkategori_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('produkkategori/produkkategori_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Produkkategori_model->json();
    }

    public function read($id) 
    {
        $row = $this->Produkkategori_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idproduk' => $row->idproduk,
		'idkategori' => $row->idkategori,
		'tglinsert' => $row->tglinsert,
		'idpegawai' => $row->idpegawai,
		'iddetailproduk' => $row->iddetailproduk,
	    );
            $this->load->view('produkkategori/produkkategori_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produkkategori'));
        }
    }

//=========READ=========
        

public function readprodukkategoriAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['idproduk'] = "";
		 $this->json_data['idkategori'] = "";
		 $this->json_data['tglinsert'] = "";
		 $this->json_data['idpegawai'] = "";
		 $this->json_data['iddetailproduk'] = "";

		$this->load->model('Produkkategori_model');
                
		$response = array();
                
		$xQuery = $this->Produkkategori_model->getListprodukkategori();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['idproduk'] = $row->idproduk;
			 $this->json_data['idkategori'] = $row->idkategori;
			 $this->json_data['tglinsert'] = $row->tglinsert;
			 $this->json_data['idpegawai'] = $row->idpegawai;
			 $this->json_data['iddetailproduk'] = $row->iddetailproduk;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdateprodukkategoriAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xidproduk = $_POST['edidproduk'];
		 $xidkategori = $_POST['edidkategori'];
		 $xtglinsert = $_POST['edtglinsert'];
		 $xidpegawai = $_POST['edidpegawai'];
		 $xiddetailproduk = $_POST['ediddetailproduk'];

		$this->load->model('Produkkategori_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Produkkategori_model->Updateprodukkategori($xidx,$xidproduk,$xidkategori,$xtglinsert,$xidpegawai,$xiddetailproduk);
		} else {
            //===INSERT===
            
		$xStr = $this->Produkkategori_model->Insertprodukkategori($xidx,$xidproduk,$xidkategori,$xtglinsert,$xidpegawai,$xiddetailproduk);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletprodukkategoriAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Produkkategori_model');
        $this->Produkkategori_model->Deletprodukkategori($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailprodukkategoriAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Produkkategori_model');
        $this->Produkkategori_model->getDetailprodukkategori($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['idproduk'] = $row->idproduk;
		$this->json_data['idkategori'] = $row->idkategori;
		$this->json_data['tglinsert'] = $row->tglinsert;
		$this->json_data['idpegawai'] = $row->idpegawai;
		$this->json_data['iddetailproduk'] = $row->iddetailproduk;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('produkkategori/create_action'),
	    'idx' => set_value('idx'),
	    'idproduk' => set_value('idproduk'),
	    'idkategori' => set_value('idkategori'),
	    'tglinsert' => set_value('tglinsert'),
	    'idpegawai' => set_value('idpegawai'),
	    'iddetailproduk' => set_value('iddetailproduk'),
	);
        $this->load->view('produkkategori/produkkategori_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idproduk' => $this->input->post('idproduk',TRUE),
		'idkategori' => $this->input->post('idkategori',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
		'iddetailproduk' => $this->input->post('iddetailproduk',TRUE),
	    );

            $this->Produkkategori_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('produkkategori'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Produkkategori_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('produkkategori/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'idkategori' => set_value('idkategori', $row->idkategori),
		'tglinsert' => set_value('tglinsert', $row->tglinsert),
		'idpegawai' => set_value('idpegawai', $row->idpegawai),
		'iddetailproduk' => set_value('iddetailproduk', $row->iddetailproduk),
	    );
            $this->load->view('produkkategori/produkkategori_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produkkategori'));
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
		'idkategori' => $this->input->post('idkategori',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
		'iddetailproduk' => $this->input->post('iddetailproduk',TRUE),
	    );

            $this->Produkkategori_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('produkkategori'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Produkkategori_model->get_by_id($id);

        if ($row) {
            $this->Produkkategori_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produkkategori'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produkkategori'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('idkategori', 'idkategori', 'trim|required');
	$this->form_validation->set_rules('tglinsert', 'tglinsert', 'trim|required');
	$this->form_validation->set_rules('idpegawai', 'idpegawai', 'trim|required');
	$this->form_validation->set_rules('iddetailproduk', 'iddetailproduk', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

