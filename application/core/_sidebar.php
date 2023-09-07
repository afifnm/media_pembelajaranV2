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
        <li class="<?php echo activate_menu('informasi'); ?>">
          <a href="<?php echo site_url('admin/informasi');?>">
                <i class="fa fa-newspaper-o"></i>
                <span>Data Informasi</span>
            </a>
        </li>
        <li class="<?php echo activate_menu('kategori'); ?>">
          <a href="<?php echo site_url('admin/kategori');?>">
                <i class="fa fa-server "></i>
                <span>Kategori Informasi</span>
            </a>
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
      </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
