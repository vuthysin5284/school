<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Employee_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new employee list*/
		function new_employee($data){
			$this->db->insert('Employee.bak',$data);
			return $this->db->insert_id(); 		
		}
		/*edit employee*/
		function edit_employee($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('Employee.bak',$data);
		}
		/*delete employee list*/
		function delete_employee($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('Employee.bak');
		}
		/*update status employee */
		function update_status_employee($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('Employee.bak');
		}
		
		/* employee  detail */
		function get_employee_detail($obj){
			$sql = " select 
						*
					from employee_general pb 
					where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "employee_number"=> empty($data->employee_number)?'':$data->employee_number,
                        "latin_name"=> empty($data->latin_name)?'':$data->latin_name,
						"khmer_name"=> empty($data->khmer_name)?'':$data->khmer_name,
						"gender"=> empty($data->gender)?'':$data->gender,
		 				"position"=> empty($data->position)?'':$data->position,
		 				"department"=> empty($data->department)?'':$data->department,
						"phone"=> empty($data->phone)?'':$data->phone,
        				"joined_date"=> empty($data->joined_date)?'':$data->joined_date,
						"hired_date"=> empty($data->hired_date)?'':$data->hired_date,
						"email"=> empty($data->email)?'':$data->email,
		 				"status"=> empty($data->status)?'':$data->status,
		 				"staff_type"=> empty($data->staff_type)?'':$data->staff_type,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
						);     
		}
		
		/* lookup employee */
		function lookup_employee($obj){
			$sql = "select * from employee where status = 1 and employee like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>