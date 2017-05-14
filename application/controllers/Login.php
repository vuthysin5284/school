<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
       /* $this->load->model('crud_model');*/
        $this->load->database();
        $this->load->library('session');
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2099 05:00:00 GMT");
    }

    //Default function, redirects to logged in user area
    public function index() {

        if ($this->session->userdata('is_login') == 1)
           	redirect(base_url(), 'refresh'); 
			
        $this->load->view('login');
    }

    //Ajax login function 
    function ajax_login() {
        $response = array();
		 
        //Recieving post input of email, password from ajax request
        $username = $_POST["username"];
        $password = $_POST["password"];
        $response['submitted_data'] = $_POST; 
		
        //Validating login
        $login_status = $this->validate_login($username, $password);
        $response['login_status'] = $login_status;
        if ($login_status == 'success') {
            $response['redirect_url'] = $this->session->userdata('last_page');
			redirect(base_url(), 'refresh');
        }

        //Replying ajax request with validation response
        echo json_encode($response);
    }

    //Validating login from ajax request
    function validate_login($username = '', $password = '') {
        $credential = array('username' => $username, 'password' => sha1(md5(sha1(md5($password)))));
		 
		// limit show records in page 
		$this->session->set_userdata('per_page', $this->db->get_where('settings' , array('type' => 'per_page'))->row()->description);

        // Checking login credential for admin
		$this->db->where('status=',1);
        $query = $this->db->get_where('user', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('is_login', '1');
            $this->session->set_userdata('user_id', $row->admin_id); 
            $this->session->set_userdata('sap_id', $row->SAP_ID);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('branch_id', 1);

            // is login
			$this->db->where('admin_id',$row->admin_id);
			$this->db->set('is_login','online');
			$this->db->update('user'); 
			
            return 'success';
        }
 
        return 'invalid'; 
    }

    /*     * *DEFAULT NOR FOUND PAGE**** */

    function four_zero_four() {
        $this->load->view('four_zero_four');
    }

    // PASSWORD RESET BY EMAIL
    function forgot_password()
    {
        $this->load->view('forgot_password');
    }

    function ajax_forgot_password()
    {
        $resp                   = array();
        $resp['status']         = 'false';
        $email                  = $_POST["email"];
        $reset_account_type     = '';
        //resetting user password here
        $new_password           =   substr( md5( rand(100000000,20000000000) ) , 0,7);

        // Checking credential for admin
        $query = $this->db->get_where('admin' , array('email' => $email));
        if ($query->num_rows() > 0) 
        {
            $reset_account_type     =   'admin';
            $this->db->where('email' , $email);
            $this->db->update('admin' , array('password' => $new_password));
            $resp['status']         = 'true';
        } 

        // send new password to user email  
        $this->email_model->password_reset_email($new_password , $reset_account_type , $email);

        $resp['submitted_data'] = $_POST;

        echo json_encode($resp);
    }

    /*     * *****LOGOUT FUNCTION ****** */

    function logout() {
		// is login
		$this->db->where('admin_id',$this->session->userdata('login_user_id'));
		$this->db->set('is_login','offline');
		$this->db->update('user');
		
		//
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url(), 'refresh');
    }
	
	
	/***** get suppervisor email *****/
	function getAdvisor($param1 = ''){ 
		$sql = "  select type,description from settings where type = ? ";
		
		$record = $this->db->query($sql,array($param1))->result_array();
		 
		foreach($record as $row){
			$suppervice = $row["description"];
		}
		  
		return $suppervice;
		
	} 
	 

}
