<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
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
        );
        $this->load->view('menu/menu_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Menu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idmenu' => $row->idmenu,
		'nmmenu' => $row->nmmenu,
		'tipemenu' => $row->tipemenu,
		'idkomponen' => $row->idkomponen,
		'iduser' => $row->iduser,
		'parentmenu' => $row->parentmenu,
		'urlci' => $row->urlci,
		'urut' => $row->urut,
		'jmlgambar' => $row->jmlgambar,
		'settingform' => $row->settingform,
		'idaplikasi' => $row->idaplikasi,
		'isumum' => $row->isumum,
	    );
            $this->load->view('menu/menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('menu/create_action'),
	    'idmenu' => set_value('idmenu'),
	    'nmmenu' => set_value('nmmenu'),
	    'tipemenu' => set_value('tipemenu'),
	    'idkomponen' => set_value('idkomponen'),
	    'iduser' => set_value('iduser'),
	    'parentmenu' => set_value('parentmenu'),
	    'urlci' => set_value('urlci'),
	    'urut' => set_value('urut'),
	    'jmlgambar' => set_value('jmlgambar'),
	    'settingform' => set_value('settingform'),
	    'idaplikasi' => set_value('idaplikasi'),
	    'isumum' => set_value('isumum'),
	);
        $this->load->view('menu/menu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nmmenu' => $this->input->post('nmmenu',TRUE),
		'tipemenu' => $this->input->post('tipemenu',TRUE),
		'idkomponen' => $this->input->post('idkomponen',TRUE),
		'iduser' => $this->input->post('iduser',TRUE),
		'parentmenu' => $this->input->post('parentmenu',TRUE),
		'urlci' => $this->input->post('urlci',TRUE),
		'urut' => $this->input->post('urut',TRUE),
		'jmlgambar' => $this->input->post('jmlgambar',TRUE),
		'settingform' => $this->input->post('settingform',TRUE),
		'idaplikasi' => $this->input->post('idaplikasi',TRUE),
		'isumum' => $this->input->post('isumum',TRUE),
	    );

            $this->Menu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('menu/update_action'),
		'idmenu' => set_value('idmenu', $row->idmenu),
		'nmmenu' => set_value('nmmenu', $row->nmmenu),
		'tipemenu' => set_value('tipemenu', $row->tipemenu),
		'idkomponen' => set_value('idkomponen', $row->idkomponen),
		'iduser' => set_value('iduser', $row->iduser),
		'parentmenu' => set_value('parentmenu', $row->parentmenu),
		'urlci' => set_value('urlci', $row->urlci),
		'urut' => set_value('urut', $row->urut),
		'jmlgambar' => set_value('jmlgambar', $row->jmlgambar),
		'settingform' => set_value('settingform', $row->settingform),
		'idaplikasi' => set_value('idaplikasi', $row->idaplikasi),
		'isumum' => set_value('isumum', $row->isumum),
	    );
            $this->load->view('menu/menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idmenu', TRUE));
        } else {
            $data = array(
		'nmmenu' => $this->input->post('nmmenu',TRUE),
		'tipemenu' => $this->input->post('tipemenu',TRUE),
		'idkomponen' => $this->input->post('idkomponen',TRUE),
		'iduser' => $this->input->post('iduser',TRUE),
		'parentmenu' => $this->input->post('parentmenu',TRUE),
		'urlci' => $this->input->post('urlci',TRUE),
		'urut' => $this->input->post('urut',TRUE),
		'jmlgambar' => $this->input->post('jmlgambar',TRUE),
		'settingform' => $this->input->post('settingform',TRUE),
		'idaplikasi' => $this->input->post('idaplikasi',TRUE),
		'isumum' => $this->input->post('isumum',TRUE),
	    );

            $this->Menu_model->update($this->input->post('idmenu', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function delete($id) 
    {
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

    public function _rules() 
    {
	$this->form_validation->set_rules('nmmenu', 'nmmenu', 'trim|required');
	$this->form_validation->set_rules('tipemenu', 'tipemenu', 'trim|required');
	$this->form_validation->set_rules('idkomponen', 'idkomponen', 'trim|required');
	$this->form_validation->set_rules('iduser', 'iduser', 'trim|required');
	$this->form_validation->set_rules('parentmenu', 'parentmenu', 'trim|required');
	$this->form_validation->set_rules('urlci', 'urlci', 'trim|required');
	$this->form_validation->set_rules('urut', 'urut', 'trim|required');
	$this->form_validation->set_rules('jmlgambar', 'jmlgambar', 'trim|required');
	$this->form_validation->set_rules('settingform', 'settingform', 'trim|required');
	$this->form_validation->set_rules('idaplikasi', 'idaplikasi', 'trim|required');
	$this->form_validation->set_rules('isumum', 'isumum', 'trim|required');

	$this->form_validation->set_rules('idmenu', 'idmenu', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-02 15:37:15 */
/* http://harviacode.com */