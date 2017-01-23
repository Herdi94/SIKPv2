<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembimbing/daftar_model','daftar');
    }

    public function index(){
        $this->load->view('pembimbing/pendaftaran_view2');
    }

    public function ajax_list(){
        $list = $this->daftar->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $daftar) {
            $no++;
            $row = array();
            $row[] = $daftar->kode_pengajuan;
            $row[] = $daftar->no_identitas;
            $row[] = $daftar->nama;
            $row[] = $daftar->sekolah;
            $row[] = $daftar->jns_pengaju;
            $row[] = $daftar->tgl_mulai;
            $row[] = $daftar->tgl_akhir;
            $row[] = $daftar->status;

            if($daftar->photo)
                $row[] = '<a href="'.base_url('upload/'.$daftar->photo).'" target="_blank"><img src="'.base_url('upload/'.$daftar->photo).'" class="img-responsive" /></a>';
            else
                $row[] = '(No photo)';

//add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Detail" onclick="detail_pendaftaran('."'".$daftar->kode_pengajuan."'".')"><i class="glyphicon glyphicon-list-alt"></i> Detail</a>';


            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->daftar->count_all(),
            "recordsFiltered" => $this->daftar->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


    public function detail_pengaju($kode_pengajuan)
    {
        $data = $this->daftar->get_by_id($kode_pengajuan);
        echo json_encode($data);
    }

}