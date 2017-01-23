
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    var $table = 'admin';


    public function update($where,$data){

        $this->db->update($this->table, $data,$where);
        return $this->db->affected_rows();
    }


}

