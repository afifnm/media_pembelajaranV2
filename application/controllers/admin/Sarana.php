<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sarana extends MY_Controller
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
            'title'                 => 'Sarana dan Prasarana | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
         $this->db->select('*');
         $this->db->from('sarana');
         $data2 = $this->db->get()->result_array();
         $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/sarana', array_merge($data, $data2));
    }
    public function simpan(){  
        $data = array(
            'judul' => $this->input->post('judul'),
            'nama' => $_FILES['fileForUpload']['name']
         );  

        ini_set('upload_max_filesize', '1M');
        $config = array();
        $config['upload_path']          = './assets/upload/sarana/';
        $config['file_name']            = $_FILES['fileForUpload']['name'];
        $config['max_size'] = 1 * 1024 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 1 * 1024 * 1024){
            $this->session->set_flashdata('alert', '<p class="box-msg">
            <div class="info-box alert-warning">
            <div class="info-box-icon">
            <i class="fa fa-warning"></i>
            </div>
            <div class="info-box-content" style="font-size:14">
            <b style="font-size: 20px">Peringatan ukuran foto</b><br>Ukuran Foto melebihi batas maksimal.</div>
            </div>
            </p>
            ');
            redirect('admin/sarana'); 
        }
        if ( ! $this->upload->do_upload('fileForUpload')) {
            $error = array('error' => $this->upload->display_errors());
        }
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Foto telah diupload.</div>
        </div>
        </p>
        ');
        $this->CRUD_model->Insert('sarana', $data); 
        redirect('admin/sarana');       
    }
    public function delete($nama){
        $filename=FCPATH.'/assets/upload/sarana/'.$nama;
        if (file_exists($filename)){
            unlink("./assets/upload/sarana/".$nama);
        }
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-trash"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Berhasil menghapus foto.</div>
        </div>
        </p>
        ');
        $id = array('nama' => $nama);
        $this->CRUD_model->Delete('sarana', $id);
        redirect('admin/sarana');
    }
}
