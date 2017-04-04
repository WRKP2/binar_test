<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detailprodukkategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detailprodukkategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'detailprodukkategori/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'detailprodukkategori/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'detailprodukkategori/index.html';
            $config['first_url'] = base_url() . 'detailprodukkategori/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Detailprodukkategori_model->total_rows($q);
        $detailprodukkategori = $this->Detailprodukkategori_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detailprodukkategori_data' => $detailprodukkategori,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('detailprodukkategori/detailprodukkategori_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Detailprodukkategori_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'iddetailproduk' => $row->iddetailproduk,
		'idkategori' => $row->idkategori,
		'tglinsert' => $row->tglinsert,
		'idpegawai' => $row->idpegawai,
	    );
            $this->load->view('detailprodukkategori/detailprodukkategori_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailprodukkategori'));
        }
    }

//=========READ=========
        

public function readdetailprodukkategoriAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['iddetailproduk'] = "";
		 $this->json_data['idkategori'] = "";
		 $this->json_data['tglinsert'] = "";
		 $this->json_data['idpegawai'] = "";

		$this->load->model('Detailprodukkategori_model');
                
		$response = array();
                
		$xQuery = $this->Detailprodukkategori_model->getListdetailprodukkategori();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['iddetailproduk'] = $row->iddetailproduk;
			 $this->json_data['idkategori'] = $row->idkategori;
			 $this->json_data['tglinsert'] = $row->tglinsert;
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
        

public function simpanupdatedetailprodukkategoriAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xiddetailproduk = $_POST['ediddetailproduk'];
		 $xidkategori = $_POST['edidkategori'];
		 $xtglinsert = $_POST['edtglinsert'];
		 $xidpegawai = $_POST['edidpegawai'];

		$this->load->model('Detailprodukkategori_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Detailprodukkategori_model->Updatedetailprodukkategori($xidx,$xiddetailproduk,$xidkategori,$xtglinsert,$xidpegawai);
		} else {
            //===INSERT===
            
		$xStr = $this->Detailprodukkategori_model->Insertdetailprodukkategori($xidx,$xiddetailproduk,$xidkategori,$xtglinsert,$xidpegawai);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletdetailprodukkategoriAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Detailprodukkategori_model');
        $this->Detailprodukkategori_model->Deletdetailprodukkategori($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetaildetailprodukkategoriAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Detailprodukkategori_model');
        $this->Detailprodukkategori_model->getDetaildetailprodukkategori($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['iddetailproduk'] = $row->iddetailproduk;
		$this->json_data['idkategori'] = $row->idkategori;
		$this->json_data['tglinsert'] = $row->tglinsert;
		$this->json_data['idpegawai'] = $row->idpegawai;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detailprodukkategori/create_action'),
	    'idx' => set_value('idx'),
	    'iddetailproduk' => set_value('iddetailproduk'),
	    'idkategori' => set_value('idkategori'),
	    'tglinsert' => set_value('tglinsert'),
	    'idpegawai' => set_value('idpegawai'),
	);
        $this->load->view('detailprodukkategori/detailprodukkategori_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'iddetailproduk' => $this->input->post('iddetailproduk',TRUE),
		'idkategori' => $this->input->post('idkategori',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
	    );

            $this->Detailprodukkategori_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detailprodukkategori'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detailprodukkategori_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detailprodukkategori/update_action'),
		'idx' => set_value('idx', $row->idx),
		'iddetailproduk' => set_value('iddetailproduk', $row->iddetailproduk),
		'idkategori' => set_value('idkategori', $row->idkategori),
		'tglinsert' => set_value('tglinsert', $row->tglinsert),
		'idpegawai' => set_value('idpegawai', $row->idpegawai),
	    );
            $this->load->view('detailprodukkategori/detailprodukkategori_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailprodukkategori'));
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
		'idkategori' => $this->input->post('idkategori',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
	    );

            $this->Detailprodukkategori_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detailprodukkategori'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detailprodukkategori_model->get_by_id($id);

        if ($row) {
            $this->Detailprodukkategori_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detailprodukkategori'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailprodukkategori'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('iddetailproduk', 'iddetailproduk', 'trim|required');
	$this->form_validation->set_rules('idkategori', 'idkategori', 'trim|required');
	$this->form_validation->set_rules('tglinsert', 'tglinsert', 'trim|required');
	$this->form_validation->set_rules('idpegawai', 'idpegawai', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

