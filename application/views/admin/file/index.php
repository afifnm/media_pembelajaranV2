  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Data File</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true);?>
  <?php $this->session->set_flashdata('alert', ''); ?>
</div>
<div class="col-xs-3" align="left">
  <div class="box-header">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalTambah"><i class="fa fa-plus"></i> Upload File</button>
  </div>
</div>
<div class="col-xs-9" align="right">
</div>
<div class="col-xs-12">
  <div class="box box-success">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-file"></i> Data File</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th width="40%">Nama File</th>
          <th width="40%">Copy Link</th>
          <th width="10%">Ukuran</th>
          <th width="10%" style="text-align: center;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        $folder=FCPATH.'/assets/upload/file/'; //folder tempat gambar disimpan  
        $handle = opendir($folder);  
        $i = 1;  $size =0;
        while(false !== ($file = readdir($handle))){  
        if($file != '.' && $file != '..'){ 
          $filesize = filesize(FCPATH.'/assets/upload/file/'.$file); // bytes
          $filesize = round($filesize / 1024, 1);
          $size = $size+$filesize;

          ?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $file ?></td>
        <td><?php echo site_url('assets/upload/file/'.$file); ?></td>
        <td><?php echo $filesize.' KB' ?></td>
        <td align="center">
        <a href="<?php echo site_url('assets/upload/file/'.$file);?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-download"></i></a>
        <a onClick="return confirm('Apakah anda yakin menghapus data ini?')"
         href="<?php echo site_url('admin/file/delete/'.$file);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
        </td>
        </tr>
        <?php $no++; } }?>
        </tbody>
      </table>
       Disk Usage :
       <ul>
          <li> File Upload <?php echo round($size/1000,2)." MB";  ?></li> 
        <?php 
        $size2 =0;
        $no = 1;
        $folder=FCPATH.'/assets/upload/images/informasi'; //folder tempat gambar disimpan  
        $handle = opendir($folder);  
        while(false !== ($file = readdir($handle))){  
        if($file != '.' && $file != '..'){ 
          $filesize = filesize(FCPATH.'/assets/upload/images/informasi/'.$file); // bytes
          $filesize = round($filesize / 1024, 1);
          $size2 = $size2+$filesize;
           } }
          ?>
          <li> Gambar Informasi <?php echo round($size2/1000,2)." MB";  ?></li> 
          <li> Sistem Web, Vendor dan Plugin Web 30 MB </li> 
          <li> Total Penggunaan <?php echo 30+round($size/1000,2)+round($size2/1000,2)." MB";  ?></li>
          <li> Sisa Ruang <?php echo 9700-30-round($size/1000,2)-round($size2/1000,2)." MB";  ?> Dari 9700 MB</li> 
       </ul>

    </div>

    <!-- /.box-body -->
  </div>

</div>


  <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="col-md-11">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" align="center">Upload File
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="<?php echo site_url('admin/file/simpan') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-md-3 control-label">File Upload</label>
                <div class="col-md-7">
                  <input type="hidden" class="form-control" name="id" required>
                  <input type="file" class="form-control" name="fileForUpload" required>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-success pull-right">Simpan</button>
              <br><br>
            </div>
                <!-- /.box-footer -->
          </form>
        </div>
      </div>
      </div>
    </div>
  </div>