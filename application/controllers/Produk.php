<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'produk/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'produk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'produk/index.html';
            $config['first_url'] = base_url() . 'produk/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Produk_model->total_rows($q);
        $produk = $this->Produk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'produk_data' => $produk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('produk/produk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Produk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'JudulProduk' => $row->JudulProduk,
		'idKategoriProduk' => $row->idKategoriProduk,
		'idmember' => $row->idmember,
		'Keterangan' => $row->Keterangan,
		'phonekontak' => $row->phonekontak,
		'NamaKontak' => $row->NamaKontak,
		'DiskripsiProduk' => $row->DiskripsiProduk,
		'mapaddress' => $row->mapaddress,
		'buka' => $row->buka,
		'tutup' => $row->tutup,
		'rate' => $row->rate,
		'ratediscount' => $row->ratediscount,
		'rancode' => $row->rancode,
		'tglinsert' => $row->tglinsert,
		'tglupdate' => $row->tglupdate,
		'idpegawai' => $row->idpegawai,
		'kapasitas' => $row->kapasitas,
		'standartpemakaian' => $row->standartpemakaian,
		'idsatuan' => $row->idsatuan,
		'Token' => $row->Token,
		'city' => $row->city,
		'kabupaten' => $row->kabupaten,
		'state' => $row->state,
		'isberbayar' => $row->isberbayar,
		'tglterakhirbayar' => $row->tglterakhirbayar,
		'star' => $row->star,
		'isverifikasi' => $row->isverifikasi,
		'tglverifikasi' => $row->tglverifikasi,
		'idpemverifikasi' => $row->idpemverifikasi,
		'isaktif' => $row->isaktif,
		'lskategori' => $row->lskategori,
		'menutext' => $row->menutext,
		'kategoritext' => $row->kategoritext,
	    );
            $this->load->view('produk/produk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }

//=========READ=========
        

public function readprodukAndroid() {
        $this->load->helper('json'); 

        $xSearch = $_POST['search']; 

		 $this->json_data['idx'] = "";
		 $this->json_data['JudulProduk'] = "";
		 $this->json_data['idKategoriProduk'] = "";
		 $this->json_data['idmember'] = "";
		 $this->json_data['Keterangan'] = "";
		 $this->json_data['phonekontak'] = "";
		 $this->json_data['NamaKontak'] = "";
		 $this->json_data['DiskripsiProduk'] = "";
		 $this->json_data['mapaddress'] = "";
		 $this->json_data['buka'] = "";
		 $this->json_data['tutup'] = "";
		 $this->json_data['rate'] = "";
		 $this->json_data['ratediscount'] = "";
		 $this->json_data['rancode'] = "";
		 $this->json_data['tglinsert'] = "";
		 $this->json_data['tglupdate'] = "";
		 $this->json_data['idpegawai'] = "";
		 $this->json_data['kapasitas'] = "";
		 $this->json_data['standartpemakaian'] = "";
		 $this->json_data['idsatuan'] = "";
		 $this->json_data['Token'] = "";
		 $this->json_data['city'] = "";
		 $this->json_data['kabupaten'] = "";
		 $this->json_data['state'] = "";
		 $this->json_data['isberbayar'] = "";
		 $this->json_data['tglterakhirbayar'] = "";
		 $this->json_data['star'] = "";
		 $this->json_data['isverifikasi'] = "";
		 $this->json_data['tglverifikasi'] = "";
		 $this->json_data['idpemverifikasi'] = "";
		 $this->json_data['isaktif'] = "";
		 $this->json_data['lskategori'] = "";
		 $this->json_data['menutext'] = "";
		 $this->json_data['kategoritext'] = "";

		$this->load->model('Produk_model');
                
		$response = array();
                
		$xQuery = $this->Produk_model->getListproduk();

                
		foreach ($xQuery->result() as $row) {
			 $this->json_data['idx'] = $row->idx;
			 $this->json_data['JudulProduk'] = $row->JudulProduk;
			 $this->json_data['idKategoriProduk'] = $row->idKategoriProduk;
			 $this->json_data['idmember'] = $row->idmember;
			 $this->json_data['Keterangan'] = $row->Keterangan;
			 $this->json_data['phonekontak'] = $row->phonekontak;
			 $this->json_data['NamaKontak'] = $row->NamaKontak;
			 $this->json_data['DiskripsiProduk'] = $row->DiskripsiProduk;
			 $this->json_data['mapaddress'] = $row->mapaddress;
			 $this->json_data['buka'] = $row->buka;
			 $this->json_data['tutup'] = $row->tutup;
			 $this->json_data['rate'] = $row->rate;
			 $this->json_data['ratediscount'] = $row->ratediscount;
			 $this->json_data['rancode'] = $row->rancode;
			 $this->json_data['tglinsert'] = $row->tglinsert;
			 $this->json_data['tglupdate'] = $row->tglupdate;
			 $this->json_data['idpegawai'] = $row->idpegawai;
			 $this->json_data['kapasitas'] = $row->kapasitas;
			 $this->json_data['standartpemakaian'] = $row->standartpemakaian;
			 $this->json_data['idsatuan'] = $row->idsatuan;
			 $this->json_data['Token'] = $row->Token;
			 $this->json_data['city'] = $row->city;
			 $this->json_data['kabupaten'] = $row->kabupaten;
			 $this->json_data['state'] = $row->state;
			 $this->json_data['isberbayar'] = $row->isberbayar;
			 $this->json_data['tglterakhirbayar'] = $row->tglterakhirbayar;
			 $this->json_data['star'] = $row->star;
			 $this->json_data['isverifikasi'] = $row->isverifikasi;
			 $this->json_data['tglverifikasi'] = $row->tglverifikasi;
			 $this->json_data['idpemverifikasi'] = $row->idpemverifikasi;
			 $this->json_data['isaktif'] = $row->isaktif;
			 $this->json_data['lskategori'] = $row->lskategori;
			 $this->json_data['menutext'] = $row->menutext;
			 $this->json_data['kategoritext'] = $row->kategoritext;
		array_push($response, $this->json_data); 
		}
            
            
		if (empty($response)) {
            
		array_push($response, $this->json_data);
        
		} 

        
		echo json_encode();
    }
    

//=========READ=========

//=========INSERT AND UPDATE=========
        

public function simpanupdateprodukAndroid() {
        $this->load->helper('json'); 

         if (!empty($_POST['$edidx'])) {
            
$xidx = $_POST['$edidx'];
        
} else {
            
$xidx = '0';
        
}
		 $xJudulProduk = $_POST['edJudulProduk'];
		 $xidKategoriProduk = $_POST['edidKategoriProduk'];
		 $xidmember = $_POST['edidmember'];
		 $xKeterangan = $_POST['edKeterangan'];
		 $xphonekontak = $_POST['edphonekontak'];
		 $xNamaKontak = $_POST['edNamaKontak'];
		 $xDiskripsiProduk = $_POST['edDiskripsiProduk'];
		 $xmapaddress = $_POST['edmapaddress'];
		 $xbuka = $_POST['edbuka'];
		 $xtutup = $_POST['edtutup'];
		 $xrate = $_POST['edrate'];
		 $xratediscount = $_POST['edratediscount'];
		 $xrancode = $_POST['edrancode'];
		 $xtglinsert = $_POST['edtglinsert'];
		 $xtglupdate = $_POST['edtglupdate'];
		 $xidpegawai = $_POST['edidpegawai'];
		 $xkapasitas = $_POST['edkapasitas'];
		 $xstandartpemakaian = $_POST['edstandartpemakaian'];
		 $xidsatuan = $_POST['edidsatuan'];
		 $xToken = $_POST['edToken'];
		 $xcity = $_POST['edcity'];
		 $xkabupaten = $_POST['edkabupaten'];
		 $xstate = $_POST['edstate'];
		 $xisberbayar = $_POST['edisberbayar'];
		 $xtglterakhirbayar = $_POST['edtglterakhirbayar'];
		 $xstar = $_POST['edstar'];
		 $xisverifikasi = $_POST['edisverifikasi'];
		 $xtglverifikasi = $_POST['edtglverifikasi'];
		 $xidpemverifikasi = $_POST['edidpemverifikasi'];
		 $xisaktif = $_POST['edisaktif'];
		 $xlskategori = $_POST['edlskategori'];
		 $xmenutext = $_POST['edmenutext'];
		 $xkategoritext = $_POST['edkategoritext'];

		$this->load->model('Produk_model');
                
		if (!empty($xidx)) {
                
		if ($xidx != '0') {
                //===UPDATE===
                
		$xStr = $this->Produk_model->Updateproduk($xidx,$xJudulProduk,$xidKategoriProduk,$xidmember,$xKeterangan,$xphonekontak,$xNamaKontak,$xDiskripsiProduk,$xmapaddress,$xbuka,$xtutup,$xrate,$xratediscount,$xrancode,$xtglinsert,$xtglupdate,$xidpegawai,$xkapasitas,$xstandartpemakaian,$xidsatuan,$xToken,$xcity,$xkabupaten,$xstate,$xisberbayar,$xtglterakhirbayar,$xstar,$xisverifikasi,$xtglverifikasi,$xidpemverifikasi,$xisaktif,$xlskategori,$xmenutext,$xkategoritext);
		} else {
            //===INSERT===
            
		$xStr = $this->Produk_model->Insertproduk($xidx,$xJudulProduk,$xidKategoriProduk,$xidmember,$xKeterangan,$xphonekontak,$xNamaKontak,$xDiskripsiProduk,$xmapaddress,$xbuka,$xtutup,$xrate,$xratediscount,$xrancode,$xtglinsert,$xtglupdate,$xidpegawai,$xkapasitas,$xstandartpemakaian,$xidsatuan,$xToken,$xcity,$xkabupaten,$xstate,$xisberbayar,$xtglterakhirbayar,$xstar,$xisverifikasi,$xtglverifikasi,$xidpemverifikasi,$xisaktif,$xlskategori,$xmenutext,$xkategoritext);
            	}
            		}
        
		echo json_encode(null);
    }
    

//=========INSERT AND UPDATE=========

//=========DELET=========
        

public function deletprodukAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Produk_model');
        $this->Produk_model->Deletproduk($xidx);
        $this->load->helper('json');
        echo json_encode(null);
    }
    

