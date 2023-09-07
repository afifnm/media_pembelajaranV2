<?php 
  date_default_timezone_set("Asia/Jakarta");
  $jam = date("H:i");
  $tanggal = date("y-m-d");
  $hari = date('l'); if($hari=='Monday'){$indo='Senin';}
  if($hari=='Tuesday'){$indo='Selasa';}if($hari=='Wednesday'){$indo='Rabu';}
  if($hari=='Thursday'){$indo='Kamis';}if($hari=='Friday'){$indo='Jumat';}
  if($hari=='Saturday'){$indo='Sabtu';}if($hari=='Sunday'){$indo='Minggu';}
?> 
<ol class="breadcrumb" style="margin-bottom: 0px; padding-bottom: 0px;">
  <li><a href="<?php date_default_timezone_set("Asia/Jakarta"); echo site_url();?>"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Dashboard</li>
</ol> 
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>

<div class="box-header">
	<div class="col-md-12">
		<img class="pull-right"style="width: 100px; height: 100px; margin-top: 20px;" src="<?php echo base_url('assets/upload/images/logo.png');?>"">
	  <h1 align="center">
	     Media Pembelajaran dan Informasi<br>
	    <small> Pendidikan Kewarganegaraan</small>
	  </h1> 
	</div>
</div>
<div class="col-md-10">
</div>

</div>