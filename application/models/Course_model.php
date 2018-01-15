<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Course_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->sys = $this->load->database('sys', TRUE);
			 
		}  
		/*create new course*/
		function new_course($data){
			$this->sys->insert('course',$data);
			return $this->sys->insert_id(); 		
		}
		/*edit course*/
		function edit_course($data,$id){
			$this->sys->where('id',$id);
			return $this->sys->update('course',$data);
		}

		/*delete course*/
		function delete_course($obj){

			$this->sys->where('id',$obj->course_id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
			$this->sys->update('course');
		}
		/*udate status course*/
		function update_status_course($obj){
			$this->sys->where('id',$obj->course_id);
			$this->sys->set('status',$obj->status);
			$this->sys->set('modified_by',$this->session->userdata("user_id"));
			$this->sys->set('modified_date',date('Y-m-d h:s:i'));
			$this->sys->update('course');
		}
		
		/* course detail */
		function get_course_detail($obj){
			$sql = " select 
						*
					from course 
					where id=?";
			$data = $this->sys->query($sql,array($obj->course_id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "course_name"=> empty($data->course_name)?'':$data->course_name,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
                        "created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by,
				);     
		}
		
		/* lookup_course */
		function lookup_course($obj){
			$sql = "select * from course where status = 1 and course_name like ?";
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>