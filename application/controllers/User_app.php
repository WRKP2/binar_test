<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_app extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_app_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user_app/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user_app/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user_app/index.html';
            $config['first_url'] = base_url() . 'user_app/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_app_model->total_rows($q);
        $user_app = $this->User_app_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_app_data' => $user_app,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'title' => 'User_app',
            'js' => 'user_app_ajax',
            'css_file' => 'user_app_css',
    
        );    $this->render('user_app/user_app_list', $data);}

    public function read($id) 
    {
        $row = $this->User_app_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ID' => $row->ID,
		'NAMA' => $row->NAMA,
		'ALAMAT' => $row->ALAMAT,
		'EMAIL' => $row->EMAIL,
		'PASWORD' => $row->PASWORD,
	    );
            $this->render('user_app/user_app_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_app'));
        }
    }


 //=========Autocomplete========= 
        public function get_user_app_search() {
        $q = $this->input->post('q',TRUE); 
        $term = $_POST['term'];
        if(!empty($term)){
        $query = $this->User_app_model->getListuser_appAuto($term); //query model
        $hasilnya       =  array();
        foreach ($query->result() as $d) {
            $hasilnya[]     = array(
                'label' => $d->ID.'-'.$d->NAMA,  
                'value' => $d->NAMA
            );
        }
        echo json_encode($hasilnya);  
        }
    }

//=========READ=========
        public function readuser_appAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['ID'] = "";
		 $this->json_data['NAMA'] = "";
		 $this->json_data['ALAMAT'] = "";
		 $this->json_data['EMAIL'] = "";
		 $this->json_data['PASWORD'] = "";

		$this->load->model('User_app_model');
                
		$response = array();
                
		$xQuery = $this->User_app_model->getListuser_app();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['ID'] = $row->ID;
			 $this->json_data['NAMA'] = $row->NAMA;
			 $this->json_data['ALAMAT'] = $row->ALAMAT;
			 $this->json_data['EMAIL'] = $row->EMAIL;
			 $this->json_data['PASWORD'] = $row->PASWORD;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode($response);
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdateuser_appAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['edID'])) {
            
$xID = $_POST['edID'];
        
} else {
            
$xID = '0';
        
}
		 $xNAMA = $_POST['edNAMA'];
		 $xALAMAT = $_POST['edALAMAT'];
		 $xEMAIL = $_POST['edEMAIL'];
		 $xPASWORD = $_POST['edPASWORD'];

		$this->load->model('User_app_model');
                $response = array();
                
		if ($xID != '0') {
                //===UPDATE===
                
		$xStr = $this->User_app_model->Updateuser_app($xID,$xNAMA,$xALAMAT,$xEMAIL,$xPASWORD);
		} else {
            //===INSERT===
            
		$xStr = $this->User_app_model->Insertuser_app($xID,$xNAMA,$xALAMAT,$xEMAIL,$xPASWORD);
            	}
            
         
		$row = $this->User_app_model->getLastIndexuser_app();
			 $this->json_data['ID'] = $row->ID;
			 $this->json_data['NAMA'] = $row->NAMA;
			 $this->json_data['ALAMAT'] = $row->ALAMAT;
			 $this->json_data['EMAIL'] = $row->EMAIL;
			 $this->json_data['PASWORD'] = $row->PASWORD;
 array_push($response, $this->json_data);

        
		 echo json_encode($response);
  
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletuser_appAndroid() {
        
		$xID = $_POST['edID'];
        $this->load->model('User_app_model');
        $this->User_app_model->Deletuser_app($xID);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailuser_appAndroid() {
        
		$xID = $_POST['edID'];
        $this->load->model('User_app_model');
        $this->User_app_model->getDetailuser_app($xID);
        $this->load->helper('json');
		$this->json_data['ID'] = $row->ID;
		$this->json_data['NAMA'] = $row->NAMA;
		$this->json_data['ALAMAT'] = $row->ALAMAT;
		$this->json_data['EMAIL'] = $row->EMAIL;
		$this->json_data['PASWORD'] = $row->PASWORD;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user_app/create_action'),
	    'ID' => set_value('ID'),
	    'NAMA' => set_value('NAMA'),
	    'ALAMAT' => set_value('ALAMAT'),
	    'EMAIL' => set_value('EMAIL'),
	    'PASWORD' => set_value('PASWORD'),
	);
        $this->render('user_app/user_app_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NAMA' => $this->input->post('NAMA',TRUE),
		'ALAMAT' => $this->input->post('ALAMAT',TRUE),
		'EMAIL' => $this->input->post('EMAIL',TRUE),
		'PASWORD' => $this->input->post('PASWORD',TRUE),
	    );

            $this->User_app_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user_app'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_app_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user_app/update_action'),
		'ID' => set_value('ID', $row->ID),
		'NAMA' => set_value('NAMA', $row->NAMA),
		'ALAMAT' => set_value('ALAMAT', $row->ALAMAT),
		'EMAIL' => set_value('EMAIL', $row->EMAIL),
		'PASWORD' => set_value('PASWORD', $row->PASWORD),
	    );
            $this->render('user_app/user_app_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_app'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
		'NAMA' => $this->input->post('NAMA',TRUE),
		'ALAMAT' => $this->input->post('ALAMAT',TRUE),
		'EMAIL' => $this->input->post('EMAIL',TRUE),
		'PASWORD' => $this->input->post('PASWORD',TRUE),
	    );

            $this->User_app_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user_app'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_app_model->get_by_id($id);

        if ($row) {
            $this->User_app_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user_app'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user_app'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('NAMA', 'nama', 'trim|required');
	$this->form_validation->set_rules('ALAMAT', 'alamat', 'trim|required');
	$this->form_validation->set_rules('EMAIL', 'email', 'trim|required');
	$this->form_validation->set_rules('PASWORD', 'pasword', 'trim|required');

	$this->form_validation->set_rules('ID', 'ID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

