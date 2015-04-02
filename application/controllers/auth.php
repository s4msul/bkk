<?php

class Auth extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model(array('m_home'));
        $this->load->library('pagination');
        $this->title = 'ADMINISTRATOR | AREA 51';
        
    }
    
    function logmein() {
        $data['title'] = 'Login | '.$this->title;
        $data['subtitle'] = $this->title;
        $data['log'] = 'auth';
        $id_user = $this->session->userdata('id_user');
        if (!empty($id_user)) {
            $data['title'] = 'Restricted Area';
            $data['brand'] = $this->brand;
            redirect('areafiftyone');
        } else {
            $this->load->view('login', $data);
        }
        
    }
}