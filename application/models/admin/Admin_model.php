
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    var $table = 'admin';



    public function update($where,$data){

        $this->db->update($this->table, $data,$where);
        return $this->db->affected_rows();
    }

    public function save()
    {
        $pass = sha1($this->input->post('new'));
        $data = array (
            'password' => $pass
        );
        $this->db->where('id_admin', $this->session->userdata('id_admin'));
        $this->db->update('admin', $data);
    }

    public function cek_old()
    {
        $old = sha1($this->input->post('old'));
        $this->db->where('password',$old);
        $query = $this->db->get('admin');
        return $query->result();
    }

}

