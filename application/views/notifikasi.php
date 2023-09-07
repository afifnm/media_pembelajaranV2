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
                    <h5>Informasi !</h5>
                      <div class="box-body" style="padding-bottom: 0; padding-top: 0; font-size: 16px; font-weight: 500">
                      <?php echo $notifikasi ?>
                      </div>
                  </div>
                </div>
              </div>
            </div>
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
