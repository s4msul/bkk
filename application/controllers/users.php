<?php

class Users extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model(array('m_users'));
    }
    function logmein() {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $data = $this->m_users->validate_my_account($username, $password)->row();
        if (isset($data->id_user)) {
            $data_session = array(
                'id_user' => $data->id_user,
                'user' => $data->username,
                'level' => $data->level, 
            );
            $this->session->set_userdata($data_session);
            die(json_encode(array_merge(array('status' => TRUE), $data_session)));
        } else {
            die(json_encode(array('status' => FALSE)));
        }
    }
    
    function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    
    function memberlogmein() {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $data = $this->m_users->validate_member_account($username, $password)->row();
        if (isset($data->id)) {
            $data_session = array(
                'id_member' => $data->id,
                'user' => $data->username,
                'nama' => $data->nama_lengkap,
                'level' => $data->level, 
            );
            $this->session->set_userdata($data_session);
            die(json_encode(array_merge(array('status' => TRUE), $data_session)));
        } else {
            die(json_encode(array('status' => FALSE)));
        }
    }
}
?>
