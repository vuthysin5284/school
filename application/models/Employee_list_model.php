<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Employee_list_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new employee list*/
		function new_employee_list($data){
			$this->db->insert('employee_list',$data);
			return $this->db->insert_id(); 		
		}
		/*edit employee*/
		function edit_employee_list($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('employee_list',$data);
		}
		/*delete employee list*/
		function delete_employee_list($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('employee_list');
		}
		/*update status employee list*/
		function update_status_employee_list($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('employee_list');
		}
		
		/* employee list detail */
		function get_employee_list_detail($obj){
			$sql = " select 
						*
					from employee_list pb 
					where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "employee_list_name"=> empty($data->employee_list_name)?'':$data->employee_list_name,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
						);     
		}
		
		/* lookup employee */
		function lookup_employeelist($obj){
			$sql = "select * from employee_list where status = 1 and employee_list like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>