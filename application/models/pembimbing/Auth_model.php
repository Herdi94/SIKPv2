<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{

//    untuk mengcek jumlah username,password,email yang sesuai
    function login($username, $password)
    {
        $this->db->where("(pembimbing.email = '$username' OR pembimbing.username = '$username')");
        $this->db->where('password', $password);
        $query = $this->db->get('pembimbing');
        return $query->num_rows();
    }

//    untuk mengambil data hasil login
    function data_login($username, $password)
    {
        $this->db->where("(pembimbing.email = '$username' OR pembimbing.username = '$username')");
        $this->db->where('password', $password);
        return $this->db->get('pembimbing')->row();
    }

}
