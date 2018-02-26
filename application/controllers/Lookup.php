<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lookup extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->sys = $this->load->database('sys', TRUE);
        $this->load->library('session');
        $this->load->model("Common_model","com_m");
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }
    function getSectionListBySessionId(){
        $session_id    = $this->input->post("session_id");
        $section_list = $this->com_m->get_section_list($session_id);
        $class_list = $this->com_m->get_class_active($session_id);
        echo json_encode(array('session'=>$section_list,'class'=>$class_list));
    }



}