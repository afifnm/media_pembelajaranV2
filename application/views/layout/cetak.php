<?php
foreach ($data4 as $u) {
	$pdf = new FPDF('P', 'mm', 'A4');
	$pdf->SetFont('times', '', 12);
	$pdf->AddPage();
	$x1 = 40;
	$pdf->Cell(0 ,5,'Penetapan Tim Penguji Skripsi Program Studi PPKn FKIP UNS',0,1,'C');
	$pdf->Cell(0 ,5,'',0,1);
	if($u['tahap']>3){
	$pdf->Cell($x1 ,5,'Nomor Registrasi',0,0);
	$pdf->Cell(10 ,5,':',0,0);
	$pdf->Cell(0 ,5,$u['no_ujian'],0,1);
}
	$pdf->Cell($x1 ,5,'Nama',0,0);
	$pdf->Cell(10 ,5,':',0,0);
	$pdf->Cell(0 ,5,$u['nama'],0,1);

	$pdf->Cell($x1 ,5,'NIM',0,0);
	$pdf->Cell(10 ,5,':',0,0);
	$pdf->Cell(0 ,5,$u['nim'],0,1);
	if($u['dosen1']==0){
		$dosen = '-';
	} else {
		$dosen = $this->CRUD_model->namadosen($u['dosen1']);
	}
	$pdf->Cell($x1 ,5,'Dosen Pembimbing 1',0,0);
	$pdf->Cell(10 ,5,':',0,0);
	$pdf->Cell(0 ,5,$dosen,0,1);
	if($u['dosen2']==0){
		$dosen = '-';
	} else {
		$dosen = $this->CRUD_model->namadosen($u['dosen2']);
	}
	$pdf->Cell($x1 ,5,'Dosen Pembimbing 2',0,0);
	$pdf->Cell(10 ,5,':',0,0);
	$pdf->Cell(0 ,5,$dosen,0,1);

	$pdf->Cell($x1 ,5,'Jenis Penelitian',0,0);
	$pdf->Cell(10 ,5,':',0,0);
	$pdf->Cell(0 ,5,$u['jenis_penelitian'],0,1);



	$pdf->Cell($x1 ,5,'Judul Penelitian',0,0);
	$pdf->Cell(10 ,5,':',0,0);
	$pdf->MultiCell(140,5,$u['judul'],0,1);
	$pdf->Cell($x1 ,5,'',0,0);
	$pdf->Cell(10 ,5,':',0,0);
	$pdf->MultiCell(140,5,$u['judul2'],0,1);
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

	$pdf->Cell($x1 ,5,'Tahap',0,0);
	$pdf->Cell(10 ,5,':',0,0); 
	$pdf->Cell(0 ,5,$tahap,0,1);
	if($u['tahap']=='3'){
	$pdf->Cell($x1 ,5,'Catatan',0,0);
		$pdf->Cell(10 ,5,':',0,0);
		$pdf->MultiCell(130,5,$u['catatan'],0,1);	
	}
	if($u['tahap']>='5'){
		$pdf->Ln();
		$pdf->Cell($x1 ,5,'Tim Penguji',0,1);
		$pdf->Cell($x1 ,5,'Ketua Penguji',0,0);
		$pdf->Cell(10 ,5,':',0,0);
		$pdf->Cell(0 ,5,$this->CRUD_model->namadosen($u['penguji1']),0,1);

		$pdf->Cell($x1 ,5,'Sekretaris',0,0);
		$pdf->Cell(10 ,5,':',0,0);
		$pdf->Cell(0 ,5,$this->CRUD_model->namadosen($u['penguji2']),0,1);

		$pdf->Cell($x1 ,5,'Anggota 1',0,0);
		$pdf->Cell(10 ,5,':',0,0);
		$pdf->Cell(0 ,5,$this->CRUD_model->namadosen($u['penguji3']),0,1);

		$pdf->Cell($x1 ,5,'Anggota 2',0,0);
		$pdf->Cell(10 ,5,':',0,0);
		$pdf->Cell(0 ,5,$this->CRUD_model->namadosen($u['penguji4']),0,1);

		$pdf->Cell($x1 ,5,'Tanggal Ujian',0,0);
		$pdf->Cell(10 ,5,':',0,0);
		$pdf->Cell(0 ,5,longdate_indo($u['tanggal_ujian']),0,1);

		$pdf->Cell($x1 ,5,'Jam Ujian',0,0);
		$pdf->Cell(10 ,5,':',0,0);
		$pdf->Cell(0 ,5,date("H:i ", strtotime($u['jam1'])).'-'.date("H:i ", strtotime($u['jam2'])).' WIB',0,1);

		$pdf->Cell($x1 ,5,'Ruang Ujian',0,0);
		$pdf->Cell(10 ,5,':',0,0);
		$pdf->Cell(0 ,5,$u['ruang'],0,1);

		$pdf->Cell($x1 ,5,'Catatan',0,0);
		$pdf->Cell(10 ,5,':',0,0);
		$pdf->MultiCell(130,5,$u['catatan'],0,1);

		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell(130 ,5,'',0,0);
		$pdf->Cell($x1 ,5,'Surakarta, '.
			longdate_indo($u['tanggal_daftar']),0,1);
		$image1 = 'assets/upload/images/ttd.png';
		$pdf->Cell( 40, 15, $pdf->Image($image1, 143, $pdf->GetY()+2, 43), 0, 0, 'L', false );
		$pdf->Ln();
		$pdf->Cell(130 ,5,'',0,0);
		$pdf->MultiCell(130,5,'Tim Skripsi Program Studi PPKn',0,1);


	}
	$pdf->Output('skripsi'.$u['nim'].'.pdf', 'I');
	
}
?>