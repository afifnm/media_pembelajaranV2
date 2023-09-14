<div id="myalert">
	<?php echo $this->session->flashdata('alert', true)?>
</div>
<?php foreach($data2 as $row){
  $digit = substr($row['tahun'],1,1);
  if($digit==1)     { $warna = "bg-aqua"; }
  else if($digit==2){ $warna = "bg-red"; }
  else if($digit==3){ $warna = "bg-green"; }
  else if($digit==4){ $warna = "bg-yellow"; }
  else if($digit==5){ $warna = "bg-blue"; }
  else if($digit==6){ $warna = "bg-aqua"; }
  else if($digit==7){ $warna = "bg-red"; }
  else if($digit==8){ $warna = "bg-green"; }
  else if($digit==9){ $warna = "bg-yellow"; }
  else if($digit==0){ $warna = "bg-aqua"; }
  $tahun = "20".$row['tahun'];
  ?>
<a href="<?php echo site_url('admin/judul/angkatan/'.$row['tahun']);?>">
<div class="col-md-4 col-sm-6 col-xs-12">
	<div class="info-box">
		<span class="info-box-icon <?= $warna; ?>"><h2><?= $tahun; ?></h2></span>
		<div class="info-box-content">
			<span class="info-box-text"><?= $this->Sita_model->jumlahangkatan($row['tahun']); ?> Mahasiswa</span>
			<span class="label label-primary">
        <?= $this->Sita_model->daftarjudul($row['tahun']); ?> daftar judul
      </span> &nbsp;
      <span class="label label-warning">
      <?= $this->Sita_model->ujian(4,$row['tahun'])+$this->Sita_model->ujian(5,$row['tahun']); ?> daftar ujian
      </span> <br>
      <span class="label label-success">
        <?= $this->Sita_model->ujian(6,$row['tahun']); ?> sudah ujian
      </span>
		</div>
	</div>
</div>
</a>
<?php } ?>