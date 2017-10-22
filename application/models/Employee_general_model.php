<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Employee_general_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new employee list*/
		function new_employee_general($data){
			$this->db->insert('employee_general',$data);
			return $this->db->insert_id(); 		
		}
		/*edit employee*/
		function edit_employee_general($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('employee_general',$data);
		}
		/*delete employee list*/
		function delete_employee_general($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('employee_general');
		}
		/*update status employee */
		function update_status_employee_general($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('employee_general');
		}
		
		/* employee  detail */
		function get_employee_general_detail($obj){
			$sql = " select 
						*
					from employee_general pb 
					where id=?";
			$data = $this->db->query($sql,array($obj->emp_id))->row();
			return array( 
                        "id"			=> empty($data->id)?'':$data->id,
                        "emp_code"		=> empty($data->emp_code)?'':$data->emp_code,
                        "last_name_kh"	=> empty($data->last_name_kh)?'':$data->last_name_kh,
						"first_name_kh"	=> empty($data->first_name_kh)?'':$data->first_name_kh,
						
                        "latin_last_name"	=> empty($data->latin_last_name)?'':$data->latin_last_name,
						"latin_first_name"	=> empty($data->latin_first_name)?'':$data->latin_first_name,
						
						"national_card"	=> empty($data->national_card)?'':$data->national_card,
						"id_expiry_date"	=> empty($data->id_expiry_date)?'':$data->id_expiry_date,
						
		 				"date_of_birth"	=> empty($data->date_of_birth)?'':$data->date_of_birth,
		 				"place_of_birth"=> empty($data->place_of_birth)?'':$data->place_of_birth,
						
						"gender_id"		=> empty($data->gender_id)?'':$data->gender_id,
						"mirrital_status"=> empty($data->mirrital_status)?'':$data->mirrital_status,
		 				"nationality"	=> empty($data->nationality)?'':$data->nationality,
        				"country"		=> empty($data->country)?'':$data->country,
						"hired_date"	=> empty($data->hired_date)?'':$data->hired_date,
						
						"home_phone"	=> empty($data->home_phone)?'':$data->home_phone,
		 				"cell_phone"	=> empty($data->cell_phone)?'':$data->cell_phone,
						"extention_num"	=> empty($data->extention_num)?'':$data->extention_num,
		 				"email_address"	=> empty($data->email_address)?'':$data->email_address,
						"address"		=> empty($data->address)?'':$data->address,
						 
						"remark"		=> empty($data->remark)?'':$data->remark,
						"pos_class"	=> empty($data->pos_class)?'':$data->pos_class,
						"job_level"	=> empty($data->job_level)?'':$data->job_level,
						"employee_status"	=> empty($data->employee_status)?'':$data->employee_status,
						"position_level"	=> empty($data->position_level)?'':$data->position_level,
						 
					 	"confirm_date"		=> empty($data->confirm_date)?'':$data->confirm_date,
						"confirm_status"	=> empty($data->confirm_status)?'':$data->confirm_status,
						 
						"leaving_reason"	=> empty($data->leaving_reason)?'':$data->leaving_reason,
						"leaving_date"		=> empty($data->leaving_date)?'':$data->leaving_date,
						"department"		=> empty($data->department)?'':$data->department,
						 
						"section"			=> empty($data->section)?'':$data->section,
						"main_section"		=> empty($data->main_section)?'':$data->main_section,
						 
						"location"			=> empty($data->location)?'':$data->location,
						"sub_location"		=> empty($data->sub_location)?'':$data->sub_location,
						 
						"line"				=> empty($data->line)?'':$data->line,
						"work_shift"		=> empty($data->work_shift)?'':$data->work_shift,
						 
						"comments"			=> empty($data->comments)?'':$data->comments 
						);     
		}
		
		/* lookup employee */
		function lookup_employee_general($obj){
			$sql = "select * from employee_general where status = 1 and employee_general like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
		//
		function gender(){
			$sql = "select * from gender where status = 1";
			return $this->db->query($sql)->result();
			
		}
		
	}
?>