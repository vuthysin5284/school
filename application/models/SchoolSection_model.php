<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class SchoolSection_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->sys = $this->load->database('sys', TRUE);
			 
		}  
		/*create new section*/
		function new_section($data){
			$this->sys->insert('school_section',$data);
			return $this->sys->insert_id(); 		
		}
		/*edit section*/
		function edit_section($data,$id){
			$this->sys->where('id',$id);
			return $this->sys->update('school_section',$data);
		}
		/*delete section*/
		function delete_section($obj){
			$this->sys->where('id',$obj->section_id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
            $this->sys->update('school_section');

		}
        /* session list*/
        function get_session_list($obj){
            $sql = " select 
						* 
					from school_session";
           return  $this->sys->query($sql)->result();
        }
        /* class list*/
        function get_class_list($obj){
            $sql = " select 
						* 
					from classes";
            return  $this->sys->query($sql)->result();
        }
		/* section detail */
		function get_section_detail($obj){
			$sql = " select 
						* 
					from school_section pb 
					where id=?";
			$data = $this->sys->query($sql,array($obj->section_id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "section_name"=> empty($data->section_name)?'':$data->section_name,
                        "session_id"=> empty($data->session_id)?'':$data->session_id,
                        "class_id"=> empty($data->class_id)?'':$data->class_id,
                        "is_lock"=> empty($data->class_id)?'':$data->is_lock,
                        "max_strength"=> empty($data->max_strength)?'':$data->max_strength,
                        "status"=> empty($data->status)?'':$data->status
				);     
		}
		
		/* lookup_section */
		function lookup_section($obj){
			$sql = "select * from school_section where status = 1 and section like ?";
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
	}
?>