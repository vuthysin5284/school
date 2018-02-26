<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SchoolSession extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->sys= $this->load->database('sys', TRUE);
        $this->load->library('session');
        $this->load->model("SchoolSession_model","session_m");
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_session($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $obj = new stdClass();
        $obj->session_id = $param1;
		
        $obj->branch_id = $this->session->userdata("branch_id");
        $page_data["session_detail"] = $this->session_m->get_session_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('masterdata/schoolsession/modal_new_session' ,$page_data);
    }

    /*** session ***/
    function session_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $page_data['page_title'] = get_phrase('session');
        $this->load->view('masterdata/schoolsession/session_list',$page_data);
    }

    /* create new session */
    function create_new_session($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["session_name"] 	= $this->input->post("session_name");
        $data["status"] 	    = empty($this->input->post("status"))?0:1;
        $data["is_lock"] 	    = empty($this->input->post("is_lock"))?0:1;
        $data["start_date"]    = $this->input->post("start_date");
        $data["end_date"]    = $this->input->post("end_date");
        //$data["copy_config_data_from"]    = $this->input->post("copy_config_data_from");


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if($crud=='new'){ // create new
            $data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
            //
            $data["session_id"] = $this->session_m->new_session($data);

        }else if($crud=='edit'){ // edit
            $data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->session_m->edit_session($data,$id);
            $data["session_id"] = $id;
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
        $obj->session_id = $param1;
        //
        $this->session_m->delete_session($obj);
    }


    public function session_data(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        // DB table to use
        $table = 'school_session where is_delete=0';
        $primaryKey	= "id";
        // indexes
        $columns = array(
            array( 'db' => 'id', 		    	'dt'	=> "id", 				'field'	=> 'id'),
            array( 'db' => 'session_name',      'dt'	=> "session_name",      'field'	=> 'session_name' ),
            array( 'db' => 'start_date',        'dt'	=> "start_date",        'field'	=> 'start_date' ),
            array( 'db' => 'end_date',   	    'dt'	=> "end_date",          'field'	=> 'end_date'  ),
            array( 'db' => 'copy_config_data_from',   	'dt'	=> "copy_config_data_from",   	'field'	=> 'copy_config_data_from'  ),
            array( 'db'	=> 'status',        	'dt'	=> "status",        	'field'	=> 'status' ),
            array( 'db'	=> 'is_lock',           'dt'	=> "is_lock",           'field'	=> 'is_lock' )
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


   /* public function room_data(){

        // DB table to use
        $table = 'room';

        // indexes
        $columns = array(
            array( 'db' => 'id', 			'dt' => 0 ),
            array( 'db' => 'session_number',  	'dt' => 1 ),
            array( 'db' => 'session_name',   	'dt' => 2 ),
            array( 'db' => 'floor',   	    'dt' => 2 ),
            array( 'db' => 'building', 	    'dt' => 2 ),
            array( 'db' => 'session_name',   	'dt' => 2 ),
            array( 'db' => 'description',    'dt' => 3 ),
            array( 'db'	=> 'status',         'dt' => 4)
        );


        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));

    }*/

} 