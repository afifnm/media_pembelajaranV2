<?php
	$pdf = new FPDF('P', 'mm', 'A4');
	$pdf->SetFont('times', '', 12);
	$pdf->AddPage();
	$no = 1;
	if($id==3){
		$pdf->Cell(0 ,5,'Data Mahasiswa Ketua Penguji '. $this->CRUD_model->namadosen($id_dosen),0,1);
	} else if($id==4){
		$pdf->Cell(0 ,5,'Data Mahasiswa Sekretaris Penguji '. $this->CRUD_model->namadosen($id_dosen),0,1);
	} else {
		$pdf->Cell(0 ,5,'Data Mahasiswa Bimbingan '.$id.' '. $this->CRUD_model->namadosen($id_dosen),0,1);
	}
	$pdf->Cell(10 ,5,'No',1,0);
	$pdf->Cell(30 ,5,'NIM',1,0);
	$pdf->Cell(70 ,5,'Nama',1,0);
	$pdf->Cell(50 ,5,'Tahap',1,1);
foreach ($data2 as $u) {
	$pdf->Cell(10 ,5,$no,1,0);
	$pdf->Cell(30 ,5,$u['nim'],1,0);
	$pdf->Cell(70 ,5,$u['nama'],1,0);
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
	$pdf->Cell(50 ,5,$tahap,1,1);
	$no++;
	}
	$pdf->Output('databimbing1'.$id_dosen.'.pdf', 'I');
?>