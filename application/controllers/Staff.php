<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }
    function index()
    {
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $page_data['page_width']  = "90";
        $page_data['page_name']  = 'staff/index';
        $page_data['page_title'] = get_phrase('staff');
        $this->load->view('index', $page_data);
    }
	//section
    function section(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $page_data['page_title'] = get_phrase('section');
        $this->load->view('staff/section/section', $page_data);
    }
	public function get_section_data(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        // DB table to use
        $table = 'section where is_delete=0' ;
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 		'dt' => "id", 					'field' => 'id'),
			array('db' => 'section_name', 		'dt' => "section_name", 		'field' => 'section_name'),
			array('db' => 'department_name', 	'dt' => "department_name", 		'field' => 'department_name'),
			array('db' => 'description', 		'dt' => "description", 			'field' => 'description'),
			array('db' => 'status', 	 		'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   		'dt' => "is_delete", 			'field'	=> 'is_delete')
        );
		 $this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
    }//end section status
	
	//employee status
    function employee(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $page_data['page_title'] = get_phrase('employee');
        $this->load->view('staff/employee/employee', $page_data);
    }
	function employee_detail_info(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
		
        $page_data['page_name']  = 'staff/employee/employee_detail_info'; 
		
        $page_data['page_title'] = get_phrase('employee detail info');
        $page_data['page_data'] = $this->db->select('*')->from('employee')->get()->result();
        $this->load->view('staff/employee/employee_detail_info', $page_data);
    }
	 public function get_employee_data(){
         if ($this->session->userdata('is_login') != 1){
             $this->session->set_userdata('last_page', current_url());
             redirect(base_url(). 'login', 'refresh');
         }
        // DB table to use
        $table = 'employee where is_delete=0' ;
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 			'dt' => "id", 						'field' => 'id'),
			array('db' => 'employee_number', 		'dt' => "employee_number", 			'field' => 'employee_number'),
			array('db' => 'latin_name', 			'dt' => "latin_name", 				'field' => 'latin_name'),
			array('db' => 'khmer_name', 			'dt' => "khmer_name", 				'field' => 'khmer_name'),
			array('db' => 'gender', 				'dt' => "gender", 					'field' => 'gender'),
			array('db' => 'position', 				'dt' => "position", 				'field' => 'position'),
			array('db' => 'department', 			'dt' => "department", 				'field' => 'department'),
			array('db' => 'phone', 					'dt' => "phone", 					'field' => 'phone'),
			array('db' => 'joined_date', 			'dt' => "joined_date", 				'field' => 'joined_date'),
			array('db' => 'hired_date', 			'dt' => "hired_date", 				'field' => 'hired_date'),
			array('db' => 'email', 					'dt' => "email", 					'field' => 'email'),
			array('db' => 'status', 	 			'dt' => "status", 					'field' => 'status'),
			array('db' => 'is_delete',   			'dt' => "is_delete", 				'field'	=> 'is_delete')
        );
		 $this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
    }//end employee List
	
	
	//department status
    function department_status(){
        $page_data['page_title'] = get_phrase('department');
        $this->load->view('staff/department_list/department_list', $page_data);
    }
	public function get_department_data(){
        // DB table to use
        $table = 'department where is_delete=0' ;
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 			'dt' => "id", 					'field' => 'id'),
			array('db' => 'department_name', 		'dt' => "department_name", 		'field' => 'department_name'),
			array('db' => 'description', 			'dt' => "description", 			'field' => 'description'),
			array('db' => 'status', 	 			'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   			'dt' => "is_delete", 			'field'	=> 'is_delete')
        );
		 $this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
    }//end department status
	
    //employee status
    function employee_status(){
        $page_data['page_title'] = get_phrase('employee');
        $this->load->view('staff/employee_status/employee_status', $page_data);
    }
	 public function get_employee_status_data(){
        // DB table to use
        $table = 'employee_status where is_delete=0' ;
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 		'dt' => "id", 					'field' => 'id'),
			array('db' => 'employee_status_name', 		'dt' => "employee_status_name", 		'field' => 'employee_status_name'),
			array('db' => 'description', 		'dt' => "description", 			'field' => 'description'),
			array('db' => 'status', 	 		'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   		'dt' => "is_delete", 			'field'	=> 'is_delete')
        );
		 $this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
    }//end employee status
	
	//possition status
	function position_status(){
        $page_data['page_title'] = get_phrase('position_status');
        $this->load->view('staff/position_status/position_status', $page_data);
    }
	 public function get_position_status_data(){
        // DB table to use
        $table = 'position_status where is_delete=0' ;
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 			'dt' => "id", 						'field' => 'id'),
			array('db' => 'position_status_name', 	'dt' => "position_status_name", 	'field' => 'position_status_name'),	
			array('db' => 'description', 			'dt' => "description", 				'field' => 'description'),
			array('db' => 'status', 	 			'dt' => "status", 					'field' => 'status'),
			array('db' => 'is_delete',   			'dt' => "is_delete", 				'field'	=> 'is_delete')
        );
		 $this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
    }//end position status
	
	
	 function location(){
        $page_data['page_title'] = get_phrase('location');
        $this->load->view('staff/location/location_list', $page_data);
    }

	//job level
	function job_level(){
        $page_data['page_title'] = get_phrase('job_level');
        $this->load->view('staff/job_level/job_level', $page_data);
    }
	public function get_job_level_data(){

        // DB table to use
        $table = 'job_level where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 		'dt' => "id", 					'field' => 'id'),
			array('db' => 'job_level_name', 	'dt' => "job_level_name", 		'field' => 'job_level_name'),
			array('db' => 'description', 		'dt' => "description", 			'field' => 'description'),
			array('db' => 'status', 	 		'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   		'dt' => "is_delete", 			'field'	=> 'is_delete')
        );
       $this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
    }

		//country
		function country(){
        $page_data['page_title'] = get_phrase('country');
        $this->load->view('staff/country/country', $page_data);
    }

		public function get_country_data(){

        // DB table to use
        $table = 'country where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 		'dt' => "id", 					'field' => 'id'),
			array('db' => 'country_name', 		'dt' => "country_name", 		'field' => 'country_name'),
			array('db' => 'nationality', 		'dt' => "nationality", 			'field' => 'nationality'),
			array('db' => 'short_name', 		'dt' => "short_name", 			'field' => 'short_name'),
			array('db' => 'description', 		'dt' => "description", 			'field' => 'description'),
			array('db' => 'status', 	 		'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   		'dt' => "is_delete", 			'field'	=> 'is_delete')
        );
		 $this->load->model('datatable_model');
  			echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
   	 }
	
		function relationship_type(){
       		 $page_data['page_title'] = get_phrase('relationship_type');
       		 $this->load->view('staff/relationship_type/relationship_type', $page_data);
   	 }
		public function get_relationship_type_data(){
			
			 // DB table to use
        $table = 'relationship_type where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 				'dt' => "id", 						'field' => 'id'),
			array('db' => 'relationship_type_name', 	'dt' => "relationship_type_name", 	'field' => 'relationship_type_name'),
			array('db' => 'description', 				'dt' => "description", 				'field' => 'description'),
			array('db' => 'status', 	 				'dt' => "status", 					'field' => 'status'),
			array('db' => 'is_delete',   				'dt' => "is_delete", 				'field'	=> 'is_delete')
        );	
	
	 		$this->load->model('datatable_model');
  			echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
		}
	
	//
		function leave_reason(){
       		 $page_data['page_title'] = get_phrase('leave_reason');
       		 $this->load->view('staff/leave_reason/leave_reason', $page_data);
   	 }
	 public function get_leave_reason_data(){
        // DB table to use
        $table = 'leave_reason where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 			'dt' => "id", 					'field' => 'id'),
			array('db' => 'leave_reason_name', 		'dt' => "leave_reason_name", 	'field' => 'leave_reason_name'),
			array('db' => 'description', 			'dt' => "description", 			'field' => 'description'),
			array('db' => 'status', 	 			'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   			'dt' => "is_delete", 			'field'	=> 'is_delete')
        );
		 $this->load->model('datatable_model');
  		echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));

    }
			function education_type(){
       		 $page_data['page_title'] = get_phrase('education_type');
       		 $this->load->view('staff/education_type/education_type', $page_data);
   	 }

		 public function get_education_type_data(){

        // DB table to use
        $table = 'education_type where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 				'dt' => "id", 						'field' => 'id'),
			array('db' => 'education_type_name', 		'dt' => "education_type_name", 		'field' => 'education_type_name'),
			array('db' => 'description', 				'dt' => "description", 				'field' => 'description'),
			array('db' => 'status', 	 				'dt' => "status", 					'field' => 'status'),
			array('db' => 'is_delete',   				'dt' => "is_delete", 				'field'	=> 'is_delete')
        );
		
		$this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));

    }

		function position(){
       		 $page_data['page_title'] = get_phrase('position');
       		 $this->load->view('staff/position/position', $page_data);
   	 }

		public function get_position_data(){

        // DB table to use
        $table = 'position where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 			'dt' => "id", 					'field' => 'id'),
			array('db' => 'position_name', 	  		'dt' => "position_name", 		'field' => 'position_name'),
			array('db' => 'description', 			'dt' => "description", 			'field' => 'description'),
			array('db' => 'status', 	 			'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   			'dt' => "is_delete", 			'field'	=> 'is_delete')
			
        );
		$this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
		}
		
		function main_station(){
       		 $page_data['page_title'] = get_phrase('main_station');
       		 $this->load->view('staff/main_station/main_station', $page_data);
   	 }
		public function get_main_station_data(){

        // DB table to use
        $table = 'main_station where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 			'dt' => "id", 					'field' => 'id'),
			array('db' => 'main_station', 			'dt' => "main_station", 		'field' => 'main_station'),
			array('db' => 'section_name', 			'dt' => "section_name", 		'field' => 'section_name'),
			array('db' => 'description', 			'dt' => "description", 			'field' => 'description'),
			array('db' => 'status', 	 			'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   			'dt' => "is_delete", 			'field'	=> 'is_delete')
        );
		$this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
	}
	//Locations
	function employee_location(){
       		 $page_data['page_title'] = get_phrase('employee_location');
       		 $this->load->view('staff/employee_location/employee_location', $page_data);
   	 }
	public function get_employee_location_data(){

        // DB table to use
        $table = 'employee_location where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 			'dt' => "id", 					'field' => 'id'),
			array('db' => 'employee_location', 		'dt' => "employee_location", 	'field' => 'employee_location'),
			array('db' => 'main_station', 			'dt' => "main_station", 		'field' => 'main_station'),
			array('db' => 'description', 			'dt' => "description", 			'field' => 'description'),
			array('db' => 'status', 	 			'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   			'dt' => "is_delete", 			'field'	=> 'is_delete')
        );	
		$this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
	}
	
	
	/* section employee detail */
	//employee general
    function employee_general(){
		if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
		
        $page_data['page_title'] = get_phrase('employee_general');
        $this->load->view('staff/employee/employee_general', $page_data);
    }
	
	// employee contact
	function employee_contact(){
		if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
		
        $page_data['page_title'] = get_phrase('employee_contact');
        $this->load->view('staff/employee/employee_contact', $page_data);
    }
	
}