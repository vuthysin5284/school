<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Manage_route_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new route*/
		function new_route($data){
			$this->db->insert('manage_route',$data);
			return $this->db->insert_id(); 		
		}
		/*edit route*/
		function edit_route($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('manage_route',$data);
		}
		/*delete route*/
		function delete_route($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('manage_route');
		}
		/*udate status route*/
		function update_status_route($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('manage_route');
		}
		
		/* route detail */
		function get_route_detail($obj){
			$sql = "select * from manage_route pb where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "route_name"=> empty($data->route_name)?'':$data->route_name,
						"route_fare"=> empty($data->route_fare)?'':$data->route_fare,
						"two_way"=> empty($data->two_way)?'':$data->two_way,
						"one_way"=> empty($data->one_way)?'':$data->one_way,
						"description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
                        "created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by,
				);     
		}
		
		/* lookup_transportation */
		function lookup_route($obj){
			$sql = "select * from manage_route where status = 1 and manage_route like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>