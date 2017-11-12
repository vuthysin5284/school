<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Payrollsetup_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new payrollsetup*/
		function new_payrollsetup($data){
			$this->db->insert('payrollsetup',$data);
			return $this->db->insert_id(); 		
		}
		/*edit payrollsetup*/
		function edit_payrollsetup($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('payrollsetup',$data);
		}

		/*delete payrollsetup*/
		function delete_payrollsetup($obj){

			$this->db->where('id',$obj->payrollsetup_id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('payrollsetup');
		}
		/*update status payrollsetup*/
		function update_status_payrollsetup($obj){
			$this->db->where('id',$obj->payrollsetup_id);
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('payrollsetup');
		}
		
		/* payrollsetup detail */
		function get_payrollsetup_detail($obj){
			$sql = " select 
						*
					from payrollsetup 
					where id=?";
			$data = $this->db->query($sql,array($obj->payrollsetup_id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "payroll_tax_name_kh"=> empty($data->payroll_tax_name_kh)?'':$data->payroll_tax_name_kh,
                        "payroll_tax_name"=> empty($data->payroll_tax_name)?'':$data->payroll_tax_name,
                        "phone_number"=> empty($data->phone_number)?'':$data->phone_number,
                        "email"=> empty($data->email)?'':$data->email,
                        "prefix"=> empty($data->prefix)?'':$data->prefix,
                        "status"=> empty($data->status)?'':$data->status,
                        "address"=> empty($data->address)?'':$data->address,
                        "address1"=> empty($data->address1)?'':$data->address1,
                        "address2"=> empty($data->address2)?'':$data->address2,
                        "address3"=> empty($data->address3)?'':$data->address3,
                        "address4"=> empty($data->address4)?'':$data->address4,
                        "created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by,
				);     
		}
		
		/* lookup_branch */
		function lookup_payroll_tax($obj){
			$sql = "select * from payrollsetup where status = 1 and payrollsetup like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>