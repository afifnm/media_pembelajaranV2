<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
				<img class="img-circle" src="<?php echo base_url('assets/upload/images/profil/'.$this->session->userdata('foto')); ?>">
			</div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('nama'); ?> <br>
        </p>
        <p><small><i class="fa fa-circle" style="color: green;"></i> Online</small>
        </p>
        <!-- Status -->
      </div>
    </div>
    
    <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGASI</li>
        <li class="<?php echo activate_menu('home'); ?>">
          <a href="<?php echo site_url('admin/home');?>">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="<?php echo activate_menu('sarana'); ?>">
          <a href="<?php echo site_url('admin/sarana');?>">
                <i class="fa fa-picture-o"></i>
                <span>Sarana & Prasarana</span>
            </a>
        </li>
        <li class="<?php echo activate_menu('informasi'); ?>">
          <a href="<?php echo site_url('admin/informasi');?>">
                <i class="fa fa-newspaper-o"></i>
                <span>Posting</span>
            </a>
        </li>
        <li class="treeview <?php echo activate_menu('kategori'); ?> <?php echo activate_menu('lab'); ?>">
          <a href="#">
            <i class="fa fa-server"></i>
            <span>Navigasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo activate_menu('lab'); ?>"><a href="<?php echo site_url('admin/lab');?>"><i class="fa fa-circle-o"></i> Laboratorium</a></li>
            <li class="<?php echo activate_menu('kategori'); ?>"><a href="<?php echo site_url('admin/kategori');?>"><i class="fa fa-circle-o"></i> Kategori</a></li>
          </ul>
        </li>
        <li class="<?php echo activate_menu('agenda'); ?>">
          <a href="<?php echo site_url('admin/agenda');?>">
                <i class="fa fa-calendar-check-o "></i>
                <span>Agenda Kegiatan</span>
            </a>
        </li>
        <li class="<?php echo activate_menu('link'); ?>">
          <a href="<?php echo site_url('admin/link');?>">
                <i class="fa fa-link"></i>
                <span>Link Terkait</span>
            </a>
        </li>

        <li class="<?php echo activate_menu('file'); ?>">
          <a href="<?php echo site_url('admin/file');?>">
                <i class="fa fa-file"></i>
                <span>File Upload</span>
            </a>
        </li>
        <li class="<?php echo activate_menu('kritikdansaran'); ?>">
          <a href="<?php echo site_url('admin/kritikdansaran');?>">
                <i class="fa fa-envelope"></i>
                <span>Kritik dan Saran</span>
            </a>
        </li>
        <li class="header">SISTEM INFORMASI TUGAS AKHIR</li>
        <li class="<?php echo activate_menu('dosen'); ?>">
          <a href="<?php echo site_url('admin/dosen');?>">
                <i class="fa fa-user"></i>
                <span>Data Dosen</span>
            </a>
        </li>
        <li class="<?php echo activate_menu('mahasiswa'); ?>">
          <a href="<?php echo site_url('admin/mahasiswa');?>">
                <i class="fa fa-users"></i>
                <span>Mahasiswa</span>
            </a>
        </li>
        <li class="<?php echo activate_menu('judul'); ?>">
          <a href="<?php echo site_url('admin/judul');?>">
                <i class="fa fa-database"></i>
                <span>Pendaftaraan Judul</span>
            </a>
        </li>
        
        <li class="<?php echo activate_menu('ujian'); ?>">
          <a href="<?php echo site_url('admin/ujian');?>">
                <i class="fa fa-university"></i>
                <span>Pendaftaran Ujian</span>
            </a>
        </li>
      </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
