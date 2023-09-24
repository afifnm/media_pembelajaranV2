<?php foreach($data2 as $u){ ?>
<ol class="breadcrumb">
	<li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
	<li><a href="<?php echo site_url('admin/link');?>">Link Terkait</a></li>
</ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
  <?php $this->session->set_flashdata('alert', ''); ?>
</div>
<div class="col-xs-12">
  <div class="box box-success">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-file"></i> Edit Link Terkait</h3>
    </div>
    <div class="box-body">
      <form class="form-horizontal" action="<?php echo site_url('admin/link/update') ?>" method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label class="col-sm-1 control-label">Judul</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="judul" value="<?php echo $u->judul; ?>">
              <input type="hidden" class="form-control" name="id" value="<?php echo $u->id; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-1 control-label">Link</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="link" value="<?php echo $u->link; ?>">
            </div>
          </div>
 
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="<?php echo site_url('admin/link');?>" class="btn btn-default">Cancel</a>
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