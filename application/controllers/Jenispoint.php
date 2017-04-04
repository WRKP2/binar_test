<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenispoint extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenispoint_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenispoint/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenispoint/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenispoint/index.html';
            $config['first_url'] = base_url() . 'jenispoint/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenispoint_model->total_rows($q);
        $jenispoint = $this->Jenispoint_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenispoint_data' => $jenispoint,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('jenispoint/jenispoint_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenispoint_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'jenispoint' => $row->jenispoint,
	    );
            $this->load->view('jenispoint/jenispoint_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispoint'));
        }
    }

//=========READ=========
        

public function readjenispointAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['jenispoint'] = "";

		$this->load->model('Jenispoint_model');
                
		$response = array();
                
		$xQuery = $this->Jenispoint_model->getListjenispoint();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['jenispoint'] = $row->jenispoint;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatejenispointAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xjenispoint = $_POST['edjenispoint'];

		$this->load->model('Jenispoint_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Jenispoint_model->Updatejenispoint($xidx,$xjenispoint);
		} else {
            //===INSERT===
            
		$xStr = $this->Jenispoint_model->Insertjenispoint($xidx,$xjenispoint);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletjenispointAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Jenispoint_model');
        $this->Jenispoint_model->Deletjenispoint($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailjenispointAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Jenispoint_model');
        $this->Jenispoint_model->getDetailjenispoint($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['jenispoint'] = $row->jenispoint;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenispoint/create_action'),
	    'idx' => set_value('idx'),
	    'jenispoint' => set_value('jenispoint'),
	);
        $this->load->view('jenispoint/jenispoint_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenispoint' => $this->input->post('jenispoint',TRUE),
	    );

            $this->Jenispoint_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenispoint'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenispoint_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenispoint/update_action'),
		'idx' => set_value('idx', $row->idx),
		'jenispoint' => set_value('jenispoint', $row->jenispoint),
	    );
            $this->load->view('jenispoint/jenispoint_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispoint'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'jenispoint' => $this->input->post('jenispoint',TRUE),
	    );

            $this->Jenispoint_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenispoint'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenispoint_model->get_by_id($id);

        if ($row) {
            $this->Jenispoint_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenispoint'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenispoint'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenispoint', 'jenispoint', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

