<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Infowisata extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Infowisata_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'infowisata/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'infowisata/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'infowisata/index.html';
            $config['first_url'] = base_url() . 'infowisata/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Infowisata_model->total_rows($q);
        $infowisata = $this->Infowisata_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'infowisata_data' => $infowisata,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('infowisata/infowisata_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Infowisata_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'judulinfo' => $row->judulinfo,
		'deskripsihtml' => $row->deskripsihtml,
		'imgutama' => $row->imgutama,
		'mapadress' => $row->mapadress,
		'tglinsert' => $row->tglinsert,
		'tglupdate' => $row->tglupdate,
		'idpegawai' => $row->idpegawai,
	    );
            $this->load->view('infowisata/infowisata_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('infowisata'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('infowisata/create_action'),
	    'idx' => set_value('idx'),
	    'judulinfo' => set_value('judulinfo'),
	    'deskripsihtml' => set_value('deskripsihtml'),
	    'imgutama' => set_value('imgutama'),
	    'mapadress' => set_value('mapadress'),
	    'tglinsert' => set_value('tglinsert'),
	    'tglupdate' => set_value('tglupdate'),
	    'idpegawai' => set_value('idpegawai'),
	);
        $this->load->view('infowisata/infowisata_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'judulinfo' => $this->input->post('judulinfo',TRUE),
		'deskripsihtml' => $this->input->post('deskripsihtml',TRUE),
		'imgutama' => $this->input->post('imgutama',TRUE),
		'mapadress' => $this->input->post('mapadress',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
	    );

            $this->Infowisata_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('infowisata'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Infowisata_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('infowisata/update_action'),
		'idx' => set_value('idx', $row->idx),
		'judulinfo' => set_value('judulinfo', $row->judulinfo),
		'deskripsihtml' => set_value('deskripsihtml', $row->deskripsihtml),
		'imgutama' => set_value('imgutama', $row->imgutama),
		'mapadress' => set_value('mapadress', $row->mapadress),
		'tglinsert' => set_value('tglinsert', $row->tglinsert),
		'tglupdate' => set_value('tglupdate', $row->tglupdate),
		'idpegawai' => set_value('idpegawai', $row->idpegawai),
	    );
            $this->load->view('infowisata/infowisata_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('infowisata'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'judulinfo' => $this->input->post('judulinfo',TRUE),
		'deskripsihtml' => $this->input->post('deskripsihtml',TRUE),
		'imgutama' => $this->input->post('imgutama',TRUE),
		'mapadress' => $this->input->post('mapadress',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'idpegawai' => $this->input->post('idpegawai',TRUE),
	    );

            $this->Infowisata_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('infowisata'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Infowisata_model->get_by_id($id);

        if ($row) {
            $this->Infowisata_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('infowisata'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('infowisata'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judulinfo', 'judulinfo', 'trim|required');
	$this->form_validation->set_rules('deskripsihtml', 'deskripsihtml', 'trim|required');
	$this->form_validation->set_rules('imgutama', 'imgutama', 'trim|required');
	$this->form_validation->set_rules('mapadress', 'mapadress', 'trim|required');
	$this->form_validation->set_rules('tglinsert', 'tglinsert', 'trim|required');
	$this->form_validation->set_rules('tglupdate', 'tglupdate', 'trim|required');
	$this->form_validation->set_rules('idpegawai', 'idpegawai', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Infowisata.php */
/* Location: ./application/controllers/Infowisata.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-01 17:35:28 */
/* http://harviacode.com */