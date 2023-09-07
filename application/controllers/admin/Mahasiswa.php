<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends MY_Controller
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
            'title'                 => 'Data Mahasiswa PPKn | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
         $this->db->select('*');
         $this->db->from('mahasiswa');
         $this->db->order_by('nim', 'ASC');
         $data3 = $this->db->get()->result_array();
         $data3 = array('data3' => $data3);
        $this->template->load('layout/template', 'admin/mahasiswa/index', array_merge($data, $data3));
    }
    public function simpan(){
        $cek = $this->CRUD_model->ceknim($this->input->post('nim'));
        if($cek==1){
            $this->session->set_flashdata('alert', '<p class="box-msg">
            <div class="info-box alert-warning">
            <div class="info-box-icon">
            <i class="fa fa-close"></i>
            </div>
            <div class="info-box-content" style="font-size:14">
            <b style="font-size: 20px">GAGAL</b><br>'.$this->input->post('nim').' telah digunakan.</div>
            </div>
            </p>
            ');
            redirect('admin/mahasiswa');           
        } else {
            $data = array(
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
             );  
            $this->CRUD_model->Insert('mahasiswa', $data); 
            $this->session->set_flashdata('alert', '<p class="box-msg">
            <div class="info-box alert-success">
            <div class="info-box-icon">
            <i class="fa fa-check"></i>
            </div>
            <div class="info-box-content" style="font-size:14">
            <b style="font-size: 20px">SUCCESS</b><br>'.$this->input->post('nama').' telah ditambahkan.</div>
            </div>
            </p>
            ');
            redirect('admin/mahasiswa'); 
        }
              
    }
    public function delete($id){
        $id = array('id' => $id);
        $this->CRUD_model->Delete('mahasiswa', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-trash"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Data mahasiswa berhasil dihapus.</div>
        </div>
        </p>
        ');
        redirect('admin/mahasiswa');
    }
    public function edit($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui Data Mahasiswa | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site
        );
        $where = array('id' => $id);
        $data2['data2'] = $this->CRUD_model->edit_data($where,'mahasiswa')->result();
        $this->template->load('layout/template', 'admin/mahasiswa/edit', array_merge($data, $data2));
    }

    public function update(){
        $data = array(
            'nama' => $this->input->post('nama'),
            'nim' => $this->input->post('nim')
         );  
        $where = array(
            'id' => $this->input->post('id'),
        );
        $cek = $this->CRUD_model->ceknim($this->input->post('nim'));
        if($cek==1){
            $this->session->set_flashdata('alert', '<p class="box-msg">
            <div class="info-box alert-warning">
            <div class="info-box-icon">
            <i class="fa fa-close"></i>
            </div>
            <div class="info-box-content" style="font-size:14">
            <b style="font-size: 20px">GAGAL</b><br>'.$this->input->post('nim').' telah digunakan.</div>
            </div>
            </p>
            ');
            redirect('admin/mahasiswa');           
        } else {
            $data = $this->CRUD_model->Update('mahasiswa', $data, $where);
            $this->session->set_flashdata('alert', '<p class="box-msg">
            <div class="info-box alert-success">
            <div class="info-box-icon">
            <i class="fa fa-check"></i>
            </div>
            <div class="info-box-content" style="font-size:14">
            <b style="font-size: 20px">SUCCESS</b><br>'.$this->input->post('nama').' telah diperbarui.</div>
            </div>
            </p>
            ');
            redirect('admin/mahasiswa'); 
        }
              
    }

}
