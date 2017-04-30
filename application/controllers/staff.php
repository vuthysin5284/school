<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }
    function staffing()
    {
        $page_data['page_name']  = 'staff/staffing';
        $page_data['page_title'] = get_phrase('staff');
        $this->load->view('index', $page_data);
    }
}