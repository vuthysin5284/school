<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->database('default', TRUE); 
        $this->load->library('session');
		//$this->load->library('googlemaps');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }

    function index(){
        $page_data['page_name']  = 'student/index';
        $page_data['page_title'] = get_phrase('student');
        $this->load->view('index', $page_data);

    }


	function profile(){
		
		$page_data['page_name']  = 'student/profile/profile';
        $page_data['page_title'] = get_phrase('profile');
        $this->load->view('index', $page_data);
	} 
	 
} 