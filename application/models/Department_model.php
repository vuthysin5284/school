<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Department_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->sys = $this->load->database('sys', TRUE);
			 
		}  
		/*create new department*/
		function new_department($data){
			$this->sys->insert('department',$data);
			return $this->sys->insert_id(); 		
		}
		/*edit department*/
		function edit_department($data,$id){
			$this->sys->where('id',$id);
			return $this->sys->update('department',$data);
		}
		/*delete department*/
		function delete_department($obj){
			$this->sys->where('id',$obj->id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
			$this->sys->update('department');
		}
		/*update status department*/
		function update_status_department($obj){
			$this->sys->where('id',$obj->pricebook_id); 
			$this->sys->set('status',$obj->status);
			$this->sys->set('modified_by',$this->session->userdata("user_id"));
			$this->sys->set('modified_date',date('Y-m-d h:s:i'));
			$this->sys->update('department');
		}
		
		/* department detail */
		function get_department_detail($obj){
			$sql = " select 
						*
					from department pb 
					where id=?";
			$data = $this->sys->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "department_name"=> empty($data->department_name)?'':$data->department_name,
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
			$sql = "select * from department where status = 1 and department like ?";
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>