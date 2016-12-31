<?php
/**
 * Created by PhpStorm.
 * User: Herdi
 * Date: 04/10/2016
 * Time: 08.34
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function home()
    {
        $this->template->load('admin/template', 'admin/home_view');
    }


    public function index($error = NULL)
    {
        $data = array(
            'action' => site_url('dashboard/login'),
            'error' => $error
        );
        $this->load->view('admin/login_view', $data);
    }

    public function login()
    {
        $this->load->model('admin/auth_model');
        $login = $this->auth_model->login($this->input->post('username'), md5($this->input->post('password')), $this->db->select('nama'));

        if ($login == 1) {
//          ambil detail data
            $row = $this->auth_model->data_login($this->input->post('username'), md5($this->input->post('password')));

//          daftarkan session
            $data = array(
                'logged' => TRUE,
                'username' => $row->username,
                'nama' => $row->nama
            );

            $this->session->set_userdata($data);
            $this->template->load('admin/template', 'admin/home_view');

        } else {
//            tampilkan pesan error
            $error = 'username / password salah';
            $this->index($error);
        }
    }

    function logout()
    {
//        destroy session
        $this->session->sess_destroy();

//        redirect ke halaman login
        redirect(site_url('dashboard'));
    }


}