<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("Enrolment_model","enrolment_m");
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function parent($param1 = '',$param2 = '',$param3 = ''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $page_data['page_name']  = 'report/parent_report';
        $page_data['page_width']  = "90";
        $page_data['page_main'] = get_phrase('report');
        $page_data['page_title'] = get_phrase('parent_report');
        $this->load->view('index', $page_data);
    }
    //sibling
    function sibling($param1 = '',$param2 = '',$param3 = ''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $page_data['page_name']  = 'report/sibling_report';
        $page_data['page_width']  = "90";
        $page_data['page_main'] = get_phrase('report');
        $page_data['page_title'] = get_phrase('sibling_report');
        $this->load->view('index', $page_data);
    }
    //family
    function family($param1 = '',$param2 = '',$param3 = ''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $page_data['page_name']  = 'report/family_report';
        $page_data['page_width']  = "90";
        $page_data['page_main'] = get_phrase('report');
        $page_data['page_title'] = get_phrase('family_report');
        $this->load->view('index', $page_data);
    }
} 