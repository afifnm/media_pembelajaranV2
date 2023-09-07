<!DOCTYPE html>
<html lang="en">
<?php require_once('layout/_cssFE.php');?>
<body>

  <div id="wrapper">
    <!-- start header -->
    <?php require_once('layout/_headerFE.php');?>
    <!-- end header -->
    <section id="intro">
      <div class="intro-content">
        <div style="padding: 20px;">
          <img src="<?php echo base_url('assets');?>/upload/images/fav2.png" width="240px" height="80px">
        </div>
        
        <h2>SISTEM INFORMASI LABORATORIUM</h2>
        <h3>Program Studi Pendidikan Pancasila dan Kewarganegaraan (PPKn) FKIP UNS </h3>
        <div>
          <a href="#content" class="btn btn-primary scrollto">Get Started</a>
        </div>
      </div>
    </section>
    <!-- /section intro -->
    <section id="inner-headline">
      <div class="container">
        <div class="row">
            <div class="inner-heading">
              <marquee style="margin-top: 20px; color: black; font-family: sans-serif;">
              <b><?php echo $welcome; ?></b>
             </marquee>
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
                    <h4><a href="<?php echo site_url("home/profile/");?>"><?php echo $judul_profil; ?></a></h4>
                      <div class="box-body" style="padding-bottom: 0; padding-top: 0; font-size: 16px; font-weight: 500">
                        <?php 
                        $this->load->helper('text');
                        $string = $deskripsi;
                        $string = word_limiter($string, 23);
                        echo $string; ?>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="span8">
            <?php foreach ($query as $info) {?>
            <article style="margin-bottom: 20px;">
              <div class="row" style="margin-bottom: 0px;">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h4><a href="<?php echo site_url("home/info/".$info->id);?>"><?php echo $info->judul; ?></a></h4>
                    </div>
                  </div>
                  <div class="meta-post">
                  <?php $filename=FCPATH.'/assets/upload/images/informasi/'.$info->foto;
                  if (file_exists($filename)){ ?>
                    <img width="140px" height="140px" src="<?php echo base_url('assets/upload/images/informasi/'.$info->foto); ?>" alt="Attachment Image">
                    <?php }  else {?>
                    <img width="120px" height="120px" class="img-circle bordered" src="<?php echo base_url('assets/upload/images/no_image.png'); ?>" alt="Attachment Image">
                    <?php }?>
                  </div>
                  <div class="post-entry">
                    <p>
                      <?php 
                      $this->load->helper('text');
                      $string = $info->isi;
                      $string = word_limiter($string, 40);
                      echo $string;
                      ?>
                    </p>
                    <a href="<?php echo site_url("home/info/".$info->id);?>" class="btn btn-primary"> Read more &nbsp;<i style="color: white;" class="icon-angle-right"></i></a>
                    <span class="pull-right"><?php echo longdate_indo($info->tanggal); ?></span>
                  </div>
                </div>
              </div>
            </article>
          <?php } ?>
            <div id="pagination">
              <?php echo $halaman;?>
            </div>
          </div>

          <?php require_once('layout/_sidebarFE.php');?>
        </div>
      </div>
    </section>
    <?php require_once('layout/_footerFE.php');?>
  </div>
  <a href="#" class="scrollup"><i class="icon-angle-up icon-rounded icon-bglight icon-2x"></i></a>
<?php require_once('layout/_jsFE.php');?>
</body>

</html>
