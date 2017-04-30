<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Floor extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("room_model","room_m");

        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_floor($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->room_id = $param1;
        $page_data["room_detail"] = $this->room_m->get_room_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('room/modal_new_room' ,$page_data);
    }

    function floor(){

		$page_data['page_name']  = 'floor/floor';
        $page_data['page_title'] = get_phrase('floor');
        $this->load->view('index', $page_data);
	}
    /*** floor ***/
    function floor_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('floor');
        $this->load->view('floor/floor_list',$page_data);
    }

    /* create new room */
    function create_new_floor($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["floor"] 	= $this->input->post("floor");
        $data["building"] 	= $this->input->post("building");
        $data["room_number"] 	= $this->input->post("room_number");
        $data["room_name"] 	= $this->input->post("room_name");
        $data["status"] 	= empty($this->input->post("status"))?0:1;
        $data["description"] = $this->input->post("description");


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if($crud=='new'){ // create new
            $data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
            //
            $data["room_id"] = $this->room_m->new_room($data);

        }else if($crud=='edit'){ // edit
            $data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->room_m->edit_room($data,$id);
            $data["room_id"] = $id;
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
        $obj->pricebook_id = $param1;
        //
        $this->room_m->delete_room($obj);
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
        $table = 'room';

        // indexes
        $columns = array(
            array( 'db' => 'id', 			'dt' => 0 ),
            array( 'db' => 'room_number',  	'dt' => 1 ),
            array( 'db' => 'room_name',   	'dt' => 2 ),
            array( 'db' => 'building',   	'dt' => 3),
            array( 'db' => 'floor   ',   	'dt' => 4 ),
            array( 'db' => 'description',    'dt' => 5 ),
            array( 'db'	=> 'status',         'dt' =>6)
        );


        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));




    }

} 