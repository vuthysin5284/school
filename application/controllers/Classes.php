<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->sys= $this->load->database('sys', TRUE);
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
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $obj = new stdClass();
        $obj->classes_id = $param1;
		
        $obj->branch_id = $this->session->userdata("branch_id");
        $page_data["classes_detail"] = $this->classes_m->get_classes_detail($obj);
        $page_data["session_list"] = $this->classes_m->get_session_list($obj);
        $page_data["crud"] = $param2;
        $this->load->view('masterdata/classes/modal_new_classes' ,$page_data);
    }

    function room(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

		$page_data['page_name']  = 'masterdata/classes/classes';
        $page_data['page_title'] = get_phrase('classes');
        $this->load->view('index', $page_data);
	}
    /*** classes ***/
    function classes_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $page_data['page_title'] = get_phrase('classes');
        $this->load->view('masterdata/classes/classes_list',$page_data);
    }

    /* create new classes */
    function create_new_classes($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["classes_number"] 	= $this->input->post("classes_number");
        $data["classes_name"] 	    = $this->input->post("classes_name");
        $data["session_id"] 	        = $this->input->post("session_id");
        $data["status"] 	    = empty($this->input->post("status"))?0:1;
        $data["description"]    = $this->input->post("description");
        $data["total_capacity"]    = $this->input->post("total_capacity");
        $data["grade_abbreviation"]    = $this->input->post("grade_abbreviation");
        $data["order_number"] 	        = $this->input->post("order_number");


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
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        // DB table to use
        $table = 'class_v';
        $primaryKey	= "id";
        // indexes
        $columns = array(
            array( 'db' => 'id', 		    	'dt'	=> "id", 				'field'	=> 'id'),
            array( 'db' => 'classes_number',    'dt'	=> "classes_number", 	'field'	=> 'classes_number' ),
            array( 'db' => 'classes_name',      'dt'	=> "classes_name",      'field'	=> 'classes_name' ),
            array( 'db' => 'session_id',        'dt'	=> "session_id",        'field'	=> 'session_id' ),
            array( 'db' => 'session_name',   	'dt'	=> "session_name",      'field'	=> 'session_name'  ),
            array( 'db' => 'description',   	'dt'	=> "description",   	'field'	=> 'description'  ),
            array( 'db'	=> 'order_number',        	    'dt'	=> "order_number",        	'field'	=> 'order_number' ),
            array( 'db'	=> 'status',        	'dt'	=> "status",        	'field'	=> 'status' ),
            array( 'db'	=> 'is_delete',         'dt'	=> "is_delete",         'field'	=> 'is_delete' ),
            array( 'db'	=> 'total_capacity',         'dt'	=> "total_capacity",         'field'	=> 'total_capacity' ),
            array( 'db'	=> 'grade_abbreviation',         'dt'	=> "grade_abbreviation",         'field'	=> 'grade_abbreviation' ),
            array( 'db'	=> 'total_student',         'dt'	=> "total_student",         'field'	=> 'total_student' )
        );

        $sql_details	= array(
            'user'	=> $this->sys->username,
            'pass'	=> $this->sys->password,
            'port'	=> $this->sys->port,
            'db'	=> $this->sys->database,
            'host'	=> $this->sys->hostname
        );

        $this->load->model('datatable');
        echo json_encode(Datatable::simple($_POST, $sql_details,$table,$primaryKey, $columns));

    }


} 