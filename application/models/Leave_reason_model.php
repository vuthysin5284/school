<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Leave_reason_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->sys = $this->load->database('sys', TRUE);
			 
		}  
		/*create new leave reason*/
		function new_leave_reason($data){
			$this->sys->insert('leave_reason',$data);
			return $this->sys->insert_id(); 		
		}
		/*edit leave_reason*/
		function edit_leave_reason($data,$id){
			$this->sys->where('id',$id);
			return $this->sys->update('leave_reason',$data);
		}
		/*delete leave_reason*/
		function delete_leave_reason($obj){
			$this->sys->where('id',$obj->id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
			$this->sys->update('leave_reason');
		}
		/*update status leave_reason*/
		function update_status_leave_reason($obj){
			$this->sys->where('id',$obj->pricebook_id); 
			$this->sys->set('status',$obj->status);
			$this->sys->set('modified_by',$this->session->userdata("user_id"));
			$this->sys->set('modified_date',date('Y-m-d h:s:i'));
			$this->sys->update('leave_reason');
		}
		
		/* leave_reason detail */
		function get_leave_reason_detail($obj){
			$sql = " select 
						*
					from leave_reason pb 
					where id=?";
			$data = $this->sys->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "leave_reason_name"=> empty($data->leave_reason_name)?'':$data->leave_reason_name,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
						);     
		}
		
		/* lookup leave_reason */
		function lookup_leave_reason($obj){
			$sql = "select * from leave_reason where status = 1 and leave_reason like ?";
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>