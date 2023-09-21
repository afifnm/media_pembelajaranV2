<?php defined('BASEPATH') or exit('No direct script access allowed');
class SITA extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library('Pdf');
        $this->load->model('CRUD_model');
    }

    public function index(){
      date_default_timezone_set("Asia/Jakarta");
      $date = date('Y-m-d');
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => 'Sistem Informasi Tugas Akhir | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
      );
         $this->db->select('*');
         $this->db->from('judul');
         $this->db->or_where("tahap",1);
         $this->db->or_where("tahap",6);
         $this->db->order_by("nim","DESC");
         $data2 = $this->db->get()->result_array();
         $data2 = array('data2' => $data2);

         $this->db->select('*');
         $this->db->from('judul');
         $this->db->or_where("tahap",2);
         $this->db->or_where("tahap",3);
         $this->db->or_where("tahap",4);
         $this->db->or_where("tahap",5);
         $this->db->order_by("nim","DESC");
         $data2utama = $this->db->get()->result_array();
         $data2utama = array('data2utama' => $data2utama);

         $this->db->select('*');
         $this->db->from('dosen');
         $this->db->order_by("id_dosen","ASC");
         $data3 = $this->db->get()->result_array();
         $data3 = array('data3' => $data3);

        $data222 = array('tahap'    => 6);   
        date_default_timezone_set("Asia/Jakarta");
        $where = 'tanggal_ujian <= "'.$date.'" AND tahap = 5 ';
        $this->CRUD_model->Update('judul', $data222, $where);

       $this->load->view('sita',array_merge($data,$data2,$data3,$data2utama));
    }
    public function judul(){
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => 'Pendataan Tugas Akhir | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
      );
       $this->db->select('*');
       $this->db->from('dosen');
       $data4 = $this->db->get()->result_array();
       $data4 = array('data4' => $data4);
       $this->load->view('judul',array_merge($data,$data4));
    }
    public function bimbingan($id_dosen){
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => 'Daftar bimbingan dosen | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
          'id_dosen'              => $id_dosen
      );
       $this->db->select('*')->from('dosen')->where('id_dosen',$id_dosen); 
       $data4 = $this->db->get()->result_array();
 
       $this->db->select('*')->from('judul')->where('dosen1',$id_dosen);
       $data2 = $this->db->get()->result_array();

       $this->db->select('*')->from('judul')->where('dosen2',$id_dosen); 
       $data3 = $this->db->get()->result_array();

       $this->db->select('*')->from('judul')->where('penguji1',$id_dosen); 
       $ketua = $this->db->get()->result_array();

       $this->db->select('*')->from('judul')->where('penguji2',$id_dosen); 
       $sekre = $this->db->get()->result_array();

       $data2 = array(
        'data2' => $data2,
        'data3' => $data3,
        'data4' => $data4,
        'ketua' => $ketua,
        'sekre' => $sekre
      );  
       $this->load->view('bimbingan',array_merge($data,$data2));
    }
    public function cetakbimbingan($id,$id_dosen){
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => 'Daftar bimbingan dosen | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
          'id_dosen'              => $id_dosen,
          'id'              => $id
      );
       $this->db->select('*');
       $this->db->from('dosen');
       $this->db->where('id_dosen',$id_dosen); 
       $data4 = $this->db->get()->result_array();
       $data4 = array('data4' => $data4);
       if($id==1){
          $this->db->select('*')->from('judul');
          $this->db->where('dosen1',$id_dosen);
          $data2 = $this->db->get()->result_array();
       } else if($id==2){
        $this->db->select('*')->from('judul');
        $this->db->where('dosen2',$id_dosen); 
        $data2 = $this->db->get()->result_array();
       } else if($id==3){ 
        $this->db->select('*')->from('judul');
        $this->db->where('penguji1',$id_dosen); 
        $data2 = $this->db->get()->result_array();
       } else if($id==4){ 
        $this->db->select('*')->from('judul');
        $this->db->where('penguji2',$id_dosen); 
        $data2 = $this->db->get()->result_array();
       }
       

       $data2 = array('data2' => $data2); 
       $this->load->view('layout/cetak_bimbingan',array_merge($data,$data2,$data4));
    }
    public function printskripsi($id){
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => 'Pendataan Tugas Akhir | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
      );
       $this->db->select('*');
       $this->db->from('judul');
       $this->db->where('id',$id);
       $data4 = $this->db->get()->result_array();
       $data4 = array('data4' => $data4);
       $this->load->view('layout/cetak',array_merge($data,$data4));
    }
    public function skripsi($id){
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => 'Pendataan Tugas Akhir | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
      );
       $this->db->select('*');
       $this->db->from('judul');
       $this->db->where('id',$id);
       $data4 = $this->db->get()->result_array();
       $data4 = array('data4' => $data4);
       $this->load->view('skripsi',array_merge($data,$data4));
    }
    public function ujian(){
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => 'Pendaftaran Ujian Tugas Akhir | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
      );
       $this->load->view('ujian',array_merge($data));
    }
    public function reset(){
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => 'Reset Password | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
      );
       $this->load->view('reset',array_merge($data));
    }
    public function reset_password(){
      $site = $this->Konfigurasi_model->listing();
      $email = $this->input->post('email');
      $this->db->from('judul');
      $this->db->where('email',$email);
      $mhs = $this->db->get()->row();
      if($mhs==NULL){
        $notifikasi = "Email yang kamu masukan tidak terdaftar dalam pendaftaran judul skripsi, cek kembali email yang kamu masukan.";
      } else {
        $notifikasi = "Cek pesan masuk di email kamu untuk melihat password.";
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
         $this->email->to($email); 
          $this->email->subject('Pemberitahuan Mahasiswa Reset Password | Sistem Informasi Tugas Akhir (SITA) PPKn UNS');
          $this->email->message('Pemberitahuan Mahasiswa dengan nama '.$mhs->nama.' ('.$mhs->nim.') berikut password kamu.
          <br>Password : '.$mhs->password);
        $this->email->send();
    
      }
      $data = array(
        'title'                 => 'SITA | '.$site['nama_website'],
        'notifikasi'            => $notifikasi,
        'favicon'               => $site['favicon'],
        'site'                  => $site,
      );
      $this->load->view('notifikasi',array_merge($data));   
    }
    public function inputjudul(){
      date_default_timezone_set("Asia/Jakarta");
      $date = date('Y-m-d');
      $site = $this->Konfigurasi_model->listing();
      $tanggal_awal = $site['tanggal_awal'];
      $tanggal_akhir = $site['tanggal_akhir'];
      if(($date >= $tanggal_awal) AND ($date <= $tanggal_akhir)){
        $this->db->from('judul');
        $this->db->where('nim',$this->input->post('nim'));
        $cek = $this->db->get()->num_rows();
        $date = date('Y-m-d');
        $data2 = array(
            'no_ujian' => 0,
            'nama' => $this->input->post('nama'),
            'nim' => $this->input->post('nim'),
            'password' => $this->input->post('password'),
            'no_hp' => $this->input->post('no_hp'),
            'email' => $this->input->post('email'),
            'dosen1' => $this->input->post('dosen1'),
            'dosen2' => $this->input->post('dosen2'),
            'tanggal_judul' => $date,
            'jenis_penelitian' => $this->input->post('jenis_penelitian'),
            'judul' => $this->input->post('judul'),
            'judul2' => $this->input->post('judul2'),
            'file1' => $this->input->post('file2'),
            'file2' => '',
            'tahap' => 1,
            'penguji1' => 0,
            'penguji2' => 0,
            'penguji3' => 0,
            'penguji4' => 0,
            'catatan' => '-'
         );  

        if($cek>0){
          $notifikasi = "Anda sudah melakukan pengisian pendataan judul di  SITA, hubungi Admin jika terjadi kesalahan pada data sebelumnya.";
        } else {
          $email = $this->input->post('email');
          $this->db->insert('judul', $data2);
          $notifikasi = "Formulir pendaftaran tugas akhir berhasil dikirim. Terima Kasih";
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
          //email ke mahasiswa
          $this->load->library('email', $config);  
          $this->email->set_newline("\r\n");  
          $this->email->from('webmaster@pipapip.web.id', 'Sistem Informasi Tugas Akhir (SITA) PPKn UNS');
          $link = site_url("sita");
          $this->email->to($email);
          $this->email->subject('Pemberitahuan Pendaftaran Judul Skripsi | Sistem Informasi Tugas Akhir (SITA) PPKn UNS');
          $this->email->message('Anda telah mendaftar judul di sistem informasi tugas akhir ( SITA) selengkapnya akses tautan berikut: <a href="'.$link.'" target="_blank"> '.$link.' </a> ');
          $this->email->send();
          //email ke admin SITA
          $this->email->set_newline("\r\n");  
          $this->email->from('webmaster@pipapip.web.id', 'Sistem Informasi Tugas Akhir (SITA) PPKn UNS');
          $link = site_url("sita");
          $this->email->to($site['email']);
          $this->email->subject('Pemberitahuan Pendaftaran Judul Skripsi | Sistem Informasi Tugas Akhir (SITA) PPKn UNS');
          $this->email->message('Atas nama '.$this->input->post('nama').' dengan NIM '.$this->input->post('nim').' 
          dan dengan judul '.$this->input->post('judul'). ' telah mendaftar judul skripsi. Selengkapnya akses tautan berikut: <a href="'.$link.'" target="_blank"> '.$link.' </a> ');
          $this->email->send();

        }
      } else {
          $notifikasi = "Waktu pendaftaran judul sudah berakhir. Silahkan menunggu hingga sistem dibuka kembali.";
      } 
        $data = array(
            'title'                 => 'SITA | '.$site['nama_website'],
            'notifikasi'            => $notifikasi,
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
         $this->load->view('notifikasi',array_merge($data));       
    }   

    public function daftarujian(){
      $where = array('nim' => $this->input->post('nim')); $notifikasi = '';
      $ii = $this->CRUD_model->edit_data($where,'judul')->result();
      foreach ($ii as $u){
          $nim = $u->nim; $pass = $u->password; $tahap = $u->tahap; $nama = $u->nama; $judul = $u->judul;
      }
      date_default_timezone_set("Asia/Jakarta");
      $date = date('Y-m-d');
      $data2 = array(
          'tanggal_daftar' => $date,
          'file2' => $this->input->post('file2'),
          'tahap' => 2
       );  
      $link = $this->input->post('file2');
      if($ii == NULL){
        $notifikasi = "NIM ".$this->input->post('nim')." belum melakukan pengisian pendataan judul di  SITA.";
      } elseif ($pass <> $this->input->post('password')) {
        $notifikasi = "Password yang dimasukan salah, hubungi Admin jika lupa password.";
      } elseif ($tahap == 4 ) {
        $notifikasi = "Berkas ujian anda sudah diverifikasi Admin. Tunggu pemberitahuan selanjutnya untuk info Tim Penguji.";
      } elseif ($tahap == 5 ) {
        $notifikasi = "Tim Penguji telah ditetapkan, cek SITA untuk info tim penguji.";
      } elseif ($tahap == 6 ) {
        $notifikasi = "Anda sudah ujian.";
      } else {
        $where = array(
            'nim' => $this->input->post('nim'),
        );
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
         $this->email->to('mediainformasipkn@gmail.com'); 
        if ($tahap == 2 ) {
          $notifikasi = "Anda telah memperbarui berkas pendaftaran ujian skripsi. Tunggu konfirmasi admin untuk pemberitahuan selanjutnya";
          $this->email->subject('Pemberitahuan Mahasiswa Memperbarui berkas Ujian | Sistem Informasi Tugas Akhir (SITA) PPKn UNS');
          $this->email->message('Pemberitahuan Mahasiswa dengan nama '.$nama.' ('.$nim.') telah memperbarui berkas tugas akhir.<br> Judul Penelitian '.$judul.'
          <br>Klik tautan berikut: <a href="'.$link.'" target="_blank"> '.$link.' </a>');
        } else {
          $notifikasi = "Berhasil mendaftar ujian tugas akhir. Tunggu konfirmasi admin untuk pemberitahuan selanjutnya. ";
          $this->email->subject('Pemberitahuan Mahasiswa Mendaftar Ujian | Sistem Informasi Tugas Akhir (SITA) PPKn UNS');
          $this->email->message('Pemberitahuan Mahasiswa dengan nama '.$nama.' ('.$nim.') telah mendaftar tugas akhir.<br> Judul Penelitian '.$judul.'
          <br>Klik tautan berikut: <a href="'.$link.'" target="_blank"> '.$link.' </a>');
        }
        
        $this->email->send();
        $data = $this->CRUD_model->Update('judul', $data2, $where);
      }
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'SITA | '.$site['nama_website'],
            'notifikasi'            => $notifikasi,
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
         $this->load->view('notifikasi',array_merge($data));       
    }   
    public function test(){
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
        $this->email->to('afifnuruddinmaisaroh@gmail.com'); 
        $this->email->subject('Pemberitahuan Mahasiswa Mendaftar Ujian | Sistem Informasi Tugas Akhir (SITA) PPKn UNS');
        $this->email->message('Pemberitahuan Mahasiswa dengan nama telah mendaftar tugas akhir.<br> Judul Penelitian 
        <br>Klik tautan berikut: </a>');
        $this->email->send();
       
    }
} 