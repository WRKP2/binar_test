<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Booking_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'booking/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'booking/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'booking/index.html';
            $config['first_url'] = base_url() . 'booking/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Booking_model->total_rows($q);
        $booking = $this->Booking_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'booking_data' => $booking,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('booking/booking_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Booking_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'tglbooking' => $row->tglbooking,
		'idproduk' => $row->idproduk,
		'iddetailproduk' => $row->iddetailproduk,
		'idkategoriproduk' => $row->idkategoriproduk,
		'idmember' => $row->idmember,
		'tglperuntukandari' => $row->tglperuntukandari,
		'tglperuntukansampai' => $row->tglperuntukansampai,
		'jmldewasa' => $row->jmldewasa,
		'jmlanak' => $row->jmlanak,
		'jmlhewan' => $row->jmlhewan,
		'keterangantambahn' => $row->keterangantambahn,
		'jmltransfer' => $row->jmltransfer,
		'idjenispembayaran' => $row->idjenispembayaran,
		'nomorkartu' => $row->nomorkartu,
		'tgltransfer' => $row->tgltransfer,
		'tglinsert' => $row->tglinsert,
		'tglupdate' => $row->tglupdate,
		'status' => $row->status,
		'harga' => $row->harga,
		'hargadiscount' => $row->hargadiscount,
		'jmlhari' => $row->jmlhari,
	    );
            $this->load->view('booking/booking_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('booking'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('booking/create_action'),
	    'idx' => set_value('idx'),
	    'tglbooking' => set_value('tglbooking'),
	    'idproduk' => set_value('idproduk'),
	    'iddetailproduk' => set_value('iddetailproduk'),
	    'idkategoriproduk' => set_value('idkategoriproduk'),
	    'idmember' => set_value('idmember'),
	    'tglperuntukandari' => set_value('tglperuntukandari'),
	    'tglperuntukansampai' => set_value('tglperuntukansampai'),
	    'jmldewasa' => set_value('jmldewasa'),
	    'jmlanak' => set_value('jmlanak'),
	    'jmlhewan' => set_value('jmlhewan'),
	    'keterangantambahn' => set_value('keterangantambahn'),
	    'jmltransfer' => set_value('jmltransfer'),
	    'idjenispembayaran' => set_value('idjenispembayaran'),
	    'nomorkartu' => set_value('nomorkartu'),
	    'tgltransfer' => set_value('tgltransfer'),
	    'tglinsert' => set_value('tglinsert'),
	    'tglupdate' => set_value('tglupdate'),
	    'status' => set_value('status'),
	    'harga' => set_value('harga'),
	    'hargadiscount' => set_value('hargadiscount'),
	    'jmlhari' => set_value('jmlhari'),
	);
        $this->load->view('booking/booking_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tglbooking' => $this->input->post('tglbooking',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'iddetailproduk' => $this->input->post('iddetailproduk',TRUE),
		'idkategoriproduk' => $this->input->post('idkategoriproduk',TRUE),
		'idmember' => $this->input->post('idmember',TRUE),
		'tglperuntukandari' => $this->input->post('tglperuntukandari',TRUE),
		'tglperuntukansampai' => $this->input->post('tglperuntukansampai',TRUE),
		'jmldewasa' => $this->input->post('jmldewasa',TRUE),
		'jmlanak' => $this->input->post('jmlanak',TRUE),
		'jmlhewan' => $this->input->post('jmlhewan',TRUE),
		'keterangantambahn' => $this->input->post('keterangantambahn',TRUE),
		'jmltransfer' => $this->input->post('jmltransfer',TRUE),
		'idjenispembayaran' => $this->input->post('idjenispembayaran',TRUE),
		'nomorkartu' => $this->input->post('nomorkartu',TRUE),
		'tgltransfer' => $this->input->post('tgltransfer',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'status' => $this->input->post('status',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'hargadiscount' => $this->input->post('hargadiscount',TRUE),
		'jmlhari' => $this->input->post('jmlhari',TRUE),
	    );

            $this->Booking_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('booking'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Booking_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('booking/update_action'),
		'idx' => set_value('idx', $row->idx),
		'tglbooking' => set_value('tglbooking', $row->tglbooking),
		'idproduk' => set_value('idproduk', $row->idproduk),
		'iddetailproduk' => set_value('iddetailproduk', $row->iddetailproduk),
		'idkategoriproduk' => set_value('idkategoriproduk', $row->idkategoriproduk),
		'idmember' => set_value('idmember', $row->idmember),
		'tglperuntukandari' => set_value('tglperuntukandari', $row->tglperuntukandari),
		'tglperuntukansampai' => set_value('tglperuntukansampai', $row->tglperuntukansampai),
		'jmldewasa' => set_value('jmldewasa', $row->jmldewasa),
		'jmlanak' => set_value('jmlanak', $row->jmlanak),
		'jmlhewan' => set_value('jmlhewan', $row->jmlhewan),
		'keterangantambahn' => set_value('keterangantambahn', $row->keterangantambahn),
		'jmltransfer' => set_value('jmltransfer', $row->jmltransfer),
		'idjenispembayaran' => set_value('idjenispembayaran', $row->idjenispembayaran),
		'nomorkartu' => set_value('nomorkartu', $row->nomorkartu),
		'tgltransfer' => set_value('tgltransfer', $row->tgltransfer),
		'tglinsert' => set_value('tglinsert', $row->tglinsert),
		'tglupdate' => set_value('tglupdate', $row->tglupdate),
		'status' => set_value('status', $row->status),
		'harga' => set_value('harga', $row->harga),
		'hargadiscount' => set_value('hargadiscount', $row->hargadiscount),
		'jmlhari' => set_value('jmlhari', $row->jmlhari),
	    );
            $this->load->view('booking/booking_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('booking'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'tglbooking' => $this->input->post('tglbooking',TRUE),
		'idproduk' => $this->input->post('idproduk',TRUE),
		'iddetailproduk' => $this->input->post('iddetailproduk',TRUE),
		'idkategoriproduk' => $this->input->post('idkategoriproduk',TRUE),
		'idmember' => $this->input->post('idmember',TRUE),
		'tglperuntukandari' => $this->input->post('tglperuntukandari',TRUE),
		'tglperuntukansampai' => $this->input->post('tglperuntukansampai',TRUE),
		'jmldewasa' => $this->input->post('jmldewasa',TRUE),
		'jmlanak' => $this->input->post('jmlanak',TRUE),
		'jmlhewan' => $this->input->post('jmlhewan',TRUE),
		'keterangantambahn' => $this->input->post('keterangantambahn',TRUE),
		'jmltransfer' => $this->input->post('jmltransfer',TRUE),
		'idjenispembayaran' => $this->input->post('idjenispembayaran',TRUE),
		'nomorkartu' => $this->input->post('nomorkartu',TRUE),
		'tgltransfer' => $this->input->post('tgltransfer',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'tglupdate' => $this->input->post('tglupdate',TRUE),
		'status' => $this->input->post('status',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'hargadiscount' => $this->input->post('hargadiscount',TRUE),
		'jmlhari' => $this->input->post('jmlhari',TRUE),
	    );

            $this->Booking_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('booking'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Booking_model->get_by_id($id);

        if ($row) {
            $this->Booking_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('booking'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('booking'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tglbooking', 'tglbooking', 'trim|required');
	$this->form_validation->set_rules('idproduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('iddetailproduk', 'iddetailproduk', 'trim|required');
	$this->form_validation->set_rules('idkategoriproduk', 'idkategoriproduk', 'trim|required');
	$this->form_validation->set_rules('idmember', 'idmember', 'trim|required');
	$this->form_validation->set_rules('tglperuntukandari', 'tglperuntukandari', 'trim|required');
	$this->form_validation->set_rules('tglperuntukansampai', 'tglperuntukansampai', 'trim|required');
	$this->form_validation->set_rules('jmldewasa', 'jmldewasa', 'trim|required');
	$this->form_validation->set_rules('jmlanak', 'jmlanak', 'trim|required');
	$this->form_validation->set_rules('jmlhewan', 'jmlhewan', 'trim|required');
	$this->form_validation->set_rules('keterangantambahn', 'keterangantambahn', 'trim|required');
	$this->form_validation->set_rules('jmltransfer', 'jmltransfer', 'trim|required');
	$this->form_validation->set_rules('idjenispembayaran', 'idjenispembayaran', 'trim|required');
	$this->form_validation->set_rules('nomorkartu', 'nomorkartu', 'trim|required');
	$this->form_validation->set_rules('tgltransfer', 'tgltransfer', 'trim|required');
	$this->form_validation->set_rules('tglinsert', 'tglinsert', 'trim|required');
	$this->form_validation->set_rules('tglupdate', 'tglupdate', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('hargadiscount', 'hargadiscount', 'trim|required');
	$this->form_validation->set_rules('jmlhari', 'jmlhari', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Booking.php */
/* Location: ./application/controllers/Booking.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-01 17:35:23 */
/* http://harviacode.com */