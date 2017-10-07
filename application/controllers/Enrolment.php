<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enrolment extends CI_Controller {
 
	function __construct()
	{
		parent::__construct();
		$this->db= $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("Enrolment_model","enrolment_m");
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
            $page_data["enrolment_detail"] = $this->enrolment_m->get_enrolment_general($obj);
        }
        $page_data["id"] = $param1;
        $page_data["crud"] = $param2;
        $this->load->view('student/enrolment/modal_new_enrolment' ,$page_data);
    }
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

    // create enrolment general
    function create_enrolment_general($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $enrolment_id=0;
        $obj = new stdClass();
        // got value hidden file for reference id price book
        $crud = $this->input->post("pb_crud_id");

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
        $data["year"]          = $this->input->post("former_school_year");
        $data["is_waiting_testing"]  = $this->input->post("chIsTestNext")=='on'?1:0;
        $data["testing_id"]     = $this->input->post("testing_id");

        if($crud=='new'){ // create new
            $data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
            $data['is_delete']=0;
            // insert general
            $enrolment_id = $this->enrolment_m->insertGeneralEnroll($data);
        }else if($crud=='edit'){ // edit
            $enrolment_id     = $this->input->post("enrolment_id");
            $data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            //insertGeneralEnroll
            $this->enrolment_m->editGeneralEnroll($data,$enrolment_id);
            $data["enrolment_id"] = $enrolment_id;
        }
        echo json_encode(array("enrolment_id"=>$enrolment_id));

    }

    // create enrolment parent
    function create_enrolment_parent($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $id = empty($this->input->post("enrolment_id"))?0:$this->input->post("enrolment_id");
        $crud = $this->input->post("pb_crud_id");

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

        $parent_id       = $this->input->post("parent_id");

        if($crud=='new'){ // create new
            $data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
            // insert parent
            $parent_id =$this->enrolment_m->insertParentEnroll($data);
            //
            $this->enrolment_m->editEnroll($parent_id,$id);
        }else if($crud=='edit'){ // edit
            $data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            if($parent_id==''){
                // insert parent
                $parent_id =$this->enrolment_m->insertParentEnroll($data);
                //
                $this->enrolment_m->editEnroll($parent_id,$id);
            }else {
                //
                $this->enrolment_m->editParentEnroll($data, $parent_id);
            }
        }
        echo json_encode(array("data"=>$data));

    }
    // create enrolment responsible
    function create_enrolment_responsible($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $id = empty($this->input->post("enrolment_id"))?0:$this->input->post("enrolment_id");
        $crud = $this->input->post("pb_crud_id");

        $data["father_name_kh"] = $this->input->post("responsibility_kh");
        $data["father_name_en"] = $this->input->post("responsibility_en");
        $data["f_occupation"]   = $this->input->post("occupation");
        $data["f_number"]       = $this->input->post("phone_number");
        //

        $data["address"]        = $this->input->post("address");
        $data["address1"]       = $this->input->post("address1");
        $data["address2"]       = $this->input->post("address2");
        $data["address3"]       = $this->input->post("address3");
        $data["address4"]       = $this->input->post("address4");
        $data["type"]           = 1; // responsible


        $parent_id       = $this->input->post("responsible_id");
        if($crud=='new'){ // create new
            $data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
            // insert parent
            $parent_id =$this->enrolment_m->insertParentEnroll($data);
            //
            $this->enrolment_m->editEnroll($parent_id,$id);
        }else if($crud=='edit'){ // edit
            $data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            if($parent_id==''){
                // insert parent
                $parent_id =$this->enrolment_m->insertParentEnroll($data);
                //
                $this->enrolment_m->editEnroll($parent_id,$id);
            }else {
                //
                $this->enrolment_m->editParentEnroll($data, $parent_id);
            }
        }
        echo json_encode(array("data"=>$data));

    }
    // new assign class
    function new_assign_class($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $student_id = empty($this->input->post("enrolment_id"))?0:$this->input->post("enrolment_id");
        $crud = $this->input->post("pb_crud_id");

        $data["student_id"] = empty($this->input->post("enrolment_id"))?0:$this->input->post("enrolment_id");
        $data["grade_id"] = $this->input->post("grade");
        $data["language"] = implode(',', $this->input->post("subject"));
        $data["letter_id"]   = $this->input->post("letter");


        $assign_id  = $this->input->post("assign_class_id");
        if($crud=='new'){ // create new
            $data["created_by"] 	= $this->session->userdata("user_id");
            $data["created_date"] 	= date('Y-m-d h:s:i');
            // insert parent
            $parent_id =$this->enrolment_m->insertAssignClassEnroll($data);
        }else if($crud=='edit'){ // edit
            $data["modified_by"] 	= $this->session->userdata("user_id");
            $data["modified_date"] 	= date('Y-m-d h:s:i');
            if($assign_id==''){
                $data["created_by"] 	= $this->session->userdata("user_id");
                $data["created_date"] 	= date('Y-m-d h:s:i');
                // insert parent
                $parent_id =$this->enrolment_m->insertAssignClassEnroll($data);
            }else {
                //
                $this->enrolment_m->editAssignClassEnroll($data, $assign_id);
            }
        }
        echo json_encode(array("data"=>$data));

    }
    // get data list
    public function enrolment_data(){

        // DB table to use
        $table = 'enrolment where is_delete=0';                                                             // Field
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