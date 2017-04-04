<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produkpromo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Produkpromo_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'produkpromo/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'produkpromo/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'produkpromo/index.html';
            $config['first_url'] = base_url() . 'produkpromo/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Produkpromo_model->total_rows($q);
        $produkpromo = $this->Produkpromo_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'produkpromo_data' => $produkpromo,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('produkpromo/produkpromo_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Produkpromo_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idproduk' => $row->idproduk,
		'tglawalpromo' => $row->tglawalpromo,
		'tglakhirpromo' => $row->tglakhirpromo,
		'isaktif' => $row->isaktif,
		'idmemberpengaju' => $row->idmemberpengaju,
		'isbayarpromo' => $row->isbayarpromo,
		'tglbayarpromo' => $row->tglbayarpromo,
		'ketpromo' => $row->ketpromo,
		'tglinsert' => $row->tglinsert,
		'tglupdate' => $row->tglupdate,
		'idpegawai' => $row->idpegawai,
	    );
            $this->load->view('produkpromo/produkpromo_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produkpromo'));
        }
    }

//=========READ=========
        

public function readprodukpromoAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['idproduk'] = "";
		 $this->json_data['tglawalpromo'] = "";
		 $this->json_data['tglakhirpromo'] = "";
		 $this->json_data['isaktif'] = "";
		 $this->json_data['idmemberpengaju'] = "";
		 $this->json_data['isbayarpromo'] = "";
		 $this->json_data['tglbayarpromo'] = "";
		 $this->json_data['ketpromo'] = "";
		 $this->json_data['tglinsert'] = "";
		 $this->json_data['tglupdate'] = "";
		 $this->json_data['idpegawai'] = "";

		$this->load->model('Produkpromo_model');
                
		$response = array();
                
		$xQuery = $this->Produkpromo_model->getListprodukpromo();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['idproduk'] = $row->idproduk;
			 $this->json_data['tglawalpromo'] = $row->tglawalpromo;
			 $this->json_data['tglakhirpromo'] = $row->tglakhirpromo;
			 $this->json_data['isaktif'] = $row->isaktif;
			 $this->json_data['idmemberpengaju'] = $row->idmemberpengaju;
			 $this->json_data['isbayarpromo'] = $row->isbayarpromo;
			 $this->json_data['tglbayarpromo'] = $row->tglbayarpromo;
			 $this->json_data['ketpromo'] = $row->ketpromo;
			 $this->json_data['tglinsert'] = $row->tglinsert;
			 $this->json_data['tglupdate'] = $row->tglupdate;
			 $this->json_data['idpegawai'] = $row->idpegawai;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdateprodukpromoAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xidproduk = $_POST['edidproduk'];
		 $xtglawalpromo = $_POST['edtglawalpromo'];
		 $xtglakhirpromo = $_POST['edtglakhirpromo'];
		 $xisaktif = $_POST['edisaktif'];
		 $xidmemberpengaju = $_POST['edidmemberpengaju'];
		 $xisbayarpromo = $_POST['edisbayarpromo'];
		 $xtglbayarpromo = $_POST['edtglbayarpromo'];
		 $xketpromo = $_POST['edketpromo'];
		 $xtglinsert = $_POST['edtglinsert'];
		 $xtglupdate = $_POST['edtglupdate'];
		 $xidpegawai = $_POST['edidpegawai'];

		$this->load->model('Produkpromo_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Produkpromo_model->Updateprodukpromo($xidx,$xidproduk,$xtglawalpromo,$xtglakhirpromo,$xisaktif,$xidmemberpengaju,$xisbayarpromo,$xtglbayarpromo,$xketpromo,$xtglinsert,$xtglupdate,$xidpegawai);
		} else {
            //===INSERT===
            
		$xStr = $this->Produkpromo_model->Insertprodukpromo($xidx,$xidproduk,$xtglawalpromo,$xtglakhirpromo,$xisaktif,$xidmemberpengaju,$xisbayarpromo,$xtglbayarpromo,$xketpromo,$xtglinsert,$xtglupdate,$xidpegawai);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletprodukpromoAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Produkpromo_model');
        $this->Produkpromo_model->Deletprodukpromo($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailprodukpromoAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Produkpromo_model');
        $this->Produkpromo_model->getDetailprodukpromo($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['idproduk'] = $row->idproduk;
		$this->json_data['tglawalpromo'] = $row->tglawalpromo;
		$this->json_data['tglakhirpromo'] = $row->tglakhirpromo;
		$this->json_data['isaktif'] = $row->isaktif;
		$this->json_data['idmemberpengaju'] = $row->idmemberpengaju;
		$this->json_data['isbayarpromo'] = $row->isbayarpromo;
		$this->json_data['tglbayarpromo'] = $row->tglbayarpromo;
		$this->json_data['ketpromo'] = $row->ketpromo;
		$this->json_data['tglinsert'] = $row->tglinsert;
		$this->json_data['tglupdate'] = $row->tglupdate;
		$this->json_data['idpegawai'] = $row->idpegawai;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('produkpromo/create_action'),
	    'idx' => set_value('idx'),
	    'idproduk' => set_value('idproduk'),
	    'tglawalpromo' => set_value('tglawalpromo'),
	    'tglakhirpromo' => set_value('tglakhirpromo'),
	    'isaktif' => set_value('isaktif'),
	    'idmemberpengaju' => set_value('idmemberpengaju'),
	    'isbayarpromo' => set_value('isbayarpromo'),
	    'tglbayarpromo' => set_value('tglbayarpromo'),
	    'ketpromo' => set_value('ketpromo'),
	    'tglinsert' => set_value('tglinsert'),
	    'tglupdate' => set_value('tglupdate'),
	    'idpegawai' => set_value('idpegawai'),
	);
        $this->load->view('produkpromo/produkpromo_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idproduk' => $this->input->post('idproduk',TRUE),
		'tglawalpromo' => $this->input->post('tglawalpromo',TRUE),
		'tglakhirpromo' => $this->input->post('tglakhirpromo',TRUE),
		'isaktif' => $this->input->post('isaktif',TRUE),
		'idmemberpengaju' => $this->input->post('idmemberpengaju',TRUE),
		'isbayarpromo' => $this->input->post('isbayarpromo',TRUE),
		'tglbayarpromo' => $this->input->post('tglbayarpromo',TRUE),
		'ketpromo' => $this->input->post('ketpromo',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
	    );

            $this->Produkpromo_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('produkpromo'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Produkpromo_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('produkpromo/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'tglawalpromo' => set_value('tglawalpromo', $row->tglawalpromo),
		'tglakhirpromo' => set_value('tglakhirpromo', $row->tglakhirpromo),
		'isaktif' => set_value('isaktif', $row->isaktif),
		'idmemberpengaju' => set_value('idmemberpengaju', $row->idmemberpengaju),
		'isbayarpromo' => set_value('isbayarpromo', $row->isbayarpromo),
		'tglbayarpromo' => set_value('tglbayarpromo', $row->tglbayarpromo),
		'ketpromo' => set_value('ketpromo', $row->ketpromo),
		'tglinsert' => set_value('tglinsert', $row->tglinsert),
		'tglupdate' => set_value('tglupdate', $row->tglupdate),
		'idpegawai' => set_value('idpegawai', $row->idpegawai),
	    );
            $this->load->view('produkpromo/produkpromo_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produkpromo'));
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
		'tglawalpromo' => $this->input->post('tglawalpromo',TRUE),
		'tglakhirpromo' => $this->input->post('tglakhirpromo',TRUE),
		'isaktif' => $this->input->post('isaktif',TRUE),
		'idmemberpengaju' => $this->input->post('idmemberpengaju',TRUE),
		'isbayarpromo' => $this->input->post('isbayarpromo',TRUE),
		'tglbayarpromo' => $this->input->post('tglbayarpromo',TRUE),
		'ketpromo' => $this->input->post('ketpromo',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
	    );

            $this->Produkpromo_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('produkpromo'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Produkpromo_model->get_by_id($id);

        if ($row) {
            $this->Produkpromo_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produkpromo'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produkpromo'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('tglawalpromo', 'tglawalpromo', 'trim|required');
	$this->form_validation->set_rules('tglakhirpromo', 'tglakhirpromo', 'trim|required');
	$this->form_validation->set_rules('isaktif', 'isaktif', 'trim|required');
	$this->form_validation->set_rules('idmemberpengaju', 'idmemberpengaju', 'trim|required');
	$this->form_validation->set_rules('isbayarpromo', 'isbayarpromo', 'trim|required');
	$this->form_validation->set_rules('tglbayarpromo', 'tglbayarpromo', 'trim|required');
	$this->form_validation->set_rules('ketpromo', 'ketpromo', 'trim|required');
	$this->form_validation->set_rules('tglinsert', 'tglinsert', 'trim|required');
	$this->form_validation->set_rules('tglupdate', 'tglupdate', 'trim|required');
	$this->form_validation->set_rules('idpegawai', 'idpegawai', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

