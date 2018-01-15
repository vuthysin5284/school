<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_reason extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->sys= $this->load->database('sys', TRUE);
        $this->load->library('session');
        $this->load->model("leave_reason_model","leave_reason_m");
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_leave_reason($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["leave_reason_detail"] = $this->leave_reason_m->get_leave_reason_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('staff/leave_reason/modal_new_leave_reason' ,$page_data);
    }

    //
    function leave_reason(){
        $page_data['page_title'] = get_phrase('leave_reason');
        $this->load->view('staff/leave_reason/leave_reason', $page_data);
    }
    /*** leave_reason ***/
    function leave_reason_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('leave_reason');
        $this->load->view('leave_reason/leave_reason_list',$page_data);
    }

    /* create new leave_reason */
    function create_new_leave_reason($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["leave_reason_name"] 	= $this->input->post("leave_reason_name");
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
            $data["leave_reason_id"] = $this->leave_reason_m->new_leave_reason($data);
        }else if($crud=='edit'){ // edit
			$data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->leave_reason_m->edit_leave_reason($data,$id);
            $data["leave_reason_id"] = $id;
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
        $this->leave_reason_m->delete_leave_reason($obj);
    }

    public function get_leave_reason_data(){

        // DB table to use
        $table = 'leave_reason where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 			'dt' => "id", 						'field' => 'id'),
			array('db' => 'leave_reason_name', 		'dt' => "leave_reason_name", 		'field' => 'leave_reason_name'),
			array('db' => 'description', 			'dt' => "description", 				'field' => 'description'),
			array('db' => 'status', 	 			'dt' => "status", 					'field' => 'status'),
			array('db' => 'is_delete',   			'dt' => "is_delete", 				'field'	=> 'is_delete')
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