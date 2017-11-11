<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'menu/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'menu/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'menu/index.html';
            $config['first_url'] = base_url() . 'menu/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Menu_model->total_rows($q);
        $menu = $this->Menu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'menu_data' => $menu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'title' => 'Menu',
            'js' => 'menu_ajax',
            'css_file' => 'menu_css',
        );
        $this->render('menu/menu_list', $data);
    }

    public function read($id) {
        $row = $this->Menu_model->get_by_id($id);
        if ($row) {
            $data = array(
                'ID' => $row->ID,
                'NAMA_MENU' => $row->NAMA_MENU,
                'ID_RESTORAN' => $row->ID_RESTORAN,
                'HARGA' => $row->HARGA,
                'FOTO_MENU' => $row->FOTO_MENU,
                'KETERANGAN' => $row->KETERANGAN,
            );
            $this->render('menu/menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    //=========Autocomplete========= 
    public function get_menu_search() {
        $q = $this->input->post('q', TRUE);
        $term = $_POST['term'];
        if (!empty($term)) {
            $query = $this->Menu_model->getListmenuAuto($term); //query model
            $hasilnya = array();
            foreach ($query->result() as $d) {
                $hasilnya[] = array(
                    'label' => $d->ID . '-' . $d->NAMA_MENU,
                    'value' => $d->NAMA_MENU
                );
            }
            echo json_encode($hasilnya);
        }
    }

//=========READ=========
    public function readmenuAndroid() {
        $this->load->helper('json');

        $xSearch = $_POST['search'];

        $this->json_data['ID'] = "";
        $this->json_data['NAMA_MENU'] = "";
        $this->json_data['ID_RESTORAN'] = "";
        $this->json_data['HARGA'] = "";
        $this->json_data['FOTO_MENU'] = "";
        $this->json_data['KETERANGAN'] = "";

        $this->load->model('Menu_model');

        $response = array();

        $xQuery = $this->Menu_model->getListmenu();


        foreach ($xQuery->result() as $row) {
            $this->json_data['ID'] = $row->ID;
            $this->json_data['NAMA_MENU'] = $row->NAMA_MENU;
            $this->json_data['ID_RESTORAN'] = $row->ID_RESTORAN;
            $this->json_data['HARGA'] = $row->HARGA;
            $this->json_data['FOTO_MENU'] = $row->FOTO_MENU;
            $this->json_data['KETERANGAN'] = $row->KETERANGAN;
            array_push($response, $this->json_data);
        }


        if (empty($response)) {

            array_push($response, $this->json_data);
        }


        echo json_encode($response);
    }

//=========READ=========
//=========INSERT AND UPDATE=========


    public function simpanupdatemenuAndroid() {
        $this->load->helper('json');

        if (!empty($_POST['edID'])) {

            $xID = $_POST['edID'];
        } else {

            $xID = '0';
        }
        $xNAMA_MENU = $_POST['edNAMA_MENU'];
        $xID_RESTORAN = $_POST['edID_RESTORAN'];
        $xHARGA = $_POST['edHARGA'];
        $xFOTO_MENU = $_POST['edFOTO_MENU'];
        $xKETERANGAN = $_POST['edKETERANGAN'];

        $this->load->model('Menu_model');
        $response = array();

        if ($xID != '0') {
            //===UPDATE===

            $xStr = $this->Menu_model->Updatemenu($xID, $xNAMA_MENU, $xID_RESTORAN, $xHARGA, $xFOTO_MENU, $xKETERANGAN);
        } else {
            //===INSERT===

            $xStr = $this->Menu_model->Insertmenu($xID, $xNAMA_MENU, $xID_RESTORAN, $xHARGA, $xFOTO_MENU, $xKETERANGAN);
        }


        $row = $this->Menu_model->getLastIndexmenu();
        $this->json_data['ID'] = $row->ID;
        $this->json_data['NAMA_MENU'] = $row->NAMA_MENU;
        $this->json_data['ID_RESTORAN'] = $row->ID_RESTORAN;
        $this->json_data['HARGA'] = $row->HARGA;
        $this->json_data['FOTO_MENU'] = $row->FOTO_MENU;
        $this->json_data['KETERANGAN'] = $row->KETERANGAN;
        array_push($response, $this->json_data);


        echo json_encode($response);
    }

//=========INSERT AND UPDATE=========
//=========DELET=========


    public function deletmenuAndroid() {

        $xID = $_POST['edID'];
        $this->load->model('Menu_model');
        $this->Menu_model->Deletmenu($xID);
        $this->load->helper('json');
        echo json_encode(null);
    }

//=========DELET=========
//=========GET DETAIL=========


    public function getDetailmenuAndroid() {

        $xID = $_POST['edID'];
        $this->load->model('Menu_model');
        $this->Menu_model->getDetailmenu($xID);
        $this->load->helper('json');
        $this->json_data['ID'] = $row->ID;
        $this->json_data['NAMA_MENU'] = $row->NAMA_MENU;
        $this->json_data['ID_RESTORAN'] = $row->ID_RESTORAN;
        $this->json_data['HARGA'] = $row->HARGA;
        $this->json_data['FOTO_MENU'] = $row->FOTO_MENU;
        $this->json_data['KETERANGAN'] = $row->KETERANGAN;
        echo json_encode($this->json_data);
    }

//=========GET DETAIL=========

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('menu/create_action'),
            'ID' => set_value('ID'),
            'NAMA_MENU' => set_value('NAMA_MENU'),
            'ID_RESTORAN' => set_value('ID_RESTORAN'),
            'HARGA' => set_value('HARGA'),
            'FOTO_MENU' => set_value('FOTO_MENU'),
            'KETERANGAN' => set_value('KETERANGAN'),
        );
        $this->render('menu/menu_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'NAMA_MENU' => $this->input->post('NAMA_MENU', TRUE),
                'ID_RESTORAN' => $this->input->post('ID_RESTORAN', TRUE),
                'HARGA' => $this->input->post('HARGA', TRUE),
                'FOTO_MENU' => $this->input->post('FOTO_MENU', TRUE),
                'KETERANGAN' => $this->input->post('KETERANGAN', TRUE),
            );

            $this->Menu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('menu'));
        }
    }

    public function update($id) {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menu/update_action'),
                'ID' => set_value('ID', $row->ID),
                'NAMA_MENU' => set_value('NAMA_MENU', $row->NAMA_MENU),
                'ID_RESTORAN' => set_value('ID_RESTORAN', $row->ID_RESTORAN),
                'HARGA' => set_value('HARGA', $row->HARGA),
                'FOTO_MENU' => set_value('FOTO_MENU', $row->FOTO_MENU),
                'KETERANGAN' => set_value('KETERANGAN', $row->KETERANGAN),
            );
            $this->render('menu/menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
                'NAMA_MENU' => $this->input->post('NAMA_MENU', TRUE),
                'ID_RESTORAN' => $this->input->post('ID_RESTORAN', TRUE),
                'HARGA' => $this->input->post('HARGA', TRUE),
                'FOTO_MENU' => $this->input->post('FOTO_MENU', TRUE),
                'KETERANGAN' => $this->input->post('KETERANGAN', TRUE),
            );

            $this->Menu_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu'));
        }
    }

    public function delete($id) {
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

    public function _rules() {
        $this->form_validation->set_rules('NAMA_MENU', 'nama menu', 'trim|required');
        $this->form_validation->set_rules('ID_RESTORAN', 'id restoran', 'trim|required');
        $this->form_validation->set_rules('HARGA', 'harga', 'trim|required');
        $this->form_validation->set_rules('FOTO_MENU', 'foto menu', 'trim|required');
        $this->form_validation->set_rules('KETERANGAN', 'keterangan', 'trim|required');

        $this->form_validation->set_rules('ID', 'ID', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
