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
        $page_data['page_name']  = 'staff/index';
        $page_data['page_title'] = get_phrase('staff');
        $this->load->view('index', $page_data);
    }
	//section
    function section(){
        $page_data['page_title'] = get_phrase('section');
        $this->load->view('staff/section/section', $page_data);
    }
	public function get_section_data(){
        // DB table to use
        $table = 'section where is_delete=0' ;
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 		'dt' => "id", 					'field' => 'id'),
			array('db' => 'section_name', 			'dt' => "section_name", 		'field' => 'section_name'),
			array('db' => 'department_name', 		'dt' => "department_name", 		'field' => 'department_name'),
			array('db' => 'description', 		'dt' => "description", 			'field' => 'description'),
			array('db' => 'status', 	 		'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   		'dt' => "is_delete", 			'field'	=> 'is_delete')
        );
		 $this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
    }//end section status
	
	//employeelist status
    function employeelist_status(){
        $page_data['page_title'] = get_phrase('employeelist');
        $this->load->view('staff/employeelist/employeelist', $page_data);
    }
	 public function get_employeelist_data(){
        // DB table to use
        $table = 'employeelist where is_delete=0' ;
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 			'dt' => "id", 						'field' => 'id'),
			array('db' => 'employeelist_name', 		'dt' => "employeelist_name", 		'field' => 'employeelist_name'),
			array('db' => 'description', 			'dt' => "description", 				'field' => 'description'),
			array('db' => 'status', 	 			'dt' => "status", 					'field' => 'status'),
			array('db' => 'is_delete',   			'dt' => "is_delete", 				'field'	=> 'is_delete')
        );
		 $this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
    }//end employee statu
	
	
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
        $page_data['page_title'] = get_phrase('position');
        $this->load->view('staff/position_list/position_list', $page_data);
    }
	 public function get_position_data(){
        // DB table to use
        $table = 'position where is_delete=0' ;
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 				'dt' => "id", 							'field' => 'id'),
			array('db' => 'position_name', 				'dt' => "position_name", 				'field' => 'position_name'),	
			array('db' => 'description', 				'dt' => "description", 					'field' => 'description'),
			array('db' => 'status', 	 				'dt' => "status", 						'field' => 'status'),
			array('db' => 'is_delete',   				'dt' => "is_delete", 					'field'	=> 'is_delete')
        );
		 $this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
    }//end position status
	
	
	 function location(){
        $page_data['page_title'] = get_phrase('location');
        $this->load->view('staff/location/location_list', $page_data);
    }

}