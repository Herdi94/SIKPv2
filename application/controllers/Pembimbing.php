<?php
/**
 * Created by PhpStorm.
 * User: Herdi
 * Date: 04/10/2016
 * Time: 08.34
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Pembimbing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

public function home(){
    $this->template->load('pembimbing/template','pembimbing/home_view');
    session_write_close();
}

    public function edit_profile(){
        $this->template->load('pembimbing/template','pembimbing/profile_view');
session_write_close();
    }

    public function pendaftaran(){
        $this->template->load('pembimbing/template','pembimbing/pendaftaran_view');
        session_write_close();
    }
    public function index($error = NULL)
    {
        $data = array(
            'action' => site_url('pembimbing/login'),
            'error' => $error
        );
        $this->load->view('pembimbing/login_view', $data);
    }

    public function login()
    {
        $this->load->model('pembimbing/auth_model');
        $login = $this->auth_model->login($this->input->post('username'), sha1($this->input->post('password')));


        if ($login == 1) {
//          ambil detail data
            $row = $this->auth_model->data_login($this->input->post('username'),sha1($this->input->post('password')));

//          daftarkan session
            $data = array(
                'logged' => TRUE,

                'id_pembimbing'=> $row->id_pembimbing,
                'username' => $row->username,
                'nama' => $row->nama,
                'nip' => $row->nip,
                'bidang' => $row->bidang,
                'jabatan' => $row->jabatan,
                'email' => $row->email,
                'photo' => $row->photo

            );

            $this->session->set_userdata($data);

            $this->template->load('pembimbing/template', 'pembimbing/home_view');

        } else {
//            tampilkan pesan error
            $error = 'username / email / password salah';
            $this->index($error);
        }
    }

    function logout()
    {
//        destroy session
        $this->session->sess_destroy();

//        redirect ke halaman login
        redirect(site_url('pembimbing'));
    }


}
