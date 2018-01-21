<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Job_level_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->sys = $this->load->database('sys', TRUE);
			 
		}  
		/*create new department*/
		function new_job_level($data){
			$this->sys->insert('job_level',$data);
			return $this->sys->insert_id(); 		
		}
		/*edit department*/
		function edit_job_level($data,$id){
			$this->sys->where('id',$id);
			return $this->sys->update('job_level',$data);
		}
		/*delete department*/
		function delete_job_level($obj){
			$this->sys->where('id',$obj->id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
			$this->sys->update('job_level');
		}
		/*update status department*/
		function update_status_job_level($obj){
			$this->sys->where('id',$obj->pricebook_id); 
			$this->sys->set('status',$obj->status);
			$this->sys->set('modified_by',$this->session->userdata("user_id"));
			$this->sys->set('modified_date',date('Y-m-d h:s:i'));
			$this->sys->update('job_level');
		}
		
		/* department detail */
		function get_job_level_detail($obj){
			$sql = " select 
						*
					from job_level pb 
					where id=?";
			$data = $this->sys->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "job_level_name"=> empty($data->job_level_name)?'':$data->job_level_name,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
						);     
		}
		
		/* lookup department */
		function lookup_employee($obj){
			$sql = "select * from job_level where status = 1 and job_level like ?";
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>