<!DOCTYPE html>
<html lang="en">
<?php require_once('layout/_cssFE.php');?>
<link href="<?php echo base_url('assets');?>/vendor/select2/dist/css/select2.min.css" rel="stylesheet">
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
              <li><a href="#">Pendataan Judul</a> </li>
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
                    <h5>Pendataan Judul Skripsi</h5>
                      <div class="box-body" style="padding-bottom: 0; padding-top: 0; font-size: 16px; font-weight: 500">
                      Harap mengisi data form dengan benar dan teliti, hubungi Admin jika terjadi kesalahan pengisian.
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="span8">
            <form class="form-horizontal" action="<?php echo site_url('sita/inputjudul') ?>" method="POST">
              <div class="row">
                <div class="span8 margintop10 field form-group">
                  <input type="text" name="nama" placeholder="Nama Lengkap" style="width: 700px;" required />
                </div>
                <div class="span8 margintop10 field form-group">
                  <input type="text" name="nim" placeholder="NIM (Nomor Induk Mahasiswa) | Contoh : K6414001" style="width: 700px;" required />
                </div>
                <div class="span8 margintop10 field form-group">
                  <input type="text" name="password" placeholder="Password (Buatlah password anda dan ingat baik-baik, digunakan untuk mendaftar ujian.)" style="width: 700px;" required />
                </div>
                <div class="span8 margintop10 field form-group">
                  <input type="text" name="no_hp" placeholder="Nomor whatsapp yang bisa dihubungi" style="width: 300px;" required />
                </div>
                <div class="span8 margintop10 field form-group">
                  <input type="email" name="email" placeholder="Email | Contoh mahasiswa@gmail.com (Digunakan untuk pemberitahuan ujian)" style="width: 700px;" required />
                </div>
                <div class="span4 margintop10 field form-group"> Dosen Pembimbing 1 </div>
                <div class="span8 field form-group">
                  <select class="form-control select2" name="dosen1" style="width: 315px;" required>
                  <option value="0"> Belum Dapat</option>
                    <?php foreach ($data4 as $user) {?>
                  <option value="<?php echo $user['id_dosen'] ?>"><?php echo $user['nama']; ?> </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="span4 margintop10 field form-group"> Dosen Pembimbing 2 </div>
                <div class="span8 field form-group">
                  <select class="form-control select2" name="dosen2" style="width: 315px;" required>
                  <option value="0"> Belum Dapat</option>
                    <?php foreach ($data4 as $user) {?>
                  <option value="<?php echo $user['id_dosen'] ?>"> <?php echo $user['nama']; ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="span4 margintop10 field form-group"> Jenis Penelitian </div>
                <div class="span8 field form-group">
                  <select class="form-control select2" name="jenis_penelitian" style="width: 315px;" required>
                  <option value="Kualitatif"> Kualitatif</option>
                  <option value="Kuantitatif"> Kuantitatif</option>
                  <option value="Penelitian Tindakan Kelas"> Penelitian Tindakan Kelas</option>
                  <option value="Mixed Method"> Mixed Method</option>
                  <option value="Research dan Development"> Research dan Development</option>
                  </select>
                </div>

      
                <div class="span8 margintop10 field form-group">
                  <input type="text" name="judul" placeholder="Judul Penelitian" style="width: 700px;" required />
                </div>
                <div class="span8 margintop10 field form-group">
                  <input type="text" name="judul2" placeholder="Judul Penelitian (Dalam Bahasa Inggris)" style="width: 700px;" required />
                </div>
                <div class="span4 margintop10 field form-group"> Formulir Pendaftaran Judul</div>
                <div class="span8 margintop10 field form-group">
                  <input type="text" name="file2" placeholder="Upload formulir judul anda ke google drive, kemudian masukan linknya disini (hapus https:// pada link)" style="width: 700px;" required />
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
  <!-- Contact Form JavaScript File -->
  <script src="<?php echo base_url('assets');?>/vendor/select2/dist/js/select2.full.min.js"></script>
<script>
  $(function () {
    $('.select2').select2()
  })
</script>
</body>

</html>
