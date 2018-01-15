<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Position_status_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->sys = $this->load->database('sys', TRUE);
			 
		}  
		/*create new position*/
		function new_position_status($data){
			$this->sys->insert('position_status',$data);
			return $this->sys->insert_id(); 		
		}
		/*edit position*/
		function edit_position_status($data,$id){
			$this->sys->where('id',$id);
			return $this->sys->update('position_status',$data);
		}
		/*delete position*/
		function delete_position_status($obj){
			$this->sys->where('id',$obj->id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
			$this->sys->update('position_status');
		}
		/*update status position*/
		function update_status_position_status($obj){
			$this->sys->where('id',$obj->pricebook_id); 
			$this->sys->set('status',$obj->status);
			$this->sys->set('modified_by',$this->session->userdata("user_id"));
			$this->sys->set('modified_date',date('Y-m-d h:s:i'));
			$this->sys->update('position_status');
		}
		
		/* position detail */
		function get_position_status_detail($obj){
			$sql = " select 
						*
					from position_status pb 
					where id=?";
			$data = $this->sys->query($sql,array($obj->id))->row(); 
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "position_status_name"=> empty($data->position_status_name)?'':$data->position_status_name,
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
			$sql = "select * from position_status where status = 1 and position_status like ?";
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>