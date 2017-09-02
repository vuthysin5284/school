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
	
	
	function testing_record_detail_info(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
		
        $page_data['page_name']  = 'testing_register/testing_record_detail_info'; 
        $page_data['page_title'] = get_phrase('testing record detail info');
        $page_data['page_data'] = $this->db->select('*')->from('testing_register')->get()->result();
        $this->load->view('testing_register/testing_record_detail_info', $page_data);
    }

    //
    function index(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $page_data['page_name']  = 'testing_register/index';
		$page_data['page_width']  = "90";
        $page_data['page_title'] = get_phrase('testing_register');
        $this->load->view('index', $page_data);
    }


    /*
	*	$page_name		=	The name of page
	*/
	function new_record($param1 = '',$param2 = '',$param3 = '')
    {
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $obj = new stdClass();
        $obj->id = $param1;
        $page_data["record_detail"] = $this->record_m->get_record_detail($obj);
		$page_data["gender_list"] = $this->record_m->get_record_list($obj);
		$page_data["expected_class_list"] = $this->record_m->get_expected_class_list($obj);
		$page_data["academic_year_list"] = $this->record_m->get_academic_year_list($obj);
        $page_data["crud"] = $param2;
        $this->load->view('testing_register/model_new_testing_record' ,$page_data);
    }
	function testing_information(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
	//	$page_data['page_name']  = 'testing_register/testing_information';
        $page_data['page_title'] = get_phrase('testing_information');
        $this->load->view('testing_register/testing_information', $page_data);
	}
	
   function testing_register(){
       if ($this->session->userdata('is_login') != 1){
           $this->session->set_userdata('last_page', current_url());
           redirect(base_url(). 'login', 'refresh');
       }
		$page_data['page_name']  = 'testing_register/testing_record';
        $page_data['page_title'] = get_phrase('testing_register');
        $this->load->view('index', $page_data);
	}
    //testing_record_list
	function testing_record_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $page_data['page_title'] = get_phrase('testing_register');
        $this->load->view('testing_register/testing_record_list',$page_data);
    }
	
	 /* create new record */
    function create_new_record($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

		$data["testing_id"] = $this->input->post("testing_id");
		$data["latin_name"]    = $this->input->post("latin_name");
		$data["khmer_name"] = $this->input->post("khmer_name");
        $data["gender"] 	= $this->input->post("gender");
        $data["nationality"] 	    = $this->input->post("nationality");
		$data["date_of_birth"] 	    = $this->input->post("date_of_birth");
		$data["age"] 	    = $this->input->post("age");
		$data["academic_year"] 	    = $this->input->post("academic_year");
		$data["expected_class"] 	    = $this->input->post("expected_class");
		$data["address"] 	    = $this->input->post("address");
		$data["language"] 	    = $this->input->post("language");
		$data["relative_name"] 	    = $this->input->post("relative_name");
		$data["contact_number"] 	    = $this->input->post("contact_number");
		$data["relative"] 	    = $this->input->post("relative");
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
	
	function edit_testing($param1='',$param2='',$param3=''){
		
		if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
		$data["testing_id"] = $this->input->post("testing_id");
		$data["latin_name"]    = $this->input->post("latin_name");
		$data["khmer_name"] = $this->input->post("khmer_name");
        $data["gender"] 	= $this->input->post("gender");
        $data["nationality"] 	    = $this->input->post("nationality");
		$data["date_of_birth"] 	    = $this->input->post("date_of_birth");
		$data["age"] 	    = $this->input->post("age");
		$data["academic_year"] 	    = $this->input->post("academic_year");
		$data["expected_class"] 	    = $this->input->post("expected_class");
		$data["address"] 	    = $this->input->post("address");
		$data["language"] 	    = $this->input->post("language");
		$data["relative_name"] 	    = $this->input->post("relative_name");
		$data["contact_number"] 	    = $this->input->post("contact_number");
		$data["relative"] 	    = $this->input->post("relative");
        $data["status"] 	    = empty($this->input->post("status"))?0:1;
       


        // got value hidden file for reference id price book
        $id = empty($this->input->post("pb_hidden_id"))?0:$this->input->post("pb_hidden_id");
        $crud = $this->input->post("pb_crud_id");
		
		if($crud=='edit'){ // edit
            $data["modified_by"]    = $this->session->userdata("user_id");
            $data["modified_date"]  = date('Y-m-d h:s:i');
            //
            $this->record_m->edit_record($data,$id);
            $data["id"] = $id;
            
        }
		
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
			array( 'db' => 'testing_id',   'dt'	=> "testing_id", 	'field'	=> 'testing_id' ),
			array( 'db' => 'latin_name',     'dt'	=> "latin_name",     'field'	=> 'latin_name' ),
            array( 'db' => 'khmer_name',     'dt'	=> "khmer_name",     'field'	=> 'khmer_name' ),
			
     		array( 'db' => 'gender',   'dt'	=> "gender", 	'field'	=> 'gender' ),
			array( 'db' => 'nationality',   'dt'	=> "nationality", 	'field'	=> 'nationality' ),
			array( 'db' => 'date_of_birth',   'dt'	=> "date_of_birth", 	'field'	=> 'date_of_birth' ),
			array( 'db' => 'age',   'dt'	=> "age", 	'field'	=> 'age' ),
			array( 'db' => 'academic_year',   'dt'	=> "academic_year", 	'field'	=> 'academic_year' ),
			array( 'db' => 'expected_class',   'dt'	=> "expected_class", 	'field'	=> 'expected_class' ),
			array( 'db' => 'address',   'dt'	=> "address", 	'field'	=> 'addess' ),
			array( 'db' => 'language',   'dt'	=> "language", 	'field'	=> 'language' ),
			array( 'db' => 'relative_name',   'dt'	=> "relative_name", 	'field'	=> 'relative_name' ),
			array( 'db' => 'contact_number',   'dt'	=> "contact_number", 	'field'	=> 'contact_number' ),
			array( 'db' => 'relative',   'dt'	=> "relative", 	'field'	=> 'relative' ),
			
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
	
	function student_information(){
		if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
		
        $page_data['page_title'] = get_phrase('student_information');
        $this->load->view('testing_register/student_information', $page_data);
    }
	
	function expected_class(){
		if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
		
        $page_data['page_title'] = get_phrase('expected_class');
        $this->load->view('testing_register/expected_class', $page_data);
    }

} 