<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Voucher extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Voucher_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'voucher/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'voucher/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'voucher/index.html';
            $config['first_url'] = base_url() . 'voucher/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Voucher_model->total_rows($q);
        $voucher = $this->Voucher_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'voucher_data' => $voucher,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('voucher/voucher_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Voucher_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'voucher' => $row->voucher,
		'nominal' => $row->nominal,
		'prosentase' => $row->prosentase,
		'tglberlakudari' => $row->tglberlakudari,
		'tglberlakusampai' => $row->tglberlakusampai,
		'idmember' => $row->idmember,
		'isterpakai' => $row->isterpakai,
		'tglpakai' => $row->tglpakai,
		'linkimage' => $row->linkimage,
		'idproduk' => $row->idproduk,
		'jumlahmaxpengguna' => $row->jumlahmaxpengguna,
		'penjelasan' => $row->penjelasan,
		'idjenisvoucher' => $row->idjenisvoucher,
		'aktifjmlrekomendasi' => $row->aktifjmlrekomendasi,
		'dayvoucher' => $row->dayvoucher,
	    );
            $this->load->view('voucher/voucher_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('voucher'));
        }
    }

//=========READ=========
        

public function readvoucherAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['voucher'] = "";
		 $this->json_data['nominal'] = "";
		 $this->json_data['prosentase'] = "";
		 $this->json_data['tglberlakudari'] = "";
		 $this->json_data['tglberlakusampai'] = "";
		 $this->json_data['idmember'] = "";
		 $this->json_data['isterpakai'] = "";
		 $this->json_data['tglpakai'] = "";
		 $this->json_data['linkimage'] = "";
		 $this->json_data['idproduk'] = "";
		 $this->json_data['jumlahmaxpengguna'] = "";
		 $this->json_data['penjelasan'] = "";
		 $this->json_data['idjenisvoucher'] = "";
		 $this->json_data['aktifjmlrekomendasi'] = "";
		 $this->json_data['dayvoucher'] = "";

		$this->load->model('Voucher_model');
                
		$response = array();
                
		$xQuery = $this->Voucher_model->getListvoucher();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['voucher'] = $row->voucher;
			 $this->json_data['nominal'] = $row->nominal;
			 $this->json_data['prosentase'] = $row->prosentase;
			 $this->json_data['tglberlakudari'] = $row->tglberlakudari;
			 $this->json_data['tglberlakusampai'] = $row->tglberlakusampai;
			 $this->json_data['idmember'] = $row->idmember;
			 $this->json_data['isterpakai'] = $row->isterpakai;
			 $this->json_data['tglpakai'] = $row->tglpakai;
			 $this->json_data['linkimage'] = $row->linkimage;
			 $this->json_data['idproduk'] = $row->idproduk;
			 $this->json_data['jumlahmaxpengguna'] = $row->jumlahmaxpengguna;
			 $this->json_data['penjelasan'] = $row->penjelasan;
			 $this->json_data['idjenisvoucher'] = $row->idjenisvoucher;
			 $this->json_data['aktifjmlrekomendasi'] = $row->aktifjmlrekomendasi;
			 $this->json_data['dayvoucher'] = $row->dayvoucher;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdatevoucherAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xvoucher = $_POST['edvoucher'];
		 $xnominal = $_POST['ednominal'];
		 $xprosentase = $_POST['edprosentase'];
		 $xtglberlakudari = $_POST['edtglberlakudari'];
		 $xtglberlakusampai = $_POST['edtglberlakusampai'];
		 $xidmember = $_POST['edidmember'];
		 $xisterpakai = $_POST['edisterpakai'];
		 $xtglpakai = $_POST['edtglpakai'];
		 $xlinkimage = $_POST['edlinkimage'];
		 $xidproduk = $_POST['edidproduk'];
		 $xjumlahmaxpengguna = $_POST['edjumlahmaxpengguna'];
		 $xpenjelasan = $_POST['edpenjelasan'];
		 $xidjenisvoucher = $_POST['edidjenisvoucher'];
		 $xaktifjmlrekomendasi = $_POST['edaktifjmlrekomendasi'];
		 $xdayvoucher = $_POST['eddayvoucher'];

		$this->load->model('Voucher_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Voucher_model->Updatevoucher($xidx,$xvoucher,$xnominal,$xprosentase,$xtglberlakudari,$xtglberlakusampai,$xidmember,$xisterpakai,$xtglpakai,$xlinkimage,$xidproduk,$xjumlahmaxpengguna,$xpenjelasan,$xidjenisvoucher,$xaktifjmlrekomendasi,$xdayvoucher);
		} else {
            //===INSERT===
            
		$xStr = $this->Voucher_model->Insertvoucher($xidx,$xvoucher,$xnominal,$xprosentase,$xtglberlakudari,$xtglberlakusampai,$xidmember,$xisterpakai,$xtglpakai,$xlinkimage,$xidproduk,$xjumlahmaxpengguna,$xpenjelasan,$xidjenisvoucher,$xaktifjmlrekomendasi,$xdayvoucher);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletvoucherAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Voucher_model');
        $this->Voucher_model->Deletvoucher($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailvoucherAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Voucher_model');
        $this->Voucher_model->getDetailvoucher($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['voucher'] = $row->voucher;
		$this->json_data['nominal'] = $row->nominal;
		$this->json_data['prosentase'] = $row->prosentase;
		$this->json_data['tglberlakudari'] = $row->tglberlakudari;
		$this->json_data['tglberlakusampai'] = $row->tglberlakusampai;
		$this->json_data['idmember'] = $row->idmember;
		$this->json_data['isterpakai'] = $row->isterpakai;
		$this->json_data['tglpakai'] = $row->tglpakai;
		$this->json_data['linkimage'] = $row->linkimage;
		$this->json_data['idproduk'] = $row->idproduk;
		$this->json_data['jumlahmaxpengguna'] = $row->jumlahmaxpengguna;
		$this->json_data['penjelasan'] = $row->penjelasan;
		$this->json_data['idjenisvoucher'] = $row->idjenisvoucher;
		$this->json_data['aktifjmlrekomendasi'] = $row->aktifjmlrekomendasi;
		$this->json_data['dayvoucher'] = $row->dayvoucher;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('voucher/create_action'),
	    'idx' => set_value('idx'),
	    'voucher' => set_value('voucher'),
	    'nominal' => set_value('nominal'),
	    'prosentase' => set_value('prosentase'),
	    'tglberlakudari' => set_value('tglberlakudari'),
	    'tglberlakusampai' => set_value('tglberlakusampai'),
	    'idmember' => set_value('idmember'),
	    'isterpakai' => set_value('isterpakai'),
	    'tglpakai' => set_value('tglpakai'),
	    'linkimage' => set_value('linkimage'),
	    'idproduk' => set_value('idproduk'),
	    'jumlahmaxpengguna' => set_value('jumlahmaxpengguna'),
	    'penjelasan' => set_value('penjelasan'),
	    'idjenisvoucher' => set_value('idjenisvoucher'),
	    'aktifjmlrekomendasi' => set_value('aktifjmlrekomendasi'),
	    'dayvoucher' => set_value('dayvoucher'),
	);
        $this->load->view('voucher/voucher_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'voucher' => $this->input->post('voucher',TRUE),
		'nominal' => $this->input->post('nominal',TRUE),
		'prosentase' => $this->input->post('prosentase',TRUE),
		'tglberlakudari' => $this->input->post('tglberlakudari',TRUE),
		'tglberlakusampai' => $this->input->post('tglberlakusampai',TRUE),
		'idmember' => $this->input->post('idmember',TRUE),
		'isterpakai' => $this->input->post('isterpakai',TRUE),
		'tglpakai' => $this->input->post('tglpakai',TRUE),
		'linkimage' => $this->input->post('linkimage',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'jumlahmaxpengguna' => $this->input->post('jumlahmaxpengguna',TRUE),
		'penjelasan' => $this->input->post('penjelasan',TRUE),
		'idjenisvoucher' => $this->input->post('idjenisvoucher',TRUE),
		'aktifjmlrekomendasi' => $this->input->post('aktifjmlrekomendasi',TRUE),
		'dayvoucher' => $this->input->post('dayvoucher',TRUE),
	    );

            $this->Voucher_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('voucher'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Voucher_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('voucher/update_action'),
		'idx' => set_value('idx', $row->idx),
		'voucher' => set_value('voucher', $row->voucher),
		'nominal' => set_value('nominal', $row->nominal),
		'prosentase' => set_value('prosentase', $row->prosentase),
		'tglberlakudari' => set_value('tglberlakudari', $row->tglberlakudari),
		'tglberlakusampai' => set_value('tglberlakusampai', $row->tglberlakusampai),
		'idmember' => set_value('idmember', $row->idmember),
		'isterpakai' => set_value('isterpakai', $row->isterpakai),
		'tglpakai' => set_value('tglpakai', $row->tglpakai),
		'linkimage' => set_value('linkimage', $row->linkimage),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'jumlahmaxpengguna' => set_value('jumlahmaxpengguna', $row->jumlahmaxpengguna),
		'penjelasan' => set_value('penjelasan', $row->penjelasan),
		'idjenisvoucher' => set_value('idjenisvoucher', $row->idjenisvoucher),
		'aktifjmlrekomendasi' => set_value('aktifjmlrekomendasi', $row->aktifjmlrekomendasi),
		'dayvoucher' => set_value('dayvoucher', $row->dayvoucher),
	    );
            $this->load->view('voucher/voucher_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('voucher'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'voucher' => $this->input->post('voucher',TRUE),
		'nominal' => $this->input->post('nominal',TRUE),
		'prosentase' => $this->input->post('prosentase',TRUE),
		'tglberlakudari' => $this->input->post('tglberlakudari',TRUE),
		'tglberlakusampai' => $this->input->post('tglberlakusampai',TRUE),
		'idmember' => $this->input->post('idmember',TRUE),
		'isterpakai' => $this->input->post('isterpakai',TRUE),
		'tglpakai' => $this->input->post('tglpakai',TRUE),
		'linkimage' => $this->input->post('linkimage',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'jumlahmaxpengguna' => $this->input->post('jumlahmaxpengguna',TRUE),
		'penjelasan' => $this->input->post('penjelasan',TRUE),
		'idjenisvoucher' => $this->input->post('idjenisvoucher',TRUE),
		'aktifjmlrekomendasi' => $this->input->post('aktifjmlrekomendasi',TRUE),
		'dayvoucher' => $this->input->post('dayvoucher',TRUE),
	    );

            $this->Voucher_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('voucher'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Voucher_model->get_by_id($id);

        if ($row) {
            $this->Voucher_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('voucher'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('voucher'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('voucher', 'voucher', 'trim|required');
	$this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
	$this->form_validation->set_rules('prosentase', 'prosentase', 'trim|required');
	$this->form_validation->set_rules('tglberlakudari', 'tglberlakudari', 'trim|required');
	$this->form_validation->set_rules('tglberlakusampai', 'tglberlakusampai', 'trim|required');
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('isterpakai', 'isterpakai', 'trim|required');
	$this->form_validation->set_rules('tglpakai', 'tglpakai', 'trim|required');
	$this->form_validation->set_rules('linkimage', 'linkimage', 'trim|required');
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('jumlahmaxpengguna', 'jumlahmaxpengguna', 'trim|required');
	$this->form_validation->set_rules('penjelasan', 'penjelasan', 'trim|required');
	$this->form_validation->set_rules('idjenisvoucher', 'idjenisvoucher', 'trim|required');
	$this->form_validation->set_rules('aktifjmlrekomendasi', 'aktifjmlrekomendasi', 'trim|required');
	$this->form_validation->set_rules('dayvoucher', 'dayvoucher', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

