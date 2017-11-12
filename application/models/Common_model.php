<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
    }

    //function get letter_data
    function letter_data(){
        $sql = " select 
						*
					from letter 
					";
        return $this->db->query($sql)->result();

    }
    //function get subject_data
    function subject_data(){
        $sql = " select 
						*
					from course 
					";
        return $this->db->query($sql)->result();

    }
    //function get grade list
    function grade_list(){
        $sql = " select 
						*
					from classes 
					";
        return $this->db->query($sql)->result();

    }
    /* session list*/
    function get_session_list(){
        $sql = " select 
						* 
					from school_session";
        return  $this->db->query($sql)->result();
    }
    //function get_expected_class_list list
    function get_expected_class_list()
    {
        $sql = " select 
						*
					from classes order by id DESC 
					";
        return $this->db->query($sql)->result();
    }
        //function get gender list
    function get_gender_list(){
        $sql = " select 
						*
					from genders 
					";
        return $this->db->query($sql)->result();

    }
    //function get timestudy list
    function get_timestudy_list(){
        $sql = " select 
						*
					from times 
					";
        return $this->db->query($sql)->result();

    }
    //function get get_child_list list
    function get_child_list(){
        $sql = " select 
						*
					from child 
					";
        return $this->db->query($sql)->result();

    }
}
?>