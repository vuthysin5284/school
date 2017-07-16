<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Position_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new position*/
		function new_position($data){
			$this->db->insert('position',$data);
			return $this->db->insert_id(); 		
		}
		/*edit position*/
		function edit_position($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('position',$data);
		}
		/*delete position*/
		function delete_position($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('position');
		}
		/*update  position*/
		function update_status_position($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('position');
		}
		
		/* position detail */
		function get_position_detail($obj){
			$sql = " select	* from position pb where id=?";
			$data = $this->db->query($sql,array($obj->id))->row(); 
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "position_name"=> empty($data->position_name)?'':$data->position_name,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
						);     
		}
		
		/* lookup position_status */
		function lookup_position($obj){
			$sql = "select * from position where status = 1 and position like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>