<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Memberpoint extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Memberpoint_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'memberpoint/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'memberpoint/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'memberpoint/index.html';
            $config['first_url'] = base_url() . 'memberpoint/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Memberpoint_model->total_rows($q);
        $memberpoint = $this->Memberpoint_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'memberpoint_data' => $memberpoint,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('memberpoint/memberpoint_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Memberpoint_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idmember' => $row->idmember,
		'point' => $row->point,
		'tglinsert' => $row->tglinsert,
		'idjenispoint' => $row->idjenispoint,
	    );
            $this->load->view('memberpoint/memberpoint_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('memberpoint'));
        }
    }

//=========READ=========
        

public function readmemberpointAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['idmember'] = "";
		 $this->json_data['point'] = "";
		 $this->json_data['tglinsert'] = "";
		 $this->json_data['idjenispoint'] = "";

		$this->load->model('Memberpoint_model');
                
		$response = array();
                
		$xQuery = $this->Memberpoint_model->getListmemberpoint();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['idmember'] = $row->idmember;
			 $this->json_data['point'] = $row->point;
			 $this->json_data['tglinsert'] = $row->tglinsert;
			 $this->json_data['idjenispoint'] = $row->idjenispoint;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatememberpointAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xidmember = $_POST['edidmember'];
		 $xpoint = $_POST['edpoint'];
		 $xtglinsert = $_POST['edtglinsert'];
		 $xidjenispoint = $_POST['edidjenispoint'];

		$this->load->model('Memberpoint_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Memberpoint_model->Updatememberpoint($xidx,$xidmember,$xpoint,$xtglinsert,$xidjenispoint);
		} else {
            //===INSERT===
            
		$xStr = $this->Memberpoint_model->Insertmemberpoint($xidx,$xidmember,$xpoint,$xtglinsert,$xidjenispoint);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletmemberpointAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Memberpoint_model');
        $this->Memberpoint_model->Deletmemberpoint($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailmemberpointAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Memberpoint_model');
        $this->Memberpoint_model->getDetailmemberpoint($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['idmember'] = $row->idmember;
		$this->json_data['point'] = $row->point;
		$this->json_data['tglinsert'] = $row->tglinsert;
		$this->json_data['idjenispoint'] = $row->idjenispoint;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('memberpoint/create_action'),
	    'idx' => set_value('idx'),
	    'idmember' => set_value('idmember'),
	    'point' => set_value('point'),
	    'tglinsert' => set_value('tglinsert'),
	    'idjenispoint' => set_value('idjenispoint'),
	);
        $this->load->view('memberpoint/memberpoint_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idmember' => $this->input->post('idmember',TRUE),
		'point' => $this->input->post('point',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'idjenispoint' => $this->input->post('idjenispoint',TRUE),
	    );

            $this->Memberpoint_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('memberpoint'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Memberpoint_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('memberpoint/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idmember' => set_value('idmember', $row->idmember),
		'point' => set_value('point', $row->point),
		'tglinsert' => set_value('tglinsert', $row->tglinsert),
		'idjenispoint' => set_value('idjenispoint', $row->idjenispoint),
	    );
            $this->load->view('memberpoint/memberpoint_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('memberpoint'));
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
		'point' => $this->input->post('point',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'idjenispoint' => $this->input->post('idjenispoint',TRUE),
	    );

            $this->Memberpoint_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('memberpoint'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Memberpoint_model->get_by_id($id);

        if ($row) {
            $this->Memberpoint_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('memberpoint'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('memberpoint'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('point', 'point', 'trim|required');
	$this->form_validation->set_rules('tglinsert', 'tglinsert', 'trim|required');
	$this->form_validation->set_rules('idjenispoint', 'idjenispoint', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

