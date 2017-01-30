<?php
/**
 * Created by PhpStorm.
 * User: Herdi
 * Date: 15/11/2016
 * Time: 16.33
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); // TODO: Change the autogenerated stub

        $this->load->model('admin/admin_model', 'admin');
        $this->load->library('session');
    }

    public function ajax_update_profile(){
      $this->_validate();


        //Check whether user upload picture
        if (!empty($_FILES['photo']['name'])) {
            $config['upload_path'] = 'upload/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']             = '4096';
            $config['file_name'] = $_FILES['photo']['name'];

            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('photo')) {
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];
            } else {


                $data['inputerror'][] = 'photo';
                $data['error_string'][] = 'Upload error : '.$this->upload->display_errors('','');
                $data['status'] = FALSE;
                echo json_encode($data);
                exit();
            }
        } else {
            $picture = '';
        }


        $data = array(

            'nip' => $this->input->post('nip'),
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'photo' => $picture
        );

        $this->admin->update(array('id_admin' => $this->input->post('id_admin')), $data);
        echo json_encode(array("status" => TRUE));
    }


    private function _validate(){
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('nip') == '')
        {
            $data['inputerror'][] = 'nip';
            $data['error_string'][] = 'NIP is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('nama') == '')
        {
            $data['inputerror'][] = 'nama';
            $data['error_string'][] = 'Nama is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('username') == '')
        {
            $data['inputerror'][] = 'username';
            $data['error_string'][] = 'Username is required';
            $data['status'] = FALSE;
        }
        if($this->input->post('email') == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'email is required';
            $data['status'] = FALSE;
        }

        if($data['status'] == FALSE){
            echo json_encode($data);
            exit();
        }
    }



}
