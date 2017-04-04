<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kritiksaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kritiksaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kritiksaran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kritiksaran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kritiksaran/index.html';
            $config['first_url'] = base_url() . 'kritiksaran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kritiksaran_model->total_rows($q);
        $kritiksaran = $this->Kritiksaran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kritiksaran_data' => $kritiksaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('kritiksaran/kritiksaran_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kritiksaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'idmember' => $row->idmember,
		'Saran' => $row->Saran,
		'tglsaran' => $row->tglsaran,
	    );
            $this->load->view('kritiksaran/kritiksaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kritiksaran'));
        }
    }

//=========READ=========
        

public function readkritiksaranAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['idmember'] = "";
		 $this->json_data['Saran'] = "";
		 $this->json_data['tglsaran'] = "";

		$this->load->model('Kritiksaran_model');
                
		$response = array();
                
		$xQuery = $this->Kritiksaran_model->getListkritiksaran();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['idmember'] = $row->idmember;
			 $this->json_data['Saran'] = $row->Saran;
			 $this->json_data['tglsaran'] = $row->tglsaran;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatekritiksaranAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xidmember = $_POST['edidmember'];
		 $xSaran = $_POST['edSaran'];
		 $xtglsaran = $_POST['edtglsaran'];

		$this->load->model('Kritiksaran_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Kritiksaran_model->Updatekritiksaran($xidx,$xidmember,$xSaran,$xtglsaran);
		} else {
            //===INSERT===
            
		$xStr = $this->Kritiksaran_model->Insertkritiksaran($xidx,$xidmember,$xSaran,$xtglsaran);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletkritiksaranAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Kritiksaran_model');
        $this->Kritiksaran_model->Deletkritiksaran($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailkritiksaranAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Kritiksaran_model');
        $this->Kritiksaran_model->getDetailkritiksaran($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['idmember'] = $row->idmember;
		$this->json_data['Saran'] = $row->Saran;
		$this->json_data['tglsaran'] = $row->tglsaran;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kritiksaran/create_action'),
	    'idx' => set_value('idx'),
	    'idmember' => set_value('idmember'),
	    'Saran' => set_value('Saran'),
	    'tglsaran' => set_value('tglsaran'),
	);
        $this->load->view('kritiksaran/kritiksaran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idmember' => $this->input->post('idmember',TRUE),
		'Saran' => $this->input->post('Saran',TRUE),
		'tglsaran' => $this->input->post('tglsaran',TRUE),
	    );

            $this->Kritiksaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kritiksaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kritiksaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kritiksaran/update_action'),
		'idx' => set_value('idx', $row->idx),
		'idmember' => set_value('idmember', $row->idmember),
		'Saran' => set_value('Saran', $row->Saran),
		'tglsaran' => set_value('tglsaran', $row->tglsaran),
	    );
            $this->load->view('kritiksaran/kritiksaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kritiksaran'));
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
		'Saran' => $this->input->post('Saran',TRUE),
		'tglsaran' => $this->input->post('tglsaran',TRUE),
	    );

            $this->Kritiksaran_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kritiksaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kritiksaran_model->get_by_id($id);

        if ($row) {
            $this->Kritiksaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kritiksaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kritiksaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('Saran', 'saran', 'trim|required');
	$this->form_validation->set_rules('tglsaran', 'tglsaran', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

