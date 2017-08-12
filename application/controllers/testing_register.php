<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing_register extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("Testing_record_model","record_m");
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
	
	function load_ajax(){
		$page_data ['id'] = $this->input->post('id');
		$this->db->select('*')->from('testing_register')->where('id',$this->input->post('id'));
		$page_data['student_test'] = $this->db->get()->result();
        $this->load->view('testing_register/testing_information',$page_data);
    }

    //
    function index(){
        $page_data['page_name']  = 'testing_register/index';
        $page_data['page_width']  = 40;
        $page_data['page_title'] = get_phrase('testing_register');
        $this->load->view('index', $page_data);
    }


    /*
	*	$page_name		=	The name of page
	*/
	function new_record($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["record_detail"] = $this->record_m->get_record_detail($obj);
		$page_data["gender_list"] = $this->record_m->get_record_list($obj);
        $page_data["crud"] = $param2;
        $this->load->view('testing_register/model_new_testing_record' ,$page_data);
    }
	function testing_information(){
	//	$page_data['page_name']  = 'testing_register/testing_information';
        $page_data['page_title'] = get_phrase('testing_information');
        $this->load->view('testing_register/testing_information', $page_data);
	}
	
   function testing_register(){
		$page_data['page_name']  = 'testing_register/testing_record';
        $page_data['page_title'] = get_phrase('testing_register');
        $this->load->view('index', $page_data);
	}
    //testing_record_list
	function testing_record_list($param1='',$param2='',$param3=''){
        $page_data['page_title'] = get_phrase('testing_register');
        $this->load->view('testing_register/testing_record_list',$page_data);
    }
	
	 /* create new record */
    function create_new_record($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

		$data["student_name"] = $this->input->post("student_name");
		$data["middle_name"]    = $this->input->post("middle_name");
        $data["gender_id"] 	= $this->input->post("gender_id");
        $data["nationality"] 	    = $this->input->post("nationality");
		$data["date_of_birth"] 	    = $this->input->post("date_of_birth");
		$data["address"] 	    = $this->input->post("address");
		$data["test_id"] 	    = $this->input->post("test_id");
        $data["status"] 	    = empty($this->input->post("status"))?0:1;
       


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");
	
        // in case id is price book id
        if($crud=='new'){ // create new
            $data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
            //
            $data["id"] = $this->record_m->new_record($data);

        }else if($crud=='edit'){ // edit
            $data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //
            $this->record_m->edit_record($data,$id);
            $data["id"] = $id;
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
        $this->record_m->delete_record($obj);
    }
	
	
	
	public function record_data(){
        // DB table to use
        $table = 'testing_register where is_delete = 0';
        $primaryKey	= "id";
        // indexes
        $columns = array(
            array( 'db' => 'id', 		    'dt'	=> "id", 			'field'	=> 'id'),
            array( 'db' => 'student_name',     'dt'	=> "student_name",     'field'	=> 'student_name' ),
			array( 'db' => 'middle_name',     'dt'	=> "middle_name",     'field'	=> 'middle_name' ),
     		array( 'db' => 'gender_id',   'dt'	=> "gender_id", 	'field'	=> 'gender_id' ),
			array( 'db' => 'nationality',   'dt'	=> "nationality", 	'field'	=> 'nationality' ),
			array( 'db' => 'date_of_birth',   'dt'	=> "date_of_birth", 	'field'	=> 'date_of_birth' ),
			array( 'db' => 'address',   'dt'	=> "address", 	'field'	=> 'address' ),
			array( 'db' => 'test_id',   'dt'	=> "test_id", 	'field'	=> 'test_id' ),
            array( 'db'	=> 'status',        'dt'	=> "status",        'field'	=> 'status' ),
            array( 'db'	=> 'is_delete',        'dt'	=> "is_delete",        'field'	=> 'is_delete' )
        );

        $sql_details	= array(
            'user'	=> $this->db->username,
            'pass'	=> $this->db->password,
            'port'	=> $this->db->port,
            'db'	=> $this->db->database,
            'host'	=> $this->db->hostname
        );

        $this->load->model('datatable');
        echo json_encode(Datatable::simple($_POST, $sql_details,$table,$primaryKey, $columns));

    } 

} 