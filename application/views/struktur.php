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
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="<?php echo site_url('home');?>">Beranda</a> <i class="icon-angle-right"></i></li>
              <li>Struktur Organisasi Laboratorium dan Ruang Baca</li>
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
                      <h4><a href="">Struktur Organisasi Laboratorium dan Ruang Baca</a></h4>
                    </div>
                  </div>
                  <div class="item">
                    <figure>
                      <div><a href="<?php echo base_url('assets/upload/images/struktur.jpg'); ?>" data-pretty="prettyPhoto[gallery1]" title="Struktur Organisasi Laboratorium dan Ruang Baca"><img src="<?php echo base_url('assets/upload/images/struktur.jpg'); ?>" alt="Struktur Organisasi Laboratorium dan Ruang Baca"></a>
                      </div>
                    </figure>
                  </div>
                </div>
              </div>
            </article>
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
