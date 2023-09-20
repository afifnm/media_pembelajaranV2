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
					<div class="span12">
						<div class="cta-box">
							<div class="row">
								<div class="span12">
									<div class="cta-text">
										<h5>Pendaftaran Ujian Tugas Akhir</h5>
										<div class="box-body" style="padding-bottom: 0; padding-top: 0; font-size: 16px; font-weight: 500">
											Harap mengisi data form dengan benar dan teliti, hubungi Admin jika terjadi kesalahan pengisian.
										</div>
									</div>
									<div id="myalert">
										<?php echo $this->session->flashdata('alert', true)?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="span8">
						<form class="form-horizontal" action="<?php echo site_url('sita/daftarujian') ?>" method="POST"
							enctype="multipart/form-data">
							<div class="row">
								<div class="span8 margintop10 field form-group">
									<input type="text" name="nim" placeholder="NIM (Nomor Induk Mahasiswa)" style="width: 500px;"
										required />
								</div>
								<div class="span8 margintop10 field form-group">
									<input type="text" name="password" placeholder="Password (Gunakan password saat mendaftar judul)"
										style="width: 500px;" required />
								</div>
								<div class="span8 margintop10 field form-group">
									<a href="<?= site_url('sita/reset') ?>">Klik disini apabila lupa password...</a>
								</div>
								<div class="span4 margintop10 field form-group"> Berkas-berkas ujian </div>
								<div class="span8 margintop10 field form-group">
									<input type="text" name="file2"
										placeholder="Upload Berkas-berkas ke google drive, kemudian masukan linknya disini (hapus https:// pada link)"
										style="width: 700px;" required />
								</div>
								<div class="span8 margintop10 field form-group">
									<p>
										<button class="btn btn-color margintop10 pull-left" type="submit">Kirim</button>
										<span class="pull-right margintop20">* Pastikan anda mengisi data dengan benar</span>
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
