<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Employee_status_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new employee*/
		function new_employee_status($data){
			$this->db->insert('employee_status',$data);
			return $this->db->insert_id(); 		
		}
		/*edit employee*/
		function edit_employee_status($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('employee_status',$data);
		}
		/*delete employee*/
		function delete_employee_status($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('employee_status');
		}
		/*update status employee*/
		function update_status_employee_status($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('employee_status');
		}
		
		/* employee detail */
		function get_employee_status_detail($obj){
			$sql = " select 
						*
					from employee_status pb 
					where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "employee_status_name"=> empty($data->employee_status_name)?'':$data->employee_status_name,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
						);     
		}
		
		/* lookup employee */
		function lookup_employee($obj){
			$sql = "select * from employee_status where status = 1 and employee_status like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>