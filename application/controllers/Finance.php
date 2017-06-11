<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("transportation_model","transportation_m");
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }

    //
    function index(){
        $page_data['page_name']  = 'finance/index';
        $page_data['page_title'] = get_phrase('finance');
        $this->load->view('index', $page_data);
    }

    //
    /*** voucher entry ***/
    function voucher_entry($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('voucher_entry');
        $this->load->view('finance/voucher_entry',$page_data);
    }

} 