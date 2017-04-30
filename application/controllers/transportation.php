<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transportation extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
		//$this->load->library('googlemaps');

        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_transportation($param1 = '',$param2 = '',$param3 = '')
    {
        $page_data['page_name']  = 'test';
        $this->load->view('transportation/modal_new_transportation' ,$page_data);
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