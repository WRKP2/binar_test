<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order_menu extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Order_menu_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'order_menu/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'order_menu/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'order_menu/index.html';
            $config['first_url'] = base_url() . 'order_menu/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Order_menu_model->total_rows($q);
        $order_menu = $this->Order_menu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'order_menu_data' => $order_menu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'title' => 'Order_menu',
            'js' => 'order_menu_ajax',
            'css_file' => 'order_menu_css',
        );
        $this->render('order_menu/order_menu_list', $data);
    }

    public function read($id) {
        $row = $this->Order_menu_model->get_by_id($id);
        if ($row) {
            $data = array(
                'ID' => $row->ID,
                'ID_RESTO' => $row->ID_RESTO,
                'ID_MENU' => $row->ID_MENU,
                'ID_USERAPP' => $row->ID_USERAPP,
                'JUMLAH' => $row->JUMLAH,
                'ORDER_DATE' => $row->ORDER_DATE,
                'STATUS' => $row->STATUS,
                'ALAMAT_PENGIRIMAN' => $row->ALAMAT_PENGIRIMAN,
            );
            $this->render('order_menu/order_menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('order_menu'));
        }
    }

    //=========Autocomplete========= 
    public function get_order_menu_search() {
        $q = $this->input->post('q', TRUE);
        $term = $_POST['term'];
        if (!empty($term)) {
            $query = $this->Order_menu_model->getListorder_menuAuto($term); //query model
            $hasilnya = array();
            foreach ($query->result() as $d) {
                $hasilnya[] = array(
                    'label' => $d->ID . '-' . $d->ALAMAT_PENGIRIMAN,
                    'value' => $d->ALAMAT_PENGIRIMAN
                );
            }
            echo json_encode($hasilnya);
        }
    }

//=========READ=========
    public function readorder_menuAndroid() {
        $this->load->helper('json');

        $xSearch = $_POST['search'];

        $this->json_data['ID'] = "";
        $this->json_data['ID_RESTO'] = "";
        $this->json_data['ID_MENU'] = "";
        $this->json_data['ID_USERAPP'] = "";
        $this->json_data['JUMLAH'] = "";
        $this->json_data['ORDER_DATE'] = "";
        $this->json_data['STATUS'] = "";
        $this->json_data['ALAMAT_PENGIRIMAN'] = "";

        $this->load->model('Order_menu_model');

        $response = array();

        $xQuery = $this->Order_menu_model->getListorder_menu();


        foreach ($xQuery->result() as $row) {
            $this->json_data['ID'] = $row->ID;
            $this->json_data['ID_RESTO'] = $row->ID_RESTO;
            $this->json_data['ID_MENU'] = $row->ID_MENU;
            $this->json_data['ID_USERAPP'] = $row->ID_USERAPP;
            $this->json_data['JUMLAH'] = $row->JUMLAH;
            $this->json_data['ORDER_DATE'] = $row->ORDER_DATE;
            $this->json_data['STATUS'] = $row->STATUS;
            $this->json_data['ALAMAT_PENGIRIMAN'] = $row->ALAMAT_PENGIRIMAN;
            array_push($response, $this->json_data);
        }


        if (empty($response)) {

            array_push($response, $this->json_data);
        }


        echo json_encode($response);
    }

//=========READ=========
//=========INSERT AND UPDATE=========


    public function simpanupdateorder_menuAndroid() {
        $this->load->helper('json');

        if (!empty($_POST['edID'])) {

            $xID = $_POST['edID'];
        } else {

            $xID = '0';
        }
        $xID_RESTO = $_POST['edID_RESTO'];
        $xID_MENU = $_POST['edID_MENU'];
        $xID_USERAPP = $_POST['edID_USERAPP'];
        $xJUMLAH = $_POST['edJUMLAH'];
        $xORDER_DATE = $_POST['edORDER_DATE'];
        $xSTATUS = $_POST['edSTATUS'];
        $xALAMAT_PENGIRIMAN = $_POST['edALAMAT_PENGIRIMAN'];

        $this->load->model('Order_menu_model');
        $response = array();

        if ($xID != '0') {
            //===UPDATE===

            $xStr = $this->Order_menu_model->Updateorder_menu($xID, $xID_RESTO, $xID_MENU, $xID_USERAPP, $xJUMLAH, $xORDER_DATE, $xSTATUS, $xALAMAT_PENGIRIMAN);
        } else {
            //===INSERT===

            $xStr = $this->Order_menu_model->Insertorder_menu($xID, $xID_RESTO, $xID_MENU, $xID_USERAPP, $xJUMLAH, $xORDER_DATE, $xSTATUS, $xALAMAT_PENGIRIMAN);
        }


        $row = $this->Order_menu_model->getLastIndexorder_menu();
        $this->json_data['ID'] = $row->ID;
        $this->json_data['ID_RESTO'] = $row->ID_RESTO;
        $this->json_data['ID_MENU'] = $row->ID_MENU;
        $this->json_data['ID_USERAPP'] = $row->ID_USERAPP;
        $this->json_data['JUMLAH'] = $row->JUMLAH;
        $this->json_data['ORDER_DATE'] = $row->ORDER_DATE;
        $this->json_data['STATUS'] = $row->STATUS;
        $this->json_data['ALAMAT_PENGIRIMAN'] = $row->ALAMAT_PENGIRIMAN;
        array_push($response, $this->json_data);


        echo json_encode($response);
    }

//=========INSERT AND UPDATE=========
//=========DELET=========


    public function deletorder_menuAndroid() {

        $xID = $_POST['edID'];
        $this->load->model('Order_menu_model');
        $this->Order_menu_model->Deletorder_menu($xID);
        $this->load->helper('json');
        echo json_encode(null);
    }

//=========DELET=========
//=========GET DETAIL=========


    public function getDetailorder_menuAndroid() {

        $xID = $_POST['edID'];
        $this->load->model('Order_menu_model');
        $this->Order_menu_model->getDetailorder_menu($xID);
        $this->load->helper('json');
        $this->json_data['ID'] = $row->ID;
        $this->json_data['ID_RESTO'] = $row->ID_RESTO;
        $this->json_data['ID_MENU'] = $row->ID_MENU;
        $this->json_data['ID_USERAPP'] = $row->ID_USERAPP;
        $this->json_data['JUMLAH'] = $row->JUMLAH;
        $this->json_data['ORDER_DATE'] = $row->ORDER_DATE;
        $this->json_data['STATUS'] = $row->STATUS;
        $this->json_data['ALAMAT_PENGIRIMAN'] = $row->ALAMAT_PENGIRIMAN;
        echo json_encode($this->json_data);
    }

//=========GET DETAIL=========

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('order_menu/create_action'),
            'ID' => set_value('ID'),
            'ID_RESTO' => set_value('ID_RESTO'),
            'ID_MENU' => set_value('ID_MENU'),
            'ID_USERAPP' => set_value('ID_USERAPP'),
            'JUMLAH' => set_value('JUMLAH'),
            'ORDER_DATE' => set_value('ORDER_DATE'),
            'STATUS' => set_value('STATUS'),
            'ALAMAT_PENGIRIMAN' => set_value('ALAMAT_PENGIRIMAN'),
        );
        $this->render('order_menu/order_menu_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'ID_RESTO' => $this->input->post('ID_RESTO', TRUE),
                'ID_MENU' => $this->input->post('ID_MENU', TRUE),
                'ID_USERAPP' => $this->input->post('ID_USERAPP', TRUE),
                'JUMLAH' => $this->input->post('JUMLAH', TRUE),
                'ORDER_DATE' => $this->input->post('ORDER_DATE', TRUE),
                'STATUS' => $this->input->post('STATUS', TRUE),
                'ALAMAT_PENGIRIMAN' => $this->input->post('ALAMAT_PENGIRIMAN', TRUE),
            );

            $this->Order_menu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('order_menu'));
        }
    }

    public function update($id) {
        $row = $this->Order_menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('order_menu/update_action'),
                'ID' => set_value('ID', $row->ID),
                'ID_RESTO' => set_value('ID_RESTO', $row->ID_RESTO),
                'ID_MENU' => set_value('ID_MENU', $row->ID_MENU),
                'ID_USERAPP' => set_value('ID_USERAPP', $row->ID_USERAPP),
                'JUMLAH' => set_value('JUMLAH', $row->JUMLAH),
                'ORDER_DATE' => set_value('ORDER_DATE', $row->ORDER_DATE),
                'STATUS' => set_value('STATUS', $row->STATUS),
                'ALAMAT_PENGIRIMAN' => set_value('ALAMAT_PENGIRIMAN', $row->ALAMAT_PENGIRIMAN),
            );
            $this->render('order_menu/order_menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('order_menu'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID', TRUE));
        } else {
            $data = array(
                'ID_RESTO' => $this->input->post('ID_RESTO', TRUE),
                'ID_MENU' => $this->input->post('ID_MENU', TRUE),
                'ID_USERAPP' => $this->input->post('ID_USERAPP', TRUE),
                'JUMLAH' => $this->input->post('JUMLAH', TRUE),
                'ORDER_DATE' => $this->input->post('ORDER_DATE', TRUE),
                'STATUS' => $this->input->post('STATUS', TRUE),
                'ALAMAT_PENGIRIMAN' => $this->input->post('ALAMAT_PENGIRIMAN', TRUE),
            );

            $this->Order_menu_model->update($this->input->post('ID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('order_menu'));
        }
    }

    public function delete($id) {
        $row = $this->Order_menu_model->get_by_id($id);

        if ($row) {
            $this->Order_menu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('order_menu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('order_menu'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('ID_RESTO', 'id resto', 'trim|required');
        $this->form_validation->set_rules('ID_MENU', 'id menu', 'trim|required');
        $this->form_validation->set_rules('ID_USERAPP', 'id userapp', 'trim|required');
        $this->form_validation->set_rules('JUMLAH', 'jumlah', 'trim|required');
        $this->form_validation->set_rules('ORDER_DATE', 'order date', 'trim|required');
        $this->form_validation->set_rules('STATUS', 'status', 'trim|required');
        $this->form_validation->set_rules('ALAMAT_PENGIRIMAN', 'alamat pengiriman', 'trim|required');

        $this->form_validation->set_rules('ID', 'ID', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
