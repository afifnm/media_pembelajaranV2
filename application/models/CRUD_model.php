<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CRUD_model extends CI_Model{

 	public function GetWhere($table){
        $res=$this->db->get($table); // Kode ini berfungsi untuk memilih tabel yang akan ditampilkan
        return $res->result_array(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
    }
    public function edit_data($where,$table){      
        return $this->db->get_where($table,$where);
    }
    public function Insert($table,$data){
        $result = $this->db->insert($table, $data); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel
        return $result; // Kode ini digunakan untuk mengembalikan hasil $res
    }
 
    public function Update($table, $data, $where){
        $res = $this->db->update($table, $data, $where); // Kode ini digunakan untuk merubah record yang sudah ada dalam sebuah tabel
        return $res;
    }
 
    public function Delete($table, $where){
        $res = $this->db->delete($table, $where); // Kode ini digunakan untuk menghapus record yang sudah ada
        return $res;
    }
    public function ambil_informasi($num, $offset){
        $this->db->order_by('tanggal', 'DESC');
        $data = $this->db->get('informasi', $num, $offset);
        return $data->result();
     }

    public function ambil_pencarian($num, $offset,$isi){
        $this->db->order_by('tanggal', 'DESC');
        $this->db->like('isi', $isi);
        $data = $this->db->get('informasi', $num, $offset);
        return $data->result();
     }

    public function ambil_informasi_kategori($id_kategori,$num, $offset){
        $this->db->where('id_kategori',$id_kategori);
        $this->db->order_by('tanggal', 'DESC');
        $data = $this->db->get('informasi', $num, $offset);
        return $data->result();
     }
    public function ambil_informasi_subkategori($id_kategori,$num, $offset){
         $this->db->from('informasi a');
         $this->db->join('kategori b', 'a.id_kategori = b.id_kategori','left');
         $this->db->join('main_sub c', 'b.id_main = c.id_main','left');
         $this->db->where('c.id_main',$id_kategori);
         $this->db->order_by("a.tanggal","DESC");
         $this->db->limit($num, $offset);
         $data = $this->db->get();
        return $data->result();
     }
 
    public function GetWhereKategori($table){
        $this->db->order_by('nama_kategori', 'ASC'); 
        $res=$this->db->get($table); // Kode ini berfungsi untuk memilih tabel yang akan ditampilkan
        return $res->result_array(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
    }

    public function namadosen($id_dosen){
      if(($id_dosen==0) || ($id_dosen==NULL)){
         return "-";
      } else {
         $this->db->from('dosen');
         $this->db->where("id_dosen", $id_dosen);
         $hasil = $this->db->get()->row();
         if($hasil==NULL){
            return "-";
         } else {
            return $hasil->nama;
         }
      }
    }

    public function jenis_penelitian($id){
       $this->db->select('*');
       $this->db->like('jenis_penelitian',$id);
       $jml = $this->db->get('judul');
       return $jml->num_rows();
    }
    public function no_register(){
       $angkatan = date("y");
       $this->db->select('*');
       $this->db->like('no_ujian',$angkatan);
       $jml = $this->db->get('judul');
       return $jml->num_rows();
    }
    // BEGIN UJIAN ANGKATAN
    public function ujian($id,$tahun){
       date_default_timezone_set("Asia/Jakarta");
       $angkatan = date("y")-$tahun;
       $this->db->select('*');
       $this->db->where('tahap',$id);
       $this->db->like('nim','K64'.$angkatan);
       $jml = $this->db->get('judul');
       return $jml->num_rows();
    }
    public function daftarjudul($tahun){
       date_default_timezone_set("Asia/Jakarta");
       $angkatan = date("y")-$tahun;
       $this->db->select('*');
       $this->db->like('nim','K64'.$angkatan);
       $jml = $this->db->get('judul');
       return $jml->num_rows();
    }
    // END
    public function jumlahangkatan($tahun){
       date_default_timezone_set("Asia/Jakarta");
       $angkatan = date("y")-$tahun;
       $this->db->select('*');
       $this->db->like('nim','K64'.$angkatan);
       $jml = $this->db->get('mahasiswa');
       return $jml->num_rows();
    }


    public function pembimbing1($id){
       $this->db->select('*');
       $this->db->where('dosen1',$id);
       $jml = $this->db->get('judul');
       return $jml->num_rows();
    }
    public function pembimbing2($id){
       $this->db->select('*');
       $this->db->where('dosen2',$id);
       $jml = $this->db->get('judul');
       return $jml->num_rows();
    }
    public function ketua($id){
       $this->db->select('*');
       $this->db->where('penguji1',$id);
       $jml = $this->db->get('judul');
       return $jml->num_rows();
    }
    public function sekretaris($id){
       $this->db->select('*');
       $this->db->where('penguji2',$id);
       $jml = $this->db->get('judul');
       return $jml->num_rows();
    }

    public function ceknim($id){
       $this->db->select('*');
       $this->db->where('nim',$id);
       $jml = $this->db->get('mahasiswa');
       return $jml->num_rows();
    }

    public function lulus($pembimbing, $id_dosen){
       $this->db->select('*');
       $this->db->where($pembimbing,$id_dosen);
       $this->db->where('tahap',6);
       $jml = $this->db->get('judul');
       return $jml->num_rows();
    }
    public function jumlah($kolom,$id_dosen,$nim){
      $this->db->select('*');
      $this->db->where($kolom,$id_dosen);
      $this->db->like('nim',$nim);
      $jml = $this->db->get('judul');
      return $jml->num_rows();
   }
}
