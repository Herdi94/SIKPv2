
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembimbing_model extends CI_Model
{

    var $table = 'pembimbing';


    public function update($where,$data){

        $this->db->update($this->table, $data,$where);
        return $this->db->affected_rows();
    }


}

