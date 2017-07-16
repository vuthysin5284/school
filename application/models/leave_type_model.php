<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Leave_type_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new employee*/
		function new_leave_type($data){
			$this->db->insert('leave_type',$data);
			return $this->db->insert_id(); 		
		}
		/*edit employee*/
		function edit_leave_type($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('leave_type',$data);
		}
		/*delete employee*/
		function delete_leave_type($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('leave_type');
		}
		/*update status employee*/
		function update_status_leave_type($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('leave_type');
		}
		
		/* employee detail */
		function get_leave_type_detail($obj){
			$sql = " select 
						*
					from leave_type pb 
					where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "code"=> empty($data->code)?'':$data->code,
                        "name"=> empty($data->name)?'':$data->name,
                        "status"=> empty($data->status)?'':$data->status,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
						);     
		}
		
		/* lookup employee */
		function lookup_leave_type($obj){
			$sql = "select * from leave_type where status = 1 and leave_type like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>