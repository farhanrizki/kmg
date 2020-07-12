<?php 
    
class Home extends CI_Controller{

    function __construct(){
    	parent::__construct();
    }

    function index(){
    	$data['page_title'] = 'Home KMG';
        $this->load->view('header', $data); 
        $this->load->view('home');
        $this->load->view('footer'); 
    }

}