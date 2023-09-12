<?php defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Auth_model');
        $this->load->helper('url');
    }

    public function index(){
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => 'Beranda | '.$site['nama_website'],
          'favicon'               => $site['favicon'],
          'site'                  => $site,
      );
      $this->load->view('welcome_message',$data);
    }

    public function check_account()
    {
        //validasi login
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        //ambil data dari database untuk validasi login
        $query = $this->Auth_model->check_account($username, $password);

        if ($query === 1) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Username Anda masukkan tidak terdaftar.</div>
        			</div>
        			</p>
            ');
        } elseif ($query === 2) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
              <div class="info-box alert-info">
              <div class="info-box-icon">
              <i class="fa fa-info-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">GAGAL</b><br>Akun yang Anda masukkan tidak aktif, silakan hubungi Administrator.</div>
              </div>
              </p>'
            );
        } elseif ($query === 3) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Password yang Anda masukkan salah.</div>
        			</div>
        			</p>
              ');
        } else {
            //membuat session dengan nama userData yang artinya nanti data ini bisa di ambil sesuai dengan data yang login
            $userdata = array(
              'is_login'    => true,
              'menu'        => $this->input->post('menu'),
              'id'          => $query->id,
              'password'    => $query->password,
              'username'    => $query->username,
              'nama'        => $query->nama,
              'level'        => $query->level,
              'alamat'      => $query->alamat,
              'email'       => $query->email,
              'wa'       => $query->wa,
              'fb'       => $query->fb,
              'tw'       => $query->tw,
              'youtube'       => $query->youtube,
              'ig'       => $query->ig,
              'foto'        => $query->foto,
              'last_login'  => $query->last_login
            );
            $this->session->set_userdata($userdata);
            return true;
        }
    }
    public function login()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'     => 'Login | '.$site['nama_website'],
            'favicon'   => $site['favicon'],
            'site'      => $site
        );
        //melakukan pengalihan halaman sesuai dengan levelnya
        if ($this->session->userdata('level') == "Admin") {
            redirect('admin/home');
        }
        if ($this->session->userdata('level') == "Pengguna") {
            redirect('admin/home');
        }
        //proses login dan validasi nya
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[3]|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
            $error = $this->check_account();

            if ($this->form_validation->run() && $error === true) {
                $data = $this->Auth_model->check_account($this->input->post('username'), $this->input->post('password'));
                //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
                if ($data->level == 'Admin') {
                    redirect('admin/home');
                } elseif ($data->level == 'Pengguna') {
                    redirect('admin/home');
                }
            } else {
                $this->template->load('authentication/layout/template', 'authentication/login', $data);
            }
        } else {
            $this->template->load('authentication/layout/template', 'authentication/login', $data);
        }
    }
    public function logout()
    { 
        $this->session->sess_destroy();
        redirect('home');
    }
    function profile(){
        $data['user'] = $this->Auth_model->tampil_data()->result();
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Profile | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
        $this->template->load('layout/template', 'authentication/profile', $data);
    }
    public function updatePassword()
    {
        $id = $this->session->userdata('id');
            if (password_verify($this->input->post('passLama'), $this->session->userdata('password'))) {
                if ($this->input->post('passBaru') != $this->input->post('passKonf')) {
                                  $this->session->set_flashdata('alert', '<p class="box-msg">
              <div class="info-box alert-info">
              <div class="info-box-icon">
              <i class="fa fa-info-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">GAGAL</b><br>Konfirmasi password salah, ulangi lagi.</div>
              </div>
              </p>'
              );
                    redirect('auth/profile');
                } else {
                    $data = ['password' => get_hash($this->input->post('passBaru'))];
                    $result = $this->Auth_model->update($data, $id);
                    if ($result > 0) {
                        $this->Auth_model->update($data, $data['password'], 'user');
                          $this->session->set_flashdata('alert', '<p class="box-msg">
                          <div class="info-box alert-info">
                          <div class="info-box-icon">
                          <i class="fa fa-info-circle"></i>
                          </div>
                          <div class="info-box-content" style="font-size:14">
                          <b style="font-size: 20px">Berhasil</b><br>Password berhasil diubah.</div>
                          </div>
                          </p>'
                          );
                        $userdata = array(
                            'password' => $data['password']
                        );
                        $this->session->set_userdata($userdata);
                        redirect('auth/profile');
                    } else {
                         $this->session->set_flashdata('alert', '<p class="box-msg">
                          <div class="info-box alert-info">
                          <div class="info-box-icon">
                          <i class="fa fa-info-circle"></i>
                          </div>
                          <div class="info-box-content" style="font-size:14">
                          <b style="font-size: 20px">GAGAL</b><br>Password gagal diubah.</div>
                          </div>
                          </p>'
                          );
                          redirect('auth/profile');
                    }
                }
            } else {
              $this->session->set_flashdata('alert', '<p class="box-msg">
              <div class="info-box alert-info">
              <div class="info-box-icon">
              <i class="fa fa-info-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">GAGAL</b><br>Password salah.</div>
              </div>
              </p>'
              );
                redirect('auth/profile#password');
            }
    }
    public function updateProfile()
    {
        $id = $this->session->userdata('id');
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $wa = $this->input->post('wa');
        $fb = $this->input->post('fb');
        $tw = $this->input->post('tw');
        $ig = $this->input->post('ig');
        $youtube = $this->input->post('youtube');

        $data = array(
            'nama' => $nama,
            'username' => $username,
            'alamat' => $alamat,
            'email' => $email,
            'wa' => $wa,
            'tw' => $tw,
            'fb' => $fb,
            'youtube' => $youtube,
            'ig' => $ig,
        );
        $userdata = array(
            'nama' => $nama,
            'username' => $username,
            'alamat' => $alamat,
            'email' => $email,
            'wa' => $wa,
            'tw' => $tw,
            'fb' => $fb,
            'youtube' => $youtube,
            'ig' => $ig,
        );
        $this->session->set_userdata($userdata);
        $result = $this->Auth_model->update($data, $id);
        $config['upload_path']          = 'assets/upload/images/profil/';
        $config['quality'] = '60%';  
        $config['width'] = 200;  
        $config['height'] = 200;  
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $this->session->userdata('username');
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('berkas')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }
        $this->session->set_flashdata('alert', '<p class="box-msg">
                    <div class="info-box alert-info">
                    <div class="info-box-icon">
                    <i class="fa fa-bell"></i>
                    </div>
                    <div class="info-box-content" style="font-size:14">
                    <b style="font-size: 20px">BERHASIL</b><br> Data diri telah diperbarui.</div>
                    </div>
                    </p>
              ');
        redirect('auth/profile');
    }

}