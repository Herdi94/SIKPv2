
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembimbing_model extends CI_Model
{

    var $table = 'pembimbing';


    public function update($where,$data){

        $this->db->update($this->table, $data,$where);
        return $this->db->affected_rows();
    }

    public function save_pass(){
        $pass = sha1($this->input->post('new'));
        $data = array(
            'password' => $pass
        );
        $this->db->where('id_pembimbing',$this->session->userdata('id_pembimbing'));
        $this->db->update('pembimbing',$data);
    }

    public function cek_old(){
        $old = sha1($this->input->post('old'));
        $this->db->where('password',$old);
        $query = $this->db->get('pembimbing');
        return $query->result();
    }

}

