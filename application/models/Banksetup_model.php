<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Banksetup_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
            $this->sys = $this->load->database('sys', TRUE);

        }
		/*create new banksetup*/
		function new_banksetup($data){
			$this->sys->insert('banksetup',$data);
			return $this->sys->insert_id(); 		
		}
		/*edit banksetup*/
		function edit_banksetup($data,$id){
			$this->sys->where('id',$id);
			return $this->sys->update('banksetup',$data);
		}

		/*delete banksetup*/
		function delete_banksetup($obj){

			$this->sys->where('id',$obj->banksetup_id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
			$this->sys->update('banksetup');
		}
		/*update status banksetup*/
		function update_status_banksetup($obj){
			$this->sys->where('id',$obj->banksetup_id);
			$this->sys->set('status',$obj->status);
			$this->sys->set('modified_by',$this->session->userdata("user_id"));
			$this->sys->set('modified_date',date('Y-m-d h:s:i'));
			$this->sys->update('banksetup');
		}
		
		/*  author: Eng
			date : 2017-11-12
			param: @obj
			function: get banksetup detail
			return : data in object  
		*/
		function get_banksetup_detail($obj){
			$sql = " select 
						*
					from banksetup 
					where id=?";
			$data = $this->sys->query($sql,array($obj->banksetup_id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "bank_number"=> empty($data->bank_number)?0:$data->bank_number,
                        "bank_name"=> empty($data->bank_name)?0:$data->bank_name,
                        "transfer_fee"=> empty($data->transfer_fee)?'':$data->transfer_fee,
                        "remark"=> empty($data->remark)?0:$data->remark,
                        "status"=> empty($data->status)?'':$data->status,
                        "created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by,
				);     
		}
		
		/* lookup_banksetup */
		function lookup_banksetup($obj){
			$sql = "select * from banksetup where status = 1 and banksetup like ?";
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>