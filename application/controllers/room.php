<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
		//$this->load->library('googlemaps');

        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_room($param1 = '',$param2 = '',$param3 = '')
    {
        $page_data['page_name']  = 'test';
        $this->load->view('room/modal_new_room' ,$page_data);
    }

    function room(){

		$page_data['page_name']  = 'room/room';
        $page_data['page_title'] = get_phrase('room');
        $this->load->view('index', $page_data);
	}
    /*** room ***/
    function room_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('room');
        $this->load->view('room/room_list',$page_data);
    }


    /*
    public function room_data(){
        // DB table to use
        $table = 'deal';
        $primaryKey	= "id";
        // indexes
        $columns = array(
            array( 'db' => 'id', 		'dt'	=> "id", 			'field'	=> 'id'),
            array( 'db' => 'deal_name', 'dt'	=> "deal_name", 	'field'	=> 'deal_name' ),
            array( 'db' => 'contact',   'dt'	=> "contact",       'field'	=> 'contact' ),
            array( 'db' => 'tags',      'dt'	=> "tags",          'field'	=> 'tags' )
        );

        $sql_details	= array(
            'user'	=> $this->db->username,
            'pass'	=> $this->db->password,
            'port'	=> $this->db->port,
            'db'	=> $this->db->database,
            'host'	=> $this->db->hostname
        );

        $this->load->model('datatable');
        echo json_encode(Datatable::simple($_POST, $sql_details,$table,$primaryKey, $columns));

    }*/


    public function room_data(){

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