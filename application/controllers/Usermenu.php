<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usermenu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usermenu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'usermenu/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'usermenu/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'usermenu/index.html';
            $config['first_url'] = base_url() . 'usermenu/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Usermenu_model->total_rows($q);
        $usermenu = $this->Usermenu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'usermenu_data' => $usermenu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('usermenu/usermenu_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Usermenu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'iduser' => $row->iduser,
		'idmenu' => $row->idmenu,
		'idaplikasi' => $row->idaplikasi,
	    );
            $this->load->view('usermenu/usermenu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usermenu'));
        }
    }

//=========READ=========
        

public function readusermenuAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['iduser'] = "";
		 $this->json_data['idmenu'] = "";
		 $this->json_data['idaplikasi'] = "";

		$this->load->model('Usermenu_model');
                
		$response = array();
                
		$xQuery = $this->Usermenu_model->getListusermenu();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['iduser'] = $row->iduser;
			 $this->json_data['idmenu'] = $row->idmenu;
			 $this->json_data['idaplikasi'] = $row->idaplikasi;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdateusermenuAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xiduser = $_POST['ediduser'];
		 $xidmenu = $_POST['edidmenu'];
		 $xidaplikasi = $_POST['edidaplikasi'];

		$this->load->model('Usermenu_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Usermenu_model->Updateusermenu($xidx,$xiduser,$xidmenu,$xidaplikasi);
		} else {
            //===INSERT===
            
		$xStr = $this->Usermenu_model->Insertusermenu($xidx,$xiduser,$xidmenu,$xidaplikasi);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletusermenuAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Usermenu_model');
        $this->Usermenu_model->Deletusermenu($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailusermenuAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Usermenu_model');
        $this->Usermenu_model->getDetailusermenu($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['iduser'] = $row->iduser;
		$this->json_data['idmenu'] = $row->idmenu;
		$this->json_data['idaplikasi'] = $row->idaplikasi;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('usermenu/create_action'),
	    'idx' => set_value('idx'),
	    'iduser' => set_value('iduser'),
	    'idmenu' => set_value('idmenu'),
	    'idaplikasi' => set_value('idaplikasi'),
	);
        $this->load->view('usermenu/usermenu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'iduser' => $this->input->post('iduser',TRUE),
		'idmenu' => $this->input->post('idmenu',TRUE),
		'idaplikasi' => $this->input->post('idaplikasi',TRUE),
	    );

            $this->Usermenu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('usermenu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Usermenu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('usermenu/update_action'),
		'idx' => set_value('idx', $row->idx),
		'iduser' => set_value('iduser', $row->iduser),
		'idmenu' => set_value('idmenu', $row->idmenu),
		'idaplikasi' => set_value('idaplikasi', $row->idaplikasi),
	    );
            $this->load->view('usermenu/usermenu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usermenu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'iduser' => $this->input->post('iduser',TRUE),
		'idmenu' => $this->input->post('idmenu',TRUE),
		'idaplikasi' => $this->input->post('idaplikasi',TRUE),
	    );

            $this->Usermenu_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('usermenu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Usermenu_model->get_by_id($id);

        if ($row) {
            $this->Usermenu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('usermenu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usermenu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('iduser', 'iduser', 'trim|required');
	$this->form_validation->set_rules('idmenu', 'idmenu', 'trim|required');
	$this->form_validation->set_rules('idaplikasi', 'idaplikasi', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

