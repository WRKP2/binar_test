<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Resto extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Resto_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'resto/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'resto/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'resto/index.html';
            $config['first_url'] = base_url() . 'resto/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Resto_model->total_rows($q);
        $resto = $this->Resto_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'resto_data' => $resto,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'title' => 'Resto',
            'js' => 'resto_ajax',
            'css_file' => 'resto_css',
        );
        $this->render('resto/resto_list', $data);
    }

    public function read($id) {
        $row = $this->Resto_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'Nama_Resto' => $row->Nama_Resto,
                'Alamat' => $row->Alamat,
                'no_tlp' => $row->no_tlp,
            );
            $this->render('resto/resto_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('resto'));
        }
    }

    //=========Autocomplete========= 
    public function get_resto_search() {
        $q = $this->input->post('q', TRUE);
        $term = $_POST['term'];
        if (!empty($term)) {
            $query = $this->Resto_model->getListrestoAuto($term); //query model
            $hasilnya = array();
            foreach ($query->result() as $d) {
                $hasilnya[] = array(
                    'label' => $d->id . '-' . $d->Nama_Resto,
                    'value' => $d->Nama_Resto
                );
            }
            echo json_encode($hasilnya);
        }
    }

//=========READ=========
    public function readrestoAndroid() {
        $this->load->helper('json');

        $xSearch = $_POST['search'];

        $this->json_data['id'] = "";
        $this->json_data['Nama_Resto'] = "";
        $this->json_data['Alamat'] = "";
        $this->json_data['no_tlp'] = "";

        $this->load->model('Resto_model');

        $response = array();

        $xQuery = $this->Resto_model->getListresto();


        foreach ($xQuery->result() as $row) {
            $this->json_data['id'] = $row->id;
            $this->json_data['Nama_Resto'] = $row->Nama_Resto;
            $this->json_data['Alamat'] = $row->Alamat;
            $this->json_data['no_tlp'] = $row->no_tlp;
            array_push($response, $this->json_data);
        }


        if (empty($response)) {

            array_push($response, $this->json_data);
        }


        echo json_encode($response);
    }

//=========READ=========
//=========INSERT AND UPDATE=========


    public function simpanupdaterestoAndroid() {
        $this->load->helper('json');

        if (!empty($_POST['edid'])) {

            $xid = $_POST['edid'];
        } else {

            $xid = '0';
        }
        $xNama_Resto = $_POST['edNama_Resto'];
        $xAlamat = $_POST['edAlamat'];
        $xno_tlp = $_POST['edno_tlp'];

        $this->load->model('Resto_model');
        $response = array();

        if ($xid != '0') {
            //===UPDATE===

            $xStr = $this->Resto_model->Updateresto($xid, $xNama_Resto, $xAlamat, $xno_tlp);
        } else {
            //===INSERT===

            $xStr = $this->Resto_model->Insertresto($xid, $xNama_Resto, $xAlamat, $xno_tlp);
        }


        $row = $this->Resto_model->getLastIndexresto();
        $this->json_data['id'] = $row->id;
        $this->json_data['Nama_Resto'] = $row->Nama_Resto;
        $this->json_data['Alamat'] = $row->Alamat;
        $this->json_data['no_tlp'] = $row->no_tlp;
        array_push($response, $this->json_data);


        echo json_encode($response);
    }

//=========INSERT AND UPDATE=========
//=========DELET=========


    public function deletrestoAndroid() {

        $xid = $_POST['edid'];
        $this->load->model('Resto_model');
        $this->Resto_model->Deletresto($xid);
        $this->load->helper('json');
        echo json_encode(null);
    }

//=========DELET=========
//=========GET DETAIL=========


    public function getDetailrestoAndroid() {

        $xid = $_POST['edid'];
        $this->load->model('Resto_model');
        $this->Resto_model->getDetailresto($xid);
        $this->load->helper('json');
        $this->json_data['id'] = $row->id;
        $this->json_data['Nama_Resto'] = $row->Nama_Resto;
        $this->json_data['Alamat'] = $row->Alamat;
        $this->json_data['no_tlp'] = $row->no_tlp;
        echo json_encode($this->json_data);
    }

//=========GET DETAIL=========

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('resto/create_action'),
            'id' => set_value('id'),
            'Nama_Resto' => set_value('Nama_Resto'),
            'Alamat' => set_value('Alamat'),
            'no_tlp' => set_value('no_tlp'),
        );
        $this->render('resto/resto_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'Nama_Resto' => $this->input->post('Nama_Resto', TRUE),
                'Alamat' => $this->input->post('Alamat', TRUE),
                'no_tlp' => $this->input->post('no_tlp', TRUE),
            );

            $this->Resto_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('resto'));
        }
    }

    public function update($id) {
        $row = $this->Resto_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('resto/update_action'),
                'id' => set_value('id', $row->id),
                'Nama_Resto' => set_value('Nama_Resto', $row->Nama_Resto),
                'Alamat' => set_value('Alamat', $row->Alamat),
                'no_tlp' => set_value('no_tlp', $row->no_tlp),
            );
            $this->render('resto/resto_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('resto'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'Nama_Resto' => $this->input->post('Nama_Resto', TRUE),
                'Alamat' => $this->input->post('Alamat', TRUE),
                'no_tlp' => $this->input->post('no_tlp', TRUE),
            );

            $this->Resto_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('resto'));
        }
    }

    public function delete($id) {
        $row = $this->Resto_model->get_by_id($id);

        if ($row) {
            $this->Resto_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('resto'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('resto'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('Nama_Resto', 'nama resto', 'trim|required');
        $this->form_validation->set_rules('Alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('no_tlp', 'no tlp', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
