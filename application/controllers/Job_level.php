<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_level extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("job_level_model","job_level_m");
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_job_level($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["job_level_detail"] = $this->job_level_m->get_job_level_detail($obj);
        $page_data["crud"] = $param2;
        $this->load->view('staff/job_level/modal_new_job_level' ,$page_data);
    }

    function job_level(){

		$page_data['page_name']  = 'job_level/job_level';
        $page_data['page_title'] = get_phrase('job_level');
        $this->load->view('index', $page_data);
	}
    /*** job_level ***/
    function job_level_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('job_level');
        $this->load->view('job_level/job_level_list',$page_data);
    }

    /* create new job_level */
    function create_new_job_level($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["job_level_name"] 	= $this->input->post("job_level_name");
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
            $data["job_level_id"] = $this->job_level_m->new_job_level($data);
        }else if($crud=='edit'){ // edit
			$data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->job_level_m->edit_job_level($data,$id);
            $data["job_level_id"] = $id;
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
        $this->job_level_m->delete_job_level($obj);
    }

    public function job_level_data(){

        // DB table to use
        $table = 'job_level where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 		'dt' => "id", 					'field' => 'id'),
			array('db' => 'job_level_name', 	'dt' => "job_level_name", 		'field' => 'job_level_name'),
			array('db' => 'description', 		'dt' => "description", 			'field' => 'description'),
			array('db' => 'status', 	 		'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   		'dt' => "is_delete", 			'field'	=> 'is_delete')
        );
  echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));

    }

} 