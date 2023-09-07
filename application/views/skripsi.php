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
              <li><a href="#">Sistem Informasi Tugas Akhir (SITA)</a> </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  <?php foreach ($data4 as $u) { ?>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="cta-box">
              <div class="row">
                <div class="span12">
                  <a href="<?php echo site_url('sita/printskripsi/'.$u['id']);?>" class="btn btn-color margintop10 pull-right" style="margin-right: 15px;">PRINT</a>
                  <div class="cta-text" style="padding: 30px;;">
                    <h4><?php if($u['tahap']>=5){ echo($u['no_ujian']); } ?></h4>
                      <div class="box-body" style="padding-bottom: 0; padding-top: 0; font-size: 16px; font-weight: 500">
                        <table border="0">
                          <tr>
                            <td> Nama </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php echo($u['nama']) ?> </td>
                          </tr>
                          <tr>
                            <td> NIM </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php echo($u['nim']) ?> </td>
                          </tr>
                          <?php if ($this->session->userdata('level') == "Admin") { ?>
                          <tr>
                            <td> Nomor HP </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php echo($u['no_hp']) ?> </td>
                          </tr>
                        <?php } ?>
                          <tr>
                            <td> Email </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php echo($u['email']) ?> </td>
                          </tr>
                          <tr>
                            <td width="160px"> Dosen Pembimbing 1 </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php 
                              if($u['dosen1']=='0'){
                              echo " - ";
                              } else {
                                echo($this->CRUD_model->namadosen($u['dosen1']));
                              } ?> 
                            </td>
                          </tr>
                          <tr>
                            <td> Dosen Pembimbing 2 </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php 
                              if($u['dosen2']=='0'){
                              echo " - ";
                              } else {
                                echo($this->CRUD_model->namadosen($u['dosen2']));
                              } ?> 
                            </td>
                          </tr>
                          <tr>
                            <td> Jenis Penelitian </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php echo($u['jenis_penelitian']) ?> </td>
                          </tr>
                          <tr>
                            <td> Judul Penelitian </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php echo($u['judul']) ?> </td>
                          </tr>
                          <tr>
                            <td>  </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php echo($u['judul2']) ?> </td>
                          </tr>
                          <tr>
                            <td> Tahap </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php 
                                if($u['tahap']==1){
                                  echo('Mendaftar Judul');
                                } elseif($u['tahap']==2){
                                  echo('Mendaftar Ujian');
                                } elseif($u['tahap']==3){
                                  echo('Berkas Ditolak');
                                } elseif($u['tahap']==4){
                                  echo('Berkas Ujian Diverifikasi');
                                } elseif($u['tahap']==5){
                                  echo('Tim Penguji Ditetapkan');
                                } elseif($u['tahap']==6){
                                  echo('Sudah Ujian');
                                } ?> 
                            </td>
                          </tr>
                        <?php if($u['tahap']==3){ ?>
                          <tr>
                            <td> Catatan </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php echo $u['catatan']; ?> </td>
                          </tr>
                        <?php } ?>

                        <?php if($u['tahap']>=5){ ?>
                          <tr>
                            <td> Tim Penguji </td>
                            <td>  </td>
                            <td>  </td>
                          </tr>
                          <tr>
                            <td> Ketua Penguji </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php echo($this->CRUD_model->namadosen($u['penguji1'])); ?> </td>
                          </tr>
                          <tr>
                            <td> Sekretaris </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php echo($this->CRUD_model->namadosen($u['penguji2'])); ?> </td>
                          </tr>
                          <tr>
                            <td> Anggota Penguji 1 </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php echo($this->CRUD_model->namadosen($u['penguji3'])); ?> </td>
                          </tr>
                          <tr>
                            <td> Anggota Penguji 2 </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php echo($this->CRUD_model->namadosen($u['penguji4'])); ?> </td>
                          </tr>
                          <tr>
                            <td> Tanggal Ujian </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php echo longdate_indo($u['tanggal_ujian']); ?> </td>
                          </tr>
                          <tr>
                            <td> Jam Ujian </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php echo date("H:i ", strtotime($u['jam1'])); ?> - <?php echo date("H:i ", strtotime($u['jam2'])); ?> WIB</td>
                          </tr>
                          <tr>
                            <td> Ruang </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php echo $u['ruang']; ?> </td>
                          </tr>
                          <tr>
                            <td> Catatan </td>
                            <td width="30px" style="text-align: center;"> : </td>
                            <td> <?php echo $u['catatan']; ?> </td>
                          </tr>
                        <?php } ?>
                        </table>
                </div>                        
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline"></div>
          </div>
        </div>
        <!-- end divider -->
      </div>
    </section>
  <?php } ?>

    <?php require_once('layout/_footerFE.php');?>
  </div>
  <a href="#" class="scrollup"><i class="icon-angle-up icon-rounded icon-bglight icon-2x"></i></a>
<?php require_once('layout/_jsFE.php');?>

</body>

</html>
