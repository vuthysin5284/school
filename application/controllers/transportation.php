<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transportation extends CI_Controller {
 
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
	function transportation(){

		$page_data['page_name']  = 'transportation/transportation';
        $page_data['page_title'] = get_phrase('transportation');
        $this->load->view('index', $page_data);
	}
    /*** transportation ***/
    function transportation_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('transportation');
        $this->load->view('transportation/transportation_list',$page_data);
    }
	 
} 