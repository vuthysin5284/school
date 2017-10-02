<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enrolment_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);

    }
    /*create new employee*/
    function new_enrolment($data){
        $this->db->insert('enrolment',$data);
        return $this->db->insert_id();
    }
    /*edit employee*/
    function edit_enrolment($data,$id){
        $this->db->where('id',$id);
        return $this->db->update('enrolment',$data);
    }
    /*delete employee*/
    function delete_enrolment($obj){
        $this->db->where('id',$obj->id);
        $this->db->set('is_delete',1);
        $this->db->set('delete_by',$this->session->userdata("user_id"));
        $this->db->set('delete_date',date('Y-m-d h:s:i'));
        $this->db->update('enrolment');
    }
    /*update status employee*/
    function update_status_enrolment($obj){
        $this->db->where('id',$obj->pricebook_id);
        $this->db->set('status',$obj->status);
        $this->db->set('modified_by',$this->session->userdata("user_id"));
        $this->db->set('modified_date',date('Y-m-d h:s:i'));
        $this->db->update('enrolment');
    }

    /* get enrolment general */
    function get_enrolment_general($obj){												// Field
        $sql = " select 																		
						*
					from enroll_general pb 
					where id=?";
        $data = $this->db->query($sql,array($obj->id))->row();
        return array(
            "id"=> empty($data->id)?'':$data->id,
            "khmer_name"=> empty($data->khmer_name)?'':$data->khmer_name,
            "latin_name"=> empty($data->latin_name)?'':$data->latin_name,
            "middle_name"=> empty($data->middle_name)?'':$data->middle_name,
            "dob"=> empty($data->dob)?'':$data->dob,
            "gender_id"=> empty($data->gender_id)?'':$data->gender_id,
            "academic_id"=> empty($data->academic_id)?'':$data->academic_id,
            "time_study_id"=> empty($data->time_study_id)?'':$data->time_study_id,
            "children_number"=> empty($data->children_number)?'':$data->children_number,
            "testing_id"=> empty($data->testing_id)?'':$data->testing_id,
            "former_school"=> empty($data->former_school)?'':$data->former_school,
            "year"=> empty($data->year)?'':$data->year,
            "is_waiting_testing"=> $data->is_waiting_testing,
            "status"=> empty($data->status)?'':$data->status,
            "created_date"=> empty($data->created_date)?'':$data->created_date,
            "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
            "created_by"=> empty($data->created_by)?'':$data->created_by,
            "modified_by"=> empty($data->modified_by)?'':$data->modified_by
        );
    }
    /*get enrolment parent*/
    function get_enrolment_parent($obj){												// Field
        $sql = " select
                    p.* 
                from parent p
                inner join enroll_general eg on eg.parent_id = p.id and p.`type`=1
                where eg.id = ?";
        $data = $this->db->query($sql,array($obj->id))->row();
        return array(
            "id"=> empty($data->id)?'':$data->id,
            "father_name_kh"=> empty($data->father_name_kh)?'':$data->father_name_kh,
            "father_name_en"=> empty($data->father_name_en)?'':$data->father_name_en,
            "f_occupation"=> empty($data->f_occupation)?'':$data->f_occupation,
            "f_number"=> empty($data->f_number)?'':$data->f_number,
            "mother_name_kh"=> empty($data->mother_name_kh)?'':$data->mother_name_kh,
            "mother_name_en"=> empty($data->mother_name_en)?'':$data->mother_name_en,
            "m_occupation"=> empty($data->m_occupation)?'':$data->m_occupation,
            "m_number"=> empty($data->m_number)?'':$data->m_number,
            "address"=> empty($data->address)?'':$data->address,
            "address1"=> empty($data->address1)?'':$data->address1,
            "address2"=> empty($data->address2)?'':$data->address2,
            "address3"=> empty($data->address3)?'':$data->address3,
            "address4"=> empty($data->address4)?'':$data->address4
        );

    }
    /* sin vuthy
     * 2017 01 02
     * this function using for get student assign class, subject and letter
     */
    function get_enrolment_assign_class($obj){
        $sql = " select
                      p.* 
                from enroll_assign_class p
                inner join enroll_general eg on eg.id = p.student_id
                where eg.id = ?";
        $data = $this->db->query($sql,array($obj->id))->row();
        return array(
            "id"=> empty($data->id)?'':$data->id,
            "grade_id"=> empty($data->grade_id)?'':$data->grade_id,
            "letter_id"=> empty($data->letter_id)?'':$data->letter_id,
            "language"=> empty($data->language)?'':$data->language,
            "status"=> empty($data->status)?'':$data->status,
            "created_by"=> empty($data->created_by)?'':$data->created_by
        );
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
    /* lookup employee */
    function lookup_enrolment($obj){
        $sql = "select * from enroll_general where status = 1 and enrolment like ?";
        return $this->db->query($sql,array($obj["keyword"].'%'))->result();
    }
    // insert general enrollment
    function insertGeneralEnroll($obj){
        $this->db->insert('enroll_general',$obj);
        return $this->db->insert_id();
    }
    // edit general enrollment
    function editGeneralEnroll($obj,$enrolment_id){
        $this->db->where('id',$enrolment_id);
        $this->db->update('enroll_general',$obj);
    }
    // insert edit Enroll
    function editEnroll($parent_id,$student_id){
        $this->db->where('id',$student_id);
        $this->db->set('parent_id',$parent_id);
        $this->db->update('enroll_general');
    }
    // insert Parent enrollment
    function insertParentEnroll($obj){
        $this->db->insert('parent',$obj);
        return $this->db->insert_id();
    }
    // edit Parent Enroll
    function editParentEnroll($obj,$parent_id){
        $this->db->where('id',$parent_id);
        $this->db->update('parent',$obj);
    }
    // new assign class
    function insertAssignClassEnroll($obj){
        $this->db->insert('enroll_assign_class',$obj);
        return $this->db->insert_id();
    }
    // edit Assogn Class Enroll
    function editAssignClassEnroll($obj,$assign_id){
        $this->db->where('id',$assign_id);
        $this->db->update('enroll_assign_class',$obj);
    }

    /*delete enrol*/
    function delete_enrol($obj){
        $this->db->where('id',$obj->id);
        $this->db->set('is_delete',1);
        $this->db->set('delete_by',$this->session->userdata("user_id"));
        $this->db->set('delete_date',date('Y-m-d h:s:i'));
        $this->db->update('enroll_general');
    }
}
?>