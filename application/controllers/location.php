<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->load->database('default', TRUE); 
        $this->load->library('session');
		//$this->load->library('googlemaps');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
	function location(){
        if ($this->session->userdata('is_login') != 1)
            redirect(base_url() . 'login', 'refresh');

		$page_data['page_name']  = 'branch/branch';
        $page_data['page_title'] = get_phrase('branch');
        $this->load->view('index', $page_data);
	}


    /*
    *	$page_name		=	The name of page
    */
    function new_location($param1 = '',$param2 = '',$param3 = '')
    {
        $page_data['page_name']  = 'test';
        $this->load->view('location/modal_new_location' ,$page_data);
    }

    /*** branch ***/
    function location_list($param1='',$param2='',$param3=''){

        $page_data['page_title'] = get_phrase('location');
        $this->load->view('location/location_list',$page_data);
    }
    public function location_data(){

        // DB table to use
        $table = 'deal';

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