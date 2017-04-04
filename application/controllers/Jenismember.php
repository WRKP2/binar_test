<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenismember extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenismember_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenismember/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenismember/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenismember/index.html';
            $config['first_url'] = base_url() . 'jenismember/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenismember_model->total_rows($q);
        $jenismember = $this->Jenismember_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenismember_data' => $jenismember,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('jenismember/jenismember_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Jenismember_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'JenisMember' => $row->JenisMember,
	    );
            $this->load->view('jenismember/jenismember_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenismember'));
        }
    }

//=========READ=========
        

public function readjenismemberAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['JenisMember'] = "";

		$this->load->model('Jenismember_model');
                
		$response = array();
                
		$xQuery = $this->Jenismember_model->getListjenismember();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['JenisMember'] = $row->JenisMember;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatejenismemberAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xJenisMember = $_POST['edJenisMember'];

		$this->load->model('Jenismember_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Jenismember_model->Updatejenismember($xidx,$xJenisMember);
		} else {
            //===INSERT===
            
		$xStr = $this->Jenismember_model->Insertjenismember($xidx,$xJenisMember);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletjenismemberAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Jenismember_model');
        $this->Jenismember_model->Deletjenismember($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailjenismemberAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Jenismember_model');
        $this->Jenismember_model->getDetailjenismember($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['JenisMember'] = $row->JenisMember;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenismember/create_action'),
	    'idx' => set_value('idx'),
	    'JenisMember' => set_value('JenisMember'),
	);
        $this->load->view('jenismember/jenismember_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'JenisMember' => $this->input->post('JenisMember',TRUE),
	    );

            $this->Jenismember_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenismember'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenismember_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenismember/update_action'),
		'idx' => set_value('idx', $row->idx),
		'JenisMember' => set_value('JenisMember', $row->JenisMember),
	    );
            $this->load->view('jenismember/jenismember_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenismember'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'JenisMember' => $this->input->post('JenisMember',TRUE),
	    );

            $this->Jenismember_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenismember'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenismember_model->get_by_id($id);

        if ($row) {
            $this->Jenismember_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenismember'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenismember'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('JenisMember', 'jenismember', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

