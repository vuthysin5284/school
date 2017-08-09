<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_list extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("employee_list_model","employee_list_m");
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_employee_list($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["employee_list_detail"] = $this->employee_list_m->get_employee_list_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('staff/employee_list/modal_new_employee_list' ,$page_data);
    }

    function employee_list(){

		$page_data['page_name']  = 'employee_list/employee_list';
        $page_data['page_title'] = get_phrase('employee_list');
        $this->load->view('index', $page_data);
	}
    /*** employee list ***/
    function employee_list1($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('employee_list');
        $this->load->view('employee_list/employee_list1',$page_data);
    }

    /* create new employee */
    function create_new_employee_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["employee_number"] 	= $this->input->post("employee_list_name");
		 $data["latin_name"] = $this->input->post("latin_name");
		 $data["khmer_name"] = $this->input->post("khmer_name");
		 $data["gender"] = $this->input->post("gender");
		 $data["position"] = $this->input->post("position");
		 $data["phone"] = $this->input->post("phone");
        $data["status"] 	= $this->input->post("status");
		


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");

        // in case id is price book id
        if($crud=='new'){ // create new
			$data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
			$data['is_delete']=0;
            $data["employee_list_id"] = $this->employee_list_m->new_employee_list($data);
        }else if($crud=='edit'){ // edit
			$data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->employee_list_m->edit_employee_list($data,$id);
            $data["employee_list_id"] = $id;
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
        $this->employee_list_m->delete_employee_list($obj);
    }

    public function employee_list_data(){

        // DB table to use
        $table = 'employee_list where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 			'dt' => "id", 						'field' => 'id'),
			array('db' => 'employee_number', 		'dt' => "employee_number", 			'field' => 'employee_number'),
			array('db' => 'latin_name', 			'dt' => "latin_name", 				'field' => 'latin_name'),
			array('db' => 'khmer_name', 			'dt' => "khmer_name", 				'field' => 'khmer_name'),
			array('db' => 'gender', 				'dt' => "gender", 					'field' => 'gender'),
			array('db' => 'position', 				'dt' => "position", 				'field' => 'position'),
			array('db' => 'phone', 					'dt' => "phone", 					'field' => 'phone'),
			array('db' => 'status', 	 			'dt' => "status", 					'field' => 'status'),
			array('db' => 'is_delete',   			'dt' => "is_delete", 				'field'	=> 'is_delete')
        );
		
		
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));




    }

} 