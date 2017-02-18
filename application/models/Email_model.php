<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
		
		/*$this->smtp_host = 'mail.vital.com.kh';
		$this->smtp_user = 'vuthy.sin@vital.com.kh';
		$this->smtp_pass = 'vuthy';
		
		$config = array();
        $config['useragent']	= "CodeIgniter";
        $config['mailpath']		= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']		= "smtp";
        $config['smtp_host']	= $this->smtp_host;
        $config['smtp_port']	= "25";
        $config['mailtype']		= 'html';
        $config['charset']		= 'utf-8';
        $config['newline']		= "\r\n";
        $config['wordwrap']		= TRUE;

        $this->load->library('email');

        $this->email->initialize($config);*/
		
		 
    }
	
	function test_email(){
		$config['useragent'] 		= 'CodeIgniter';
		$config['protocol']         = 'smtp';                   // 'mail', 'sendmail', or 'smtp' 
		$config['smtp_host']        = 'mail.aaiischool.com';
		$config['smtp_user']        = 'vuthy.sin@aaiischool.com';
		$config['smtp_pass']        = 'sinvuthy5284';
		$config['smtp_port']        = 225;  
		$config['mailtype']         = 'text';                   // 'text' or 'html'
		$config['charset']          = 'utf-8'; 
		$config['validate']         = true; 
		$config['newline']          = "\n";                     // "\r\n" or "\n" or "\r"
		$config['bcc_batch_mode']   = false;
		$config['bcc_batch_size']   = 200; 
		 
		
		// Load email library and passing configured values to email library
		$this->load->library('email',$config); 
		$this->email->set_newline("\r\n");
		// Sender email address
		$this->email->from('vuthy.sin5284@gmail.com', 'vuthy');
		// Receiver email address.for single email
		$this->email->to('vuthysin5284@hotmail.com');
		
		//send multiple email
		//$this->email->to('vuthy.sin5284@gmail.com','','');
		// Subject of email
		$this->email->subject('test');
		// Message in email
		$this->email->message('test');
		// It returns boolean TRUE or FALSE based on success or failure
		$this->email->send();
		echo $this->email->print_debugger();
	}
	  
	
	
	// sale call support
	function email_sale_call_support($obj){
		 
		
		$this->email->from($obj->from, $obj->name); 
		$this->email->to($obj->to);
		$this->email->cc($obj->cc);  
		 
		 
		$email_msg		.=	$obj->message."<br /><br /><br />";
		
		$email_msg		.=	"Regarding,<br />";
		$email_msg		.=	"System email<br />"; 
		 
		 
		$this->email->subject($obj->title);
		$this->email->message($email_msg); 
		return $this->email->send();
		 
  		//echo $this->email->print_debugger();
		 
	}
}

