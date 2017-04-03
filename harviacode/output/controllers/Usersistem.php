<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usersistem extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usersistem_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'usersistem/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'usersistem/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'usersistem/index.html';
            $config['first_url'] = base_url() . 'usersistem/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Usersistem_model->total_rows($q);
        $usersistem = $this->Usersistem_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'usersistem_data' => $usersistem,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('usersistem/usersistem_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Usersistem_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idx' => $row->idx,
		'npp' => $row->npp,
		'Nama' => $row->Nama,
		'alamat' => $row->alamat,
		'NoTelpon' => $row->NoTelpon,
		'user' => $row->user,
		'password' => $row->password,
		'statuspeg' => $row->statuspeg,
		'photo' => $row->photo,
		'email' => $row->email,
		'ym' => $row->ym,
		'isaktif' => $row->isaktif,
		'idusergroup' => $row->idusergroup,
		'idkabupaten' => $row->idkabupaten,
		'idpropinsi' => $row->idpropinsi,
		'imehp' => $row->imehp,
	    );
            $this->load->view('usersistem/usersistem_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usersistem'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('usersistem/create_action'),
	    'idx' => set_value('idx'),
	    'npp' => set_value('npp'),
	    'Nama' => set_value('Nama'),
	    'alamat' => set_value('alamat'),
	    'NoTelpon' => set_value('NoTelpon'),
	    'user' => set_value('user'),
	    'password' => set_value('password'),
	    'statuspeg' => set_value('statuspeg'),
	    'photo' => set_value('photo'),
	    'email' => set_value('email'),
	    'ym' => set_value('ym'),
	    'isaktif' => set_value('isaktif'),
	    'idusergroup' => set_value('idusergroup'),
	    'idkabupaten' => set_value('idkabupaten'),
	    'idpropinsi' => set_value('idpropinsi'),
	    'imehp' => set_value('imehp'),
	);
        $this->load->view('usersistem/usersistem_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'npp' => $this->input->post('npp',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'NoTelpon' => $this->input->post('NoTelpon',TRUE),
		'user' => $this->input->post('user',TRUE),
		'password' => $this->input->post('password',TRUE),
		'statuspeg' => $this->input->post('statuspeg',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'email' => $this->input->post('email',TRUE),
		'ym' => $this->input->post('ym',TRUE),
		'isaktif' => $this->input->post('isaktif',TRUE),
		'idusergroup' => $this->input->post('idusergroup',TRUE),
		'idkabupaten' => $this->input->post('idkabupaten',TRUE),
		'idpropinsi' => $this->input->post('idpropinsi',TRUE),
		'imehp' => $this->input->post('imehp',TRUE),
	    );

            $this->Usersistem_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('usersistem'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Usersistem_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('usersistem/update_action'),
		'idx' => set_value('idx', $row->idx),
		'npp' => set_value('npp', $row->npp),
		'Nama' => set_value('Nama', $row->Nama),
		'alamat' => set_value('alamat', $row->alamat),
		'NoTelpon' => set_value('NoTelpon', $row->NoTelpon),
		'user' => set_value('user', $row->user),
		'password' => set_value('password', $row->password),
		'statuspeg' => set_value('statuspeg', $row->statuspeg),
		'photo' => set_value('photo', $row->photo),
		'email' => set_value('email', $row->email),
		'ym' => set_value('ym', $row->ym),
		'isaktif' => set_value('isaktif', $row->isaktif),
		'idusergroup' => set_value('idusergroup', $row->idusergroup),
		'idkabupaten' => set_value('idkabupaten', $row->idkabupaten),
		'idpropinsi' => set_value('idpropinsi', $row->idpropinsi),
		'imehp' => set_value('imehp', $row->imehp),
	    );
            $this->load->view('usersistem/usersistem_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usersistem'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idx', TRUE));
        } else {
            $data = array(
		'npp' => $this->input->post('npp',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'NoTelpon' => $this->input->post('NoTelpon',TRUE),
		'user' => $this->input->post('user',TRUE),
		'password' => $this->input->post('password',TRUE),
		'statuspeg' => $this->input->post('statuspeg',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'email' => $this->input->post('email',TRUE),
		'ym' => $this->input->post('ym',TRUE),
		'isaktif' => $this->input->post('isaktif',TRUE),
		'idusergroup' => $this->input->post('idusergroup',TRUE),
		'idkabupaten' => $this->input->post('idkabupaten',TRUE),
		'idpropinsi' => $this->input->post('idpropinsi',TRUE),
		'imehp' => $this->input->post('imehp',TRUE),
	    );

            $this->Usersistem_model->update($this->input->post('idx', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('usersistem'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Usersistem_model->get_by_id($id);

        if ($row) {
            $this->Usersistem_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('usersistem'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('usersistem'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('npp', 'npp', 'trim|required');
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('NoTelpon', 'notelpon', 'trim|required');
	$this->form_validation->set_rules('user', 'user', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('statuspeg', 'statuspeg', 'trim|required');
	$this->form_validation->set_rules('photo', 'photo', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('ym', 'ym', 'trim|required');
	$this->form_validation->set_rules('isaktif', 'isaktif', 'trim|required');
	$this->form_validation->set_rules('idusergroup', 'idusergroup', 'trim|required');
	$this->form_validation->set_rules('idkabupaten', 'idkabupaten', 'trim|required');
	$this->form_validation->set_rules('idpropinsi', 'idpropinsi', 'trim|required');
	$this->form_validation->set_rules('imehp', 'imehp', 'trim|required');

	$this->form_validation->set_rules('idx', 'idx', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Usersistem.php */
/* Location: ./application/controllers/Usersistem.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-01 17:35:33 */
/* http://harviacode.com */