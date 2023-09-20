<!DOCTYPE html>
<html lang="en">
<?php require_once('layout/_cssFE.php');?>

<body>
	<div id="wrapper">
		<!-- start header -->
		<?php require_once('layout/_headerFE.php');?>
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
							<li><a href="#">SITA</a> <i class="icon-angle-right"></i></li>
							<li><a href="#">Pendaftaran Ujian Tugas Akhir</a> </li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<section id="content">
			<div class="container">
				<div class="row">
					<div class="span8">
						<form class="form-horizontal" action="<?php echo site_url('sita/reset_password') ?>" method="POST"
							enctype="multipart/form-data">
							<div class="row">
								<div class="span8 margintop10 field form-group">
									<input type="text" name="email" placeholder="masukan email saat mendaftar judul skripsi" style="width: 500px;"
										required />
								</div>
								<div class="span8 margintop10 field form-group">
									<p>
										<button class="btn btn-color margintop10 pull-left" type="submit">Kirim</button>
										<span class="pull-right margintop20">* Pastikan email yang dimasukan benar</span>
									</p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<?php require_once('layout/_footerFE.php');?>
	</div>
	<a href="#" class="scrollup"><i class="icon-angle-up icon-rounded icon-bglight icon-2x"></i></a>
	<?php require_once('layout/_jsFE.php');?>
</body>

</html>
