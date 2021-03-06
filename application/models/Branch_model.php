<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Branch_model extends CI_Model {
		
		function __construct()
		{ 
			parent::__construct();
			$this->sys = $this->load->database('sys', TRUE);
			 
		}  
		/*create new branch*/
		function new_branch($data){
			$this->sys->insert('branch',$data);
			return $this->sys->insert_id(); 		
		}
		/*edit branch*/
		function edit_branch($data,$id){
			$this->sys->where('id',$id);
			return $this->sys->update('branch',$data);
		}

		/*delete branch*/
		function delete_branch($obj){

			$this->sys->where('id',$obj->branch_id);
			$this->sys->set('is_delete',1);
			$this->sys->set('delete_by',$this->session->userdata("user_id"));
			$this->sys->set('delete_date',date('Y-m-d h:s:i'));
			$this->sys->update('branch');
		}
		/*udate status branch*/
		function update_status_branch($obj){
			$this->sys->where('id',$obj->branch_id);
			$this->sys->set('status',$obj->status);
			$this->sys->set('modified_by',$this->session->userdata("user_id"));
			$this->sys->set('modified_date',date('Y-m-d h:s:i'));
			$this->sys->update('branch');
		}
		
		/* branch detail */
		function get_branch_detail($obj){
			$sql = " select 
						*
					from branch 
					where id=?";
			$data = $this->sys->query($sql,array($obj->branch_id))->row();
			return array( 
                        "id"=> empty($data->id)?'':$data->id,
                        "branch_name_kh"=> empty($data->branch_name_kh)?'':$data->branch_name_kh,
                        "branch_name"=> empty($data->branch_name)?'':$data->branch_name,
                        "phone_number"=> empty($data->phone_number)?'':$data->phone_number,
                        "email"=> empty($data->email)?'':$data->email,
                        "prefix"=> empty($data->prefix)?'':$data->prefix,
                        "status"=> empty($data->status)?'':$data->status,
                        "address"=> empty($data->address)?'':$data->address,
                        "address1"=> empty($data->address1)?'':$data->address1,
                        "address2"=> empty($data->address2)?'':$data->address2,
                        "address3"=> empty($data->address3)?'':$data->address3,
                        "address4"=> empty($data->address4)?'':$data->address4,
                        "created_date"=> empty($data->created_date)?'':$data->created_date,
                        "modified_date"=> empty($data->modified_date)?'':$data->modified_date,
                        "created_by"=> empty($data->created_by)?'':$data->created_by,
                        "modified_by"=> empty($data->modified_by)?'':$data->modified_by,
				);     
		}
		
		/* lookup_branch */
		function lookup_branch($obj){
			$sql = "select * from branch where status = 1 and branch_name like ?";
			return $this->sys->query($sql,array($obj["keyword"].'%'))->result();
		}
		
	}
?>