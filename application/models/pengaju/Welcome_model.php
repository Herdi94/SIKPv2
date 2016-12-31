<?php
/**
 * Created by PhpStorm.
 * User: Herdi
 * Date: 07/10/2016
 * Time: 21.46
 */ if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_model extends CI_Model {

    public function add($data){
        $this->db->insert("pengaju",$data);
        return $this->db->insert_id();
    }
}