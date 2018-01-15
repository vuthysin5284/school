<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterData extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
        $this->load->library('session');
		//$this->load->library('googlemaps');
        $this->load->model("Common_model","com_m");
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
	function master_data(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['common']  = $this->com_m->get_common();
        $page_data['page_width']  = "50";
        $page_data['page_main']  = get_phrase('master_data');
		$page_data['page_name']  = 'menu/master_data';
        $page_data['page_title'] = get_phrase('academic_data');
        $this->load->view('index', $page_data);
	}
	 
} 