//=========DELET=========

//=========GET DETAIL=========
        

public function getDetailprodukAndroid() {
        
		$xidx = $_POST['$edidx'];
        $this->load->model('Produk_model');
        $this->Produk_model->getDetailproduk($xidx);
        $this->load->helper('json');
		$this->json_data['idx'] = $row->idx;
		$this->json_data['JudulProduk'] = $row->JudulProduk;
		$this->json_data['idKategoriProduk'] = $row->idKategoriProduk;
		$this->json_data['idmember'] = $row->idmember;
		$this->json_data['Keterangan'] = $row->Keterangan;
		$this->json_data['phonekontak'] = $row->phonekontak;
		$this->json_data['NamaKontak'] = $row->NamaKontak;
		$this->json_data['DiskripsiProduk'] = $row->DiskripsiProduk;
		$this->json_data['mapaddress'] = $row->mapaddress;
		$this->json_data['buka'] = $row->buka;
		$this->json_data['tutup'] = $row->tutup;
		$this->json_data['rate'] = $row->rate;
		$this->json_data['ratediscount'] = $row->ratediscount;
		$this->json_data['rancode'] = $row->rancode;
		$this->json_data['tglinsert'] = $row->tglinsert;
		$this->json_data['tglupdate'] = $row->tglupdate;
		$this->json_data['idpegawai'] = $row->idpegawai;
		$this->json_data['kapasitas'] = $row->kapasitas;
		$this->json_data['standartpemakaian'] = $row->standartpemakaian;
		$this->json_data['idsatuan'] = $row->idsatuan;
		$this->json_data['Token'] = $row->Token;
		$this->json_data['city'] = $row->city;
		$this->json_data['kabupaten'] = $row->kabupaten;
		$this->json_data['state'] = $row->state;
		$this->json_data['isberbayar'] = $row->isberbayar;
		$this->json_data['tglterakhirbayar'] = $row->tglterakhirbayar;
		$this->json_data['star'] = $row->star;
		$this->json_data['isverifikasi'] = $row->isverifikasi;
		$this->json_data['tglverifikasi'] = $row->tglverifikasi;
		$this->json_data['idpemverifikasi'] = $row->idpemverifikasi;
		$this->json_data['isaktif'] = $row->isaktif;
		$this->json_data['lskategori'] = $row->lskategori;
		$this->json_data['menutext'] = $row->menutext;
		$this->json_data['kategoritext'] = $row->kategoritext;
		echo json_encode($this->json_data);
}
    

