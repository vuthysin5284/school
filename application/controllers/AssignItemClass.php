<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AssignItemClass extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->sys = $this->load->database('sys', TRUE);
		//$this->erp=$this->load->database('erp', true); 
        $this->load->library('session');
		//$this->load->library('googlemaps');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
     * sin vuthy
     * 2018-01-08
     */
	
	//assign item to class
	function assign_item_class($param1='',$param2=''){
		if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
		}
		//add 
		if($param1=="assign_item_class"){
			$data["class_id"] = $this->input->post("class_id");
			$data["item_id"] = $this->input->post("item_id");
			$this->sys->insert('item_class',$data);
			return; 
		}
		// remove
		if($param1=="remove_item_class"){
            $data["class_id"] = $this->input->post("class_id");
            $data["item_id"] = $this->input->post("item_id");
            $this->sys->delete('item_class');
			
		}
		// filter assign item to class
		if($param1=="filter"){
			$page_data['class_id'] = $this->input->post("class_id");
		}
		// class
		$sql_pm = "select * from classes where status = 1 ";
        $page_data['class_list'] = $this->sys->query($sql_pm)->result_array();

        // item list
        $sql_item = "  select 
                        aif.*,
                        ic.item_id,
                        ic.class_id 
                      from item_master  aif
                      left join item_class ic on ic.item_id = aif.id and ic.class_id =?
                      where aif.status = 1
                      and aif.is_delete=0
                   ";
        $page_data['item_list'] = $this->sys->query($sql_item,array($this->input->post("class_id")))->result_array();
		 
		$page_data['page_width']  = "40";
		$page_data['page_name']  = 'masterdata/item/assign_item_class';
        $page_data['page_main'] = get_phrase('master_data');
        $page_data['page_main_title'] = get_phrase('assign_item_class');
        $page_data['page_title'] = get_phrase('assign_item_class');
        $this->load->view('index', $page_data);
	} 
} 