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
              <h2>Sarana dan Prasana</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="<?php echo site_url('home');?>">Beranda</a> <i class="icon-angle-right"></i></li>
              <li>Sarana dan Prasana</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section id="works">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="row">
              <div class="grid cs-style-3">
                <?php foreach ($data4 as $user) {?>
                <div class="span3" style="margin-bottom: 20px;">
                  <div class="item">
                    <figure>
                      <div><img src="<?php echo base_url('assets/upload/sarana/'.$user['nama']); ?>" alt=""></div>
                      <figcaption>
                        <h3><?php echo $user['judul']; ?></h3>
                        <p>
                          <a href="<?php echo base_url('assets/upload/sarana/'.$user['nama']); ?>" data-pretty="prettyPhoto[gallery1]" title="<?php echo $user['judul']; ?>"><i class="icon-zoom-in icon-circled icon-bglight icon-2x active"></i></a>
                        </p>
                      </figcaption>
                    </figure>
                  </div>
                </div>
                <?php  } ?>
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
</body>

</html>
