<?php

defined('BASEPATH') or exit('No direct script access allowed');

class File extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->check_login();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->model('CRUD_model');
        if ($this->session->userdata('level') != "Admin") {
            redirect('', 'refresh');
        }
    }

    public function index(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Data File | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
         $this->db->select('*');
         $this->db->from('file');
         $data2 = $this->db->get()->result_array();
         $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/file/index', array_merge($data, $data2));
    }
    public function simpan(){  
        ini_set('upload_max_filesize', '100M');
        $config = array();
        $config['upload_path']          = './assets/upload/file/';
        $config['allowed_types'] = '*';
        $config['file_name']            = $_FILES['fileForUpload']['name'];
        $this->load->library('upload',$config);
        if ( ! $this->upload->do_upload('fileForUpload')) {
            $error = array('error' => $this->upload->display_errors());
        }
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>file telah diupload.</div>
        </div>
        </p>
        ');
        redirect('admin/file');       
    }
    public function delete($nama){
        $filename=FCPATH.'/assets/upload/file/'.$nama;
        if (file_exists($filename)){
            unlink("./assets/upload/file/".$nama);
        }
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-trash"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Berhasil menghapus file.</div>
        </div>
        </p>
        ');
        redirect('admin/file');
    }
}
