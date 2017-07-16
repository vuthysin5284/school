<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_location extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("employee_location_model","employee_location_m");
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_employee_location($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["employee_location_detail"] = $this->employee_location_m->get_employee_location_detail($obj);
		$page_data["main_station_list"] = $this->employee_location_m->get_main_station_list($obj);
        $page_data["crud"] = $param2;
        $this->load->view('staff/employee_location/modal_new_employee_location' ,$page_data);
    }

    function employee_location(){

		$page_data['page_name']  = 'employee_location/employee_location';
        $page_data['page_title'] = get_phrase('employee_location');
        $this->load->view('index', $page_data);
	}
    /*** section ***/
    function main_employee_location_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('employee_location');
        $this->load->view('employee_location/employee_location_list',$page_data);
    }

    /* create new employee_location */
    function create_new_employee_location($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
		
		$data["employee_location"] 	= $this->input->post("employee_location");
        $data["main_station"] 	= $this->input->post("main_station");
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
            $data["employee_location_id"] = $this->employee_location_m->new_employee_location($data);
        }else if($crud=='edit'){ // edit
			$data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->employee_location_m->edit_employee_location($data,$id);
            $data["employee_location_id"] = $id;
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
        $this->employee_location_m->delete_employee_location($obj);
    }

    public function employee_location_data(){

        // DB table to use
        $table = 'employee_location where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 			'dt' => "id", 					'field' => 'id'),
			array('db' => 'employee_location', 		'dt' => "employee_location", 	'field' => 'employee_location'),
			array('db' => 'main_station', 			'dt' => "main_station", 		'field' => 'main_station'),
			array('db' => 'description', 			'dt' => "description", 			'field' => 'description'),
			array('db' => 'status', 	 			'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   			'dt' => "is_delete", 			'field'	=> 'is_delete')
        );
		
		
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));




    }

} 