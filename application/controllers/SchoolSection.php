<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SchoolSection extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->sys= $this->load->database('sys', TRUE);
        $this->load->library('session');
        $this->load->model("SchoolSection_model","section_m");
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_section($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $obj = new stdClass();
        $obj->section_id = $param1;
		
        $obj->branch_id = $this->session->userdata("branch_id");
        $page_data["session_list"] = $this->section_m->get_session_list($obj);
        $page_data["class_list"] = $this->section_m->get_class_list($obj);
        $page_data["section_detail"] = $this->section_m->get_section_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('masterdata/schoolsection/modal_new_section' ,$page_data);
    }

    /*** section ***/
    function section_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $page_data['page_title'] = get_phrase('section');
        $this->load->view('masterdata/schoolsection/section_list',$page_data);
    }

    /* create new section */
    function create_new_section($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["session_id"] 	= $this->input->post("session_id");
        $data["class_id"] 	    = $this->input->post("class_id");
        $data["section_name"] 	    =  $this->input->post("section_name");
        $data["max_strength"]    = $this->input->post("max_strength");
        $data["status"] 	    = empty($this->input->post("status"))?0:1;


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if($crud=='new'){ // create new
            $data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
            //
            $data["section_id"] = $this->section_m->new_section($data);

        }else if($crud=='edit'){ // edit
            $data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->section_m->edit_section($data,$id);
            $data["section_id"] = $id;
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
        $obj->section_id = $param1;
        //
        $this->section_m->delete_section($obj);
    }


    public function section_data(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        // DB table to use
        $table = 'section_view';
        $primaryKey	= "id";
        // indexes
        $columns = array(
            array( 'db' => 'id', 		    	'dt'	=> "id", 				'field'	=> 'id'),
            array( 'db' => 'session_name',    'dt'	=> "session_name", 	'field'	=> 'session_name' ),
            array( 'db' => 'classes_name',      'dt'	=> "classes_name",      'field'	=> 'classes_name' ),

            array( 'db' => 'section_name',   	'dt'	=> "section_name",      'field'	=> 'section_name'  ),
            array( 'db'	=> 'status',        	'dt'	=> "status",        	'field'	=> 'status' ),
            array( 'db'	=> 'is_delete',        	'dt'	=> "is_delete",        	'field'	=> 'is_delete' ),
            array( 'db'	=> 'max_strength',         'dt'	=> "max_strength",         'field'	=> 'max_strength' )
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