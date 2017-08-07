<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tabel_menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tabel_menu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tabel_menu/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tabel_menu/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tabel_menu/index.html';
            $config['first_url'] = base_url() . 'tabel_menu/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tabel_menu_model->total_rows($q);
        $tabel_menu = $this->Tabel_menu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tabel_menu_data' => $tabel_menu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('tabel_menu/tabel_menu_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tabel_menu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'judul_menu' => $row->judul_menu,
		'link' => $row->link,
		'icon' => $row->icon,
		'is_main_menu' => $row->is_main_menu,
	    );
            $this->load->view('tabel_menu/tabel_menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tabel_menu'));
        }
    }


 //=========Autocomplete========= 
        public function get_tabel_menu_search() {
        $q = $this->input->post('q',TRUE); 
        $term = $_POST['term'];
        if(!empty($term)){
        $query = $this->Tabel_menu_model->getListtabel_menuAuto($term); //query model
        $hasilnya       =  array();
        foreach ($query->result() as $d) {
            $hasilnya[]     = array(
                'label' => $d->id.'-'.$d->judul_menu,//masukan label autocompliet (harus sama dengan model) , 
                'value' => $d->judul_menu//masukan value autocompliet (harus sama dengan model)
            );
        }
        echo json_encode($hasilnya);  
        }
    }

public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tabel_menu/create_action'),
	    'id' => set_value('id'),
	    'judul_menu' => set_value('judul_menu'),
	    'link' => set_value('link'),
	    'icon' => set_value('icon'),
	    'is_main_menu' => set_value('is_main_menu'),
	);
        $this->load->view('tabel_menu/tabel_menu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'judul_menu' => $this->input->post('judul_menu',TRUE),
		'link' => $this->input->post('link',TRUE),
		'icon' => $this->input->post('icon',TRUE),
		'is_main_menu' => $this->input->post('is_main_menu',TRUE),
	    );

            $this->Tabel_menu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tabel_menu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tabel_menu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tabel_menu/update_action'),
		'id' => set_value('id', $row->id),
		'judul_menu' => set_value('judul_menu', $row->judul_menu),
		'link' => set_value('link', $row->link),
		'icon' => set_value('icon', $row->icon),
		'is_main_menu' => set_value('is_main_menu', $row->is_main_menu),
	    );
            $this->load->view('tabel_menu/tabel_menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tabel_menu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'judul_menu' => $this->input->post('judul_menu',TRUE),
		'link' => $this->input->post('link',TRUE),
		'icon' => $this->input->post('icon',TRUE),
		'is_main_menu' => $this->input->post('is_main_menu',TRUE),
	    );

            $this->Tabel_menu_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tabel_menu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tabel_menu_model->get_by_id($id);

        if ($row) {
            $this->Tabel_menu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tabel_menu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tabel_menu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul_menu', 'judul menu', 'trim|required');
	$this->form_validation->set_rules('link', 'link', 'trim|required');
	$this->form_validation->set_rules('icon', 'icon', 'trim|required');
	$this->form_validation->set_rules('is_main_menu', 'is main menu', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tabel_menu.xls";
        $judul = "tabel_menu";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Judul Menu");
	xlsWriteLabel($tablehead, $kolomhead++, "Link");
	xlsWriteLabel($tablehead, $kolomhead++, "Icon");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Main Menu");

	foreach ($this->Tabel_menu_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul_menu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->link);
	    xlsWriteLabel($tablebody, $kolombody++, $data->icon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->is_main_menu);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tabel_menu.doc");

        $data = array(
            'tabel_menu_data' => $this->Tabel_menu_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tabel_menu/tabel_menu_doc',$data);
    }
    
//    public function menu_sidebar(){
//        $row = $this->Tabel_menu_model->get_all();
//        
//        if($row){
//            
//        }
//        
//    }

}

