<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 function render_page($view) {
        //do this to don't repeat in all controllers...
//        $this->load->view('templates/header', $this->data);
        //menu_data must contain the structure of the menu...
        //you can populate it from database or helper
        $this->load->model('Tabel_menu_model');
        $row = $this->Tabel_menu_model->sub_menu('0');
        foreach ($row as $search) {
            $sub_menu = $this->Tabel_menu_model->sub_menu($search->id);
        }
        $menu_data = array(
            'main_menu' => $row,
            'sub_menu' => $sub_menu
//		'link' => $row->link,
//		'icon' => $row->icon,
//		'is_main_menu' => $row->is_main_menu,
        );
        $this->load->view('template/sidebar', $menu_data);
        $this->load->view($view, $this->data);
//        $this->load->view('templates/footer', $this->data);
    }
