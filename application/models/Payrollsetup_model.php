<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Payrollsetup_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
            $this->sys = $this->load->database('sys', TRUE);
			 
		}  
		/*create new payrollsetup*/
		function new_payrolltax($data){
			$this->sys->insert('payroll_tax',$data);
			return $this->sys->insert_id(); 		
		}
		/*edit payrollsetup*/
		function edit_payrolltax($data,$id){
			$this->sys->where('id',$id);
			return $this->sys->update('payroll_tax',$data);
		}

		/*delete payrollsetup*/
		function delete_payrollsetup($obj){

			$this->sys->where('id',$obj->payrollsetup_id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
			$this->sys->update('payrollsetup');
		}
		/*update status payrollsetup*/
		function update_status_payrollsetup($obj){
			$this->sys->where('id',$obj->payrollsetup_id);
			$this->sys->set('status',$obj->status);
			$this->sys->set('modified_by',$this->session->userdata("user_id"));
			$this->sys->set('modified_date',date('Y-m-d h:s:i'));
			$this->sys->update('payrollsetup');
		}
		
		/*  author: Eng
			date : 2017-11-12
			param: @obj
			function: get payroll tax detail
			return : data in object  
		*/
		function get_payrollsetup_detail($obj){
			$sql = " select 
						*
					from payroll_tax 
					where id=?";
			$data = $this->sys->query($sql,array($obj->payroll_tax_id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "payroll_tax_number"=> empty($data->payroll_tax_number)?0:$data->payroll_tax_number,
                        "amount_in_riel_less_than"=> empty($data->amount_in_riel_less_than)?0:$data->amount_in_riel_less_than,
                        "tax_percentage"=> empty($data->tax_percentage)?'':$data->tax_percentage,
                        "deduction_amount_in_riel"=> empty($data->deduction_amount_in_riel)?0:$data->deduction_amount_in_riel,
                        "status"=> empty($data->status)?'':$data->status,
                        "created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by,
				);     
		}
		
		/* lookup_branch */
		function lookup_payroll_tax($obj){
			$sql = "select * from payrollsetup where status = 1 and payrollsetup like ?";
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>