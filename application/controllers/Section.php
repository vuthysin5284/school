<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("section_model","section_m");
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_section($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["section_detail"] = $this->section_m->get_section_detail($obj);
		$page_data["department_list"] = $this->section_m->get_department_list($obj);
        $page_data["crud"] = $param2;
        $this->load->view('staff/section/modal_new_section' ,$page_data);
    }

    function section(){

		$page_data['page_name']  = 'section/section';
        $page_data['page_title'] = get_phrase('section');
        $this->load->view('index', $page_data);
	}
    /*** section ***/
    function section_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('section');
        $this->load->view('section/section_list',$page_data);
    }

    /* create new section */
    function create_new_section($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $data["section_name"] 	= $this->input->post("section_name");
        $data["department_name"] 	= $this->input->post("department_name");
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
        $obj->id = $param1;
        //
        $this->section_m->delete_section($obj);
    }

    public function section_data(){

        // DB table to use
        $table = 'section where is_delete=0';
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'id', 		 			'dt' => "id", 					'field' => 'id'),
			array('db' => 'section_name', 			'dt' => "section_name", 		'field' => 'section_name'),
			array('db' => 'department_name', 		'dt' => "department_name", 		'field' => 'department_name'),
			array('db' => 'description', 			'dt' => "description", 			'field' => 'description'),
			array('db' => 'status', 	 			'dt' => "status", 				'field' => 'status'),
			array('db' => 'is_delete',   			'dt' => "is_delete", 			'field'	=> 'is_delete')
        );
		
		
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));




    }

} 