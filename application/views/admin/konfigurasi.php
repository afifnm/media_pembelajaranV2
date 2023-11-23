<?php foreach($data3 as $u){ ?>
<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
	<li><a href="<?php echo site_url('admin/home/konfigurasi');?>">Konfigurasi</a></li>
</ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
  <?php $this->session->set_flashdata('alert', ''); ?>
</div>
<div class="col-xs-12">
  <div class="box box-success">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-user"></i> Profil Website </h3>
    </div>
    <div class="box-body">
      <form class="form-horizontal" action="<?php echo site_url('admin/home/update') ?>" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-1 control-label">Nama Website</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="nama" value="<?php echo $u['nama_website']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-1 control-label">Text Berjalan Dashboard</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="welcome" value="<?php echo $u['welcome']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-1 control-label">Judul Profil</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="judul" value="<?php echo $u['judul_profil']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-1 control-label">Deskripsi Profil</label>
            <div class="col-sm-11">
              <textarea id="mytextarea" rows="10" name="mytextarea" placeholder="Place some text here"><?php echo $u['deskripsi']; ?></textarea>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="<?php echo site_url('admin/home');?>" class="btn btn-default">Cancel</a>
          <button type="submit" class="btn btn-success pull-right">Simpan</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div> 
   </div>
</div>
<?php } ?>
<script src="<?php echo base_url('assets');?>/vendor/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>