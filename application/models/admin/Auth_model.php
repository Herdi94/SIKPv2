<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

//    untuk mengcek jumlah username,password,email yang sesuai
    function login($username,$password) {
        $this->db->where("(admin.email = '$username' OR admin.username = '$username')");
        $this->db->where('password', $password);
        $query =  $this->db->get('admin');
        return $query->num_rows();
    }

//    untuk mengambil data hasil login
    function data_login($username,$password) {
        $this->db->where("(admin.email = '$username' OR admin.username = '$username')");
        $this->db->where('password', $password);
        return $this->db->get('admin')->row();
    }
}
