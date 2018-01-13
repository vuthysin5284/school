<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class School_item_fee_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new school item*/
		function new_school_item_fee($data){
			$this->db->insert('item_master',$data);
			return $this->db->insert_id(); 		
		}
		/*edit school item*/
		function edit_school_item_fee($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('item_master',$data);
		}
		/*delete admin_item_fee*/
		function delete_school_item_fee($obj){

			$this->db->where('id',$obj->school_item_fee_id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('item_master');
		}

		/* school item fee detail */
		function get_school_item_fee_detail($obj){
			$sql = " select 
						*
					from item_master 
					where id=?";
			$data = $this->db->query($sql,array($obj->school_item_fee_id))->row();
			return array( 
                        "id"				=> empty($data->id)?'':$data->id,
                        "description"		=> empty($data->description)?'':$data->description,
                        "status"			=> empty($data->status)?'':$data->status,
                        "created_date"		=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"		=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"		=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"		=> empty($data->modified_by)?'':$data->modified_by,
				);     
		}
		
		/* lookup_allowance_item */
		function lookup_school_item($obj){
			$sql = "select * from item_master where status = 1 and item_master like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
}