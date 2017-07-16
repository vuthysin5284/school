<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Country_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->db = $this->load->database('default', TRUE); 
			 
		}  
		/*create new country*/
		function new_country($data){
			$this->db->insert('country',$data);
			return $this->db->insert_id(); 		
		}
		/*edit department*/
		function edit_country($data,$id){
			$this->db->where('id',$id);
			return $this->db->update('country',$data);
		}
		/*delete department*/
		function delete_country($obj){
			$this->db->where('id',$obj->id);
			$this->db->set('is_delete',1);
			$this->db->set('delete_by',$this->session->userdata("user_id"));
			$this->db->set('delete_date',date('Y-m-d h:s:i'));
			$this->db->update('country');
		}
		/*update status department*/
		function update_status_country($obj){
			$this->db->where('id',$obj->pricebook_id); 
			$this->db->set('status',$obj->status);
			$this->db->set('modified_by',$this->session->userdata("user_id"));
			$this->db->set('modified_date',date('Y-m-d h:s:i'));
			$this->db->update('country');
		}
		
		/* country detail */
		function get_country_detail($obj){
			$sql = " select 
						*
					from country pb 
					where id=?";
			$data = $this->db->query($sql,array($obj->id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "country_name"=> empty($data->country_name)?'':$data->country_name,
						"nationality"=> empty($data->nationality)?'':$data->nationality,
						"short_name"=> empty($data->short_name)?'':$data->short_name,
                        "description"=> empty($data->description)?'':$data->description,
                        "status"=> empty($data->status)?'':$data->status,
						"created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by
						);     
		}
		
		/* lookup department */
		function lookup_country($obj){
			$sql = "select * from country where status = 1 and country like ?";
			return $this->db->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>