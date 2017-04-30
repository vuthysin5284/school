<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->database('default', TRUE); 
        $this->load->library('session');
		//$this->load->library('googlemaps');
		
		$this->load->model('datatable_model');
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
	function classes(){  

		$page_data['page_name']  = 'classes/classes_list';
        $page_data['page_title'] = get_phrase('classes');
        $this->load->view('index', $page_data);
	}
    /*** classes ***/
    function new_classes($param1 = '',$param2 = '',$param3 = '')
    {
        $page_data['page_name']  = 'class';
        $this->load->view('classes/modal_new_classes' ,$page_data);
    }
    function edit_classes($param1 = '',$param2 = '',$param3 = '')
    {
        $page_data['page_name']  = 'classes';
        $this->load->view('classes/modal_edit_classes' ,$page_data);
    }


    function classes_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('classes');
        $this->load->view('classes/classes_list',$page_data);
    }
	 
    public function classes_data(){

        // DB table to use
        $table = 'deal';

        // indexes
        $columns = array(
            array( 'db' => 'id',            'dt' => 0 ),
            array( 'db' => 'deal_name',     'dt' => 1 ),
            array( 'db' => 'contact',       'dt' => 2 ),
            array( 'db' => 'tags',          'dt' => 3 ),
            array(
                'db'    => 'created_date',
                'dt'    => 4,
                'formatter' => function( $d, $row ) {
                    return date( 'jS M y', strtotime($d));
                }
            ),
            array(
                'db'    => 'value',
                'dt'    => 5,
                'formatter' => function( $d, $row ) {
                    return '$'.number_format($d);
                }
            )
        );


        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));

    }
} 