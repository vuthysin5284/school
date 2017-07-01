<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestingRegister extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->database('default', TRUE); 
        $this->load->library('session');
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }

    function index(){
        $page_data['page_name']  = 'testing_register/index';
        $page_data['page_width'] = 40;
        $page_data['page_title'] = get_phrase('student');
        $this->load->view('index', $page_data);

    }

    /*** testing register ***/
    function testing_record_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('testing_records');
        $this->load->view('testing_register/testing_records',$page_data);
    }
    public function testing_record_data(){

        // DB table to use
        $table = 'deal';
        $primaryKey = "id";
        // indexes
        $columns = array(
            array('db' => 'id', 		'dt' => "id", 			'field' => 'id'),
            array('db' => 'deal_name', 	'dt' => "deal_name", 	'field' => 'deal_name'),
            array('db' => 'contact',    'dt' => "contact",      'field' => 'contact'),
            array('db' => 'status', 	'dt' => "status", 		'field' => 'status'),
            array('db' => 'company',    'dt' => "company", 	    'field'	=> 'company')
        );

        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));




    }



} 