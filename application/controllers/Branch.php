<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {
 
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
	function branch(){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

		$page_data['page_name']  = 'masterdata/branch/branch';
        $page_data['page_title'] = get_phrase('branch');
        $this->load->view('index', $page_data);
	}


    /*
    *	$page_name		=	The name of page
    */
    function new_branch($param1 = '',$param2 = '',$param3 = '')
    {
        $page_data['page_name']  = 'test';
        $this->load->view('masterdata/branch/modal_new_branch' ,$page_data);
    }

    /*** branch ***/
    function branch_list($param1='',$param2='',$param3=''){

        $page_data['page_title'] = get_phrase('branch');
        $this->load->view('masterdata/branch/branch_list',$page_data);
    }
	 
} 