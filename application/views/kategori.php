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
          <div class="span4">
            <div class="inner-heading">
            	<h2><?php echo $title; ?></h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="<?php echo site_url('home');?>">Beranda</a> <i class="icon-angle-right"></i></li>
              <li><?php echo $title; ?></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section id="content">
      <div class="container">
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

            <?php if($query ==NULL) {?>
            <article style="margin-bottom: 20px;">
              <div class="row" style="margin-bottom: 0px;">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      TIDAK ADA INFORMASI
                    </div>
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
