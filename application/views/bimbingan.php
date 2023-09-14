<!DOCTYPE html>
<html lang="en">
<?php require_once('layout/_cssFE.php');?>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

<body>
	<div id="wrapper">
		<!-- start header -->
		<?php require_once('layout/_headerFE.php');?>
		<script src="<?php echo base_url('assets');?>/vendor/chart/Chart.js" type="text/javascript"></script>

		<!-- end header -->

		<section id="inner-headline">
			<div class="container">
				<div class="row">
					<div class="span8">
						<div class="inner-heading">
							<h2>Sistem Informasi Tugas Akhir (SITA)</h2>
						</div>
					</div>
					<div class="span4">
						<ul class="breadcrumb">
							<li><a href="../">Beranda</a> <i class="icon-angle-right"></i></li>
							<li><a href="#">Sistem Informasi Tugas Akhir (SITA)</a> </li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<section id="content">
			<div class="container">
				<h5> Data Mahasiswa Bimbingan <?php echo $this->CRUD_model->namadosen($id_dosen); ?></h5>
				Sebagai Ketua Penguji <?php echo $this->CRUD_model->ketua($id_dosen); ?> Kali, Sebagai Sekretaris
				<?php echo $this->CRUD_model->sekretaris($id_dosen); ?> kali
				<!-- divider -->
				<div class="row">
					<div class="span12">
						<div class="solidline"></div>
					</div>
				</div>
				<!-- end divider -->
				<div class="row">
					<div class="span6">
						<div class="pricing-box-plain">
							<div class="heading">
								<span> Pembimbing 1 </span>
								<a href="<?php echo site_url('sita/cetakbimbingan/1/'.$id_dosen);?>"
									class="btn btn-color margintop10 pull-right">PRINT</a>
							</div>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>NIM</th>
										<th>Nama</th>
										<th>Tahap</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach ($data2 as $user) {?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $user['nim']; ?></td>
										<td><?php echo $user['nama']; ?></td>
										<td>
											<?php 
                    if($user['tahap']==1){
                      echo '<span class="label label-primary">';
                      echo('MENDAFTAR JUDUL');
                      echo '</span>';
                    } elseif($user['tahap']==2){
                      echo '<span class="label label-primary">';
                      echo('MENDAFTAR UJIAN');
                      echo '</span>';
                    } elseif($user['tahap']==3){
                      echo '<span class="label label-info">';
                      echo('BERKAS DITOLAK');
                      echo '</span>';
                    } elseif($user['tahap']==4){
                      echo '<span class="label label-info">';
                      echo('BERKAS DIVERIKASI');
                      echo '</span>';
                    } elseif($user['tahap']==5){
                      echo '<span class="label label-success">';
                      echo('TIM PENGUJI DITETAPKAN');
                      echo '</span>';
                    } elseif($user['tahap']==6){
                      echo '<span class="label label-success">';
                      echo('SUDAH UJIAN');
                      echo '</span>';
                    } ?>
											<a href="<?php echo site_url('sita/skripsi/'.$user['id']);?>">
												<span class="label label-success">LIHAT </span> </a>
										</td>
									</tr>
									<?php $no++; } ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="span6">
						<div class="pricing-box-plain">
							<div class="heading">
								<span> Pembimbing 2 </span>
								<a href="<?php echo site_url('sita/cetakbimbingan/2/'.$id_dosen);?>"
									class="btn btn-color margintop10 pull-right">PRINT</a>
							</div>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>NIM</th>
										<th>Nama</th>
										<th>Tahap</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach ($data3 as $user) {?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $user['nim']; ?></td>
										<td><?php echo $user['nama']; ?></td>
										<td>
											<?php 
                    if($user['tahap']==1){
                      echo '<span class="label label-primary">';
                      echo('MENDAFTAR JUDUL');
                      echo '</span>';
                    } elseif($user['tahap']==2){
                      echo '<span class="label label-primary">';
                      echo('MENDAFTAR UJIAN');
                      echo '</span>';
                    } elseif($user['tahap']==3){
                      echo '<span class="label label-info">';
                      echo('BERKAS DITOLAK');
                      echo '</span>';
                    } elseif($user['tahap']==4){
                      echo '<span class="label label-info">';
                      echo('BERKAS DIVERIFIKASI');
                      echo '</span>';
                    } elseif($user['tahap']==5){
                      echo '<span class="label label-success">';
                      echo('TIM PENGUJI DITETAPKAN');
                      echo '</span>';
                    } elseif($user['tahap']==6){
                      echo '<span class="label label-success">';
                      echo('SUDAH UJIAN');
                      echo '</span>';
                    } ?>
											<a href="<?php echo site_url('sita/skripsi/'.$user['id']);?>">
												<span class="label label-success">LIHAT </span> </a>
										</td>
									</tr>
									<?php $no++; } ?>
								</tbody>
							</table>
						</div>
					</div>
        <!-- divider -->
				<div class="row">
					<div class="span12">

					</div>
				</div>
				<!-- end divider -->
          <div class="span6">
						<div class="pricing-box-plain">
							<div class="heading">
								<span> Ketua Penguji </span>
								<a href="<?php echo site_url('sita/cetakbimbingan/3/'.$id_dosen);?>"
									class="btn btn-color margintop10 pull-right">PRINT</a>
							</div>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>NIM</th>
										<th>Nama</th>
										<th>Tahap</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach ($ketua as $user) {?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $user['nim']; ?></td>
										<td><?php echo $user['nama']; ?></td>
										<td>
											<?php 
                    if($user['tahap']==1){
                      echo '<span class="label label-primary">';
                      echo('MENDAFTAR JUDUL');
                      echo '</span>';
                    } elseif($user['tahap']==2){
                      echo '<span class="label label-primary">';
                      echo('MENDAFTAR UJIAN');
                      echo '</span>';
                    } elseif($user['tahap']==3){
                      echo '<span class="label label-info">';
                      echo('BERKAS DITOLAK');
                      echo '</span>';
                    } elseif($user['tahap']==4){
                      echo '<span class="label label-info">';
                      echo('BERKAS DIVERIKASI');
                      echo '</span>';
                    } elseif($user['tahap']==5){
                      echo '<span class="label label-success">';
                      echo('TIM PENGUJI DITETAPKAN');
                      echo '</span>';
                    } elseif($user['tahap']==6){
                      echo '<span class="label label-success">';
                      echo('SUDAH UJIAN');
                      echo '</span>';
                    } ?>
											<a href="<?php echo site_url('sita/skripsi/'.$user['id']);?>">
												<span class="label label-success">LIHAT </span> </a>
										</td>
									</tr>
									<?php $no++; } ?>
								</tbody>
							</table>
						</div>
					</div>
          <div class="span6">
						<div class="pricing-box-plain">
							<div class="heading">
								<span> Sekretaris Penguji </span>
								<a href="<?php echo site_url('sita/cetakbimbingan/4/'.$id_dosen);?>"
									class="btn btn-color margintop10 pull-right">PRINT</a>
							</div>
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>NIM</th>
										<th>Nama</th>
										<th>Tahap</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach ($sekre as $user) {?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $user['nim']; ?></td>
										<td><?php echo $user['nama']; ?></td>
										<td>
											<?php 
                    if($user['tahap']==1){
                      echo '<span class="label label-primary">';
                      echo('MENDAFTAR JUDUL');
                      echo '</span>';
                    } elseif($user['tahap']==2){
                      echo '<span class="label label-primary">';
                      echo('MENDAFTAR UJIAN');
                      echo '</span>';
                    } elseif($user['tahap']==3){
                      echo '<span class="label label-info">';
                      echo('BERKAS DITOLAK');
                      echo '</span>';
                    } elseif($user['tahap']==4){
                      echo '<span class="label label-info">';
                      echo('BERKAS DIVERIKASI');
                      echo '</span>';
                    } elseif($user['tahap']==5){
                      echo '<span class="label label-success">';
                      echo('TIM PENGUJI DITETAPKAN');
                      echo '</span>';
                    } elseif($user['tahap']==6){
                      echo '<span class="label label-success">';
                      echo('SUDAH UJIAN');
                      echo '</span>';
                    } ?>
											<a href="<?php echo site_url('sita/skripsi/'.$user['id']);?>">
												<span class="label label-success">LIHAT </span> </a>
										</td>
									</tr>
									<?php $no++; } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
		</section>
		<?php require_once('layout/_footerFE.php');?>
	</div>
	<a href="#" class="scrollup"><i class="icon-angle-up icon-rounded icon-bglight icon-2x"></i></a>
	<?php require_once('layout/_jsFE.php');?>
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
</body>

</html>
