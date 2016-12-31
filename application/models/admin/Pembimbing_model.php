<?php
/**
 * Created by PhpStorm.
 * User: Herdi
 * Date: 15/11/2016
 * Time: 16.34
 */
if ( !defined('BASEPATH')) exit('No direct script access allowed');
class Pembimbing_model extends CI_Model{
    var $table = 'pembimbing';
    var $column_order = array('id_pembimbing','nip','nama','bidang','jabatan','photo','username',null);
    var $column_search = array('nip','nama','username');
    var $order = array('id_pembimbing'=>'asc');



    public function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            $value = isset($_POST['search']['value']);
            if ($value) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }



        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        $value = isset($_POST['length']);
        if ($value != -1)
            $this->db->limit(isset($_POST['length'], $_POST['start']));
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id_pembimbing)
    {
        $this->db->from($this->table);
        $this->db->where('id_pembimbing',$id_pembimbing);
        $query = $this->db->get();

        return $query->row();
    }

    public function delete_by_id($id_pembimbing)
    {
        $this->db->where('id_pembimbing',$id_pembimbing);
        $this->db->delete($this->table);
    }

    public function save($data){
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }

}