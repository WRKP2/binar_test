<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tipemenu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tipemenu_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('tipemenu/tipemenu_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tipemenu_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tipemenu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idTipeMenu' => $row->idTipeMenu,
		'NmTipeMenu' => $row->NmTipeMenu,
	    );
            $this->load->view('tipemenu/tipemenu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tipemenu'));
        }
    }

//=========READ=========
        

public function readtipemenuAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idTipeMenu'] = "";
		 $this->json_data['NmTipeMenu'] = "";

		$this->load->model('Tipemenu_model');
                
		$response = array();
                
		$xQuery = $this->Tipemenu_model->getListtipemenu();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idTipeMenu'] = $row->idTipeMenu;
			 $this->json_data['NmTipeMenu'] = $row->NmTipeMenu;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatetipemenuAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$ed'])) {
            
$x = $_POST['$ed'];
        
} else {
            
$x = '0';
        
}
		 $xidTipeMenu = $_POST['edidTipeMenu'];
		 $xNmTipeMenu = $_POST['edNmTipeMenu'];

		$this->load->model('Tipemenu_model');
                
		if (!empty($x)) {
                
		if ($x != '0') {
                //===UPDATE===
                
		$xStr = $this->Tipemenu_model->Updatetipemenu($xidTipeMenu,$xNmTipeMenu);
		} else {
            //===INSERT===
            
		$xStr = $this->Tipemenu_model->Inserttipemenu($xidTipeMenu,$xNmTipeMenu);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function delettipemenuAndroid() {
        
		$x = $_POST['$ed'];
        $this->load->model('Tipemenu_model');
        $this->Tipemenu_model->Delettipemenu($x);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailtipemenuAndroid() {
        
		$x = $_POST['$ed'];
        $this->load->model('Tipemenu_model');
        $this->Tipemenu_model->getDetailtipemenu($x);
        $this->load->helper('json');
		$this->json_data['idTipeMenu'] = $row->idTipeMenu;
		$this->json_data['NmTipeMenu'] = $row->NmTipeMenu;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tipemenu/create_action'),
	    'idTipeMenu' => set_value('idTipeMenu'),
	    'NmTipeMenu' => set_value('NmTipeMenu'),
	);
        $this->load->view('tipemenu/tipemenu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idTipeMenu' => $this->input->post('idTipeMenu',TRUE),
		'NmTipeMenu' => $this->input->post('NmTipeMenu',TRUE),
	    );

            $this->Tipemenu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tipemenu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tipemenu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tipemenu/update_action'),
		'idTipeMenu' => set_value('idTipeMenu', $row->idTipeMenu),
		'NmTipeMenu' => set_value('NmTipeMenu', $row->NmTipeMenu),
	    );
            $this->load->view('tipemenu/tipemenu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tipemenu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'idTipeMenu' => $this->input->post('idTipeMenu',TRUE),
		'NmTipeMenu' => $this->input->post('NmTipeMenu',TRUE),
	    );

            $this->Tipemenu_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tipemenu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tipemenu_model->get_by_id($id);

        if ($row) {
            $this->Tipemenu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tipemenu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tipemenu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idTipeMenu', 'idtipemenu', 'trim|required');
	$this->form_validation->set_rules('NmTipeMenu', 'nmtipemenu', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

