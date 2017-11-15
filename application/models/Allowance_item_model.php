<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Allowance_item_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new allowance_item*/
		function new_allowance_item($data){
			$this->db->insert('allowance_item',$data);
			return $this->db->insert_id(); 		
		}
		/*edit allowance_item*/
		function edit_allowance_item($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('allowance_item',$data);
		}

		/*delete allowance_item*/
		function delete_allowance_item($obj){

			$this->db->where('id',$obj->allowance_item_id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('allowance_item');
		}
		/*update status allowance_item*/
		function update_status_allowance_item($obj){
			$this->db->where('id',$obj->allowance_item_id);
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('allowance_item');
		}
		
		/* allowance_item detail */
		function get_allowance_item_detail($obj){
			$sql = " select 
						*
					from allowance_item 
					where id=?";
			$data = $this->db->query($sql,array($obj->allowance_item_id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "allowance_number"	=> empty($data->allowance_number)?'':$data->allowance_number,
                        "period"			=> empty($data->period)?'':$data->period,
                        "allowance_name"	=> empty($data->allowance_name)?'':$data->allowance_name,
                        "description"		=> empty($data->description)?'':$data->description,
                        "status"			=> empty($data->status)?'':$data->status,
                        "created_date"		=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"		=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"		=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"		=> empty($data->modified_by)?'':$data->modified_by,
				);     
		}
		
		/* lookup_allowance_item */
		function lookup_allowance_item($obj){
			$sql = "select * from allowance_item where status = 1 and allowance_item like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>