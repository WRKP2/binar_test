<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inboxfcm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Inboxfcm_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'inboxfcm/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'inboxfcm/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'inboxfcm/index.html';
            $config['first_url'] = base_url() . 'inboxfcm/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Inboxfcm_model->total_rows($q);
        $inboxfcm = $this->Inboxfcm_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'inboxfcm_data' => $inboxfcm,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('inboxfcm/inboxfcm_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Inboxfcm_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idmember' => $row->idmember,
		'judul' => $row->judul,
		'message' => $row->message,
		'tglmessage' => $row->tglmessage,
		'isterbaca' => $row->isterbaca,
		'idmenuandroid' => $row->idmenuandroid,
	    );
            $this->load->view('inboxfcm/inboxfcm_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('inboxfcm'));
        }
    }

//=========READ=========
        

public function readinboxfcmAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['idmember'] = "";
		 $this->json_data['judul'] = "";
		 $this->json_data['message'] = "";
		 $this->json_data['tglmessage'] = "";
		 $this->json_data['isterbaca'] = "";
		 $this->json_data['idmenuandroid'] = "";

		$this->load->model('Inboxfcm_model');
                
		$response = array();
                
		$xQuery = $this->Inboxfcm_model->getListinboxfcm();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['idmember'] = $row->idmember;
			 $this->json_data['judul'] = $row->judul;
			 $this->json_data['message'] = $row->message;
			 $this->json_data['tglmessage'] = $row->tglmessage;
			 $this->json_data['isterbaca'] = $row->isterbaca;
			 $this->json_data['idmenuandroid'] = $row->idmenuandroid;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdateinboxfcmAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xidmember = $_POST['edidmember'];
		 $xjudul = $_POST['edjudul'];
		 $xmessage = $_POST['edmessage'];
		 $xtglmessage = $_POST['edtglmessage'];
		 $xisterbaca = $_POST['edisterbaca'];
		 $xidmenuandroid = $_POST['edidmenuandroid'];

		$this->load->model('Inboxfcm_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Inboxfcm_model->Updateinboxfcm($xidx,$xidmember,$xjudul,$xmessage,$xtglmessage,$xisterbaca,$xidmenuandroid);
		} else {
            //===INSERT===
            
		$xStr = $this->Inboxfcm_model->Insertinboxfcm($xidx,$xidmember,$xjudul,$xmessage,$xtglmessage,$xisterbaca,$xidmenuandroid);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletinboxfcmAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Inboxfcm_model');
        $this->Inboxfcm_model->Deletinboxfcm($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailinboxfcmAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Inboxfcm_model');
        $this->Inboxfcm_model->getDetailinboxfcm($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['idmember'] = $row->idmember;
		$this->json_data['judul'] = $row->judul;
		$this->json_data['message'] = $row->message;
		$this->json_data['tglmessage'] = $row->tglmessage;
		$this->json_data['isterbaca'] = $row->isterbaca;
		$this->json_data['idmenuandroid'] = $row->idmenuandroid;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('inboxfcm/create_action'),
	    'idx' => set_value('idx'),
	    'idmember' => set_value('idmember'),
	    'judul' => set_value('judul'),
	    'message' => set_value('message'),
	    'tglmessage' => set_value('tglmessage'),
	    'isterbaca' => set_value('isterbaca'),
	    'idmenuandroid' => set_value('idmenuandroid'),
	);
        $this->load->view('inboxfcm/inboxfcm_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idmember' => $this->input->post('idmember',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'message' => $this->input->post('message',TRUE),
		'tglmessage' => $this->input->post('tglmessage',TRUE),
		'isterbaca' => $this->input->post('isterbaca',TRUE),
		'idmenuandroid' => $this->input->post('idmenuandroid',TRUE),
	    );

            $this->Inboxfcm_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('inboxfcm'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Inboxfcm_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('inboxfcm/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idmember' => set_value('idmember', $row->idmember),
		'judul' => set_value('judul', $row->judul),
		'message' => set_value('message', $row->message),
		'tglmessage' => set_value('tglmessage', $row->tglmessage),
		'isterbaca' => set_value('isterbaca', $row->isterbaca),
		'idmenuandroid' => set_value('idmenuandroid', $row->idmenuandroid),
	    );
            $this->load->view('inboxfcm/inboxfcm_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('inboxfcm'));
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
		'judul' => $this->input->post('judul',TRUE),
		'message' => $this->input->post('message',TRUE),
		'tglmessage' => $this->input->post('tglmessage',TRUE),
		'isterbaca' => $this->input->post('isterbaca',TRUE),
		'idmenuandroid' => $this->input->post('idmenuandroid',TRUE),
	    );

            $this->Inboxfcm_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('inboxfcm'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Inboxfcm_model->get_by_id($id);

        if ($row) {
            $this->Inboxfcm_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('inboxfcm'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('inboxfcm'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('message', 'message', 'trim|required');
	$this->form_validation->set_rules('tglmessage', 'tglmessage', 'trim|required');
	$this->form_validation->set_rules('isterbaca', 'isterbaca', 'trim|required');
	$this->form_validation->set_rules('idmenuandroid', 'idmenuandroid', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

