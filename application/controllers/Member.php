<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Member_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'member/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'member/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'member/index.html';
            $config['first_url'] = base_url() . 'member/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Member_model->total_rows($q);
        $member = $this->Member_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'member_data' => $member,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('member/member_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Member_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'Nama' => $row->Nama,
		'Alamat' => $row->Alamat,
		'NoTelpon' => $row->NoTelpon,
		'idtoken' => $row->idtoken,
		'email' => $row->email,
		'tglinsert' => $row->tglinsert,
		'isblokir' => $row->isblokir,
		'idjenismember' => $row->idjenismember,
		'password' => $row->password,
		'photoUrl' => $row->photoUrl,
		'tokenmember' => $row->tokenmember,
	    );
            $this->load->view('member/member_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('member'));
        }
    }

//=========READ=========
        

public function readmemberAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['Nama'] = "";
		 $this->json_data['Alamat'] = "";
		 $this->json_data['NoTelpon'] = "";
		 $this->json_data['idtoken'] = "";
		 $this->json_data['email'] = "";
		 $this->json_data['tglinsert'] = "";
		 $this->json_data['isblokir'] = "";
		 $this->json_data['idjenismember'] = "";
		 $this->json_data['password'] = "";
		 $this->json_data['photoUrl'] = "";
		 $this->json_data['tokenmember'] = "";

		$this->load->model('Member_model');
                
		$response = array();
                
		$xQuery = $this->Member_model->getListmember();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['Nama'] = $row->Nama;
			 $this->json_data['Alamat'] = $row->Alamat;
			 $this->json_data['NoTelpon'] = $row->NoTelpon;
			 $this->json_data['idtoken'] = $row->idtoken;
			 $this->json_data['email'] = $row->email;
			 $this->json_data['tglinsert'] = $row->tglinsert;
			 $this->json_data['isblokir'] = $row->isblokir;
			 $this->json_data['idjenismember'] = $row->idjenismember;
			 $this->json_data['password'] = $row->password;
			 $this->json_data['photoUrl'] = $row->photoUrl;
			 $this->json_data['tokenmember'] = $row->tokenmember;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatememberAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xNama = $_POST['edNama'];
		 $xAlamat = $_POST['edAlamat'];
		 $xNoTelpon = $_POST['edNoTelpon'];
		 $xidtoken = $_POST['edidtoken'];
		 $xemail = $_POST['edemail'];
		 $xtglinsert = $_POST['edtglinsert'];
		 $xisblokir = $_POST['edisblokir'];
		 $xidjenismember = $_POST['edidjenismember'];
		 $xpassword = $_POST['edpassword'];
		 $xphotoUrl = $_POST['edphotoUrl'];
		 $xtokenmember = $_POST['edtokenmember'];

		$this->load->model('Member_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Member_model->Updatemember($xidx,$xNama,$xAlamat,$xNoTelpon,$xidtoken,$xemail,$xtglinsert,$xisblokir,$xidjenismember,$xpassword,$xphotoUrl,$xtokenmember);
		} else {
            //===INSERT===
            
		$xStr = $this->Member_model->Insertmember($xidx,$xNama,$xAlamat,$xNoTelpon,$xidtoken,$xemail,$xtglinsert,$xisblokir,$xidjenismember,$xpassword,$xphotoUrl,$xtokenmember);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletmemberAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Member_model');
        $this->Member_model->Deletmember($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailmemberAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Member_model');
        $this->Member_model->getDetailmember($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['Nama'] = $row->Nama;
		$this->json_data['Alamat'] = $row->Alamat;
		$this->json_data['NoTelpon'] = $row->NoTelpon;
		$this->json_data['idtoken'] = $row->idtoken;
		$this->json_data['email'] = $row->email;
		$this->json_data['tglinsert'] = $row->tglinsert;
		$this->json_data['isblokir'] = $row->isblokir;
		$this->json_data['idjenismember'] = $row->idjenismember;
		$this->json_data['password'] = $row->password;
		$this->json_data['photoUrl'] = $row->photoUrl;
		$this->json_data['tokenmember'] = $row->tokenmember;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('member/create_action'),
	    'idx' => set_value('idx'),
	    'Nama' => set_value('Nama'),
	    'Alamat' => set_value('Alamat'),
	    'NoTelpon' => set_value('NoTelpon'),
	    'idtoken' => set_value('idtoken'),
	    'email' => set_value('email'),
	    'tglinsert' => set_value('tglinsert'),
	    'isblokir' => set_value('isblokir'),
	    'idjenismember' => set_value('idjenismember'),
	    'password' => set_value('password'),
	    'photoUrl' => set_value('photoUrl'),
	    'tokenmember' => set_value('tokenmember'),
	);
        $this->load->view('member/member_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Nama' => $this->input->post('Nama',TRUE),
		'Alamat' => $this->input->post('Alamat',TRUE),
		'NoTelpon' => $this->input->post('NoTelpon',TRUE),
		'idtoken' => $this->input->post('idtoken',TRUE),
		'email' => $this->input->post('email',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'isblokir' => $this->input->post('isblokir',TRUE),
		'idjenismember' => $this->input->post('idjenismember',TRUE),
		'password' => $this->input->post('password',TRUE),
		'photoUrl' => $this->input->post('photoUrl',TRUE),
		'tokenmember' => $this->input->post('tokenmember',TRUE),
	    );

            $this->Member_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('member'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Member_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('member/update_action'),
		'idx' => set_value('idx', $row->idx),
		'Nama' => set_value('Nama', $row->Nama),
		'Alamat' => set_value('Alamat', $row->Alamat),
		'NoTelpon' => set_value('NoTelpon', $row->NoTelpon),
		'idtoken' => set_value('idtoken', $row->idtoken),
		'email' => set_value('email', $row->email),
		'tglinsert' => set_value('tglinsert', $row->tglinsert),
		'isblokir' => set_value('isblokir', $row->isblokir),
		'idjenismember' => set_value('idjenismember', $row->idjenismember),
		'password' => set_value('password', $row->password),
		'photoUrl' => set_value('photoUrl', $row->photoUrl),
		'tokenmember' => set_value('tokenmember', $row->tokenmember),
	    );
            $this->load->view('member/member_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('member'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'Nama' => $this->input->post('Nama',TRUE),
		'Alamat' => $this->input->post('Alamat',TRUE),
		'NoTelpon' => $this->input->post('NoTelpon',TRUE),
		'idtoken' => $this->input->post('idtoken',TRUE),
		'email' => $this->input->post('email',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'isblokir' => $this->input->post('isblokir',TRUE),
		'idjenismember' => $this->input->post('idjenismember',TRUE),
		'password' => $this->input->post('password',TRUE),
		'photoUrl' => $this->input->post('photoUrl',TRUE),
		'tokenmember' => $this->input->post('tokenmember',TRUE),
	    );

            $this->Member_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('member'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Member_model->get_by_id($id);

        if ($row) {
            $this->Member_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('member'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('member'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('Alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('NoTelpon', 'notelpon', 'trim|required');
	$this->form_validation->set_rules('idtoken', 'idtoken', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('tglinsert', 'tglinsert', 'trim|required');
	$this->form_validation->set_rules('isblokir', 'isblokir', 'trim|required');
	$this->form_validation->set_rules('idjenismember', 'idjenismember', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('photoUrl', 'photourl', 'trim|required');
	$this->form_validation->set_rules('tokenmember', 'tokenmember', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

