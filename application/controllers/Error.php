<?php 

class Error extends CI_Controller {

	function __construct(){
    	parent::__construct();
    }
	
	function index(){
		//redirect('auth/login');
	}
	
	//Page not found
	function e404() {
		$this->load->view('errors/404');
	}

	//Access forbidden
	function e403() {
		$this->load->view('errors/403');
	}
	
}