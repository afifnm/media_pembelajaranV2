<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends MY_Controller
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
            'title'                 => 'Data Dosen PPKn | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
         $this->db->select('*');
         $this->db->from('dosen');
         $data3 = $this->db->get()->result_array();
         $data3 = array('data3' => $data3);
        $this->template->load('layout/template', 'admin/dosen/index', array_merge($data, $data3));
    }
    public function simpan(){
        $data = array(
            'nama' => $this->input->post('nama'),
         );  
        $this->CRUD_model->Insert('dosen', $data); 
        $this->session->set_flashdata('kategori', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>'.$this->input->post('nama').' telah ditambahkan.</div>
        </div>
        </p>
        ');
        redirect('admin/dosen');       
    }
    public function delete($id){
        $id = array('id_dosen' => $id);
        $this->CRUD_model->Delete('dosen', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-trash"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Data dosen berhasil dihapus.</div>
        </div>
        </p>
        ');
        redirect('admin/dosen');
    }
    public function edit($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui Data Dosen | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site
        );
        $where = array('id_dosen' => $id);
        $data2['data2'] = $this->CRUD_model->edit_data($where,'dosen')->result();
        $this->template->load('layout/template', 'admin/dosen/edit', array_merge($data, $data2));
    }

    public function update(){
        $data = array(
            'nama' => $this->input->post('nama')
         );  
        $where = array(
            'id_dosen' => $this->input->post('id'),
        );
        $data = $this->CRUD_model->Update('dosen', $data, $where);
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
        redirect('admin/dosen');       
    }

}
