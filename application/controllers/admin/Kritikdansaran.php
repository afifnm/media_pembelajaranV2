<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kritikdansaran extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->check_login();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->model('CRUD_model');
        $this->load->library('pdf');
        if ($this->session->userdata('level') != "Admin") {
            redirect('', 'refresh');
        }
    }

    public function index(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Kritik dan saran | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
        );
         $this->db->select('*');
         $this->db->from('kritikdansaran');
         $this->db->order_by("created_at","DESC");
         $data2 = $this->db->get()->result_array();
         $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/kritikdansaran', array_merge($data, $data2));
    }
    public function delete($id){
        $id = array('id' => $id);
        $this->CRUD_model->Delete('kritikdansaran', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-trash"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Berhasil menghapus kritik dan saran.</div>
        </div>
        </p>
        ');
        redirect('admin/kritikdansaran');
    }
    function cetak(){ 
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',10);
        $this->db->select('*');
        $this->db->from('kritikdansaran');
        $data = $this->db->get()->result_array();
        $nomor_inventaris = 18;
        $logo = 17;
        $pdf->SetFont('times', 'B', 13);
            $pdf->Cell(0, 5, 'Kritik dan Saran', 0, 1, 'C', 0);
            $pdf->ln();
        foreach ($data as $row){
            $pdf->SetFont('times', '', 12);
            $pdf->Cell(50, 5, 'Nama', 0, 0, '', 0);
            $pdf->Cell(5, 5, ':', 0, 0, '', 0);
            $pdf->Cell(50, 5,$row['nama'], 0, 1, '', 0);
            $pdf->Cell(50, 5, 'Email', 0, 0, '', 0);
            $pdf->Cell(5, 5, ':', 0, 0, '', 0);
            $pdf->Cell(50, 5,$row['email'], 0, 1, '', 0);
            $pdf->Cell(50, 5, 'No. HP', 0, 0, '', 0);
            $pdf->Cell(5, 5, ':', 0, 0, '', 0);
            $pdf->MultiCell(125, 5, $row['no_hp'], 0, 'L', 0, 1, '' ,'', true);
            $pdf->Cell(50, 5, 'Kritik dan Saran', 0, 0, '', 0);
            $pdf->Cell(5, 5, ':', 0, 0, '', 0);
            $pdf->Cell(50, 5,$row['isi'], 0, 1, '', 0);
        //BAGIAN ATAS
            $pdf->ln();
        }
        $pdf->Output();
    }

}
