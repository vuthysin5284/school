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
    //
    function employee_status(){
        $page_data['page_title'] = get_phrase('employee');
        $this->load->view('staff/employee_list/employee_list', $page_data);
    }
	 public function get_employee_data(){

        // DB table to use
        $table = 'employee' ;
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 		'dt' => "id", 					'field' => 'id'),
			array('db' => 'employee_name', 		'dt' => "employee_name", 		'field' => 'employee_name'),
			array('db' => 'description', 		'dt' => "description", 			'field' => 'description'),
			array('db' => 'status', 	 		'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   		'dt' => "is_delete", 			'field'	=> 'is_delete')
        );
		 $this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));




    }

}