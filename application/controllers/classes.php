<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {
 
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
	function classes(){

		$page_data['page_name']  = 'class/classes';
        $page_data['page_title'] = get_phrase('classes');
        $this->load->view('index', $page_data);
	}
    /*** classes ***/
    function classes_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('classes');
        $this->load->view('class/class_list',$page_data);
    }
	 
} 