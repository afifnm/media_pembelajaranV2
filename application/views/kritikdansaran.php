<?php 
  date_default_timezone_set("Asia/Jakarta");
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	<?php echo $title ?>
	</title>
	<link href='<?php echo base_url("assets/upload/images/$favicon"); ?>' rel='shortcut icon' type='image/x-icon' />
	<!-- meta -->
	<?php require_once('layout/_meta.php');?>
	<!-- css -->
	<?php require_once('layout/_css.php');?>
</head>
<body class="hold-transition skin-blue layout-top-nav layout-boxed">
	<div class="wrapper">
		<!-- header -->
		<?php require_once('layout/_headerfront.php');?>
		<!-- sidebar -->
		<!-- content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="col-xs-12 ngepasin">
				<?php require_once('layout/_headerbox.php');?>            
		        <div class="col-md-9">
	        	  <ol class="breadcrumb">
				    <li><a href="<?php echo site_url('/home');?>"><i class="fa fa-home"></i> Beranda</a></li>
				    <li class="active">Kritik dan Saran</li>
				  </ol>
		          <div class="box box-widget" style="padding: 25px; ">
		            <div class="box-header with-border" style="padding-bottom: 0;">
		              <div class="user-block">
		                <span class="username" style="margin-left: 0; font-size: 25px;">
		                	Kritik dan Saran
		                </span>
		              </div>
		            </div>
		            <div class="box-body" style="padding-bottom: 0; padding-top: 0; font-size: 20px; font-weight: 500">
		            <hr />
				      <form class="form-horizontal" action="<?php echo site_url('home/simpan') ?>" method="POST" enctype="multipart/form-data">
				        <div class="box-body">
				          <div class="form-group">
				            <span class="col-sm-2 control-label" style="font-size: 16px;">Nama</span>
				            <div class="col-sm-5">
				              <input type="text" class="form-control" name="nama" placeholder="Nama" required>
				            </div>
				          </div>
				          <div class="form-group">
				            <span class="col-sm-2 control-label" style="font-size: 16px;">Email</span>
				            <div class="col-sm-5">
				              <input type="email" class="form-control" name="email" placeholder="Email">
				            </div>
				          </div>
				          <div class="form-group">
				            <span class="col-sm-2 control-label" style="font-size: 16px;">Nomor HP</span>
				            <div class="col-sm-5">
				              <input type="text" class="form-control" name="no_hp" placeholder="Nomor HP">
				            </div>
				          </div>
				          <div class="form-group">
				            <span class="col-sm-2 control-label" style="font-size: 16px;">Kritik dan Saran</span>
				            <div class="col-sm-9">
				              <textarea rows="10" class="form-control" name="isi" placeholder="Masukan kritik dan saran..."></textarea>
				            </div>
				          </div> 
				        </div>
				        <!-- /.box-body -->
				        <div class="box-footer">
				          <a href="<?php echo site_url('home');?>" class="btn btn-default">Cancel</a>
				          <button type="submit" class="btn btn-success pull-right">Kirim</button>
				        </div>
				        <!-- /.box-footer -->
				      </form>
         			<hr />
		            </div>
		          </div>	 
				</div>
		        <div class="col-md-3">
					<?php require_once('layout/_sidebarfront.php');?>
		        </div>
			</section>
		</div>
		<!-- footer -->
	<?php require_once('layout/_footer.php') ;?>
	</div>
	<!-- js -->
	<?php require_once('layout/_js.php') ;?>
</body>
</html>
