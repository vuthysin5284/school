<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Country_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->sys = $this->load->database('sys', TRUE);
			 
		}  
		/*create new country*/
		function new_country($data){
			$this->sys->insert('country',$data);
			return $this->sys->insert_id(); 		
		}
		/*edit department*/
		function edit_country($data,$id){
			$this->sys->where('id',$id);
			return $this->sys->update('country',$data);
		}
		/*delete department*/
		function delete_country($obj){
			$this->sys->where('id',$obj->id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
			$this->sys->update('country');
		}
		/*update status department*/
		function update_status_country($obj){
			$this->sys->where('id',$obj->pricebook_id); 
			$this->sys->set('status',$obj->status);
			$this->sys->set('modified_by',$this->session->userdata("user_id"));
			$this->sys->set('modified_date',date('Y-m-d h:s:i'));
			$this->sys->update('country');
		}
		
		/* country detail */
		function get_country_detail($obj){
			$sql = " select 
						*
					from country pb 
					where id=?";
			$data = $this->sys->query($sql,array($obj->id))->row();
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
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>