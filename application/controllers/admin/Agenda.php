<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends MY_Controller
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
            'title'                 => 'Agenda Kegiatan | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
         $this->db->select('*');
         $this->db->from('agenda');
         $data2 = $this->db->get()->result_array();
         $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/agenda', array_merge($data, $data2));
    }
    public function simpan(){
        $data = array(
            'agenda' => $this->input->post('mytextarea')
         );  
        $this->CRUD_model->Insert('agenda', $data); 
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Agenda telah ditambahkan.</div>
        </div>
        </p>
        ');
        redirect('admin/agenda');       
    }
    public function delete($id){
        $id = array('id' => $id);
        $this->CRUD_model->Delete('agenda', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-trash"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Berhasil menghapus agenda.</div>
        </div>
        </p>
        ');
        redirect('admin/agenda');
    }
    public function edit($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui agenda | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site
        );
        $where = array('id' => $id);
        $data2['data2'] = $this->CRUD_model->edit_data($where,'agenda')->result();
        $this->template->load('layout/template', 'admin/agenda_edit', array_merge($data, $data2));
    }

    public function update(){
        $data = array(
            'agenda' => $this->input->post('mytextarea')
         );  
        $where = array(
            'id' => $this->input->post('id'),
        );
        $data = $this->CRUD_model->Update('agenda', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Agenda telah diperbarui.</div>
        </div>
        </p>
        ');
        redirect('admin/agenda');       
    }

}
