<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_station extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->sys= $this->load->database('sys', TRUE);
        $this->load->library('session');
        $this->load->model("main_station_model","main_station_m");
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_main_station($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["main_station_detail"] = $this->main_station_m->get_main_station_detail($obj);
		$page_data["section_list"] = $this->main_station_m->get_section_list($obj);
        $page_data["crud"] = $param2;
        $this->load->view('staff/main_station/modal_new_main_station' ,$page_data);
    }
    //
    function main_station(){
        $page_data['page_title'] = get_phrase('main_station');
        $this->load->view('staff/main_station/main_station', $page_data);
    }
    /*** section ***/
    function main_station_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('main_station');
        $this->load->view('main_station/main_station_list',$page_data);
    }

    /* create new section */
    function create_new_main_station($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["main_station"] 	= $this->input->post("main_station");
        $data["section_name"] 	= $this->input->post("section_name");
        $data["status"] 	= empty($this->input->post("status"))?0:1;
        $data["description"] = $this->input->post("description");
		


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if($crud=='new'){ // create new
			$data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
			$data['is_delete']=0;
            $data["main_station_id"] = $this->main_station_m->new_main_station($data);
        }else if($crud=='edit'){ // edit
			$data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->main_station_m->edit_main_station($data,$id);
            $data["main_station_id"] = $id;
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
        $obj->id = $param1;
        //
        $this->main_station_m->delete_main_station($obj);
    }

    public function get_main_station_data(){

        // DB table to use
        $table = 'main_station where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 			'dt' => "id", 					'field' => 'id'),
			array('db' => 'main_station', 			'dt' => "main_station", 		'field' => 'main_station'),
			array('db' => 'section_name', 			'dt' => "section_name", 		'field' => 'section_name'),
			array('db' => 'description', 			'dt' => "description", 			'field' => 'description'),
			array('db' => 'status', 	 			'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   			'dt' => "is_delete", 			'field'	=> 'is_delete')
        );


        $sql_details = array(
            'user' => $this->sys->username,
            'pass' => $this->sys->password,
            'port' => $this->sys->port,
            'db' => $this->sys->database,
            'host' => $this->sys->hostname
        );
        $this->load->model('datatable');
        echo json_encode(Datatable::simple($_POST, $sql_details, $table, $primaryKey, $columns));


    }

} 