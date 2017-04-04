<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usergroup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usergroup_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('usergroup/usergroup_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Usergroup_model->json();
    }

    public function read($id) 
    {
        $row = $this->Usergroup_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'NmUserGroup' => $row->NmUserGroup,
	    );
            $this->load->view('usergroup/usergroup_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usergroup'));
        }
    }

//=========READ=========
        

public function readusergroupAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['NmUserGroup'] = "";

		$this->load->model('Usergroup_model');
                
		$response = array();
                
		$xQuery = $this->Usergroup_model->getListusergroup();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['NmUserGroup'] = $row->NmUserGroup;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdateusergroupAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xNmUserGroup = $_POST['edNmUserGroup'];

		$this->load->model('Usergroup_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Usergroup_model->Updateusergroup($xidx,$xNmUserGroup);
		} else {
            //===INSERT===
            
		$xStr = $this->Usergroup_model->Insertusergroup($xidx,$xNmUserGroup);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletusergroupAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Usergroup_model');
        $this->Usergroup_model->Deletusergroup($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailusergroupAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Usergroup_model');
        $this->Usergroup_model->getDetailusergroup($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['NmUserGroup'] = $row->NmUserGroup;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('usergroup/create_action'),
	    'idx' => set_value('idx'),
	    'NmUserGroup' => set_value('NmUserGroup'),
	);
        $this->load->view('usergroup/usergroup_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NmUserGroup' => $this->input->post('NmUserGroup',TRUE),
	    );

            $this->Usergroup_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('usergroup'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Usergroup_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('usergroup/update_action'),
		'idx' => set_value('idx', $row->idx),
		'NmUserGroup' => set_value('NmUserGroup', $row->NmUserGroup),
	    );
            $this->load->view('usergroup/usergroup_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usergroup'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'NmUserGroup' => $this->input->post('NmUserGroup',TRUE),
	    );

            $this->Usergroup_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('usergroup'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Usergroup_model->get_by_id($id);

        if ($row) {
            $this->Usergroup_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('usergroup'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usergroup'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('NmUserGroup', 'nmusergroup', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

