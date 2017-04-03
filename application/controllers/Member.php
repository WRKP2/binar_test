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
		'nama_member' => $row->nama_member,
		'alamat_member' => $row->alamat_member,
		'kota' => $row->kota,
		'tglLahir_member' => $row->tglLahir_member,
		'email_member' => $row->email_member,
		'noTelp_member' => $row->noTelp_member,
		'id_member' => $row->id_member,
	    );
            $this->load->view('member/member_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('member'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('member/create_action'),
	    'nama_member' => set_value('nama_member'),
	    'alamat_member' => set_value('alamat_member'),
	    'kota' => set_value('kota'),
	    'tglLahir_member' => set_value('tglLahir_member'),
	    'email_member' => set_value('email_member'),
	    'noTelp_member' => set_value('noTelp_member'),
	    'id_member' => set_value('id_member'),
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
		'nama_member' => $this->input->post('nama_member',TRUE),
		'alamat_member' => $this->input->post('alamat_member',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'tglLahir_member' => $this->input->post('tglLahir_member',TRUE),
		'email_member' => $this->input->post('email_member',TRUE),
		'noTelp_member' => $this->input->post('noTelp_member',TRUE),
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
		'nama_member' => set_value('nama_member', $row->nama_member),
		'alamat_member' => set_value('alamat_member', $row->alamat_member),
		'kota' => set_value('kota', $row->kota),
		'tglLahir_member' => set_value('tglLahir_member', $row->tglLahir_member),
		'email_member' => set_value('email_member', $row->email_member),
		'noTelp_member' => set_value('noTelp_member', $row->noTelp_member),
		'id_member' => set_value('id_member', $row->id_member),
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
            $this->update($this->input->post('id_member', TRUE));
        } else {
            $data = array(
		'nama_member' => $this->input->post('nama_member',TRUE),
		'alamat_member' => $this->input->post('alamat_member',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'tglLahir_member' => $this->input->post('tglLahir_member',TRUE),
		'email_member' => $this->input->post('email_member',TRUE),
		'noTelp_member' => $this->input->post('noTelp_member',TRUE),
	    );

            $this->Member_model->update($this->input->post('id_member', TRUE), $data);
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
	$this->form_validation->set_rules('nama_member', 'nama member', 'trim|required');
	$this->form_validation->set_rules('alamat_member', 'alamat member', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('tglLahir_member', 'tgllahir member', 'trim|required');
	$this->form_validation->set_rules('email_member', 'email member', 'trim|required');
	$this->form_validation->set_rules('noTelp_member', 'notelp member', 'trim|required');

	$this->form_validation->set_rules('id_member', 'id_member', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-03 09:17:32 */
/* http://harviacode.com */