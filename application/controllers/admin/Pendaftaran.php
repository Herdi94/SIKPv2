<?php
/**
 * Created by PhpStorm.
 * User: Herdi
 * Date: 07/10/2016
 * Time: 20.48
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/pendaftaran_model','pendaftaran');
        $this->load->library('session');
    }

    public function index(){
        $this->load->view('admin/pendaftaran_view');
    }


    public function ajax_list(){
            $list = $this->pendaftaran->get_datatables();
            $data = array();
            $no = $_POST['start'];
        foreach ($list as $pendaftaran) {
            $no++;
            $row = array();
            $row[] = $pendaftaran->kode_pengajuan;
            $row[] = $pendaftaran->no_identitas;
            $row[] = $pendaftaran->nama;
            $row[] = $pendaftaran->sekolah;
            $row[] = $pendaftaran->jns_pengaju;
            $row[] = $pendaftaran->tgl_mulai;
            $row[] = $pendaftaran->tgl_akhir;
            $row[] = $pendaftaran->status."<br />".$pendaftaran->nama_pembimbing."<br />".$pendaftaran->tgl_status;


            if($pendaftaran->surat)
                $row[] = '<a href="'.base_url('upload/'.$pendaftaran->surat).'" target="_blank"><img src="'.base_url('upload/'.$pendaftaran->surat).'" class="img-responsive" /></a>';
            else
                $row[] = '(No photo)';



//add level
            if($this->session->userdata('level') == 1) {

                if ($pendaftaran->status == "Diterima") {


                    $row[] = '<a class="btn btn-block btn-primary" href="javascript:void(0)" title="Detail" onclick="detail_pendaftaran(' . "'" . $pendaftaran->kode_pengajuan . "'" . ')"><i class="glyphicon glyphicon-list-alt"></i> Detail</a>';

                } else if ($pendaftaran->status == "Ditolak") {
                    $row[] = '<a class="btn btn-block btn-primary" href="javascript:void(0)" title="Detail" onclick="detail_pendaftaran(' . "'" . $pendaftaran->kode_pengajuan . "'" . ')"><i class="glyphicon glyphicon-list-alt"></i> Detail</a>
                    <a class="btn btn-block btn-success" id="btnSetuju" onclick="disetujui(' . "'" . $pendaftaran->kode_pengajuan . "'" . ')"><i class="glyphicon glyphicon-check"></i> Disetujui</a>';
                } else {
                    $row[] = '<a class="btn btn-block btn-primary" href="javascript:void(0)" title="Detail" onclick="detail_pendaftaran(' . "'" . $pendaftaran->kode_pengajuan . "'" . ')"><i class="glyphicon glyphicon-list-alt"></i> Detail</a>
            <a class="btn btn-block btn-success" id="btnSetuju" onclick="disetujui(' . "'" . $pendaftaran->kode_pengajuan . "'" . ')"><i class="glyphicon glyphicon-check"></i> Disetujui</a>
            <a class="btn btn-block btn-danger" id="btnDitolak"  onclick="ditolak(' . "'" . $pendaftaran->kode_pengajuan . "'" . ')"><i class="glyphicon glyphicon-remove-sign"></i> Ditolak</a>';

                }
            }
            else{
                $row[] = '<a class="btn btn-block btn-primary" href="javascript:void(0)" title="Detail" onclick="detail_pendaftaran(' . "'" . $pendaftaran->kode_pengajuan . "'" . ')"><i class="glyphicon glyphicon-list-alt"></i> Detail</a>';
            }



            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pendaftaran->count_all(),
            "recordsFiltered" => $this->pendaftaran->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function action_status(){

        $kode_pengajuan = '';
        $ac = "";
        $id_pembimbing = "";

        if(!empty($this->input->post('ac'))){
            $ac = $this->input->post('ac');
        }

        if(!empty($this->input->post('kode_pengajuan'))){
            $kode_pengajuan = $this->input->post('kode_pengajuan');
        }

        if(!empty($this->input->post('id_pembimbing'))){
            $id_pembimbing = $this->input->post('id_pembimbing');
        }

        $date = date('Y-m-d H:i:s');

        $result = $this->pendaftaran->set_ac($ac,$kode_pengajuan,$date,$id_pembimbing)->result();
        echo json_encode($result);

    }


    public function detail_pengaju($kode_pengajuan)
    {
        $data = $this->pendaftaran->get_by_id($kode_pengajuan);
        echo json_encode($data);
    }

}