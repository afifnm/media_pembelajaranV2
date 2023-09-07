<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends MY_Controller
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
            'title'                 => 'Data Informasi | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
         $this->db->select('*');
         $this->db->from('informasi a');
         $this->db->join('kategori b', 'a.id_kategori = b.id_kategori','left');
         $this->db->order_by("a.tanggal","DESC");
         $data2 = $this->db->get()->result_array();
         $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/informasi/index', array_merge($data, $data2));
    }
    public function tambah(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Tambah Data Informasi | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
         $this->db->select('*');
         $this->db->from('kategori');
         $data2 = $this->db->get()->result_array();
         $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/informasi/tambah', array_merge($data, $data2));
    }

    public function simpan(){
        date_default_timezone_set("Asia/Jakarta");
        $time = date('Ymd').'.jpg';
        $data2 = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('mytextarea'),
            'id_kategori' => $this->input->post('kategori'),
            'tanggal' => date('Y-m-d'),
            'foto' => $time
         );  
        

        $config['upload_path']          = 'assets/upload/images/informasi/';
        $config['max_size'] = 800 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $time;
        $this->load->library('upload', $config);
        if($_FILES['lampiran']['size'] >= 800 * 1024){
            $this->CRUD_model->Insert('informasi', $data2); 
            $this->session->set_flashdata('alert', '<p class="box-msg">
            <div class="info-box alert-warning">
            <div class="info-box-icon">
            <i class="fa fa-warning"></i>
            </div>
            <div class="info-box-content" style="font-size:14">
            <b style="font-size: 20px">Peringatan ukuran foto</b><br>Artikel telah tersimpan tetapi ukuran foto upload lebih dari 800KB, silahkan perbarui artikel yang telah dibuat dan masukan fotonya kembali.</div>
            </div>
            </p>
            ');
            redirect('admin/informasi'); 
        }  elseif( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }        
        $this->CRUD_model->Insert('informasi', $data2); 
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>informasi '.$this->input->post('judul').' telah ditambahkan.</div>
        </div>
        </p>
        ');
        redirect('admin/informasi');       
    }

    public function update(){
        $data = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('mytextarea'),
            'id_kategori' => $this->input->post('kategori')
         );  
        $where = array(
            'id' => $this->input->post('id'),
        );
        $data = $this->CRUD_model->Update('informasi', $data, $where);
        $config['upload_path']          = 'assets/upload/images/informasi/';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $this->input->post('namafoto');
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }
         
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
        redirect('admin/informasi');       
    }

        public function delete($id){
        $filename=FCPATH.'/assets/upload/images/informasi/'.$id;
        if (file_exists($filename)){
            unlink("./assets/upload/images/informasi/".$id);
        }
        $id = array('foto' => $id);
        $this->CRUD_model->Delete('informasi', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-trash"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Berhasil menghapus informasi.</div>
        </div>
        </p>
        ');
        redirect('admin/informasi');
    }
    public function edit($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui Informasi | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site
        );
        $where = array('id' => $id);
        $data2['data2'] = $this->CRUD_model->edit_data($where,'informasi')->result();

         $this->db->select('*');
         $this->db->from('kategori');
         $data3 = $this->db->get()->result_array();
         $data3 = array('data3' => $data3);
        $this->template->load('layout/template', 'admin/informasi/edit', array_merge($data, $data2,$data3));
    }

}
