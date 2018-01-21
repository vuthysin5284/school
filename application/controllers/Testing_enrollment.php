<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing_enrollment extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        //$this->sli= $this->load->database('sli', TRUE);
        $this->load->library('session');
        $this->load->model("Testing_record_model","record_m");
        $this->load->model("Common_model","com_m");
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
	
	// new/edit testing enrollment
	function new_testing_enrollment($param1 = '',$param2 = '',$param3 = ''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $obj = new stdClass();
        $obj->id = $param1;
        if($param2=='edit'){
            //$page_data["testing_detail"] = $this->enrolment_m->get_enrolment_general($obj);
        }
        $page_data["id"] = $param1;
        $page_data["crud"] = $param2;

        $page_data['page_title'] = get_phrase('new_testing_enrollment');
        $this->load->view('student/testing_enrollment/modal_new_testing', $page_data);
    }

    //
    function index(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        /*$i=1;
        $n=0;
        $d=200;
        for($i==1; $n<= $d; $i++){
            $data["testing_id"] =$i;
            $data["session_id"] =$i;
            $data["expected_class_id"] =$i;
            $data["khmer_name"] =$i;
            $data["latin_name"] =$i;
            $data["gender_id"] =$i;
            $data["nationality"] =$i;
            $data["is_base_on_result"] =$i;
            $this->sli->insert("testing_enrollment",$data);
        }*/

        //$page_data['result'] = $this->sli->query("select count(*) from testing_enrollment")->result();

        $page_data['page_name']  = 'student/testing_enrollment/index';
        $page_data['page_width']  = "70";
        $page_data['page_main'] = get_phrase('academic');
        $page_data['page_title'] = get_phrase('testing_enrollment');
        $this->load->view('index', $page_data);

    }

    /* register for testing
     *
     * */
	function waiting_register(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('waiting_register');
        $this->load->view('student/testing_enrollment/waiting_register', $page_data);
	}
	/* testing_result
	 * */
    function testing_result(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('testing_result');
        $this->load->view('student/testing_enrollment/testing_result', $page_data);
    }
    /* fee_management
     * */
    function fee_management(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('fee_management');
        $this->load->view('student/testing_enrollment/fee_management', $page_data);
    }

    /* testing_enrollment
     * */
   function testing_enrollment(){
       if ($this->session->userdata('is_login') != 1){
           $this->session->set_userdata('last_page', current_url());
           redirect(base_url(). 'login', 'refresh');
       }
		$page_data['page_name']  = 'student/testing_enrollment/testing_record';
        $page_data['page_title'] = get_phrase('Testing_enrollment');
        $this->load->view('index', $page_data);
	}
    //testing_record_list
	function testing_record_list($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $page_data['page_title'] = get_phrase('Testing_enrollment');
        $this->load->view('student/testing_enrollment/testing_record_list',$page_data);
    }
    //testing report
    function testing_report($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $page_data['page_title'] = get_phrase('testing_report');
        $this->load->view('student/testing_enrollment/testing_report',$page_data);
    }
	
	 /* create new record */
    function create_new_record($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

		$data["latin_name"]     = $this->input->post("latin_name");
		$data["khmer_name"]     = $this->input->post("khmer_name");
        $data["gender_id"] 	    = $this->input->post("gender_id");
        $data["nationality"] 	= $this->input->post("nationality");
		$data["dob"] 	= $this->input->post("date_of_birth");
		$data["age"] 	        = $this->input->post("age");
		$data["session_id"] 	= $this->input->post("session_id");
		$data["expected_class_id"] = $this->input->post("expected_class_id");
        $data["is_base_on_result"]  = empty($this->input->post("is_base_on_result"))?0:1;


        // got value hidden file for reference id price book
        $id = empty($this->input->post("testing_enrol_id"))?0:$this->input->post("testing_enrol_id");
        $crud = $this->input->post("pb_crud_id");
	
        // in case id is price book id
        if($crud=='new'){ // create new
            $data["testing_id"]     = rand(5, 15);
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
        $table = 'testing_enrol_view where status = 1';
        $primaryKey	= "id";
        // indexes
        $columns = array(
            array( 'db' => 'id', 		    'dt'	=> "id", 			'field'	=> 'id'),
			array( 'db' => 'testing_id',    'dt'	=> "testing_id", 	'field'	=> 'testing_id' ),
			array( 'db' => 'latin_name',    'dt'	=> "latin_name",    'field'	=> 'latin_name' ),
            array( 'db' => 'khmer_name',    'dt'	=> "khmer_name",    'field'	=> 'khmer_name' ),
			
     		array( 'db' => 'gender_name',   'dt'	=> "gender_name", 	'field'	=> 'gender_name' ),
			array( 'db' => 'nationality',   'dt'	=> "nationality", 	'field'	=> 'nationality' ),
			array( 'db' => 'dob',           'dt'	=> "dob",           'field'	=> 'dob' ),
			array( 'db' => 'age',           'dt'	=> "age", 	        'field'	=> 'age' ),
			array( 'db' => 'session_name',  'dt'	=> "session_name",    'field'	=> 'session_name' ),
			array( 'db' => 'classes_name',  'dt'	=> "classes_name",'field'	=> 'classes_name' ),

            array( 'db'	=> 'status',        'dt'	=> "status",        'field'	=> 'status' ),
            array( 'db'	=> 'is_delete',     'dt'	=> "is_delete",     'field'	=> 'is_delete' )
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


    // general
	function testing_general($param1='',$param2='',$param3=''){
		if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
        $obj = new stdClass();
        $obj->id = $param1;
        // checking for edit and load data of enroll general
        if ($param2 == 'edit') {
            $page_data['general_data'] = $this->record_m->get_testing_general($obj);
        }

        $page_data["gender_list"] = $this->com_m->get_gender_list();
        $page_data["session_list"] = $this->com_m->get_session_list();
        $page_data["expected_class_list"] = $this->com_m->get_expected_class_list();

        $page_data['page_title'] = get_phrase('testing_general');
        $this->load->view('student/testing_enrollment/testing_general', $page_data);
    }

    // expected class
    function expected_class(){
		if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }
		
        $page_data['page_title'] = get_phrase('expected_class');
        $this->load->view('student/testing_enrollment/expected_class', $page_data);
    }
    // study record
    function study_record(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('study_record');
        $this->load->view('student/testing_enrollment/study_record', $page_data);
    }
    // relative
    function relative(){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $page_data['page_title'] = get_phrase('relative');
        $this->load->view('student/testing_enrollment/relative', $page_data);
    }

} 