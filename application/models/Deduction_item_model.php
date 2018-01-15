<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Deduction_item_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->sys = $this->load->database('sys', TRUE);
			 
		}  
		/*create new deduction_item*/
		function new_deduction_item($data){
			$this->sys->insert('deduction_item',$data);
			return $this->sys->insert_id(); 		
		}
		/*edit deduction_item*/
		function edit_deduction_item($data,$id){
			$this->sys->where('id',$id);
			return $this->sys->update('deduction_item',$data);
		}

		/*delete deduction_item*/
		function delete_deduction_item($obj){

			$this->sys->where('id',$obj->deduction_item_id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
			$this->sys->update('deduction_item');
		}
		/*update status deduction_item*/
		function update_status_deduction_item($obj){
			$this->sys->where('id',$obj->deduction_item_id);
			$this->sys->set('status',$obj->status);
			$this->sys->set('modified_by',$this->session->userdata("user_id"));
			$this->sys->set('modified_date',date('Y-m-d h:s:i'));
			$this->sys->update('deduction_item');
		}
		
		/* deduction_item detail */
		function get_deduction_item_detail($obj){
			$sql = " select 
						*
					from deduction_item 
					where id=?";
			$data = $this->sys->query($sql,array($obj->deduction_item_id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "deduction_number"=> empty($data->deduction_number)?'':$data->deduction_number,
                        "deduction_item"=> empty($data->deduction_item)?'':$data->deduction_item,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
                        "created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by,
				);     
		}
		
		/* lookup_branch */
		function lookup_deduction_item($obj){
			$sql = "select * from deduction_item where status = 1 and deduction_item like ?";
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>