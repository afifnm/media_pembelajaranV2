<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
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
            'title'                 => 'Dashboard | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $this->template->load('layout/template', 'admin/dashboard', array_merge($data));
    }
    public function konfigurasi(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui Informasi | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site
        );
         $this->db->select('*');
         $this->db->from('konfigurasi');
         $data3 = $this->db->get()->result_array();
         $data3 = array('data3' => $data3);
        $this->template->load('layout/template', 'admin/konfigurasi', array_merge($data,$data3));
    }
    public function update(){
        $data = array(
            'nama_website' => $this->input->post('nama'),
            'judul_profil' => $this->input->post('judul'),
            'welcome' => $this->input->post('welcome'),
            'deskripsi' => $this->input->post('mytextarea'),
            'tanggal_awal' => $this->input->post('tanggal_awal'),
            'tanggal_akhir' => $this->input->post('tanggal_akhir'),
         );  
        $where = array(
            'id' => '1',
        );
        $data = $this->CRUD_model->Update('konfigurasi', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>informasi '.$this->input->post('judul').' telah diperbarui.</div>
        </div>
        </p>
        ');
        redirect('admin/home/konfigurasi');       
    }
}
