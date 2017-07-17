<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user/index.html';
            $config['first_url'] = base_url() . 'user/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows($q);
        $user = $this->User_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('user/user_list', $data);
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'nama' => $row->nama,
		'alamat' => $row->alamat,
		'user' => $row->user,
		'password' => $row->password,
	    );
            $this->load->view('user/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }


 //=========Autocomplete========= 
        public function get_user_search() {
        $q = $this->input->post('q',TRUE); 
        $term = $_POST['term'];
        if(!empty($term)){
        $query = $this->User_model->getListuserAuto($term); //query model
        $hasilnya       =  array();
        foreach ($query->result() as $d) {
            $hasilnya[]     = array(
                'label' => $d->idx.'-'.$d->nama , 
                'value' => $d->nama
            );
        }
        echo json_encode($hasilnya);  
        }
    }

//=========READ=========
        public function readuserAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['nama'] = "";
		 $this->json_data['alamat'] = "";
		 $this->json_data['user'] = "";
		 $this->json_data['password'] = "";

		$this->load->model('User_model');
                
		$response = array();
                
		$xQuery = $this->User_model->getListuser();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['nama'] = $row->nama;
			 $this->json_data['alamat'] = $row->alamat;
			 $this->json_data['user'] = $row->user;
			 $this->json_data['password'] = $row->password;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode($response);
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdateuserAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['edidx'])) {
            
$xidx = $_POST['edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xnama = $_POST['ednama'];
		 $xalamat = $_POST['edalamat'];
		 $xuser = $_POST['eduser'];
		 $xpassword = $_POST['edpassword'];

		$this->load->model('User_model');
                $response = array();
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->User_model->Updateuser($xidx,$xnama,$xalamat,$xuser,$xpassword);
		} else {
            //===INSERT===
            
		$xStr = $this->User_model->Insertuser($xidx,$xnama,$xalamat,$xuser,$xpassword);
            	}
            
         
		$row = $this->User_model->getLastIndexuser();
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['nama'] = $row->nama;
			 $this->json_data['alamat'] = $row->alamat;
			 $this->json_data['user'] = $row->user;
			 $this->json_data['password'] = $row->password;
 array_push($response, $this->json_data);

        
		 echo json_encode($response);
  
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletuserAndroid() {
        
		$xidx = $_POST['edidx'];
        $this->load->model('User_model');
        $this->User_model->Deletuser($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailuserAndroid() {
        
		$xidx = $_POST['edidx'];
        $this->load->model('User_model');
        $this->User_model->getDetailuser($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['nama'] = $row->nama;
		$this->json_data['alamat'] = $row->alamat;
		$this->json_data['user'] = $row->user;
		$this->json_data['password'] = $row->password;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'idx' => set_value('idx'),
	    'nama' => set_value('nama'),
	    'alamat' => set_value('alamat'),
	    'user' => set_value('user'),
	    'password' => set_value('password'),
	);
        $this->load->view('user/user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'user' => $this->input->post('user',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'idx' => set_value('idx', $row->idx),
		'nama' => set_value('nama', $row->nama),
		'alamat' => set_value('alamat', $row->alamat),
		'user' => set_value('user', $row->user),
		'password' => set_value('password', $row->password),
	    );
            $this->load->view('user/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'user' => $this->input->post('user',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->User_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('user', 'user', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

