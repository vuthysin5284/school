<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->sys = $this->load->database('sys', TRUE);
    }

    //function get letter_data
    function letter_data(){
        $sql = " select 
						*
					from letter 
					";
        return $this->sys->query($sql)->result();

    }
    //function get subject_data
    function subject_data($obj){
        $sql = " select 
						*
					from course 
					where status =1 and is_delete=0
					
					";
        return $this->sys->query($sql)->result();

    }
    //function get grade list
    function grade_list(){
        $sql = " select 
						*
					from classes 
					";
        return $this->sys->query($sql)->result();

    }
    /* session active*/
    function get_session_active(){
        $sql = " select 
						* 
					from school_session
					where status = 1
				";
        return  $this->sys->query($sql)->result();
    }
    /* session list*/
    function get_session_list(){
        $sql = " select 
						* 
					from school_session 
				";
        return  $this->sys->query($sql)->result();
    }

    //function get_class_active list
    function get_class_active($session_id)
    {
        $sql = " select 
						*
					from classes 
					where session_id=?
					order by id DESC 
					";
        return $this->sys->query($sql,array($session_id))->result();
    }

    //function get_expected_class_list list
    function get_expected_class_list()
    {
        $sql = " select 
						*
					from classes order by id DESC 
					";
        return $this->sys->query($sql)->result();
    }
        //function get gender list
    function get_gender_list(){
        $sql = " select 
						*
					from gender
					";
        return $this->sys->query($sql)->result();

    }
    //function get section  list
    function get_section_list($session_id){
        $sql = " select 
						*
					from school_section 
					where status=?
					and session_id=?
					";
        return $this->sys->query($sql,array(1,$session_id))->result_array();

    }
    //function get timestudy list
    function get_timestudy_list(){
        $sql = " select 
						*
					from times 
					";
        return $this->sys->query($sql)->result();

    }
    //function get get_child_list list
    function get_child_list(){
        $sql = " select 
						*
					from child 
					";
        return $this->sys->query($sql)->result();

    }
    // checking common setup?
    function get_common(){
        $sql = " select 
						*
					from common 
					";
        return $this->sys->query($sql)->result();

    }

    // generated nextid
    function nextid($field){
        $arr = array();
        $this->sys->select('prefix,'.$field);
        $this->sys->where('prefix',$this->session->userdata('prefix'));
        $nextid = $this->sys->get('nextid')->result_array();
        foreach($nextid as $row):
            $arr[$field] = $row[$field];
            self::insertNextRegisterId($arr[$field],$field);
        endforeach;
        return $arr;
    }

    // update next id
    public function insertNextRegisterId($id,$field){
        $data[$field]  = ($id + 1);
        $this->sys->where('prefix', $this->session->userdata('prefix'));
        $this->sys->update('nextid', $data);
    }
}
?>