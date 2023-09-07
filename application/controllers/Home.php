<?php defined('BASEPATH') or exit('No direct script access allowed');
class Home extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('CRUD_model');
    }

    public function index($id=NULL){
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => 'Beranda | '.$site['nama_website'],
          'title2'                => $site['nama_website'],
          'favicon'               => $site['favicon'],
          'judul_profil'          => $site['judul_profil'],
          'deskripsi'             => $site['deskripsi'],
          'welcome'             => $site['welcome'],
          'site'                  => $site,
      );
       $jml = $this->db->get('informasi');
      //pengaturan pagination
       $config['base_url'] = base_url().'home/index';
       $config['total_rows'] = $jml->num_rows();
       $config['per_page'] = '5';
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['num_tag_open']     = '<span class="inactive">';
        $config['num_tag_close']    = '</span>';
        $config['cur_tag_open']     = '<span class="current">';
        $config['cur_tag_close']    = '</span>';
        $config['next_tag_open']    = '<span class="">';
        $config['next_tagl_close']  = '&raquo;</span>';
        $config['prev_tag_open']    = '<span class="">';
        $config['prev_tagl_close']  = '</span>Next';
        $config['first_tag_open']   = '<span class="">';
        $config['first_tagl_close'] = '</span>';
        $config['last_tag_open']    = '<span class="">';
        $config['last_tagl_close']  = '</span>';
        $this->pagination->initialize($config);
      //buat pagination
       $data['halaman'] = $this->pagination->create_links();
      //tamplikan data
       $data['query'] = $this->CRUD_model->ambil_informasi($config['per_page'], $id);
      $this->load->view('dashboard',array_merge($data));
    }

    public function info($id){
      $site = $this->Konfigurasi_model->listing();
       $this->db->select('*');
       $this->db->from('informasi a');
       $this->db->join('kategori b', 'a.id_kategori = b.id_kategori','left');
       $this->db->join('main_sub c', 'b.id_main = c.id_main','left');
       $this->db->where('a.id',$id);
       $data4 = $this->db->get()->result_array();
       $data4 = array('data4' => $data4);
      $where = array('id' => $id);
      $informasi = $this->CRUD_model->edit_data($where,'informasi')->result();
      foreach ($informasi as $u){
          $judul = $u->judul;
      }

      $data = array(
          'title'                 => $judul.' | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'welcome'             => $site['welcome'],
          'judul_profil'          => $site['judul_profil'],
          'deskripsi'             => $site['deskripsi'],
          'site'                  => $site,
      );

       $this->load->view('info',array_merge($data,$data4));
    } 
    public function struktur(){
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => 'Struktur Organisasi | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'welcome'             => $site['welcome'],
          'judul_profil'          => $site['judul_profil'],
          'deskripsi'             => $site['deskripsi'],
          'site'                  => $site,
      );

       $this->load->view('struktur',array_merge($data));
    } 
    public function sita(){
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => 'Sistem Informasi Tugas Akhir | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'welcome'             => $site['welcome'],
          'judul_profil'          => $site['judul_profil'],
          'deskripsi'             => $site['deskripsi'],
          'site'                  => $site,
      );

       $this->load->view('sita',array_merge($data,$data2));
    }   
    public function profile(){
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => 'Profil | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'welcome'             => $site['welcome'],
          'judul_profil'          => $site['judul_profil'],
          'deskripsi'             => $site['deskripsi'],
          'site'                  => $site,
      );

       $this->load->view('profil',array_merge($data));
    }    

    public function kategori($kategori,$id=NULL){
      $where = array('id_kategori' => $kategori);
      $informasi = $this->CRUD_model->edit_data($where,'kategori')->result();
      foreach ($informasi as $u){
          $judul = $u->kategori;
      }

      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => $judul,
          'favicon'               => $site['favicon'],
          'welcome'             => $site['welcome'],
          'judul_profil'          => $site['judul_profil'],
          'deskripsi'             => $site['deskripsi'],
          'site'                  => $site,
      );
       $this->db->select('*');
       $this->db->from('kategori');
       $this->db->where('id_kategori',$kategori);
       $data4 = $this->db->get()->result_array();
       $data4 = array('data4' => $data4);

       $this->db->select('*');
       $this->db->where('id_kategori',$kategori);
       $jml = $this->db->get('informasi');
       $data['jumlah'] = $jml->num_rows();
      //pengaturan pagination
       $config['base_url'] = base_url().'home/kategori/'.$kategori;
       $config['total_rows'] = $jml->num_rows();
       $config['per_page'] = '5';
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['num_tag_open']     = '<span class="inactive">';
        $config['num_tag_close']    = '</span>';
        $config['cur_tag_open']     = '<span class="current">';
        $config['cur_tag_close']    = '</span>';
        $config['next_tag_open']    = '<span class="">';
        $config['next_tagl_close']  = '&raquo;</span>';
        $config['prev_tag_open']    = '<span class="">';
        $config['prev_tagl_close']  = '</span>Next';
        $config['first_tag_open']   = '<span class="">';
        $config['first_tagl_close'] = '</span>';
        $config['last_tag_open']    = '<span class="">';
        $config['last_tagl_close']  = '</span>';
 
        $this->pagination->initialize($config);

      //buat pagination
       $data['halaman'] = $this->pagination->create_links();

      //tamplikan data
       $data['query'] = $this->CRUD_model->ambil_informasi_kategori($kategori,$config['per_page'], $id);
      
      $this->load->view('kategori',array_merge($data,$data4));
    }

    public function subkategori($kategori,$id=NULL){
      $where = array('id_main' => $kategori);
      $informasi = $this->CRUD_model->edit_data($where,'main_sub')->result();
      foreach ($informasi as $u){
          $judul = $u->main_sub;
      }

      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => $judul,
          'favicon'               => $site['favicon'],
          'welcome'             => $site['welcome'],
          'judul_profil'          => $site['judul_profil'],
          'deskripsi'             => $site['deskripsi'],
          'site'                  => $site,
      );
       $this->db->select('*');
       $this->db->from('kategori');
       $this->db->where('id_kategori',$kategori);
       $data4 = $this->db->get()->result_array();
       $data4 = array('data4' => $data4);

         $this->db->from('informasi a');
         $this->db->join('kategori b', 'a.id_kategori = b.id_kategori','left');
         $this->db->join('main_sub c', 'b.id_main = c.id_main','left');
         $this->db->where('c.id_main',$kategori);
         $jml = $this->db->get();
       $data['jumlah'] = $jml->num_rows();
      //pengaturan pagination
       $config['base_url'] = base_url().'home/subkategori/'.$kategori;
       $config['total_rows'] = $jml->num_rows();
       $config['per_page'] = '5';
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['num_tag_open']     = '<span class="inactive">';
        $config['num_tag_close']    = '</span>';
        $config['cur_tag_open']     = '<span class="current">';
        $config['cur_tag_close']    = '</span>';
        $config['next_tag_open']    = '<span class="">';
        $config['next_tagl_close']  = '&raquo;</span>';
        $config['prev_tag_open']    = '<span class="">';
        $config['prev_tagl_close']  = '</span>Next';
        $config['first_tag_open']   = '<span class="">';
        $config['first_tagl_close'] = '</span>';
        $config['last_tag_open']    = '<span class="">';
        $config['last_tagl_close']  = '</span>';
 
        $this->pagination->initialize($config);

      //buat pagination
       $data['halaman'] = $this->pagination->create_links();

      //tamplikan data
       $data['query'] = $this->CRUD_model->ambil_informasi_subkategori($kategori,$config['per_page'], $id);
      
      $this->load->view('kategori',array_merge($data,$data4));
    }

    public function kritikdansaran(){
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => 'Kritik dan Saran | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'welcome'             => $site['welcome'],
          'judul_profil'          => $site['judul_profil'],
          'deskripsi'             => $site['deskripsi'],
          'site'                  => $site,
      );

       $this->load->view('kritikdansaran',array_merge($data));
    }

    public function simpan(){
        date_default_timezone_set("Asia/Jakarta");
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('no_hp'),
            'isi' => $this->input->post('isi'),
            'created_at' => date('Y-m-d H:i:s')
         );  
        $this->CRUD_model->Insert('kritikdansaran', $data);
        redirect('home');       
    }

    public function pencarian($id=NULL){
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => 'Hasil Pencarian keyword : '.$this->input->post('cari'),
          'favicon'               => $site['favicon'],
          'welcome'             => $site['welcome'],
          'judul_profil'          => $site['judul_profil'],
          'deskripsi'             => $site['deskripsi'],
          'site'                  => $site,
          'keyword'               => $this->input->post('cari'),
      );

       $this->db->select('*');
       $this->db->from('informasi');
       $this->db->like('isi',$this->input->post('cari'));
       $data4 = $this->db->get()->result_array();
       $data4 = array('data4' => $data4);

       $this->db->select('*');
       $this->db->like('isi',$this->input->post('cari'));
       $jml = $this->db->get('informasi');
       $data['jumlah'] = $jml->num_rows();
      //pengaturan pagination
       $config['base_url'] = base_url().'home/pencarian';
       $config['total_rows'] = $jml->num_rows();
       $config['per_page'] = '5';
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['num_tag_open']     = '<span class="inactive">';
        $config['num_tag_close']    = '</span>';
        $config['cur_tag_open']     = '<span class="current">';
        $config['cur_tag_close']    = '</span>';
        $config['next_tag_open']    = '<span class="">';
        $config['next_tagl_close']  = '&raquo;</span>';
        $config['prev_tag_open']    = '<span class="">';
        $config['prev_tagl_close']  = '</span>Next';
        $config['first_tag_open']   = '<span class="">';
        $config['first_tagl_close'] = '</span>';
        $config['last_tag_open']    = '<span class="">';
        $config['last_tagl_close']  = '</span>';
 
        $this->pagination->initialize($config);

      //buat pagination
       $data['halaman'] = $this->pagination->create_links();

      //tamplikan data
       $data['query'] = $this->CRUD_model->ambil_pencarian($config['per_page'], $id,$this->input->post('cari'));
      
      $this->load->view('pencarian',array_merge($data,$data4));
    }
    public function sarana(){
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => 'Sarana dan Prasana | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
      );
       $this->db->select('*');
       $this->db->from('sarana');
       $data4 = $this->db->get()->result_array();
       $data4 = array('data4' => $data4);
       $this->load->view('sarana',array_merge($data,$data4));
    }
}