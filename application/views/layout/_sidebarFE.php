<?php
   $this->db->select('*');
   $this->db->from('informasi a');
   $this->db->join('kategori b', 'a.id_kategori = b.id_kategori','left');
   $this->db->order_by("a.tanggal","DESC");
   $this->db->where('a.id_kategori','16');
   $this->db->limit(5, 0);
   $data3 = $this->db->get()->result_array();

   $this->db->select('*');
   $this->db->from('informasi a');
   $this->db->join('kategori b', 'a.id_kategori = b.id_kategori','left');
   $this->db->order_by("a.tanggal","DESC");
   $this->db->where('a.id_kategori','19');
   $this->db->limit(5, 0);
   $data5 = $this->db->get()->result_array();
   
   $this->db->select('*');
   $this->db->from('link');
   $data6 = $this->db->get()->result_array();

   $this->db->select('*');
   $this->db->from('agenda');
   $this->db->order_by('agenda','ASC');
   $this->db->limit(4, 0);
   $data7 = $this->db->get()->result_array();
?>
<div class="span4">
  <aside class="right-sidebar">
    <div class="widget">
      <form class="form-horizontal" action="<?php echo site_url('home/pencarian') ?>" method="POST" enctype="multipart/form-data">
        <div class="input-append">
          <input class="span2" name="cari" type="text" placeholder="Pencarian...">
          <button class="btn btn-primary" type="submit"><i class="icon-search" style="color: white;"></i></button>
        </div>
      </form>
    </div>
    <?php $no=0; foreach ($data7 as $u) { $no=$no+1; }?>
    <div class="widget">
      <h5 class="widgetheading">Agenda Kegiatan</h5>
      <marquee direction="down" scrollamount="2">
      <ul class="cat">
      <?php foreach ($data7 as $u) {?>
        
        <li><?php echo $u['agenda']?></li>
            <div class="solidline"></div>
      
      <?php } ?>
      <?php if($no==0){ ?>
        <li>
          Tidak Ada Agenda Kegiatan
        </li>                   
        <?php } ?>
      </ul>
      </marquee>
    </div>
    <?php $no=0; foreach ($data3 as $u) { $no=$no+1; $judul=$u['kategori']; }?>
    <div class="widget">
      <h5 class="widgetheading"><?php echo $u['kategori']?></h5>
      <ul class="cat">
      <?php foreach ($data3 as $u) {?>
        <li class="list-group-item">
        <a href="<?php echo site_url("home/info/".$u['id']);?>"><i class="icon-angle-right"></i> &nbsp; <?php echo $u['judul']?></a>
        </li>
      <?php } ?>
      <?php if($no==0){ ?>
        <li>
          Tidak Ada Berita
        </li>                   
        <?php } ?>
      </ul>
    </div>

    <?php $no=0; foreach ($data5 as $u) { $no=$no+1; $judul=$u['kategori']; }?>
    <div class="widget">
      <h5 class="widgetheading"><?php echo $u['kategori']?></h5>
      <ul class="cat">
      <?php foreach ($data5 as $u) {?>
        <li class="list-group-item">
        <a href="<?php echo site_url("home/info/".$u['id']);?>"><i class="icon-angle-right"></i> &nbsp; <?php echo $u['judul']?></a>
        </li>
      <?php } ?>
      <?php if($no==0){ ?>
        <li>
          Tidak Ada Pengumuman
        </li>                   
        <?php } ?>
      </ul>
    </div>

    <?php $no=0; foreach ($data6 as $u) { $no=$no+1; }?>
    <div class="widget">
      <h5 class="widgetheading">Link Terkait</h5>
      <ul class="cat">
      <?php foreach ($data6 as $u) {?>
        <li class="list-group-item">
        <a href="<?php echo $u['link'];?>" target="_blank"><i class="icon-angle-right"></i> &nbsp; <?php echo $u['judul']?></a>
        </li>
      <?php } ?>
      <?php if($no==0){ ?>
        <li>
          Tidak Ada Link Terkait
        </li>                   
        <?php } ?>
      </ul>
    </div>

<div id="histats_counter" align="left"></div>
<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,4201947,4,3024,130,80,00011110']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4201947&101" alt="" border="0"></a></noscript>
<!-- Histats.com  END  -->

  </aside>
</div>

