<?php
	$pdf = new FPDF('L', 'mm', 'A4');
	$pdf->SetFont('times', '', 13);
	$pdf->AddPage();
	$no = 1;
	$pdf->Cell(0 ,5,'Daftar Pengajuan Tugas Akhir (Skripsi) Program Studi S-1 PPKN FKIP UNS',0,1,'C');
    $pdf->ln();
    $pdf->SetFont('times', '', 8);
	$pdf->Cell(10 ,5,'No',1,0);
	$pdf->Cell(20 ,5,'NIM',1,0);
	$pdf->Cell(55 ,5,'Nama',1,0);
	$pdf->Cell(55 ,5,'Dosen Pembimbing 1',1,0);
	$pdf->Cell(55 ,5,'Dosen Pembimbing 2',1,0);
	$pdf->Cell(40 ,5,'Tahap',1,0);
	$pdf->Cell(30 ,5,'No Whatsapp',1,1);
    foreach ($data4 as $u) {
        $pdf->Cell(10 ,5,$no,1,0);
        $pdf->Cell(20 ,5,$u['nim'],1,0);
        $pdf->Cell(55 ,5,$u['nama'],1,0);
        $pdf->Cell(55 ,5,$this->CRUD_model->namadosen($u['dosen1']),1,0);
        $pdf->Cell(55 ,5,$this->CRUD_model->namadosen($u['dosen2']),1,0);
        if($u['tahap']==1){
        $tahap = 'Mendaftar Judul';
            } elseif($u['tahap']==2){
            $tahap = 'Mendaftar Ujian';
            } elseif($u['tahap']==3){
            $tahap = 'Berkas Ditolak';
            } elseif($u['tahap']==4){
            $tahap = 'Berkas Diverifikasi';
            } elseif($u['tahap']==5){
            $tahap = 'Tim Penguji Ditetapkan';
        } else{
            $tahap = 'Sudah Ujian';
        }
        $pdf->Cell(40 ,5,$tahap,1,0);
        $pdf->Cell(30 ,5,$u['no_hp'],1,1);
        $no++;
	}
	$pdf->Output('judul_tahun_20'.$id.'.pdf', 'I');
?>