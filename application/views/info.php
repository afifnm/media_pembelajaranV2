<!DOCTYPE html>
<html lang="en">
<?php require_once('layout/_cssFE.php');?>
<body>

  <div id="wrapper">
    <!-- start header -->
    <?php require_once('layout/_headerFE.php');?>
    <!-- end header -->
    <?php foreach ($data4 as $info) {?>
    <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="<?php echo site_url('home');?>">Beranda</a> <i class="icon-angle-right"></i></li>

              <?php if($info['id_main']==0){ ?>
              <li><a href="<?php echo site_url('home/kategori/'.$info['id_kategori'].'/0');?>">
                <?php echo $info['kategori']; ?>
                <i class="icon-angle-right"></i></a>
              </li>
              <li><a href=""><?php echo $info['judul']; ?></a></li>

              <?php } else {?>

              <li><a href="<?php echo site_url('home/subkategori/'.$info['id_main'].'/0');?>">
                <?php echo $info['main_sub']; ?>
                <i class="icon-angle-right"></i></a>
              </li>
              <li><a href="<?php echo site_url('home/kategori/'.$info['id_kategori'].'/0');?>">
                <?php echo $info['kategori']; ?>
                <i class="icon-angle-right"></i></a>
              </li>
              <li><a href=""><?php echo $info['judul']; ?></a></li>
              <?php }?>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            
            <article style="margin-bottom: 20px;">
              <div class="row" style="margin-bottom: 0px;">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h4><a href=""><?php echo $info['judul']; ?></a></h4>
                    </div>
                  </div>
                  <div class="meta-post">
                  <?php $filename=FCPATH.'/assets/upload/images/informasi/'.$info['foto'];
                  if (file_exists($filename)){ ?>
                    <img src="<?php echo base_url('assets/upload/images/informasi/'.$info['foto']); ?>" alt="Attachment Image">
                    <?php }  else {?>
                    <img width="120px" height="120px" class="img-circle bordered" src="<?php echo base_url('assets/upload/images/no_image.png'); ?>" alt="Attachment Image">
                    <?php }?>
                  </div>
                  <div class="post-entry" style="margin-left: 0px;">
                    <p>
                      <?php 
                      $string = $info['isi'];
                      echo $string;
                      ?>
                    </p>
                    <span class="pull-right"><?php echo longdate_indo($info['tanggal']); ?></span>
                  </div>
                </div>
              </div>
            </article>
          
          </div>

          <?php require_once('layout/_sidebarFE.php');?>
        </div>
      </div>
    </section>
    <?php } ?>
    <?php require_once('layout/_footerFE.php');?>
  </div>
  <a href="#" class="scrollup"><i class="icon-angle-up icon-rounded icon-bglight icon-2x"></i></a>
<?php require_once('layout/_jsFE.php');?>
</body>

</html>
