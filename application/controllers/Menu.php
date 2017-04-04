<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('menu/menu_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Menu_model->json();
    }

    public function read($id) 
    {
        $row = $this->Menu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idmenu' => $row->idmenu,
		'nmmenu' => $row->nmmenu,
		'tipemenu' => $row->tipemenu,
		'idkomponen' => $row->idkomponen,
		'iduser' => $row->iduser,
		'parentmenu' => $row->parentmenu,
		'urlci' => $row->urlci,
		'urut' => $row->urut,
		'jmlgambar' => $row->jmlgambar,
		'settingform' => $row->settingform,
		'idaplikasi' => $row->idaplikasi,
		'isumum' => $row->isumum,
	    );
            $this->load->view('menu/menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

//=========READ=========
        

public function readmenuAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idmenu'] = "";
		 $this->json_data['nmmenu'] = "";
		 $this->json_data['tipemenu'] = "";
		 $this->json_data['idkomponen'] = "";
		 $this->json_data['iduser'] = "";
		 $this->json_data['parentmenu'] = "";
		 $this->json_data['urlci'] = "";
		 $this->json_data['urut'] = "";
		 $this->json_data['jmlgambar'] = "";
		 $this->json_data['settingform'] = "";
		 $this->json_data['idaplikasi'] = "";
		 $this->json_data['isumum'] = "";

		$this->load->model('Menu_model');
                
		$response = array();
                
		$xQuery = $this->Menu_model->getListmenu();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idmenu'] = $row->idmenu;
			 $this->json_data['nmmenu'] = $row->nmmenu;
			 $this->json_data['tipemenu'] = $row->tipemenu;
			 $this->json_data['idkomponen'] = $row->idkomponen;
			 $this->json_data['iduser'] = $row->iduser;
			 $this->json_data['parentmenu'] = $row->parentmenu;
			 $this->json_data['urlci'] = $row->urlci;
			 $this->json_data['urut'] = $row->urut;
			 $this->json_data['jmlgambar'] = $row->jmlgambar;
			 $this->json_data['settingform'] = $row->settingform;
			 $this->json_data['idaplikasi'] = $row->idaplikasi;
			 $this->json_data['isumum'] = $row->isumum;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatemenuAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidmenu'])) {
            
$xidmenu = $_POST['$edidmenu'];
        
} else {
            
$xidmenu = '0';
        
}
		 $xnmmenu = $_POST['ednmmenu'];
		 $xtipemenu = $_POST['edtipemenu'];
		 $xidkomponen = $_POST['edidkomponen'];
		 $xiduser = $_POST['ediduser'];
		 $xparentmenu = $_POST['edparentmenu'];
		 $xurlci = $_POST['edurlci'];
		 $xurut = $_POST['edurut'];
		 $xjmlgambar = $_POST['edjmlgambar'];
		 $xsettingform = $_POST['edsettingform'];
		 $xidaplikasi = $_POST['edidaplikasi'];
		 $xisumum = $_POST['edisumum'];

		$this->load->model('Menu_model');
                
		if (!empty($xidmenu)) {
                
		if ($xidmenu != '0') {
                //===UPDATE===
                
		$xStr = $this->Menu_model->Updatemenu($xidmenu,$xnmmenu,$xtipemenu,$xidkomponen,$xiduser,$xparentmenu,$xurlci,$xurut,$xjmlgambar,$xsettingform,$xidaplikasi,$xisumum);
		} else {
            //===INSERT===
            
		$xStr = $this->Menu_model->Insertmenu($xidmenu,$xnmmenu,$xtipemenu,$xidkomponen,$xiduser,$xparentmenu,$xurlci,$xurut,$xjmlgambar,$xsettingform,$xidaplikasi,$xisumum);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletmenuAndroid() {
        
		$xidmenu = $_POST['$edidmenu'];
        $this->load->model('Menu_model');
        $this->Menu_model->Deletmenu($xidmenu);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailmenuAndroid() {
        
		$xidmenu = $_POST['$edidmenu'];
        $this->load->model('Menu_model');
        $this->Menu_model->getDetailmenu($xidmenu);
        $this->load->helper('json');
		$this->json_data['idmenu'] = $row->idmenu;
		$this->json_data['nmmenu'] = $row->nmmenu;
		$this->json_data['tipemenu'] = $row->tipemenu;
		$this->json_data['idkomponen'] = $row->idkomponen;
		$this->json_data['iduser'] = $row->iduser;
		$this->json_data['parentmenu'] = $row->parentmenu;
		$this->json_data['urlci'] = $row->urlci;
		$this->json_data['urut'] = $row->urut;
		$this->json_data['jmlgambar'] = $row->jmlgambar;
		$this->json_data['settingform'] = $row->settingform;
		$this->json_data['idaplikasi'] = $row->idaplikasi;
		$this->json_data['isumum'] = $row->isumum;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('menu/create_action'),
	    'idmenu' => set_value('idmenu'),
	    'nmmenu' => set_value('nmmenu'),
	    'tipemenu' => set_value('tipemenu'),
	    'idkomponen' => set_value('idkomponen'),
	    'iduser' => set_value('iduser'),
	    'parentmenu' => set_value('parentmenu'),
	    'urlci' => set_value('urlci'),
	    'urut' => set_value('urut'),
	    'jmlgambar' => set_value('jmlgambar'),
	    'settingform' => set_value('settingform'),
	    'idaplikasi' => set_value('idaplikasi'),
	    'isumum' => set_value('isumum'),
	);
        $this->load->view('menu/menu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nmmenu' => $this->input->post('nmmenu',TRUE),
		'tipemenu' => $this->input->post('tipemenu',TRUE),
		'idkomponen' => $this->input->post('idkomponen',TRUE),
		'iduser' => $this->input->post('iduser',TRUE),
		'parentmenu' => $this->input->post('parentmenu',TRUE),
		'urlci' => $this->input->post('urlci',TRUE),
		'urut' => $this->input->post('urut',TRUE),
		'jmlgambar' => $this->input->post('jmlgambar',TRUE),
		'settingform' => $this->input->post('settingform',TRUE),
		'idaplikasi' => $this->input->post('idaplikasi',TRUE),
		'isumum' => $this->input->post('isumum',TRUE),
	    );

            $this->Menu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menu/update_action'),
		'idmenu' => set_value('idmenu', $row->idmenu),
		'nmmenu' => set_value('nmmenu', $row->nmmenu),
		'tipemenu' => set_value('tipemenu', $row->tipemenu),
		'idkomponen' => set_value('idkomponen', $row->idkomponen),
		'iduser' => set_value('iduser', $row->iduser),
		'parentmenu' => set_value('parentmenu', $row->parentmenu),
		'urlci' => set_value('urlci', $row->urlci),
		'urut' => set_value('urut', $row->urut),
		'jmlgambar' => set_value('jmlgambar', $row->jmlgambar),
		'settingform' => set_value('settingform', $row->settingform),
		'idaplikasi' => set_value('idaplikasi', $row->idaplikasi),
		'isumum' => set_value('isumum', $row->isumum),
	    );
            $this->load->view('menu/menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idmenu', TRUE));
        } else {
            $data = array(
		'nmmenu' => $this->input->post('nmmenu',TRUE),
		'tipemenu' => $this->input->post('tipemenu',TRUE),
		'idkomponen' => $this->input->post('idkomponen',TRUE),
		'iduser' => $this->input->post('iduser',TRUE),
		'parentmenu' => $this->input->post('parentmenu',TRUE),
		'urlci' => $this->input->post('urlci',TRUE),
		'urut' => $this->input->post('urut',TRUE),
		'jmlgambar' => $this->input->post('jmlgambar',TRUE),
		'settingform' => $this->input->post('settingform',TRUE),
		'idaplikasi' => $this->input->post('idaplikasi',TRUE),
		'isumum' => $this->input->post('isumum',TRUE),
	    );

            $this->Menu_model->update($this->input->post('idmenu', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $this->Menu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nmmenu', 'nmmenu', 'trim|required');
	$this->form_validation->set_rules('tipemenu', 'tipemenu', 'trim|required');
	$this->form_validation->set_rules('idkomponen', 'idkomponen', 'trim|required');
	$this->form_validation->set_rules('iduser', 'iduser', 'trim|required');
	$this->form_validation->set_rules('parentmenu', 'parentmenu', 'trim|required');
	$this->form_validation->set_rules('urlci', 'urlci', 'trim|required');
	$this->form_validation->set_rules('urut', 'urut', 'trim|required');
	$this->form_validation->set_rules('jmlgambar', 'jmlgambar', 'trim|required');
	$this->form_validation->set_rules('settingform', 'settingform', 'trim|required');
	$this->form_validation->set_rules('idaplikasi', 'idaplikasi', 'trim|required');
	$this->form_validation->set_rules('isumum', 'isumum', 'trim|required');

	$this->form_validation->set_rules('idmenu', 'idmenu', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

