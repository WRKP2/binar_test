<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Data_model');
        $this->load->library('form_validation');
    }

    public function index() {

        $idpegawai = $this->session->userdata('identity');
        if (empty($idpegawai)) {
            redirect(site_url(), '');
        } else {
            $q = urldecode($this->input->get('q', TRUE));
            $start = intval($this->input->get('start'));

            if ($q <> '') {
                $config['base_url'] = base_url() . 'data/index.html?q=' . urlencode($q);
                $config['first_url'] = base_url() . 'data/index.html?q=' . urlencode($q);
            } else {
                $config['base_url'] = base_url() . 'data/index.html';
                $config['first_url'] = base_url() . 'data/index.html';
            }

            $config['per_page'] = 10;
            $config['page_query_string'] = TRUE;
            $config['total_rows'] = $this->Data_model->total_rows($q);
            $data = $this->Data_model->get_limit_data($config['per_page'], $start, $q);

            $this->load->library('pagination');
            $this->pagination->initialize($config);

            $data = array(
                'data_data' => $data,
                'q' => $q,
                'pagination' => $this->pagination->create_links(),
                'total_rows' => $config['total_rows'],
                'start' => $start,
            );
            $this->load->view('data/data_list', $data);

        }
    }

    public function read($id) {
        $row = $this->Data_model->get_by_id($id);
        if ($row) {
            $data = array(
                'no' => $row->no,
                'ID' => $row->ID,
                'nama' => $row->nama,
                'asal' => $row->asal,
                'gabung' => $row->gabung,
            );
            $this->load->view('data/data_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data'));
        }
    }

    //=========Autocomplete========= 
    public function get_data_search() {
        $term = $_POST['term'];
        if (!empty($term)) {
            $query = $this->Data_model->getListdataAuto($term); //query model
            $hasilnya = array();
            foreach ($query->result() as $d) {
                $hasilnya[] = array(
                    'label' => $d->no . '-' . $d->nama, //masukan label autocompliet (harus sama dengan model) , 
                    'value' => $d->nama//masukan value autocompliet (harus sama dengan model)
                );
            }
            echo json_encode($hasilnya);
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('data/create_action'),
            'no' => set_value('no'),
            'ID' => set_value('ID'),
            'nama' => set_value('nama'),
            'asal' => set_value('asal'),
            'gabung' => set_value('gabung'),
        );
        $this->load->view('data/data_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'ID' => $this->input->post('ID', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'asal' => $this->input->post('asal', TRUE),
                'gabung' => $this->input->post('gabung', TRUE),
            );

            $this->Data_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data'));
        }
    }

    public function update($id) {
        $row = $this->Data_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data/update_action'),
                'no' => set_value('no', $row->no),
                'ID' => set_value('ID', $row->ID),
                'nama' => set_value('nama', $row->nama),
                'asal' => set_value('asal', $row->asal),
                'gabung' => set_value('gabung', $row->gabung),
            );
            $this->load->view('data/data_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no', TRUE));
        } else {
            $data = array(
                'ID' => $this->input->post('ID', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'asal' => $this->input->post('asal', TRUE),
                'gabung' => $this->input->post('gabung', TRUE),
            );

            $this->Data_model->update($this->input->post('no', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data'));
        }
    }

    public function delete($id) {
        $row = $this->Data_model->get_by_id($id);

        if ($row) {
            $this->Data_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('ID', 'id', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('asal', 'asal', 'trim|required');
        $this->form_validation->set_rules('gabung', 'gabung', 'trim|required');

        $this->form_validation->set_rules('no', 'no', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "data.xls";
        $judul = "data";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "ID");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama");
        xlsWriteLabel($tablehead, $kolomhead++, "Asal");
        xlsWriteLabel($tablehead, $kolomhead++, "Gabung");

        foreach ($this->Data_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->ID);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->asal);
            xlsWriteLabel($tablebody, $kolombody++, $data->gabung);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word() {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=data.doc");

        $data = array(
            'data_data' => $this->Data_model->get_all(),
            'start' => 0
        );

        $this->load->view('data/data_doc', $data);
    }

}
