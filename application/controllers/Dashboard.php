<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller { 
	
	function __construct()
	{
		parent::__construct();
		$this->db=$this->load->database('default', TRUE);
		//$this->erp=$this->load->database('erp', true); 
        $this->load->library('session');
		//$this->load->library('googlemaps'); 
		$this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    
     
	public function index()
	{ 
		$page_data['page_name']  = 'dashboard/dashboard';
        $page_data['page_title'] = get_phrase('dashboard');
        $this->load->view('index', $page_data); 
	}
	
	public function dashboard(){
		$page_data['page_name']  = 'dashboard/dashboard';
        $page_data['page_title'] = get_phrase('dashboard');
		 $this->load->view('index', $page_data); 
	} 
	
	public function data(){ 
	
		// DB table to use
		$table = 'deal';
		 
		
		// Array of database columns which should be read and sent back to DataTables.
		// The `db` parameter represents the column name in the database, while the `dt`
		// parameter represents the DataTables column identifier. In this case simple
		// indexes
		$columns = array(
			array( 'db' => 'id', 			'dt' => 0 ),
			array( 'db' => 'deal_name',  	'dt' => 1 ),
			array( 'db' => 'contact',   	'dt' => 2 ),
			array( 'db' => 'tags',     		'dt' => 3 ),  
			array(
				'db'	=> 'created_date',
				'dt'	=> 4,
				'formatter' => function( $d, $row ) {
					return date( 'jS M y', strtotime($d));
				}
			),
			array(
				'db'	=> 'value',
				'dt'	=> 5,
				'formatter' => function( $d, $row ) {
					return '$'.number_format($d);
				}
			)
		);
		 
		
		echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
		
		
		 
		
	} 
	  
}
