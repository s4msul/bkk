<?php

class M_users extends CI_Model {
    
    function validate_my_account($username, $password) {
        $sql = "select * from user where username = '$username' and password = '".md5($password)."'";
        return $this->db->query($sql);
    }
    
    function validate_member_account($username, $password) {
        $sql = "select * from pendaftar where username = '$username' and password = '".md5($password)."' and status = '1'";
        return $this->db->query($sql);
    }
}