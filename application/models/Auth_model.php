<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public $table       = 'user';
    public $id          = 'user.id';

    public function __construct()
    {
        parent::__construct();
    }
    public function register()
    {
      date_default_timezone_set('ASIA/JAKARTA'); 
      $data = array(
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'password' => get_hash($this->input->post('password')),
        'level' => $this->input->post('level'),
        'nama' => $this->input->post('nama'),
        'angkatan' => $this->input->post('angkatan'),
        'asal_sekolah' => $this->input->post('asal_sekolah'),
        'tempat_lahir' => $this->input->post('tempat_lahir'),
        'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        'alamat' => $this->input->post('alamat'),
        'no_hp' => $this->input->post('no_hp'),
        'foto'  => $this->input->post('username').'.jpg',
        'active' => '0'
      );
      return $this->db->insert('user', $data);
    }
    function tampil_data(){
        return $this->db->get('user');
    }
    public function update($data, $id)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }
    public function login($username, $password)
    {
        $query = $this->db->get_where('user', array('username'=>$username, 'password'=>$password));
        return $query->row_array();
    }

    public function check_account($username)
    {
        //cari username lalu lakukan validasi
        $this->db->where('username', $username);
        $query = $this->db->get($this->table)->row();

        //jika bernilai 1 maka user tidak ditemukan
        if (!$query) {
            return 1;
        }
        //jika bernilai 2 maka user tidak aktif
        if ($query->active == 0) {
            return 2;
        }
        //jika bernilai 3 maka password salah
        if (!hash_verified($this->input->post('password'), $query->password)) {
            return 3;
        }
        return $query;
    }

    public function logout($date, $id)
    {
        $this->db->where('user.id', $id);
        $this->db->update('user', $date);
    }   
}