//=========GET DETAIL=========

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('produk/create_action'),
	    'idx' => set_value('idx'),
	    'JudulProduk' => set_value('JudulProduk'),
	    'idKategoriProduk' => set_value('idKategoriProduk'),
	    'idmember' => set_value('idmember'),
	    'Keterangan' => set_value('Keterangan'),
	    'phonekontak' => set_value('phonekontak'),
	    'NamaKontak' => set_value('NamaKontak'),
	    'DiskripsiProduk' => set_value('DiskripsiProduk'),
	    'mapaddress' => set_value('mapaddress'),
	    'buka' => set_value('buka'),
	    'tutup' => set_value('tutup'),
	    'rate' => set_value('rate'),
	    'ratediscount' => set_value('ratediscount'),
	    'rancode' => set_value('rancode'),
	    'tglinsert' => set_value('tglinsert'),
	    'tglupdate' => set_value('tglupdate'),
	    'idpegawai' => set_value('idpegawai'),
	    'kapasitas' => set_value('kapasitas'),
	    'standartpemakaian' => set_value('standartpemakaian'),
	    'idsatuan' => set_value('idsatuan'),
	    'Token' => set_value('Token'),
	    'city' => set_value('city'),
	    'kabupaten' => set_value('kabupaten'),
	    'state' => set_value('state'),
	    'isberbayar' => set_value('isberbayar'),
	    'tglterakhirbayar' => set_value('tglterakhirbayar'),
	    'star' => set_value('star'),
	    'isverifikasi' => set_value('isverifikasi'),
	    'tglverifikasi' => set_value('tglverifikasi'),
	    'idpemverifikasi' => set_value('idpemverifikasi'),
	    'isaktif' => set_value('isaktif'),
	    'lskategori' => set_value('lskategori'),
	    'menutext' => set_value('menutext'),
	    'kategoritext' => set_value('kategoritext'),
	);
        $this->load->view('produk/produk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'JudulProduk' => $this->input->post('JudulProduk',TRUE),
		'idKategoriProduk' => $this->input->post('idKategoriProduk',TRUE),
		'idmember' => $this->input->post('idmember',TRUE),
		'Keterangan' => $this->input->post('Keterangan',TRUE),
		'phonekontak' => $this->input->post('phonekontak',TRUE),
		'NamaKontak' => $this->input->post('NamaKontak',TRUE),
		'DiskripsiProduk' => $this->input->post('DiskripsiProduk',TRUE),
		'mapaddress' => $this->input->post('mapaddress',TRUE),
		'buka' => $this->input->post('buka',TRUE),
		'tutup' => $this->input->post('tutup',TRUE),
		'rate' => $this->input->post('rate',TRUE),
		'ratediscount' => $this->input->post('ratediscount',TRUE),
		'rancode' => $this->input->post('rancode',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
		'kapasitas' => $this->input->post('kapasitas',TRUE),
		'standartpemakaian' => $this->input->post('standartpemakaian',TRUE),
		'idsatuan' => $this->input->post('idsatuan',TRUE),
		'Token' => $this->input->post('Token',TRUE),
		'city' => $this->input->post('city',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'state' => $this->input->post('state',TRUE),
		'isberbayar' => $this->input->post('isberbayar',TRUE),
		'tglterakhirbayar' => $this->input->post('tglterakhirbayar',TRUE),
		'star' => $this->input->post('star',TRUE),
		'isverifikasi' => $this->input->post('isverifikasi',TRUE),
		'tglverifikasi' => $this->input->post('tglverifikasi',TRUE),
		'idpemverifikasi' => $this->input->post('idpemverifikasi',TRUE),
		'isaktif' => $this->input->post('isaktif',TRUE),
		'lskategori' => $this->input->post('lskategori',TRUE),
		'menutext' => $this->input->post('menutext',TRUE),
		'kategoritext' => $this->input->post('kategoritext',TRUE),
	    );

            $this->Produk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('produk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Produk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('produk/update_action'),
		'idx' => set_value('idx', $row->idx),
		'JudulProduk' => set_value('JudulProduk', $row->JudulProduk),
		'idKategoriProduk' => set_value('idKategoriProduk', $row->idKategoriProduk),
		'idmember' => set_value('idmember', $row->idmember),
		'Keterangan' => set_value('Keterangan', $row->Keterangan),
		'phonekontak' => set_value('phonekontak', $row->phonekontak),
		'NamaKontak' => set_value('NamaKontak', $row->NamaKontak),
		'DiskripsiProduk' => set_value('DiskripsiProduk', $row->DiskripsiProduk),
		'mapaddress' => set_value('mapaddress', $row->mapaddress),
		'buka' => set_value('buka', $row->buka),
		'tutup' => set_value('tutup', $row->tutup),
		'rate' => set_value('rate', $row->rate),
		'ratediscount' => set_value('ratediscount', $row->ratediscount),
		'rancode' => set_value('rancode', $row->rancode),
		'tglinsert' => set_value('tglinsert', $row->tglinsert),
		'tglupdate' => set_value('tglupdate', $row->tglupdate),
		'idpegawai' => set_value('idpegawai', $row->idpegawai),
		'kapasitas' => set_value('kapasitas', $row->kapasitas),
		'standartpemakaian' => set_value('standartpemakaian', $row->standartpemakaian),
		'idsatuan' => set_value('idsatuan', $row->idsatuan),
		'Token' => set_value('Token', $row->Token),
		'city' => set_value('city', $row->city),
		'kabupaten' => set_value('kabupaten', $row->kabupaten),
		'state' => set_value('state', $row->state),
		'isberbayar' => set_value('isberbayar', $row->isberbayar),
		'tglterakhirbayar' => set_value('tglterakhirbayar', $row->tglterakhirbayar),
		'star' => set_value('star', $row->star),
		'isverifikasi' => set_value('isverifikasi', $row->isverifikasi),
		'tglverifikasi' => set_value('tglverifikasi', $row->tglverifikasi),
		'idpemverifikasi' => set_value('idpemverifikasi', $row->idpemverifikasi),
		'isaktif' => set_value('isaktif', $row->isaktif),
		'lskategori' => set_value('lskategori', $row->lskategori),
		'menutext' => set_value('menutext', $row->menutext),
		'kategoritext' => set_value('kategoritext', $row->kategoritext),
	    );
            $this->load->view('produk/produk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'JudulProduk' => $this->input->post('JudulProduk',TRUE),
		'idKategoriProduk' => $this->input->post('idKategoriProduk',TRUE),
		'idmember' => $this->input->post('idmember',TRUE),
		'Keterangan' => $this->input->post('Keterangan',TRUE),
		'phonekontak' => $this->input->post('phonekontak',TRUE),
		'NamaKontak' => $this->input->post('NamaKontak',TRUE),
		'DiskripsiProduk' => $this->input->post('DiskripsiProduk',TRUE),
		'mapaddress' => $this->input->post('mapaddress',TRUE),
		'buka' => $this->input->post('buka',TRUE),
		'tutup' => $this->input->post('tutup',TRUE),
		'rate' => $this->input->post('rate',TRUE),
		'ratediscount' => $this->input->post('ratediscount',TRUE),
		'rancode' => $this->input->post('rancode',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
		'kapasitas' => $this->input->post('kapasitas',TRUE),
		'standartpemakaian' => $this->input->post('standartpemakaian',TRUE),
		'idsatuan' => $this->input->post('idsatuan',TRUE),
		'Token' => $this->input->post('Token',TRUE),
		'city' => $this->input->post('city',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'state' => $this->input->post('state',TRUE),
		'isberbayar' => $this->input->post('isberbayar',TRUE),
		'tglterakhirbayar' => $this->input->post('tglterakhirbayar',TRUE),
		'star' => $this->input->post('star',TRUE),
		'isverifikasi' => $this->input->post('isverifikasi',TRUE),
		'tglverifikasi' => $this->input->post('tglverifikasi',TRUE),
		'idpemverifikasi' => $this->input->post('idpemverifikasi',TRUE),
		'isaktif' => $this->input->post('isaktif',TRUE),
		'lskategori' => $this->input->post('lskategori',TRUE),
		'menutext' => $this->input->post('menutext',TRUE),
		'kategoritext' => $this->input->post('kategoritext',TRUE),
	    );

            $this->Produk_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('produk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Produk_model->get_by_id($id);

        if ($row) {
            $this->Produk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('JudulProduk', 'judulproduk', 'trim|required');
	$this->form_validation->set_rules('idKategoriProduk', 'idkategoriproduk', 'trim|required');
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('Keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('phonekontak', 'phonekontak', 'trim|required');
	$this->form_validation->set_rules('NamaKontak', 'namakontak', 'trim|required');
	$this->form_validation->set_rules('DiskripsiProduk', 'diskripsiproduk', 'trim|required');
	$this->form_validation->set_rules('mapaddress', 'mapaddress', 'trim|required');
	$this->form_validation->set_rules('buka', 'buka', 'trim|required');
	$this->form_validation->set_rules('tutup', 'tutup', 'trim|required');
	$this->form_validation->set_rules('rate', 'rate', 'trim|required');
	$this->form_validation->set_rules('ratediscount', 'ratediscount', 'trim|required');
	$this->form_validation->set_rules('rancode', 'rancode', 'trim|required');
	$this->form_validation->set_rules('tglinsert', 'tglinsert', 'trim|required');
	$this->form_validation->set_rules('tglupdate', 'tglupdate', 'trim|required');
	$this->form_validation->set_rules('idpegawai', 'idpegawai', 'trim|required');
	$this->form_validation->set_rules('kapasitas', 'kapasitas', 'trim|required');
	$this->form_validation->set_rules('standartpemakaian', 'standartpemakaian', 'trim|required');
	$this->form_validation->set_rules('idsatuan', 'idsatuan', 'trim|required');
	$this->form_validation->set_rules('Token', 'token', 'trim|required');
	$this->form_validation->set_rules('city', 'city', 'trim|required');
	$this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');
	$this->form_validation->set_rules('state', 'state', 'trim|required');
	$this->form_validation->set_rules('isberbayar', 'isberbayar', 'trim|required');
	$this->form_validation->set_rules('tglterakhirbayar', 'tglterakhirbayar', 'trim|required');
	$this->form_validation->set_rules('star', 'star', 'trim|required');
	$this->form_validation->set_rules('isverifikasi', 'isverifikasi', 'trim|required');
	$this->form_validation->set_rules('tglverifikasi', 'tglverifikasi', 'trim|required');
	$this->form_validation->set_rules('idpemverifikasi', 'idpemverifikasi', 'trim|required');
	$this->form_validation->set_rules('isaktif', 'isaktif', 'trim|required');
	$this->form_validation->set_rules('lskategori', 'lskategori', 'trim|required');
	$this->form_validation->set_rules('menutext', 'menutext', 'trim|required');
	$this->form_validation->set_rules('kategoritext', 'kategoritext', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

