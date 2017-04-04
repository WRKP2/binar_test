<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategoriproduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategoriproduk_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('kategoriproduk/kategoriproduk_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kategoriproduk_model->json();
    }

    public function read($id) 
    {
        $row = $this->Kategoriproduk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'Kategori' => $row->Kategori,
		'icon' => $row->icon,
	    );
            $this->load->view('kategoriproduk/kategoriproduk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategoriproduk'));
        }
    }

//=========READ=========
        

public function readkategoriprodukAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['Kategori'] = "";
		 $this->json_data['icon'] = "";

		$this->load->model('Kategoriproduk_model');
                
		$response = array();
                
		$xQuery = $this->Kategoriproduk_model->getListkategoriproduk();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['Kategori'] = $row->Kategori;
			 $this->json_data['icon'] = $row->icon;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatekategoriprodukAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xKategori = $_POST['edKategori'];
		 $xicon = $_POST['edicon'];

		$this->load->model('Kategoriproduk_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Kategoriproduk_model->Updatekategoriproduk($xidx,$xKategori,$xicon);
		} else {
            //===INSERT===
            
		$xStr = $this->Kategoriproduk_model->Insertkategoriproduk($xidx,$xKategori,$xicon);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletkategoriprodukAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Kategoriproduk_model');
        $this->Kategoriproduk_model->Deletkategoriproduk($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailkategoriprodukAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Kategoriproduk_model');
        $this->Kategoriproduk_model->getDetailkategoriproduk($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['Kategori'] = $row->Kategori;
		$this->json_data['icon'] = $row->icon;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kategoriproduk/create_action'),
	    'idx' => set_value('idx'),
	    'Kategori' => set_value('Kategori'),
	    'icon' => set_value('icon'),
	);
        $this->load->view('kategoriproduk/kategoriproduk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Kategori' => $this->input->post('Kategori',TRUE),
		'icon' => $this->input->post('icon',TRUE),
	    );

            $this->Kategoriproduk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kategoriproduk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kategoriproduk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kategoriproduk/update_action'),
		'idx' => set_value('idx', $row->idx),
		'Kategori' => set_value('Kategori', $row->Kategori),
		'icon' => set_value('icon', $row->icon),
	    );
            $this->load->view('kategoriproduk/kategoriproduk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategoriproduk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'Kategori' => $this->input->post('Kategori',TRUE),
		'icon' => $this->input->post('icon',TRUE),
	    );

            $this->Kategoriproduk_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kategoriproduk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kategoriproduk_model->get_by_id($id);

        if ($row) {
            $this->Kategoriproduk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kategoriproduk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategoriproduk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Kategori', 'kategori', 'trim|required');
	$this->form_validation->set_rules('icon', 'icon', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

