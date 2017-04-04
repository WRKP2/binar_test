<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Marketingproduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Marketingproduk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'marketingproduk/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'marketingproduk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'marketingproduk/index.html';
            $config['first_url'] = base_url() . 'marketingproduk/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Marketingproduk_model->total_rows($q);
        $marketingproduk = $this->Marketingproduk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'marketingproduk_data' => $marketingproduk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('marketingproduk/marketingproduk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Marketingproduk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idmember' => $row->idmember,
		'idproduk' => $row->idproduk,
		'tgldaftar' => $row->tgldaftar,
	    );
            $this->load->view('marketingproduk/marketingproduk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('marketingproduk'));
        }
    }

//=========READ=========
        

public function readmarketingprodukAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['idmember'] = "";
		 $this->json_data['idproduk'] = "";
		 $this->json_data['tgldaftar'] = "";

		$this->load->model('Marketingproduk_model');
                
		$response = array();
                
		$xQuery = $this->Marketingproduk_model->getListmarketingproduk();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['idmember'] = $row->idmember;
			 $this->json_data['idproduk'] = $row->idproduk;
			 $this->json_data['tgldaftar'] = $row->tgldaftar;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatemarketingprodukAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xidmember = $_POST['edidmember'];
		 $xidproduk = $_POST['edidproduk'];
		 $xtgldaftar = $_POST['edtgldaftar'];

		$this->load->model('Marketingproduk_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Marketingproduk_model->Updatemarketingproduk($xidx,$xidmember,$xidproduk,$xtgldaftar);
		} else {
            //===INSERT===
            
		$xStr = $this->Marketingproduk_model->Insertmarketingproduk($xidx,$xidmember,$xidproduk,$xtgldaftar);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletmarketingprodukAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Marketingproduk_model');
        $this->Marketingproduk_model->Deletmarketingproduk($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailmarketingprodukAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Marketingproduk_model');
        $this->Marketingproduk_model->getDetailmarketingproduk($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['idmember'] = $row->idmember;
		$this->json_data['idproduk'] = $row->idproduk;
		$this->json_data['tgldaftar'] = $row->tgldaftar;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('marketingproduk/create_action'),
	    'idx' => set_value('idx'),
	    'idmember' => set_value('idmember'),
	    'idproduk' => set_value('idproduk'),
	    'tgldaftar' => set_value('tgldaftar'),
	);
        $this->load->view('marketingproduk/marketingproduk_form', $data);
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
		'tgldaftar' => $this->input->post('tgldaftar',TRUE),
	    );

            $this->Marketingproduk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('marketingproduk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Marketingproduk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('marketingproduk/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idmember' => set_value('idmember', $row->idmember),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'tgldaftar' => set_value('tgldaftar', $row->tgldaftar),
	    );
            $this->load->view('marketingproduk/marketingproduk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('marketingproduk'));
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
		'tgldaftar' => $this->input->post('tgldaftar',TRUE),
	    );

            $this->Marketingproduk_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('marketingproduk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Marketingproduk_model->get_by_id($id);

        if ($row) {
            $this->Marketingproduk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('marketingproduk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('marketingproduk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('tgldaftar', 'tgldaftar', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

