<script src="<?php echo base_url('assets');?>/vendor/chart/Chart.js" type="text/javascript"></script>
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
	<li><a href="<?php date_default_timezone_set("Asia/Jakarta"); echo site_url();?>"><i class="fa fa-home"></i> Home</a>
	</li>
	<li class="active">Dashboard</li>
</ol>
<div id="myalert">
	<?php echo $this->session->flashdata('alert', true)?>
</div>

<div class="box-header">
	<div class="col-md-12">
		<img class="pull-right" style="width: 100px; height: 100px; margin-top: 20px;"
			src="<?php echo base_url('assets/upload/images/logo.png');?>">
		<h1 align="center">
			Media Pembelajaran dan Informasi<br>
			<small> Pendidikan Kewarganegaraan</small>
		</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title" style="text-align:center">Rekapitulasi Skripsi Berdasarkan Jenis Penelitian</h3>
			</div>
			<div class="box-body no-padding">
				<table class="table table-striped">
					<tr>
						<th style="text-align:center">Angkatan </th>
						<th style="text-align:center">Jumlah</th>
						<th style="text-align:center">Mendaftar Judul</th>
						<th style="text-align:center">Mendaftar Ujian </th>
						<th style="text-align:center">Sudah Ujian</th>
					</tr>
					<tbody>
						<?php for ($i=0; $i <= 5; $i++){ ?>
						<tr align="center">
							<td> <?php echo date("Y")-5+$i-2;  ?></td>
							<td> <?php echo $jumlah=$this->CRUD_model->jumlahangkatan(7-$i);  ?> </td>
							<td> <?php echo $this->CRUD_model->daftarjudul(7-$i); ?> </td>
							<td> <?php echo $this->CRUD_model->ujian(4,7-$i)+$this->CRUD_model->ujian(5,7-$i); ?> </td>
							<td>
								<?php echo $sudah=$this->CRUD_model->ujian(6,7-$i);
                      if(($jumlah==0) OR ($sudah==0)){
                        $persen = 0;
                      } else {
                        $persen = $sudah/$jumlah*100;
                      }
                      ?>
								( <?php echo number_format($persen,0);?>%)
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
  
	<div class="col-md-6">
		<div class="box">
			<div class="box-header">
			</div>
      <div>
						<canvas id="jenispenelitian"></canvas>
					</div>
		</div>
	</div>
<?php
$s1 = $this->CRUD_model->jenis_penelitian('Kuali');
$s2 = $this->CRUD_model->jenis_penelitian('Kuanti');
$s3 = $this->CRUD_model->jenis_penelitian('Kelas');
$s4 = $this->CRUD_model->jenis_penelitian('Mixed');
$s5 = $this->CRUD_model->jenis_penelitian('Deve');
$s6 = $this->CRUD_model->jenis_penelitian('Based');
$total = $s1+$s2+$s3+$s4+$s5+$s6;
$persen1 = round($s1/$total , 4)*100; 
$persen2 = round($s2/$total , 4)*100; 
$persen3 = round($s3/$total , 4)*100; 
$persen4 = round($s4/$total , 4)*100; 
$persen5 = round($s5/$total , 4)*100; 
$persen6 = round($s6/$total , 4)*100; 
?>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
  $('.datatab').DataTable({
    pageLength : 5,
  });
} );
</script>

<script>
  var ctx = document.getElementById("jenispenelitian").getContext('2d');
  var jenispenelitian = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: [
        "<?php echo 'Kualitatif '.$persen1.'%' ?>",
        "<?php echo 'Kuantitatif '.$persen2.'%' ?>",
        "<?php echo 'PTK '.$persen3.'%' ?>",
        "<?php echo 'Mixed Method '.$persen4.'%' ?>",
        "<?php echo 'RnD '.$persen5.'%' ?>",
        "<?php echo 'DBR '.$persen6.'%' ?>",
      ],
      datasets: [{
        label: '',
        data: [<?php echo $s1.','.$s2.','.$s3.','.$s4.','.$s5.','.$s6 ?>],
        backgroundColor: [
        'rgba(244, 66, 66, 0.7)',
        'rgba(255, 140, 0, 0.7)',
        'rgba(0, 25, 255, 0.7)',
        'rgba(28, 188, 0, 0.7)',
        'rgba(0, 233, 255, 0.7)',
        'rgba(150, 50, 255, 0.7)'
        ]
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
</script>
<script>
  var ctx = document.getElementById("ujian").getContext('2d');
  var ujian = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["Sudah", "Belum"],
      datasets: [{
        label: <?php echo $tahun1; ?>,
        data: [<?php echo $sudah1.','.$belum1 ?>],
        backgroundColor: ['rgba(244, 66, 66, 0.7)','rgba(244, 66, 66, 0.7)']
      },
      {
        label: <?php echo $tahun2; ?>,
        data: [<?php echo $sudah2.','.$belum2 ?>],
        backgroundColor: ['rgba(255, 140, 0, 0.7)','rgba(255, 140, 0, 0.7)']
      },
      {
        label: <?php echo $tahun3; ?>,
        data: [<?php echo $sudah3.','.$belum3 ?>],
        backgroundColor: ['rgba(0, 25, 255, 0.7)','rgba(0, 25, 255, 0.7)']
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
</script>