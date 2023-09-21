<?php defined('BASEPATH') or exit('No direct script access allowed');
class Judul extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->check_login();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->helper('tgl_indo');
        $this->load->model('CRUD_model');
        $this->load->model('Sita_model');
        $this->load->library('Pdf');
        if ($this->session->userdata('level') != "Admin") {
            redirect('', 'refresh');
        }
    }
 
    public function index(){
        $site = $this->Konfigurasi_model->listing();
        $this->db->select('DISTINCT(SUBSTRING(nim,4,2)) as tahun')->from('judul');
        $this->db->order_by('tahun', 'ASC');
        $data2 = $this->db->get()->result_array();
        $data = array(
            'title'                 => 'Pendataan Judul Tugas Akhir | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'data2'                 => $data2
        );
        $this->template->load('layout/template', 'admin/sita/judul_tahun', array_merge($data));
    }
    public function angkatan($id){
        $site = $this->Konfigurasi_model->listing();
        $this->db->like('nim','K64'.$id)->from('judul');
        $this->db->order_by('nim', 'ASC');
        $data2 = $this->db->get()->result_array();
        $data = array(
            'title'                 => 'Pendataan Judul Tugas Akhir | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'data2'                 => $data2,
            'id'                    => $id
        );
        $this->template->load('layout/template', 'admin/sita/judul', array_merge($data));
    }
    public function print($id){
        $site = $this->Konfigurasi_model->listing();
        $this->db->like('nim','K64'.$id)->from('judul');
        $this->db->order_by('nim', 'ASC');
        $data4 = $this->db->get()->result_array();
        $data = array(
            'title'                 => 'Judul Tugas Akhir | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'data4'                 => $data4,
            'id'                    => $id
        );
         $this->load->view('layout/cetak_angkatan',array_merge($data,$data4));
      }
    public function update(){
        if($this->input->post('tahap')>=5){
          $data = array(
              'password' => $this->input->post('password'),
              'no_hp' => $this->input->post('no_hp'),
              'email' => $this->input->post('email'),
              'dosen1' => $this->input->post('dosen1'),
              'dosen2' => $this->input->post('dosen2'),
              'judul' => $this->input->post('judul'),
              'judul2' => $this->input->post('judul2'),
              'penguji1' => $this->input->post('penguji1'),
              'penguji2' => $this->input->post('penguji2'),
              'penguji3' => $this->input->post('penguji3'),
              'penguji4' => $this->input->post('penguji4'),
              'tanggal_ujian' => $this->input->post('tanggal_ujian'),
              'jam1' => $this->input->post('jam1'),
              'jam2' => $this->input->post('jam2'),
              'ruang' => $this->input->post('ruang'),
              'catatan' => $this->input->post('catatan'),
           );   
        } else {
           $data = array(
              'password' => $this->input->post('password'),
              'no_hp' => $this->input->post('no_hp'),
              'email' => $this->input->post('email'),
              'dosen1' => $this->input->post('dosen1'),
              'dosen2' => $this->input->post('dosen2'),
              'judul' => $this->input->post('judul')
           );          
        }
        $where = array(
            'id' => $this->input->post('id'),
        );
        $data = $this->CRUD_model->Update('judul', $data, $where);
        $email = $this->input->post('email');
        //konfigurasi email
        $config = Array(  
            'protocol' => 'smtp',  
            'smtp_host' => 'mail.pipapip.web.id',  
            'smtp_port' => 587,  
            'smtp_user' => 'webmaster@pipapip.web.id',   
            'smtp_pass' => 'mediapkn2019',   
            'mailtype' => 'html', 
            'charset' => 'iso-8859-1'
            );  
            $this->load->library('email', $config);  
            $this->email->set_newline("\r\n");  
            $this->email->from('webmaster@pipapip.web.id', 'Sistem Informasi Tugas Akhir (SITA) PPKn UNS');
        $link = site_url("sita/skripsi/".$this->input->post('id'));
        $this->email->to($email);
        $this->email->subject('Pemberitahuan Perubahan Data Skripsi | Sistem Informasi Tugas Akhir (SITA) PPKn UNS');
        $this->email->message('Tugas akhir (skripsi) anda telah diperbarui. Cek website untuk mengetahui perubahan data tersebut.
        Klik tautan berikut: <a href="'.$link.'" target="_blank"> '.$link.' </a> ');
        $this->email->send();
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Judul '.$this->input->post('judul').' telah diperbarui.</div>
        </div>
        </p>
        ');
        redirect('admin/judul');       
    }

    public function delete($id){
        $id = array('id' => $id);
        $this->CRUD_model->Delete('judul', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-trash"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Berhasil menghapus.</div>
        </div>
        </p>
        ');
        redirect('admin/judul');
    }
    public function edit($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui Tugas Akhir | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site
        );
        $where = array('id' => $id);
        $data2['data2'] = $this->CRUD_model->edit_data($where,'judul')->result();

         $this->db->select('*');
         $this->db->from('dosen');
         $data3 = $this->db->get()->result_array();
         $data3 = array('data3' => $data3);
        $this->template->load('layout/template', 'admin/sita/edit', array_merge($data, $data2,$data3));
    }
}
