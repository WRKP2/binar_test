<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Komponen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Komponen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'komponen/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'komponen/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'komponen/index.html';
            $config['first_url'] = base_url() . 'komponen/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Komponen_model->total_rows($q);
        $komponen = $this->Komponen_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'komponen_data' => $komponen,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('komponen/komponen_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Komponen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idkomponen' => $row->idkomponen,
		'NmKomponen' => $row->NmKomponen,
		'isshow' => $row->isshow,
	    );
            $this->load->view('komponen/komponen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('komponen'));
        }
    }

//=========READ=========
        

public function readkomponenAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idkomponen'] = "";
		 $this->json_data['NmKomponen'] = "";
		 $this->json_data['isshow'] = "";

		$this->load->model('Komponen_model');
                
		$response = array();
                
		$xQuery = $this->Komponen_model->getListkomponen();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idkomponen'] = $row->idkomponen;
			 $this->json_data['NmKomponen'] = $row->NmKomponen;
			 $this->json_data['isshow'] = $row->isshow;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatekomponenAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidkomponen'])) {
            
$xidkomponen = $_POST['$edidkomponen'];
        
} else {
            
$xidkomponen = '0';
        
}
		 $xNmKomponen = $_POST['edNmKomponen'];
		 $xisshow = $_POST['edisshow'];

		$this->load->model('Komponen_model');
                
		if (!empty($xidkomponen)) {
                
		if ($xidkomponen != '0') {
                //===UPDATE===
                
		$xStr = $this->Komponen_model->Updatekomponen($xidkomponen,$xNmKomponen,$xisshow);
		} else {
            //===INSERT===
            
		$xStr = $this->Komponen_model->Insertkomponen($xidkomponen,$xNmKomponen,$xisshow);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletkomponenAndroid() {
        
		$xidkomponen = $_POST['$edidkomponen'];
        $this->load->model('Komponen_model');
        $this->Komponen_model->Deletkomponen($xidkomponen);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailkomponenAndroid() {
        
		$xidkomponen = $_POST['$edidkomponen'];
        $this->load->model('Komponen_model');
        $this->Komponen_model->getDetailkomponen($xidkomponen);
        $this->load->helper('json');
		$this->json_data['idkomponen'] = $row->idkomponen;
		$this->json_data['NmKomponen'] = $row->NmKomponen;
		$this->json_data['isshow'] = $row->isshow;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('komponen/create_action'),
	    'idkomponen' => set_value('idkomponen'),
	    'NmKomponen' => set_value('NmKomponen'),
	    'isshow' => set_value('isshow'),
	);
        $this->load->view('komponen/komponen_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NmKomponen' => $this->input->post('NmKomponen',TRUE),
		'isshow' => $this->input->post('isshow',TRUE),
	    );

            $this->Komponen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('komponen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Komponen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('komponen/update_action'),
		'idkomponen' => set_value('idkomponen', $row->idkomponen),
		'NmKomponen' => set_value('NmKomponen', $row->NmKomponen),
		'isshow' => set_value('isshow', $row->isshow),
	    );
            $this->load->view('komponen/komponen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('komponen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idkomponen', TRUE));
        } else {
            $data = array(
		'NmKomponen' => $this->input->post('NmKomponen',TRUE),
		'isshow' => $this->input->post('isshow',TRUE),
	    );

            $this->Komponen_model->update($this->input->post('idkomponen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('komponen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Komponen_model->get_by_id($id);

        if ($row) {
            $this->Komponen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('komponen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('komponen'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('NmKomponen', 'nmkomponen', 'trim|required');
	$this->form_validation->set_rules('isshow', 'isshow', 'trim|required');

	$this->form_validation->set_rules('idkomponen', 'idkomponen', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

