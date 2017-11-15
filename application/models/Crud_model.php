<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }
	
	function clear_cache()
	{
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
	}
    /*auditrial*/
    function auditrial($obj){
        $sql["STUDENT_ID"] 	= 	$obj->STUDENT_ID;
        $sql["BRANCH_ID"] 	= 	$obj->BRANCH_ID;
        $sql["CONTEXT"] 	= 	$obj->CONTEXT;
        $sql["DESCRIPTION"] = 	$obj->DESCRIPTION;
        $sql["AUDIT_DATE"] 	=  	date('Y-m-d H:i:s');
        $sql["OPERATOR_ID"] =  	$this->session->userdata('user_id');
        $sql["IS_SUCCESS"] 	=  	1;
        $sql["GROUP_ID"] 	=  	1;
        $sql["HOSTNAME"] 	=  	$obj->HOSTNAME;
        $sql["IP_ADDRESS"] 	=  	$_SERVER["REMOTE_ADDR"];
        $this->db->insert('audit_trial',$sql);
    }

	function create_log($data)
	{
		$data['timestamp']	=	strtotime(date('Y-m-d').' '.date('H:i:s'));
		$data['ip']			=	$_SERVER["REMOTE_ADDR"];
		$location 			=	new SimpleXMLElement(file_get_contents('http://freegeoip.net/xml/'.$_SERVER["REMOTE_ADDR"]));
		$data['location']	=	$location->City.' , '.$location->CountryName;
		$this->db->insert('log' , $data);
	}
	////////IMAGE URL//////////
	function get_image_url($type = '' , $id = '')
	{
		if(file_exists('uploads/'.$type.'_image/'.$id.'.jpg'))
			$image_url	=	base_url().'uploads/'.$type.'_image/'.$id.'.jpg';
		else
			$image_url	=	base_url().'uploads/user.jpg';
			
		return $image_url;
	}

}

