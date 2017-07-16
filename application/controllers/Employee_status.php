<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_status extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("employee_status_model","employee_status_m");
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_employee_status($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["employee_status_detail"] = $this->employee_status_m->get_employee_status_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('staff/employee_status/modal_new_employee_status' ,$page_data);
    }

    function employee_status(){

		$page_data['page_name']  = 'employee_status/employee_status';
        $page_data['page_title'] = get_phrase('employee_status');
        $this->load->view('index', $page_data);
	}
    /*** employee ***/
    function employee_status_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('employee_status');
        $this->load->view('employee_status/employee_status_list',$page_data);
    }

    /* create new employee */
    function create_new_employee_status($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["employee_status_name"] 	= $this->input->post("employee_status_name");
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
            $data["employee_status_id"] = $this->employee_status_m->new_employee_status($data);
        }else if($crud=='edit'){ // edit
			$data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->employee_status_m->edit_employee_status($data,$id);
            $data["employee_status_id"] = $id;
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
        $this->employee_status_m->delete_employee_status($obj);
    }

    public function employee_status_data(){

        // DB table to use
        $table = 'employee_status where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 			'dt' => "id", 						'field' => 'id'),
			array('db' => 'employee_status_name', 	'dt' => "employee_status_name", 	'field' => 'employee_status_name'),
			array('db' => 'description', 			'dt' => "description", 				'field' => 'description'),
			array('db' => 'status', 	 			'dt' => "status", 					'field' => 'status'),
			array('db' => 'is_delete',   			'dt' => "is_delete", 				'field'	=> 'is_delete')
        );
		
		
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));




    }

} 