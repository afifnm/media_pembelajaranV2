<?php 
   $this->db->select('*');
   $this->db->from('informasi');
   $this->db->order_by("tanggal","DESC");
   $this->db->limit(5, 5);
   $postfooter = $this->db->get()->result_array();
   $this->db->select('*');
   $this->db->from('user');
   $data2 = $this->db->get()->result_array();
foreach ($data2 as $u) {?>
<footer>
      <div class="container">
        <div class="row">
          <div class="span5">
            <div class="widget">
              <div class="footer_logo">
                <h4>Laboratorium PPKn FKIP UNS</h4>
              </div>
              <address>
							  <strong>Media Informasi Pendidikan Kewarganegaraan</strong><br>
  							<?php echo $u['alamat']?><br>
  						</address>
              <p>
<!--                 <i class="icon-phone"></i> <?php echo $u['wa']?> (WA ONLY)<br> -->
                <i class="icon-envelope-alt"></i> <?php echo $u['email']?>
              </p>
                <a href='https://wa.me/<?php echo $u['wa']?>' target="_blank" title="Facebook"><i class="icon-circled icon-bglight icon-phone"></i></a>
                <a href='http://facebook.com/<?php echo $u['fb']?>' target="_blank" title="Facebook"><i class="icon-circled icon-bglight icon-facebook"></i></a>
                <a href='http://twitter.com/<?php echo $u['tw']?>' target="_blank" title="Twitter"><i class="icon-circled icon-bglight icon-twitter"></i></a>
                <a href='http://instagram.com/<?php echo $u['ig']?>' target="_blank" title="Instagram"><i class="icon-circled icon-instagram icon-bglight"></i></a>
                <a href='https://www.youtube.com/channel/UCp7s-pyQMDwIJzGs7RUKy0g/videos?disable_polymer=1' target="_blank"title="Youtube"><i class="icon-circled icon-youtube  icon-bglight"></i></a>
            </div>

          </div>
          <div class="span3">
            <div class="widget">
              <h5 class="widgetheading">Laboratorium</h5>
              <ul class="link-list">
                <li> <i class="icon-angle-right"></i> <a href="<?php echo site_url('home/struktur');?>"> Struktur Organisasi</a></li>
                <?php 
                 $this->db->select('*');
                 $this->db->from('kategori');
                 $this->db->where('id_main',0);
                 $this->db->where('id_kategori !=',19);
                 $this->db->where('main =',1);
                 $navi = $this->db->get()->result_array();
                 foreach ($navi as $u) {?> 
                <li> <i class="icon-angle-right"></i> <a href="<?php echo site_url('home/kategori/'.$u['id_kategori'].'/0');?>"><?php echo $u['kategori']?></a></li>
                 <?php } ?>
                <li> <i class="icon-angle-right"></i> <a href="<?php echo site_url('home/sarana');?>"> Sarana & Prasana</a></li>
              </ul>

            </div>
          </div>
          <div class="span4">
            <div class="widget">
              <h5 class="widgetheading">Recent Post</h5>
              <ul class="link-list">
                <?php foreach ($postfooter as $u) {?>
                <li> <a href="<?php echo site_url("home/info/".$u['id']);?>"><i class="icon-angle-right"></i> <?php echo $u['judul']?></a></li>
                <?php }?>
              </ul>

            </div>
          </div>
        </div>
      </div>
      <div id="sub-footer">
        <div class="container">
          <div class="row">
            <div class="span12">
              <div class="copyright">
                <p><span>&copy;  Mediainformasi Pendidikan Kewarganegaraan dan Laboratorium Pendidikan Pancasila dan Kewarganegaraan All right reserved 2019</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
<?php } ?>