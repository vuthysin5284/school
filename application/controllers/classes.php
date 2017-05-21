<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("classes_model","classes_m");
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_classes($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->classes_id = $param1;
		
        $obj->branch_id = $this->session->userdata("branch_id");
        $page_data["classes_detail"] = $this->classes_m->get_classes_detail($obj);
        $page_data["room_list"] = $this->classes_m->get_room_list($obj);
        $page_data["crud"] = $param2;
        $this->load->view('classes/modal_new_classes' ,$page_data);
    }

    function room(){

		$page_data['page_name']  = 'classes/classes';
        $page_data['page_title'] = get_phrase('classes');
        $this->load->view('index', $page_data);
	}
    /*** classes ***/
    function classes_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('classes');
        $this->load->view('classes/classes_list',$page_data);
    }

    /* create new classes */
    function create_new_classes($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["classes_number"] 	= $this->input->post("classes_number");
        $data["classes_name"] 	    = $this->input->post("classes_name");
        $data["room_id"] 	        = $this->input->post("room_id");
        $data["status"] 	    = empty($this->input->post("status"))?0:1;
        $data["description"]    = $this->input->post("description");


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if($crud=='new'){ // create new
            $data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
            //
            $data["classes_id"] = $this->classes_m->new_classes($data);

        }else if($crud=='edit'){ // edit
            $data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->classes_m->edit_classes($data,$id);
            $data["classes_id"] = $id;
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
        $obj->classes_id = $param1;
        //
        $this->classes_m->delete_classes($obj);
    }


    public function classes_data(){
        // DB table to use
        $table = 'classes';
        $primaryKey	= "id";
        // indexes
        $columns = array(
            array( 'db' => 'id', 		    	'dt'	=> "id", 				'field'	=> 'id'),
            array( 'db' => 'classes_number',    'dt'	=> "classes_number", 	'field'	=> 'classes_number' ),
            array( 'db' => 'classes_name',      'dt'	=> "classes_name",      'field'	=> 'classes_name' ),
            array( 'db' => 'room_id',         	'dt'	=> "room_id",        	    'field'	=> 'room_id' ),
            array( 'db' => 'classes_name',   	'dt'	=> "classes_name",      'field'	=> 'classes_name'  ),
            array( 'db' => 'description',   	'dt'	=> "description",   	'field'	=> 'description'  ),
            array( 'db'	=> 'status',        	'dt'	=> "status",        	'field'	=> 'status' ),
            array( 'db'	=> 'is_delete',         'dt'	=> "is_delete",         'field'	=> 'is_delete' )
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

    }


   /* public function room_data(){

        // DB table to use
        $table = 'room';

        // indexes
        $columns = array(
            array( 'db' => 'id', 			'dt' => 0 ),
            array( 'db' => 'classes_number',  	'dt' => 1 ),
            array( 'db' => 'classes_name',   	'dt' => 2 ),
            array( 'db' => 'floor',   	    'dt' => 2 ),
            array( 'db' => 'building', 	    'dt' => 2 ),
            array( 'db' => 'classes_name',   	'dt' => 2 ),
            array( 'db' => 'description',    'dt' => 3 ),
            array( 'db'	=> 'status',         'dt' => 4)
        );


        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));

    }*/

} 