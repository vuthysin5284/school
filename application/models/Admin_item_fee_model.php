<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Admin_item_fee_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			//$this->db = $this->load->database('default', TRUE);
			 
		}  
		/*create new admin item*/
		function new_admin_item_fee($data){
			$this->sys->insert('item_master',$data);
			return $this->sys->insert_id();
		}
		/*edit admin item*/
		function edit_admin_item_fee($data,$id){
			$this->sys->where('id', $id);
			return $this->sys->update('item_master', $data);
		}
		/*delete admin_item_fee*/
		function delete_admin_item_fee($obj){

			$this->sys->where('id',$obj->admin_item_fee_id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
			$this->sys->update('item_master');
		}

		/* admin item fee detail */
		function get_admin_item_fee_detail($obj){
			$sql = " select 
						*
					from item_master 
					where id=? 
					";
			$data = $this->sys->query($sql,array($obj->admin_item_fee_id))->row();
			return array(
                        "id"				=> empty($data->id)?'':$data->id,
                        "prize_id"				=> empty($data->prize_id)?'':$data->prize_id,
                        "description"		=> empty($data->description)?'':$data->description,
                        "status"			=> empty($data->status)?'0':$data->status,
                        "created_date"		=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"		=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"		=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"		=> empty($data->modified_by)?'':$data->modified_by,
				);     
		}
		
		/* lookup_admin item */
		function lookup_admin_item_fee($obj){
			$sql = "select * from item_master where status = 1 and item_master like ?";
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
}