<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ujian extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->check_login();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->helper('tgl_indo');
        $this->load->model('CRUD_model');
        if ($this->session->userdata('level') != "Admin") {
            redirect('', 'refresh');
        }
    }

    public function index(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Pendaftaran Tugas Akhir | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
         $this->db->select('*');
         $this->db->from('judul');
         $this->db->or_where('tahap',2);
         $this->db->or_where('tahap',3);
         $this->db->or_where('tahap',4);
         $this->db->or_where('tahap',5);
         $this->db->order_by("nim","ASC");
         $data2 = $this->db->get()->result_array();
         $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/sita/ujian', array_merge($data, $data2));
    }

    public function selesai($id){
        $data = array(
              'tahap'    => 6
           );   
        $where = array(
            'id' => $id,
        );
        $data = $this->CRUD_model->Update('judul', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Ujian telah selesai.</div>
        </div>
        </p>
        ');
        redirect('admin/ujian');       
    }

    public function update(){
        $count = $this->CRUD_model->no_register();
        $tahun = date('Y');
        if($count==0){
                $count++;
                $nomor = $tahun.'.001';
              }
              elseif($count<9){
                $count++;
                $nomor = $tahun.'.00'.$count;
              }
              elseif($count<99){
                $count++;
                $nomor = $tahun.'.0'.$count;
              }
              else {
                $count++;
                $nomor = $tahun.'.'.$count;
              }
        $date = date('Y-m-d');
        $data = array(
              'no_ujian' => $nomor,
              'penguji1' => $this->input->post('penguji1'),
              'penguji2' => $this->input->post('penguji2'),
              'penguji3' => $this->input->post('penguji3'),
              'penguji4' => $this->input->post('penguji4'),
              'tanggal_ujian' => $this->input->post('tanggal_ujian'),
              'jam1' => $this->input->post('jam1'),
              'jam2' => $this->input->post('jam2'),
              'tanggal_daftar' => $date,
              'ruang' => $this->input->post('ruang'),
              'catatan' => $this->input->post('catatan'),
              'tahap'    => 5
           );   
        $where = array(
            'id' => $this->input->post('id'),
        );
        $email = $this->input->post('email');
        //konfigurasi email
        $config = Array(  
          'protocol' => 'smtp',  
          'smtp_host' => 'mail.mediainformasipkn.id',  
          'smtp_port' => 587,  
          'smtp_user' => 'admin@mediainformasipkn.id',   
          'smtp_pass' => 'mediapkn2019',   
          'mailtype' => 'html',   
          'charset' => 'iso-8859-1'  
         );  
         $this->load->library('email', $config);  
         $this->email->set_newline("\r\n"); 
        $link = site_url("sita/skripsi/".$this->input->post('id'));
        $this->email->from('admin@mediainformasipkn.id', 'Sistem Informasi Tugas Akhir (SITA) PPKn UNS');
        $this->email->to($email);
        $this->email->subject('Pemberitahuan Verifikasi Ujian Skripsi | Sistem Informasi Tugas Akhir (SITA) PPKn UNS');
        $this->email->message('Pendaftaran ujian tugas akhir (skripsi) anda telah diverifikasi. Cek website untuk mengetahui  jadwal ujian dan tim penguji anda. Klik tautan berikut: <a href="'.$link.'" target="_blank"> '.$link.' </a> ');
        $this->email->send();

        $data = $this->CRUD_model->Update('judul', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Tim penguji berhasil ditetapkan.</div>
        </div>
        </p>
        ');
        redirect('admin/ujian');       
    }

    public function updateberkas(){
        $konfirmasi = $this->input->post('konfirmasi');
        $catatan = $this->input->post('catatan');
        
        
        $where = array('id' => $this->input->post('id'));
        $email = $this->input->post('email');
        //konfigurasi email
        $config = Array(  
          'protocol' => 'smtp',  
          'smtp_host' => 'mail.mediainformasipkn.id',  
          'smtp_port' => 587,  
          'smtp_user' => 'admin@mediainformasipkn.id',   
          'smtp_pass' => 'mediapkn2019',   
          'mailtype' => 'html',   
          'charset' => 'iso-8859-1'  
         );  
         $this->load->library('email', $config);  
         $this->email->set_newline("\r\n"); 
         $link = site_url("sita/ujian/");
         $this->email->from('admin@mediainformasipkn.id', 'Sistem Informasi Tugas Akhir (SITA) PPKn UNS');
         $this->email->to($email);
        
        if($konfirmasi==0){
          $data = array(
            'tahap'    => 3,
            'catatan'  => $catatan
          );   
          $this->CRUD_model->Update('judul', $data, $where);
          $this->email->subject('Pemberitahuan Verifikasi Berkas Ujian Skripsi | Sistem Informasi Tugas Akhir (SITA) PPKn UNS');
          $this->email->message('Berkas-berkas ujian skripsi anda belum memenuhi syarat. Dengan catatan '.$catatan.'. <br> Klik tautan berikut untuk memperbarui berkas anda : <a href="'.$link.'" target="_blank"> '.$link.' </a> ');
          } else {
          $data = array('tahap'    => 4); 
          $this->CRUD_model->Update('judul', $data, $where);
          $this->email->subject('Pemberitahuan Verifikasi Berkas Ujian Skripsi | Sistem Informasi Tugas Akhir (SITA) PPKn UNS');
          $this->email->message('Berkas-berkas ujian srkipsi anda telah memenuhi syarat. Tunggu pemberitahuan selanjutnya untuk info penetapan Tim Penguji.');  
          } 
        
        $this->email->send();
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success"><div class="info-box-icon"><i class="fa fa-check"></i></div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Konfirmasi berkas telah dilakukan.</div></div></p>');
        redirect('admin/ujian');       
    }

    public function penguji($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Penetapan Tim Penguji Tugas Akhir | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site
        );
        $where = array('id' => $id);
        $data2['data2'] = $this->CRUD_model->edit_data($where,'judul')->result();

         $this->db->select('*');
         $this->db->from('dosen');
         $data3 = $this->db->get()->result_array();
         $data3 = array('data3' => $data3);
        $this->template->load('layout/template', 'admin/sita/penguji', array_merge($data, $data2,$data3));
    }

    public function berkas($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Verifikasi Tugas Akhir | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site
        );
        $where = array('id' => $id);
        $data2['data2'] = $this->CRUD_model->edit_data($where,'judul')->result();
        $this->template->load('layout/template', 'admin/sita/berkas', array_merge($data, $data2));
    }
    public function cek(){
        $email = $this->input->post('email');
        //konfigurasi email
        $config = Array(  
          'protocol' => 'smtp',  
          'smtp_host' => 'mail.mediainformasipkn.id',  
          'smtp_port' => 587,  
          'smtp_user' => 'admin@mediainformasipkn.id',   
          'smtp_pass' => 'mediapkn2019',   
          'mailtype' => 'html',   
          'charset' => 'iso-8859-1'  
         );  
         $this->load->library('email', $config);  
         $this->email->set_newline("\r\n"); 
        $link = site_url("sita/skripsi/".$this->input->post('id'));
        $this->email->from('admin@mediainformasipkn.id', 'Sistem Informasi Tugas Akhir (SITA) PPKn UNS');
        $this->email->to($email);
        $this->email->subject('Pemberitahuan Verifikasi Ujian Skripsi | Sistem Informasi Tugas Akhir (SITA) PPKn UNS');
        $this->email->message('Pendaftaran ujian tugas akhir (skripsi) anda telah diverifikasi. Cek website untuk mengetahui  jadwal ujian dan tim penguji anda. Klik tautan berikut: <a href="'.$link.'" target="_blank"> '.$link.' </a> ');
        $this->email->send();     
    }

}
