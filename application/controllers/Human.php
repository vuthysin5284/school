<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Human extends CI_Controller {
 
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
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_name']  = 'finance/index';
        $page_data['page_title'] = get_phrase('finance');
        $this->load->view('index', $page_data);
    }

    //
    /*** payroll ***/
    function payroll($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $page_data['page_main']  = get_phrase('human_resource');
        $page_data['page_width']  = "50";
        $page_data['page_name']  = 'payroll/payroll';
        $page_data['page_title'] = get_phrase('payrolls_management');
        $this->load->view('index', $page_data);
    }

} 