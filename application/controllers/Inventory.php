<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->database('default', TRUE);
		//$this->erp=$this->load->database('erp', true); 
        $this->load->library('session');
		//$this->load->library('googlemaps');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    
     
	public function index()
	{ 
		//if ($this->session->userdata('is_login') != 1)
        //    redirect(base_url() . 'login', 'refresh');
        //if ($this->session->userdata('is_login') == 1)
            //redirect(base_url() . 'dashboard', 'refresh');
		
		$page_data['page_name']  = 'main/contacts';
        $page_data['page_title'] = get_phrase('contacts');
        $this->load->view('index', $page_data);
	} 
	
	function item_master_data(){
		
		$page_data['page_name']  = 'inventory/item_master_data';
        $page_data['page_title'] = get_phrase('item_master_data');
        $this->load->view('index', $page_data);
	} 
	function bar_code(){
		
		$page_data['page_name']  = 'inventory/bar_code';
        $page_data['page_title'] = get_phrase('bar_code');
        $this->load->view('index', $page_data);
	} 
}
