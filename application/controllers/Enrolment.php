<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enrolment extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
        $this->db= $this->load->database('default', TRUE);
        $this->sys= $this->load->database('sys', TRUE);
        $this->load->library('session');
        $this->load->model("Enrolment_model","enrolment_m");
        $this->load->model("Common_model","com_m");
        $this->load->model('datatable_model');
		
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		
    }
    /*
	*	$page_name		=	The name of page
	*/
    function new_enrolment($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        if($param2=='edit'){
            //$page_data["enrolment_detail"] = $this->enrolment_m->get_enrolment_general($obj);
            $page_data['general_data'] = $this->enrolment_m->get_enrolment_general($obj);
            $page_data['parent_data'] = $this->enrolment_m->get_enrolment_parent($obj,2);
            $page_data['res_data'] = $this->enrolment_m->get_enrolment_response($obj,1);
            $page_data['ass_data'] = $this->enrolment_m->get_enrolment_assign_class($obj);

        }
        // assign class
        $page_data["grade_list"] = $this->com_m->grade_list();
        $page_data["subject_data"] = $this->com_m->subject_data($obj);
        //$page_data["assigned_subject"] = $this->com_m->assigned_subject_data($obj);
        $page_data["letter_data"] = $this->com_m->letter_data();

        // general
        $page_data["gender_list"] = $this->com_m->get_gender_list();
        $page_data["section_list"] = $this->com_m->get_section_list();
        $page_data["time_study"] = $this->com_m->get_timestudy_list();
        $page_data["child_number"] = $this->com_m->get_child_list();

        $page_data["id"] = $param1;
        $page_data["crud"] = $param2;
        $this->load->view('student/enrolment/modal_new_enrolment' ,$page_data);
    }

    //
    function create_new_enrolment($param1 = '',$param2 = '',$param3 = ''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        // got value hidden file for reference id price book
        $crud = $this->input->post("pb_crud_id");
        $enrolment_id     = $this->input->post("enrolment_id");
        //insert general
        $enrolment_id= self::create_enrolment_general($crud,$enrolment_id);
        // insert parent
        self::create_enrolment_parent($crud,$enrolment_id);
        self::create_enrolment_responsible($crud,$enrolment_id);
        self::new_assign_class($crud,$enrolment_id);

        echo json_encode(array("data"=>$enrolment_id));
    }

    // create enrolment general
    function create_enrolment_general($crud,$enrolment_id){
        $obj = new stdClass();

        $data["khmer_name"]     = $this->input->post("st_khmer_name");
        $data["middle_name"]    = $this->input->post("st_middle_name");
        $data["latin_name"]     = $this->input->post("st_latin_name");

        //
        $data["dob"]            = $this->input->post("txtdob_yy").'/'.$this->input->post("txtdob_mm").'/'.$this->input->post("txtdob_dd");
        $data["gender_id"]      = $this->input->post("gender");
        $data["academic_id"]    = $this->input->post("academic_year");
        $data["time_study_id"]  = $this->input->post("time_study");
        $data["children_number"]= $this->input->post("children_number");
        $data["former_school"]  = $this->input->post("former_school");
        $data["year"]           = $this->input->post("former_school_year");
        $data["is_waiting_testing"]  = $this->input->post("chIsTestNext")=='on'?1:0;
        $data["testing_id"]     = $this->input->post("testing_id");
        $data["branch_id"]      = $this->session->userdata("branch_id");
        $data["session_id"]      = $this->sys->get_where("school_session",array('session_name'=>$this->input->post('session_name')))->row()->id;

        $data["section_id"]      = $this->input->post("section");

        if($crud=='new'){ // create new
            $data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
            $data['is_delete']=0;

            // get id from table next id
            $data['code']=$this->com_m->nextid('enroll_code')["enroll_code"];
            // insert general
            $enrolment_id = $this->enrolment_m->insertGeneralEnroll($data);
        }else if($crud=='edit'){ // edit

            $data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //insertGeneralEnroll
            $this->enrolment_m->editGeneralEnroll($data,$enrolment_id);
        }

        return $enrolment_id;
    }

    // create enrolment parent
    function create_enrolment_parent($crud,$enrolment_id){

        $data["father_name_kh"] = $this->input->post("father_name_kh");
        $data["father_name_en"] = $this->input->post("father_name_en");
        $data["f_occupation"]= $this->input->post("occupation");
        $data["f_number"]       = $this->input->post("phone_number");
        //

        $data["mother_name_kh"] = $this->input->post("mother_name_kh");
        $data["mother_name_en"] = $this->input->post("mother_name_en");
        $data["m_occupation"]   = $this->input->post("occupation_m");
        $data["m_number"]       = $this->input->post("phone_number_m");

        $data["address"]        = $this->input->post("address");
        $data["address1"]       = $this->input->post("address1");
        $data["address2"]       = $this->input->post("address2");
        $data["address3"]       = $this->input->post("address3");
        $data["address4"]       = $this->input->post("address4");
        $data["type"]           = 2; // parent
        $data["branch_id"]      = $this->session->userdata("branch_id");

        $parent_id       = $this->input->post("parent_id");

        if($crud=='new'){ // create new
            $data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
            // insert parent
            $parent_id =$this->enrolment_m->insertParentEnroll($data);
            //
            $this->enrolment_m->editEnroll($parent_id,$enrolment_id);
        }else if($crud=='edit'){ // edit
            $data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            if($parent_id==''){
                // insert parent
                $parent_id =$this->enrolment_m->insertParentEnroll($data);
                //
                $this->enrolment_m->editEnroll($parent_id,$enrolment_id);
            }else {
                //
                $this->enrolment_m->editParentEnroll($data, $parent_id);
            }
        }
    }
    // create enrolment responsible
    function create_enrolment_responsible($crud,$enrolment_id){

        $data["father_name_kh"] = $this->input->post("responsibility_kh");
        $data["father_name_en"] = $this->input->post("responsibility_en");
        $data["f_occupation"]   = $this->input->post("resp_occupation");
        $data["f_number"]       = $this->input->post("resp_phone_number");
        //

        $data["address"]        = $this->input->post("resp_address");
        $data["address1"]       = $this->input->post("resp_address1");
        $data["address2"]       = $this->input->post("resp_address2");
        $data["address3"]       = $this->input->post("resp_address3");
        $data["address4"]       = $this->input->post("resp_address4");
        $data["type"]           = 1; // responsible
        $data["branch_id"]      = $this->session->userdata("branch_id");


        $parent_id       = $this->input->post("responsible_id");
        if($crud=='new'){ // create new
            $data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
            // insert parent
            $parent_id =$this->enrolment_m->insertParentEnroll($data);
            //
            $this->enrolment_m->editEnrollResponse($parent_id,$enrolment_id);
        }else if($crud=='edit'){ // edit
            $data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            if(empty($parent_id)){
                // insert parent
                $parent_id =$this->enrolment_m->insertParentEnroll($data);
                //
                $this->enrolment_m->editEnrollResponse($parent_id,$enrolment_id);
            }else {
                //
                $this->enrolment_m->editParentEnroll($data, $parent_id);
            }
        }
    }
    // new assign class
    function new_assign_class($crud,$enrolment_id){

        $data["student_id"]     = $enrolment_id;
        $data["grade_id"]       = $this->input->post("grade");
        $data["language"]       = implode(',', $this->input->post("assign_subject"));
        $data["letter_id"]      = $this->input->post("letter");


        $assign_id  = $this->input->post("assign_class_id");
        if($crud=='new'){ // create new
            $data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
            // insert parent
            $this->enrolment_m->insertAssignClassEnroll($data);
        }else if($crud=='edit'){ // edit
            $data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            if($assign_id==''){
                $data["created_by"] 	= $this->session->userdata("user_id");
                $data["created_date"] 	= date('Y-m-d h:s:i');
                // insert parent
                $this->enrolment_m->insertAssignClassEnroll($data);
            }else {
                //
                $this->enrolment_m->editAssignClassEnroll($data, $assign_id);
            }
        }

    }

    //
    function admin_enrolment($param1 = '',$param2 = '',$param3 = '')
    {
        $obj = new stdClass();
        $obj->id = $param1;
        if($param2=='edit'){
            $page_data["enrolment_detail"] = $this->enrolment_m->get_enrolment_general($obj);
        }
        $page_data["id"] = $param1;
        $page_data["crud"] = $param2;
        $this->load->view('student/admin/modal_admin_enrolment' ,$page_data);
    }
    //
    function delete($param1 = '',$param2 = '',$param3 = ''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;
        //
        $this->enrolment_m->delete_enrol($obj);
    }
    // new student upload
    function new_student_upload($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $student_id = empty($this->input->post("enrolment_id"))?0:$this->input->post("enrolment_id");
        move_uploaded_file($_FILES['student_image']['tmp_name'], 'C:/wamp/www/school/uploads/student_image/' . $student_id . '.jpg');

    }
    // get data list
    public function enrolment_data(){

        // DB table to use
        $table = 'enrolment ';                                                             // Field
		$primaryKey = "id";
        // indexes
        $columns = array(
			array('db' => 'name', 		 		'dt' => "name", 				'field' => 'name'),
			array('db' => 'email', 		        'dt' => "email", 		        'field' => 'email'),
			array('db' => 'address', 		    'dt' => "address", 			    'field' => 'address'),
            array('db' => 'status',             'dt' => "status",               'field' => 'status'),
			array('db' => 'is_delete',   		'dt' => "is_delete", 			'field'	=> 'is_delete')
        );
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
    }

} 