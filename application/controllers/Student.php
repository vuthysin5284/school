<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database('default', TRUE);
        $this->load->library('session');
        $this->load->model("Enrolment_model","enrolment_m");

        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }

    function index(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $page_data['page_width']  = "70";
        $page_data['page_name']  = 'student/index';

        $page_data['page_main'] = get_phrase('academic');
        $page_data['page_title'] = get_phrase('enrolment_management');//enrolment/enrolment_list
        $this->load->view('index', $page_data);

    }

    function profile($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $page_data['page_main'] = get_phrase('academic');
        $page_data['page_name']  = 'student/profile/profile';
        $page_data['page_title'] = get_phrase('profile');
        $this->load->view('index', $page_data);
    }

    function enrolment($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        $page_data['page_title'] = get_phrase('enrolment');
        $this->load->view('student/enrolment/enrolment_list', $page_data);
    }

    function enrolment_detail_info($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        //echo $this->input->post("enrolment_id");

        $en_id = $this->input->post('en_id');
        $page_data['page_title'] = get_phrase('enrolment detail info');
        $page_data['data'] = $this->db->select('*')->from('enrolment')->where('id',$en_id)->get()->row();

        $this->load->view('student/enrolment/enrolment_detail_info', $page_data);
    }

    function edit_enrolment_detail_info($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;

        $page_data['page_title'] = get_phrase('edit enrolment detail info');
        $page_data['data'] = $this->db->select('*')->from('enrolment')->where('id',$obj->id)->get()->row();
        $this->load->view('student/enrolment/enrolment_detail_info', $page_data);

    }
    // student general info
    function student_general($param1='',$param2='',$param3='')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;
        // checking for edit and load data of enroll general
        if ($param2 == 'edit') {
            $page_data['general_data'] = $this->enrolment_m->get_enrolment_general($obj);
        }

        $page_data["gender_list"] = $this->enrolment_m->get_gender_list();
        $page_data["time_study"] = $this->enrolment_m->get_timestudy_list();
        $page_data["child_number"] = $this->enrolment_m->get_child_list();

        $page_data['page_title'] = get_phrase('student_general');
        $this->load->view('student/enrolment/student_general', $page_data);
    }
    // parent info
    function parent($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;
        // checking for edit and load data of enroll parent
        if ($param2 == 'edit') {
            $page_data['parent_data'] = $this->enrolment_m->get_enrolment_parent($obj);
        }
        $page_data['page_title'] = get_phrase('parent');
        $this->load->view('student/enrolment/parent', $page_data);
    }
    // responsible
    function responsible($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;
        // checking for edit and load data of enroll parent
        if ($param2 == 'edit') {
            $page_data['res_data'] = $this->enrolment_m->get_enrolment_parent($obj);
        }

        $page_data['page_title'] = get_phrase('responsible');
        $this->load->view('student/enrolment/responsible', $page_data);
    }
    // assign_class
    function assign_class($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;
        // checking for edit and load data of enroll parent
        if ($param2 == 'edit') {
            $page_data['ass_data'] = $this->enrolment_m->get_enrolment_assign_class($obj);
        }

        //get data to object
        $page_data["grade_list"] = $this->enrolment_m->grade_list();
        $page_data["subject_data"] = $this->enrolment_m->subject_data();
        $page_data["letter_data"] = $this->enrolment_m->letter_data();

        $page_data['page_title'] = get_phrase('assign_class');
        $this->load->view('student/enrolment/assign_class', $page_data);
    }

    // student pic
    function student_pic($param1='',$param2='',$param3=''){
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;

        $page_data['page_title'] = get_phrase('student_picture');
        $this->load->view('student/admin/student_pic', $page_data);
    }

    /* admin student part
     * */
    // admin fee
    function admin_fee($param1='',$param2='',$param3='')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;
        // checking for edit and load data of enroll general
        if ($param2 == 'edit') {
            //$page_data['general_data'] = $this->enrolment_m->get_enrolment_general($obj);
        }


        $page_data['page_title'] = get_phrase('admin_fee');
        $this->load->view('student/admin/admin_fee', $page_data);
    }
    // admin study fee
    function admin_study_fee($param1='',$param2='',$param3='')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;
        // checking for edit and load data of enroll general
        if ($param2 == 'edit') {
            //$page_data['general_data'] = $this->enrolment_m->get_enrolment_general($obj);
        }


        $page_data['page_title'] = get_phrase('admin_study_fee');
        $this->load->view('student/admin/admin_study_fee', $page_data);
    }
    // admin student food
    function admin_food($param1='',$param2='',$param3='')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;
        // checking for edit and load data of enroll general
        if ($param2 == 'edit') {
            //$page_data['general_data'] = $this->enrolment_m->get_enrolment_general($obj);
        }


        $page_data['page_title'] = get_phrase('admin_food');
        $this->load->view('student/admin/admin_food', $page_data);
    }
    // admin transport fee
    function admin_transport_fee($param1='',$param2='',$param3='')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;
        // checking for edit and load data of enroll general
        if ($param2 == 'edit') {
            //$page_data['general_data'] = $this->enrolment_m->get_enrolment_general($obj);
        }


        $page_data['page_title'] = get_phrase('admin_transport_fee');
        $this->load->view('student/admin/admin_transport_fee', $page_data);
    }

    // admin paid history
    function admin_paid_history($param1='',$param2='',$param3='')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;
        // checking for edit and load data of enroll general
        if ($param2 == 'edit') {
            //$page_data['general_data'] = $this->enrolment_m->get_enrolment_general($obj);
        }


        $page_data['page_title'] = get_phrase('admin_paid_history');
        $this->load->view('student/admin/admin_paid_history', $page_data);
    }
    // admin_remidial_fee
    function admin_remidial_fee($param1='',$param2='',$param3='')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;
        // checking for edit and load data of enroll general
        if ($param2 == 'edit') {
            //$page_data['general_data'] = $this->enrolment_m->get_enrolment_general($obj);
        }


        $page_data['page_title'] = get_phrase('admin_remidial_fee');
        $this->load->view('student/admin/admin_remidial_fee', $page_data);
    }
    // admin student not activity
    function admin_student_not_activity($param1='',$param2='',$param3='')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;
        // checking for edit and load data of enroll general
        if ($param2 == 'edit') {
            //$page_data['general_data'] = $this->enrolment_m->get_enrolment_general($obj);
        }


        $page_data['page_title'] = get_phrase('admin_student_not_activity');
        $this->load->view('student/admin/admin_student_not_activity', $page_data);
    }
    // admin attendance tracking
    function admin_attendance_tracking($param1='',$param2='',$param3='')
    {
        if ($this->session->userdata('is_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url() . 'login', 'refresh');
        }

        $obj = new stdClass();
        $obj->id = $param1;
        // checking for edit and load data of enroll general
        if ($param2 == 'edit') {
            //$page_data['general_data'] = $this->enrolment_m->get_enrolment_general($obj);
        }


        $page_data['page_title'] = get_phrase('admin_attendance_tracking');
        $this->load->view('student/admin/admin_attendance_tracking', $page_data);
    }



    // get enrolment data grid
    public function get_enrolment_data(){
        if ($this->session->userdata('is_login') != 1){
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(). 'login', 'refresh');
        }
        // DB table to use
        $table = 'student_info where is_delete=0' ;														// Field
        $primaryKey = "id";
        // indexes
        $columns = array(
            array('db' => 'id',                     'dt' => "id",                   'field' => 'id'),
            array('db' => 'enrolment_id',           'dt' => "enrolment_id",         'field' => 'enrolment_id'),
            array('db' => 'khmer_name',             'dt' => "khmer_name",           'field' => 'khmer_name'),
            array('db' => 'latin_name',             'dt' => "latin_name",           'field' => 'latin_name'),
            array('db' => 'middle_name',            'dt' => "middle_name",          'field' => 'middle_name'),
            array('db' => 'gender',                 'dt' => "gender",               'field' => 'gender'),
            array('db' => 'dob',                    'dt' => "dob",                  'field' => 'dob'),
            array('db' => 'academic_id',            'dt' => "academic_id",          'field' => 'academic_id'),
            array('db' => 'times_name',             'dt' => "times_name",           'field' => 'times_name'),
            array('db' => 'child_number',           'dt' => "child_number",         'field' => 'child_number'),
            array('db' => 'status',                 'dt' => "status",               'field' => 'status'),
            array('db' => 'is_delete',              'dt' => "is_delete",            'field' => 'is_delete')
        );
        $this->load->model('datatable_model');
        echo json_encode($this->datatable_model->result_json($_POST, $table, $columns));
    }

} 