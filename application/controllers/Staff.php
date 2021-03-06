<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
        $this->load->library('session');
		$this->load->model('employee_general_model','emp_gen_m');
        $this->load->model("employee_model","employee_m");
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }

    //
    function index()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_main'] = get_phrase('human_resource');
        $page_data['page_width'] = "99";
        $page_data['page_name'] = 'staff/index';
        $page_data['page_title'] = get_phrase('staffing_management');
        $this->load->view('index', $page_data);
    }
	
	// insert new employee general information
	function new_employee_general($param1='',$param2='',$param3=''){
		 if ($this->session->userdata('is_login') != 1) {
             $this->session->set_userdata('last_page', current_url());
             redirect(base_url() . 'login', 'refresh');
         }
		
		// declear new object
		$obj = new stdClass(); 
		$obj->emp_id = $this->input->post("hidden_emp_id");
		$obj->crud   = $this->input->post("pb_crud_id");
		 
		// array object
		$data["last_name_kh"] 		= $this->input->post("last_name_kh");
		$data["first_name_kh"] 		= $this->input->post("first_name_kh");
		$data["latin_last_name"] 	= $this->input->post("latin_last_name");
		$data["latin_first_name"] 	= $this->input->post("latin_first_name");
		$data["national_card"]		= $this->input->post("national_card");
		$day 						= $this->input->post("txtdob_dd");
		$month 						= $this->input->post("txtdob_mm");
		$year 						= $this->input->post("txtdob_yy");
		$dob 						= $year . "/" . $month . "/" .$day ;
		$data["date_of_birth"] 		= date('Y-m-d', strtotime($dob));
		$data["place_of_birth"]		= $this->input->post("place_of_birth");
		$data["gender_id"] 			= $this->input->post("gender");
		$data["mirrital_status"] 	= $this->input->post("mirrital_status");
		$data["nationality"] 		= $this->input->post("nationality");
		$data["country"] 			= $this->input->post("country");
		$data["hired_date"] 		= $this->input->post("hired_date");
		
		
		if($obj->crud == "new"){ 
			$data["created_by"] = $this->session->userdata("user_id");
			$data["created_date"] = date('Y-m-d H:i:s');
			$this->db->insert('employee_general',$data); 
		}
		else if($obj->crud == "edit"){ 
			$data["modified_by"] = $this->session->userdata("user_id");
			$data["modified_date"] = date('Y-m-d H:i:s');
			$this->db->where('id',$obj->emp_id);
			$this->db->update('employee_general',$data); 
		}
		
		
		echo json_encode(array("data"=>$data));

	}
	
	function add_new()
    {
        $id = $this->input->post("employee_id");
        $data["khmer_name"] = $this->input->post("khmer_name") . " " . $this->input->post("khmer_name1");
        $data["employee_name"] = $this->input->post("employee_name") . " " . $this->input->post("employee_name1");


        $data["home_phone"] = $this->input->post("home_phone");
        $data["cell_phone"] = $this->input->post("cell_phone");
        $data["extention_num"] = $this->input->post("extention_num");
        $data["email_address"] = $this->input->post("email_address");
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
        $data["section"] = $this->input->post("section");
        $data["main_section"] = $this->input->post("main_section");
        $data["location"] = $this->input->post("location");
        $data["sub_location"] = $this->input->post("sub_location");
        $data["line"] = $this->input->post("line");
        $data["work_shift"] = $this->input->post("work_shift");
        $data["comments"] = $this->input->post("comments");

        $this->db->where('employee_id', 1);
        if ($this->db->update('employee_general', $data)) {
            echo "1";
        } else {
            echo "0";
        }
    }
	
	//employee status
    function employee()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $page_data['page_title'] = get_phrase('Employee.bak');
        $this->load->view('staff/employee/employee', $page_data);
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_employee($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["employee_detail"] = $this->employee_m->get_employee_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('staff/employee/modal_new_employee' ,$page_data);
    }
    //
	function employee_detail_info($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }


        $page_data["id"] = $param1;
        $page_data["crud"] = $param2;

        $page_data['page_name'] = 'staff/employee/employee_detail_info';
        $page_data['page_main'] = get_phrase('staff');

        $page_data['page_title'] = get_phrase('employee_detail_info');
        $page_data['page_data'] = $this->db->select('*')->from('employee_general')->get()->result();
        $this->load->view('staff/employee/employee_detail_info', $page_data);
    }
    //
	 public function get_employee_data()
     {
         if ($this->session->userdata('is_login') != 1) {
             $this->session->set_userdata('last_page', current_url());
             redirect(base_url() . 'login', 'refresh');
         }
         // DB table to use
         $table = 'employee_general';
         $primaryKey = "id";
         // indexes
         $columns = array(
             array('db' => 'id', 'dt' => "id", 'field' => 'id'),
             array('db' => 'emp_code', 'dt' => "emp_code", 'field' => 'emp_code'),
             array('db' => 'latin_last_name', 'dt' => "latin_last_name", 'field' => 'latin_last_name'),
             array('db' => 'latin_first_name', 'dt' => "latin_first_name", 'field' => 'latin_first_name'),
             array('db' => 'last_name_kh', 'dt' => "last_name_kh", 'field' => 'last_name_kh'),
             array('db' => 'first_name_kh', 'dt' => "first_name_kh", 'field' => 'first_name_kh'),
             array('db' => 'gender_id', 'dt' => "gender_id", 'field' => 'gender_id'),
             array('db' => 'position_level', 'dt' => "position_level", 'field' => 'position_level'),
             array('db' => 'department', 'dt' => "department", 'field' => 'department'),
             array('db' => 'home_phone', 'dt' => "home_phone", 'field' => 'home_phone'),
             array('db' => 'hired_date', 'dt' => "hired_date", 'field' => 'hired_date'),
             array('db' => 'email_address', 'dt' => "email_address", 'field' => 'email_address'),
             array('db' => 'staff_type', 'dt' => "staff_type", 'field' => 'staff_type'),
             array('db' => 'date_of_birth', 'dt' => "date_of_birth", 'field' => 'date_of_birth')
         );


         $sql_details = array(
             'user' => $this->db->username,
             'pass' => $this->db->password,
             'port' => $this->db->port,
             'db' => $this->db->database,
             'host' => $this->db->hostname
         );
         $this->load->model('datatable');
         echo json_encode(Datatable::simple($_POST, $sql_details, $table, $primaryKey, $columns));

     }
     //end employee List
     //
     public function get_employee_status_data()
     {
         // DB table to use
         $table = 'employee_status where is_delete=0';
         $primaryKey = "id";
         // indexes
         $columns = array(
             array('db' => 'id', 'dt' => "id", 'field' => 'id'),
             array('db' => 'employee_status_name', 'dt' => "employee_status_name", 'field' => 'employee_status_name'),
             array('db' => 'description', 'dt' => "description", 'field' => 'description'),
             array('db' => 'status', 'dt' => "status", 'field' => 'status'),
             array('db' => 'is_delete', 'dt' => "is_delete", 'field' => 'is_delete')
         );
         $this->load->model('datatable_model');
         echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
     }
     //end employee status

    //
	 function location()
     {
         $page_data['page_title'] = get_phrase('location');
         $this->load->view('staff/location/location_list', $page_data);
     }

	
	// employee contact
	function employee_contact()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('employee_contact');
        $this->load->view('staff/employee/employee_contact', $page_data);
    }
	
	// employee background
	function employee_background()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('employee_background');
        $this->load->view('staff/employee/employee_background', $page_data);
    }
	// employee skills
	function employee_skills()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('employee_skills');
        $this->load->view('staff/employee/employee_skills', $page_data);
    }
	// employee_language
	function employee_language()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('employee_language');
        $this->load->view('staff/employee/employee_language', $page_data);
    }
	// employee_experience
	function employee_experience()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('employee_experience');
        $this->load->view('staff/employee/employee_experience', $page_data);
    }
	
	// employee_family
	function employee_family()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('employee_family');
        $this->load->view('staff/employee/employee_family', $page_data);
    }
	// employee_referrence
	function employee_referrence()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('employee_referrence');
        $this->load->view('staff/employee/employee_referrence', $page_data);
    }
    // add new reference
    function add_new_referrence($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $obj = new stdClass();
        $obj->id = $param1;
        //$page_data["employee_detail"] = $this->employee_m->get_employee_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('staff/employee/modal_addnew_referrence', $page_data);
    }

	// employee_tracking
	function employee_tracking()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('employee_tracking');
        $this->load->view('staff/employee/employee_tracking', $page_data);
    }
	// employee_document
	function employee_document()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('employee_document');
        $this->load->view('staff/employee/employee_document', $page_data);
    }
	// employee_internal_training
	function employee_internal_training()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('employee_internal_training');
        $this->load->view('staff/employee/employee_internal_training', $page_data);
    }
	// employee_payslip
	function employee_payslip()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('employee_payslip');
        $this->load->view('staff/employee/employee_payslip', $page_data);
    }
	// employee_discipline
	function employee_discipline()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('employee_discipline');
        $this->load->view('staff/employee/employee_discipline', $page_data);
    }
	

	//employee general
	function employee_general()
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        // declear new object
        $obj = new stdClass();
        $obj->emp_id = 1;

        $page_data["gender_list"] = $this->emp_gen_m->gender();


        $page_data['emp_general_info'] = $this->emp_gen_m->get_employee_general_detail($obj);
        $page_data['page_title'] = get_phrase('employee_general');
        $this->load->view('staff/employee/employee_general', $page_data);
    }

    //
	public function get_employee_general_data(){

        // DB table to use
        $table = 'employee_general where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 		'dt' => "id", 						'field' => 'id'),
            array('db' => 'image',               'dt' => "image",                'field' => 'image'),
			array('db' => 'employee_number', 	'dt' => "employee_number", 			'field' => 'employee_number'),
			array('db' => 'latin_name', 		'dt' => "latin_name", 				'field' => 'latin_name'),
			array('db' => 'khmer_name', 		'dt' => "khmer_name", 				'field' => 'khmer_name'),
			array('db' => 'national_card', 		'dt' => "national_card", 			'field' => 'national_card'),
			array('db' => 'date_of_birth', 		'dt' => "date_of_birth", 			'field' => 'date_of_birth'),
			array('db' => 'place_of_birth', 	'dt' => "place_of_birth", 			'field' => 'place_of_birth'),
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
			array('db' => 'work_shift',   		'dt' => "work_shift", 				'field'	=> 'work_shift'),
			array('db' => 'comment',   			'dt' => "comment", 					'field'	=> 'comment')
        );


        $sql_details = array(
            'user' => $this->sys->username,
            'pass' => $this->sys->password,
            'port' => $this->sys->port,
            'db' => $this->sys->database,
            'host' => $this->sys->hostname
        );
        $this->load->model('datatable');
        echo json_encode(Datatable::simple($_POST, $sql_details, $table, $primaryKey, $columns));

    }
}
		