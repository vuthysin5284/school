<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_type extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->sys= $this->load->database('sys', TRUE);
        $this->load->library('session');
        $this->load->model("leave_type_model","leave_type_m");
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_leave_type($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["leave_type_detail"] = $this->leave_type_m->get_leave_type_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('leave/leave_type/modal_new_leave_type' ,$page_data);
    }

    function leave_type(){

		$page_data['page_name']  = 'leave_type/leave_type';
        $page_data['page_title'] = get_phrase('leave_type');
        $this->load->view('index', $page_data);
	}
    /*** employee ***/
    function leave_type_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('leave_type');
        $this->load->view('leave_type/leave_type_list',$page_data);
    }

    /* create new employee */
    function create_new_leave_type($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["code"] 	= $this->input->post("code");
        $data["name"]   = $this->input->post("name");
        $data["status"] 	= empty($this->input->post("status"))?0:1;
		


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if($crud=='new'){ // create new
			$data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
			$data['is_delete']=0;
            $data["leave_type_id"] = $this->leave_type_m->new_leave_type($data);
        }else if($crud=='edit'){ // edit
			$data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->leave_type_m->edit_leave_type($data,$id);
            $data["leave_type_id"] = $id;
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
        $this->leave_type_m->delete_leave_type($obj);
    }

    public function leave_type_data(){

        // DB table to use
        $table = 'leave_type where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 		'dt' => "id", 					'field' => 'id'),
			array('db' => 'code', 		        'dt' => "code", 		        'field' => 'code'),
			array('db' => 'name', 		        'dt' => "name", 			    'field' => 'name'),
			array('db' => 'status', 	 		'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   		'dt' => "is_delete", 			'field'	=> 'is_delete')
        );
		
		
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));




    }

} 