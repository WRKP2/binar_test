<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('dashboard1');
	}
        
	public function login()
	{
                redirect('dashboard1');
	}
        
        public function logout()
	{
                redirect('auth');
	}
}
