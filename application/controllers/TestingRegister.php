<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestingRegister extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->database('default', TRUE); 
        $this->load->library('session');
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }

    function index(){
        $page_data['page_name']  = 'testing_register/index';
        $page_data['page_width']  = "90";
        $page_data['page_title'] = get_phrase('testing_register');
        $this->load->view('index', $page_data);

    }
	
   	/*
	*	$page_name		=	The name of page
	*/


} 