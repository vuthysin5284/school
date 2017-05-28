<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
		//$this->erp=$this->load->database('erp', true); 
        $this->load->library('session');
		//$this->load->library('googlemaps');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
     
	
	// user_management
	function user_management($param1='',$param2='',$param3=''){
		if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'index.php?login', 'refresh');
		}
		
		//
		$data["name"] = $this->input->post("full_name");
		$data["sap_id"] = $this->input->post("sap_id");
		$data["username"] = $this->input->post("username");
		$data["role_id"] =  $this->input->post("role_id");
		$data["email"] = $this->input->post("email");
		$data["phone"] = $this->input->post("phone");
		
		$data["is_admin"] = empty($this->input->post("is_admin"))?0:1;
		$data["status"] = empty($this->input->post("status"))?0:1; 
		
		if($param1=="create"){  
			$data["password"] =  sha1(md5(sha1(md5($this->input->post("password")))));
			$data["chat_status"] = 'offline';
			$data["is_login"] = 'offline';
			
			$this->db->insert('user',$data);
			
			redirect(base_url() . 'user/user_management/', 'refresh');
		}
		if($param1=="update"){   
			if($this->input->post("password")!=''){
				$data["password"] =  sha1(md5(sha1(md5($this->input->post("password"))))); 
			} 
			
			$data["name"] = $this->input->post("full_name");
			$data["sap_id"] = $this->input->post("sap_id");
			$data["username"] = $this->input->post("username");
			$data["role_id"] =  $this->input->post("role_id");
			$data["email"] = $this->input->post("email");
			$data["phone"] = $this->input->post("phone");
			
			$data["is_admin"] = empty($this->input->post("is_admin"))?0:1;
			$data["status"] = empty($this->input->post("status"))?0:1; 
			
			$this->db->where('admin_id',$this->input->post("user_id")); 
			$this->db->update('user',$data);  
			
			redirect(base_url() . 'user/user_management/', 'refresh');
		}
		
		if($param1=="delete"){
			
			$lenghts = count($this->input->post("buld_user"));
			$buld_user = $this->input->post("buld_user");
			for($i=0;$i<=$lenghts;$i++){
				$this->db->where('admin_id',$buld_user[$i]);
				$this->db->set('status',0);
				$this->db->update('user');
			} 
			return;
		}
		
		 
		$page_data['page_width'] = '35';
        $page_data['page_name']  = 'user_management';
        $page_data['page_main_title'] = get_phrase('security');
        $page_data['page_title'] = get_phrase('user_management');
        $this->load->view('index', $page_data);
	}
	
	//user_role
	function user_role($param1='',$param2=''){
		if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
		}
		//add 
		if($param1=="create_role"){ 
			$data["name"] = $this->input->post("roll_name");
			$data["description"] = $this->input->post("description");
			$data["status"] = empty($this->input->post("status"))?0:1;
			$this->db->insert('role',$data);
			
			redirect(base_url(). 'user/user_role', 'refresh');
		}
		//add 
		if($param1=="add_menu_role"){ 
			$data["ROLE_ID"] = $this->input->post("role_id");
			$data["MENU_ID"] = $this->input->post("menu_id"); 
			$this->db->insert('menu_role',$data);
			return; 
		}
		// remove
		if($param1=="remove_menu_role"){
			$this->db->where('MENU_ID', $this->input->post("menu_id"));
			$this->db->where('ROLE_ID', $this->input->post("role_id"));
            $this->db->delete('menu_role');
			
		}
		
		if($param1=="filter"){ 
			
			$page_data['role_id'] = $this->input->post("role");
			//redirect(base_url(). 'user/user_role', 'refresh');
		}
		 
		$page_data['page_width']  = "40";
		$page_data['emp_id']  = $this->input->post("emp_id_auto");
		$page_data['page_name']  = 'user_role';
        $page_data['page_main_title'] = get_phrase('security');
        $page_data['page_title'] = get_phrase('role');
        $this->load->view('index', $page_data);
	} 
} 