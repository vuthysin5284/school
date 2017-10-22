<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_general extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("employee_general_model","employee_general_m");
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_employee_general($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["employee_general_detail"] = $this->employee_general_m->get_employee_general_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('staff/employee_general/modal_new_employee_general' ,$page_data);
    }

    function employee_general(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

		$page_data['page_name']  = 'employee_general/employee_general';
        $page_data['page_title'] = get_phrase('employee_general');
        $this->load->view('index', $page_data);
	}
    /*** employee list ***/
    function employee_general_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $page_data['page_title'] = get_phrase('employee_general');
        $this->load->view('employee_general/employee_general_list',$page_data);
    }

    /* create new employee */
    function create_new_employee_general($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["employee_number"] 	= $this->input->post("employee_list_name");
		 $data["latin_name"] = $this->input->post("latin_name");
		 $data["khmer_name"] = $this->input->post("khmer_name");
		 $data["national_card"] = $this->input->post("national_card");
		 $data["date_of_birth"] = $this->input->post("date_of_birth");
		 $data["place_of_birth"] = $this->input->post("place_of_birth");
		 $data["gender"] = $this->input->post("gender");
		 $data["mirrital_status"] = $this->input->post("mirrital_status");
		 $data["nationality"] = $this->input->post("nationality");
         $data["country"] 	= $this->input->post("country");
		 $data["hired_date"] 	= $this->input->post("hired_date");
		 $data["home_phone"] = $this->input->post("home_phone");
		 $data["cell_phone"] = $this->input->post("cell_phone");
		 $data["extention_num"] = $this->input->post("extention_num");
		 $data["email_address"] = $this->input->post("email_address");
		 $data["phone"] = $this->input->post("phone");
		 $data["joined_date"] = $this->input->post("joined_date");
		 
		 $data["email"] = $this->input->post("email");
         $data["status"] 	= $this->input->post("status");
		 $data["employee_number"] 	= $this->input->post("employee_number");
		 $data["address"] = $this->input->post("address");
		 $data["remark"] = $this->input->post("remark");
		 $data["pos_class"] = $this->input->post("pos_class");
		 $data["job_level"] = $this->input->post("job_level");
		 $data["employee_status"] = $this->input->post("employee_status");
		 $data["position_level"] = $this->input->post("position_level");
		 $data["confirm_date"] = $this->input->post("confirm_date");
		 $data["confirm_status"] = $this->input->post("confirm_status");
		 $data["leaving_reason"] = $this->input->post("leaving_reason");
		 $data["leaving_date"] = $this->input->post("leaving_date");
		 $data["department"] = $this->input->post("department");
         $data["section"] 	= $this->input->post("section");
		 $data["main_section"] 	= $this->input->post("main_section");
		 $data["location"] 	= $this->input->post("location");
		 $data["sub_location"] 	= $this->input->post("sub_location");
		 $data["line"] 	= $this->input->post("line");
		 $data["work_shift"] 	= $this->input->post("work_shift");
		 $data["comment"] 	= $this->input->post("comment");


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if($crud=='new'){ // create new
			$data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
			$data['is_delete']=0;
            $data["employee_general_list_id"] = $this->employee_general_m->new_employee_general($data);
        }else if($crud=='edit'){ // edit
			$data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->employee_general_m->edit_employee_general($data,$id);
            $data["employee_general_id"] = $id;
        }
        echo json_encode(array("data"=>$data));

    }
    /* delete */
    function delete($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $obj = new stdClass();
        $obj->id = $param1;
        //
        $this->employee_general_m->delete_employee_general($obj);
    }

    public function employee_general_data(){

        // DB table to use
        $table = 'employee_general where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 		'dt' => "id", 						'field' => 'id'),
			array('db' => 'employee_number', 	'dt' => "employee_number", 			'field' => 'employee_number'),
			array('db' => 'latin_name', 		'dt' => "latin_name", 				'field' => 'latin_name'),
			array('db' => 'khmer_name', 		'dt' => "khmer_name", 				'field' => 'khmer_name'),
			array('db' => 'national_card', 		'dt' => "national_card", 			'field' => 'national_card'),
			array('db' => 'date_of_birth', 		'dt' => "date_of_birth", 			'field' => 'date_of_birth'),
			array('db' => 'palce_of_birth', 	'dt' => "palce_of_birth", 			'field' => 'palce_of_birth'),
			array('db' => 'gender', 			'dt' => "gender", 					'field' => 'gender'),
			array('db' => 'mirrital_status', 	'dt' => "mirrital_status", 			'field' => 'mirrital_status'),
			array('db' => 'nationality', 		'dt' => "nationality", 				'field' => 'nationality'),
			array('db' => 'country', 			'dt' => "country", 					'field' => 'country'),
			array('db' => 'hired_date', 		'dt' => "hired_date", 				'field' => 'hired_date'),
			array('db' => 'home_phone', 		'dt' => "home_phone", 				'field' => 'home_phone'),
			array('db' => 'cell_phone', 		'dt' => "cell_phone", 				'field' => 'cell_phone'),
			array('db' => 'extention_num',		'dt' => "extention_num", 			'field' => 'extention_num'),
			array('db' => 'email_address',		'dt' => "email_address", 			'field' => 'email_address'),
			array('db' => 'address', 			'dt' => "address", 					'field' => 'address'),
			array('db' => 'remark', 			'dt' => "remark", 					'field' => 'remark'),
			array('db' => 'pos_class', 			'dt' => "pos_class", 				'field' => 'pos_class'),
			array('db' => 'job_level', 			'dt' => "job_level", 				'field' => 'job_level'),
			array('db' => 'employee_status', 	'dt' => "employee_status", 			'field' => 'employee_status'),
			array('db' => 'position_level', 	'dt' => "position_level", 			'field' => 'position_level'),
			array('db' => 'confirm_date', 		'dt' => "confirm_date", 			'field' => 'confirm_date'),
			array('db' => 'confirm_status', 	'dt' => "confirm_status", 			'field' => 'confirm_status'),
			array('db' => 'leaving_reason', 	'dt' => "leaving_reason", 			'field' => 'leaving_reason'),
			array('db' => 'leaving_date', 		'dt' => "leaving_date", 			'field' => 'leaving_date'),
			array('db' => 'department', 		'dt' => "department", 				'field' => 'department'),
			array('db' => 'section', 	 		'dt' => "section", 					'field' => 'section'),
			array('db' => 'main_section', 	 	'dt' => "main_section", 			'field' => 'main_section'),
			array('db' => 'location', 	 		'dt' => "location", 				'field' => 'location'),
			array('db' => 'sub_location', 	 	'dt' => "sub_location", 			'field' => 'sub_location'),
			array('db' => 'line',   			'dt' => "line", 					'field'	=> 'line'),
			array('db' => 'work_shift',   		'dt' => "work_shift", 				'field'	=> 'work_shift'),
			array('db' => 'comments',   		'dt' => "comments", 					'field'	=> 'comments')
        );
		
		
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));




    }

} 