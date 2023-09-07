<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends MY_Controller
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
            'title'                 => 'Kategori Informasi | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
         $this->db->select('*');
         $this->db->from('kategori a');
         $this->db->join('main_sub b', 'a.id_main = b.id_main','left');
         $this->db->or_where('b.jenis =',0);
         $this->db->or_where('a.main =',0);
         $this->db->order_by('b.urutan', 'ASC');
         $data2 = $this->db->get()->result_array();
         $data2 = array('data2' => $data2);

         $this->db->select('*');
         $this->db->from('main_sub');
         $this->db->where('jenis =',0);
         $this->db->order_by('urutan', 'ASC');
         $data3 = $this->db->get()->result_array();
         $data3 = array('data3' => $data3);
        $this->template->load('layout/template', 'admin/kategori/index', array_merge($data, $data2, $data3));
    }
    public function simpan(){
        $data = array(
            'kategori' => $this->input->post('kategori'),
            'id_main' => $this->input->post('id_main')
         );  
        $this->CRUD_model->Insert('kategori', $data); 
        $this->session->set_flashdata('kategori', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Kategori telah ditambahkan.</div>
        </div>
        </p>
        ');
        redirect('admin/kategori');       
    }
    public function simpan2(){
        $data = array(
            'main_sub' => $this->input->post('kategori'),
            'urutan' => $this->input->post('urutan'),
            'jenis' => 0,
         );  
        $this->CRUD_model->Insert('main_sub', $data); 
        $this->session->set_flashdata('kategori', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Main navigasi informasi telah ditambahkan.</div>
        </div>
        </p>
        ');
        redirect('admin/kategori');       
    }
    public function delete($id){
        $id = array('id_kategori' => $id);
        $this->CRUD_model->Delete('kategori', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-trash"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Berhasil menghapus kategori.</div>
        </div>
        </p>
        ');
        redirect('admin/kategori');
    }
    public function delete2($id){
        $id = array('id_main' => $id);
        $this->CRUD_model->Delete('main_sub', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-trash"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Berhasil menghapus main navigasi informasi.</div>
        </div>
        </p>
        ');
        redirect('admin/kategori');
    }
    public function edit($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui kategori | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site
        );
        $this->db->select('*');
        $this->db->from('main_sub');
        $this->db->where('jenis',0);
        $this->db->order_by('urutan', 'ASC');
        $data3 = $this->db->get()->result_array();
        $data3 = array('data3' => $data3);
        $where = array('id_kategori' => $id);
        $data2['data2'] = $this->CRUD_model->edit_data($where,'kategori')->result();
        $this->template->load('layout/template', 'admin/kategori/edit', array_merge($data, $data2, $data3));
    }
    public function edit2($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui kategori | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site
        );
        $where = array('id_main' => $id);
        $data2['data2'] = $this->CRUD_model->edit_data($where,'main_sub')->result();
        $this->template->load('layout/template', 'admin/kategori/edit2', array_merge($data, $data2));
    }

    public function update(){
        $data = array(
            'kategori' => $this->input->post('kategori'),
            'id_main' => $this->input->post('id_main')
         );  
        $where = array(
            'id_kategori' => $this->input->post('id'),
        );
        $data = $this->CRUD_model->Update('kategori', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Kategori telah diperbarui.</div>
        </div>
        </p>
        ');
        redirect('admin/kategori');       
    }
    public function update2(){
        $data = array(
            'main_sub' => $this->input->post('kategori'),
            'urutan' => $this->input->post('urutan')
         );  
        $where = array(
            'id_main' => $this->input->post('id'),
        );
        $data = $this->CRUD_model->Update('main_sub', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Main navigasi telah diperbarui.</div>
        </div>
        </p>
        ');
        redirect('admin/kategori');       
    }

}
