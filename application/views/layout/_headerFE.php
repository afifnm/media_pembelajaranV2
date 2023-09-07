<?php 
   $this->db->select('*');
   $this->db->from('main_sub');
   $this->db->where('jenis =',0);
   $this->db->order_by("urutan","ASC");
   $maininfo = $this->db->get()->result_array();

   $this->db->select('*');
   $this->db->from('main_sub');
   $this->db->where('jenis =',1);
   $this->db->order_by("urutan","ASC");
   $mainlab = $this->db->get()->result_array();

?>    
    <header>
      <div class="top">
      </div>
      <div class="container">
        <div class="row nomargin">
          <div class="span2">
            <div class="logo">
              <h1><a><img src="<?php echo base_url('assets');?>/upload/images/logo.png" width="40px" height="40px"> SILAB</a></h1>
            </div>
          </div>
          <div class="span10">
            <div class="navbar navbar-static-top">
              <div class="navigation">
                <nav>
                  <ul class="nav topnav">
                    <li>
                      <a href="<?php echo site_url('home');?>">Beranda</a>
                    </li>
                    <li>
                      <a href="<?php echo site_url('home/profile');?>">Profil </a>
                    </li>
                    <li>
                      <a href="<?php echo site_url('home/kategori/19/0');?>">Pengumuman </a>
                    </li>
                    
                    <li class="dropdown-submenu" >
                      <a href="#">Laboratorium</a>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('home/struktur');?>">Struktur Organisasi</a></li>
                      <?php 
                         $this->db->select('*');
                         $this->db->from('kategori');
                         $this->db->where('id_main',0);
                         $this->db->where('id_kategori !=',19);
                         $this->db->where('main =',1);
                         $navi = $this->db->get()->result_array();
                         foreach ($navi as $u) {?> 
                        <li><a href="<?php echo site_url('home/kategori/'.$u['id_kategori'].'/0');?>"><?php echo $u['kategori']?></a></li>
                        <?php }?>
                        <?php foreach ($mainlab as $u) {?>
                        <li class="dropdown-submenu">
                          <a href="<?php echo site_url('home/subkategori/'.$u['id_main'].'/0');?>"><?php echo $u['main_sub']?> </a>
                          <ul class="dropdown-menu">
                          <?php 
                             $this->db->select('*');
                             $this->db->from('kategori');
                             $this->db->where('id_main',$u['id_main']);
                             $navi = $this->db->get()->result_array();
                             foreach ($navi as $u) {?> 
                            <li><a href="<?php echo site_url('home/kategori/'.$u['id_kategori'].'/0');?>"><?php echo $u['kategori']?></a></li>
                            <?php }?>
                          </ul>
                        </li>
                        <?php }?>
                        <li><a href="<?php echo site_url('home/sarana');?>">Sarana & Prasana</a></li>
                      </ul>
                    </li>

                    <li class="dropdown-submenu" >
                      <a href="#">Mediainfo</a>
                      <ul class="dropdown-menu">
                      <?php 
                         $this->db->select('*');
                         $this->db->from('kategori');
                         $this->db->where('id_main',0);
                         $this->db->where('id_kategori !=',19);
                         $this->db->where('main =',0);
                         $navi = $this->db->get()->result_array();
                         foreach ($navi as $u) {?> 
                        <li><a href="<?php echo site_url('home/kategori/'.$u['id_kategori'].'/0');?>"><?php echo $u['kategori']?></a></li>
                        <?php }?>
                        <?php foreach ($maininfo as $u) {?>
                        <li class="dropdown-submenu">
                          <a href="<?php echo site_url('home/subkategori/'.$u['id_main'].'/0');?>"><?php echo $u['main_sub']?> </a>
                          <ul class="dropdown-menu">
                          <?php 
                             $this->db->select('*');
                             $this->db->from('kategori');
                             $this->db->where('id_main',$u['id_main']);
                             $navi = $this->db->get()->result_array();
                             foreach ($navi as $u) {?> 
                            <li><a href="<?php echo site_url('home/kategori/'.$u['id_kategori'].'/0');?>"><?php echo $u['kategori']?></a></li>
                            <?php }?>
                          </ul>
                        </li>
                        
                        <?php }?>
                      </ul>
                    </li>

                    
                    <li>
                      <a href="<?php echo site_url('sita');?>">SITA </a>
                    </li>
                    <li>
                      <a href="<?php echo site_url('admin');?>">Administrator </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>