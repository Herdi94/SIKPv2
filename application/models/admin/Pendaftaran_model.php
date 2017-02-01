<?php
/**
 * Created by PhpStorm.
 * User: Herdi
 * Date: 07/10/2016
 * Time: 20.49
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{
 var $table = 'pengaju';
    var $column_order = array('PG.kode_pengajuan','PG.no_identitas','PG.nama','PG.sekolah','PG.jns_pengaju','PG.tgl_mulai','PG.tgl_akhir','PG.surat','PG.status',null);
    var $column_search = array('PG.no_identitas','PG.nama','PG.sekolah','PG.jns_pengaju','PG.status');
    var $order = array('PG.kode_pengajuan'=>'asc');

    private function _get_datatables_query()
    {

        $this->db->from("pengaju PG")
                 ->join("pembimbing PB","PG.id_pembimbing = PB.id_pembimbing","LEFT");

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            $value = isset($_POST['search']['value']);
            if($value) // if datatable send POST for search
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
        if ($value != -2)
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

    public function get_by_id($kode_pengajuan)
    {
        $this->db->from($this->table);
        $this->db->where('kode_pengajuan',$kode_pengajuan);
        $query = $this->db->get();

        return $query->row();
    }


    public function set_ac($ac,$kode_pengajuan,$date,$id_pembimbing){
        return $this->db->query("UPDATE pengaju SET status = '$ac',tgl_status = '$date', id_pembimbing = '$id_pembimbing' WHERE kode_pengajuan = '$kode_pengajuan'");
    }


}
