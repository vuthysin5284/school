<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->sys = $this->load->database('sys', TRUE);
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

        $sql = "select * from school_session where status = 1 and `is_delete` = 0 and is_lock = 0";
        $data["session_list"] = $this->sys->query($sql)->result_array();
        $this->load->view('login',$data);
    }

    //Ajax login function 
    function ajax_login() {
        $response = array();
		 
        //Recieving post input of email, password from ajax request
        $username = $_POST["username"];
        $password = $_POST["password"];
        //$running_sesion = $_POST["running_sesion"];
        $response['submitted_data'] = $_POST; 
		
        //Validating login
        $login_status = $this->validate_login($username, $password);//,$running_sesion
        $response['login_status'] = $login_status;
        if ($login_status == 'success') {
            $response['redirect_url'] = $this->session->userdata('last_page');
			//redirect(base_url(), 'refresh');
        }

        //Replying ajax request with validation response
        echo json_encode($response);
    }

    //Validating login from ajax request
    function validate_login($username = '', $password = '') {//, $running_sesion = ''
        $credential = array('username' => $username, 'password' => sha1(md5(sha1(md5($password)))));
		 
		// limit show records in page 
		$this->session->set_userdata('per_page', $this->sys->get_where('settings' , array('type' => 'per_page'))->row()->description);

        // Checking login credential for admin
		$this->sys->where('status=',1);
        $query = $this->sys->get_where('user', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();

            //$this->session->set_userdata('running_session', $running_sesion);
            $this->session->set_userdata('is_login', '1');
            $this->session->set_userdata('user_id', $row->admin_id); 
            $this->session->set_userdata('sap_id', $row->SAP_ID);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('branch_id', $row->branch_id);
            $this->session->set_userdata('prefix', $this->sys->get_where('branch' , array('id' => $row->branch_id))->row()->prefix);
            $this->session->set_userdata('common_name', $this->sys->get_where('common')->row()->common_name);
            $this->session->set_userdata('common_id', $this->sys->get_where('common')->row()->id);

            //$this->session->set_userdata('session_name', $this->sys->get_where('school_session',array('id' => $running_sesion))->row()->session_name);
            // is login
			$this->sys->where('admin_id',$row->admin_id);
			$this->sys->set('is_login','online');
			$this->sys->update('user');

			//
            self::writeMenus($row->admin_id);
			
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
        $query = $this->sys->get_where('admin' , array('email' => $email));
        if ($query->num_rows() > 0) 
        {
            $reset_account_type     =   'admin';
            $this->sys->where('email' , $email);
            $this->sys->update('admin' , array('password' => $new_password));
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
		$this->sys->where('admin_id',$this->session->userdata('login_user_id'));
		$this->sys->set('is_login','offline');
		$this->sys->update('user');
		
		//
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url(), 'refresh');
    }
	
	
	/***** get suppervisor email *****/
	function getAdvisor($param1 = ''){ 
		$sql = "  select type,description from settings where type = ? ";
		
		$record = $this->sys->query($sql,array($param1))->result_array();
		 
		foreach($record as $row){
			$suppervice = $row["description"];
		}
		  
		return $suppervice;
		
	}

	function writeMenus($user_id){
        $sql = "   
                    SELECT 
                        * 
                    FROM menu 
                    WHERE MENU_ID IN(
                        select 
                            DISTINCT m.MAIN_MENU_ID 
                        from menu m 
                        inner join menu_role mr on mr.MENU_ID = m.MENU_ID
                        inner join role r on r.role_id = mr.ROLE_ID
                        inner join user u on u.role_id = r.role_id  
                        where sap_id =  '" . $this->session->userdata('sap_id') . "' 
                    )
                    
                    AND is_leaf =  ?
                    and LOAD_TYPE = 1
                    and status_id = 1
                    and MAIN_MENU_ID = 0 
                    
                    union all 
                    
                    SELECT 
                            m.*
                    from menu m 
                    inner join menu_role mr on mr.MENU_ID = m.MENU_ID
                    inner join role r on r.role_id = mr.ROLE_ID
                    inner join user u on u.role_id = r.role_id  
                    where sap_id = '" . $this->session->userdata('sap_id') . "'
                    AND MAIN_MENU_ID = ? 
                    and LOAD_TYPE = 1
                    and status_id = 1
                        
                ORDER BY order_by ASC
            ";
            $result = $this->sys->query($sql, array(1, 0))->result_array();

        $navigation = '';

        foreach ($result as $row) {
            //
            if ($row["IS_LEAF"] == 1) {// level one
                $navigation .= '<li class="droplink">
									<a href="#">
										<span class="menu-icon ' . $row["icon"] . '"></span>
										<p>' . get_phrase($row["MENU_NAME"]) . '</p><span class="arrow"></span>
									</a>
								<ul  class="sub-menu">';

                $result1 = $this->sys->query($sql, array(0, $row["MENU_ID"]))->result_array();

                // checking is have sub menu?
                foreach ($result1 as $sub) {
                    if ($sub["IS_LEAF"] == 1) { // level two
                        $navigation .= '<li class="droplink">
													<a href="#">
														<span class="menu-icon ' . $sub["icon"] . '"></span>
														<p>' . get_phrase($sub["MENU_NAME"]) . '</p><span class="arrow"></span>
													</a>
												<ul  class="sub-menu">';
                        $result2 = $this->sys->query($sql, array(0, $sub["MENU_ID"]))->result_array();
                        foreach ($result2 as $sub2) {
                            //
                            $navigation .= '<li class="">
													<a href="' . base_url() . $sub2["LINK"] . '">
														<span class="menu-icon ' . $sub2["icon"] . '"></span>
														<p>' . get_phrase($sub2["MENU_NAME"]) . '</p>
													</a>
												</li>';
                        }
                        $navigation .= '</ul></li>';
                    } else {

                        //
                        $navigation .= '<li class="">
												<a href="' . base_url() . $sub["LINK"] . '">
													<span class="menu-icon ' . $sub["icon"] . '"></span>
													<p>' . get_phrase($sub["MENU_NAME"]) . '</p>
												</a>
											</li>';
                    }
                }
                // for main menu
                $navigation .= '</ul></li>';
            } else {
                $navigation .= '<li class="">
									<a href="' . base_url() . $row["LINK"] . '">
										<span class="menu-icon ' . $row["icon"] . '"></span>
										<p>' . get_phrase($row["MENU_NAME"]) . '</p>
									</a>
								</li>';
            }
        }

        fopen('./'.$user_id.'.txt', 'w');
        // write string to text file
        file_put_contents('./'.$user_id.'.txt',$navigation);
    }
	 

}
