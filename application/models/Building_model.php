<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Building_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new building*/
		function new_building($data){
			$this->db->insert('building',$data);
			return $this->db->insert_id(); 		
		}
		/*edit building*/
		function edit_building($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('building',$data);
		}
		/*delete building*/
		function delete_building($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('building');
		}
		/*update status building*/
		function update_status_building($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('building');
		}
		
		/* building detail */
		function get_building_detail($obj){
			$sql = "select 
						*
					from building pb 
					where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "building"=> empty($data->building)?'':$data->building,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
				);     
		}
		
		/* lookup_building */
		function lookup_building($obj){
			$sql = "select * from building where status = 1 and building like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>