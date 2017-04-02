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
		'idx' => $row->idx,
		'Nama' => $row->Nama,
		'Alamat' => $row->Alamat,
		'NoTelpon' => $row->NoTelpon,
		'idtoken' => $row->idtoken,
		'email' => $row->email,
		'tglinsert' => $row->tglinsert,
		'isblokir' => $row->isblokir,
		'idjenismember' => $row->idjenismember,
		'password' => $row->password,
		'photoUrl' => $row->photoUrl,
		'tokenmember' => $row->tokenmember,
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
	    'idx' => set_value('idx'),
	    'Nama' => set_value('Nama'),
	    'Alamat' => set_value('Alamat'),
	    'NoTelpon' => set_value('NoTelpon'),
	    'idtoken' => set_value('idtoken'),
	    'email' => set_value('email'),
	    'tglinsert' => set_value('tglinsert'),
	    'isblokir' => set_value('isblokir'),
	    'idjenismember' => set_value('idjenismember'),
	    'password' => set_value('password'),
	    'photoUrl' => set_value('photoUrl'),
	    'tokenmember' => set_value('tokenmember'),
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
		'Nama' => $this->input->post('Nama',TRUE),
		'Alamat' => $this->input->post('Alamat',TRUE),
		'NoTelpon' => $this->input->post('NoTelpon',TRUE),
		'idtoken' => $this->input->post('idtoken',TRUE),
		'email' => $this->input->post('email',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'isblokir' => $this->input->post('isblokir',TRUE),
		'idjenismember' => $this->input->post('idjenismember',TRUE),
		'password' => $this->input->post('password',TRUE),
		'photoUrl' => $this->input->post('photoUrl',TRUE),
		'tokenmember' => $this->input->post('tokenmember',TRUE),
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
		'idx' => set_value('idx', $row->idx),
		'Nama' => set_value('Nama', $row->Nama),
		'Alamat' => set_value('Alamat', $row->Alamat),
		'NoTelpon' => set_value('NoTelpon', $row->NoTelpon),
		'idtoken' => set_value('idtoken', $row->idtoken),
		'email' => set_value('email', $row->email),
		'tglinsert' => set_value('tglinsert', $row->tglinsert),
		'isblokir' => set_value('isblokir', $row->isblokir),
		'idjenismember' => set_value('idjenismember', $row->idjenismember),
		'password' => set_value('password', $row->password),
		'photoUrl' => set_value('photoUrl', $row->photoUrl),
		'tokenmember' => set_value('tokenmember', $row->tokenmember),
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
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'Nama' => $this->input->post('Nama',TRUE),
		'Alamat' => $this->input->post('Alamat',TRUE),
		'NoTelpon' => $this->input->post('NoTelpon',TRUE),
		'idtoken' => $this->input->post('idtoken',TRUE),
		'email' => $this->input->post('email',TRUE),
		'tglinsert' => $this->input->post('tglinsert',TRUE),
		'isblokir' => $this->input->post('isblokir',TRUE),
		'idjenismember' => $this->input->post('idjenismember',TRUE),
		'password' => $this->input->post('password',TRUE),
		'photoUrl' => $this->input->post('photoUrl',TRUE),
		'tokenmember' => $this->input->post('tokenmember',TRUE),
	    );

            $this->Member_model->update($this->input->post('idx', TRUE), $data);
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
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('Alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('NoTelpon', 'notelpon', 'trim|required');
	$this->form_validation->set_rules('idtoken', 'idtoken', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('tglinsert', 'tglinsert', 'trim|required');
	$this->form_validation->set_rules('isblokir', 'isblokir', 'trim|required');
	$this->form_validation->set_rules('idjenismember', 'idjenismember', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('photoUrl', 'photourl', 'trim|required');
	$this->form_validation->set_rules('tokenmember', 'tokenmember', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-01 17:35:30 */
/* http://harviacode.com */