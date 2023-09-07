  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Sarana & Prasarana</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-3" align="left">
  <div class="box-header">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalTambah"><i class="fa fa-plus"></i> Upload Foto</button>
  </div>
</div>
<div class="col-xs-9" align="right">
</div>
<div class="col-xs-12">
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-picture-o"></i> Sarana & Prasarana</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th width="3%">No</th>
          <th>Judul</th>
          <th>Foto</th>
          <th width="10%" style="text-align: center;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($data2 as $user) {?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $user['judul']; ?></td>
        <td><img src="<?php echo base_url('assets/upload/sarana/'.$user['nama']); ?>" class="margin" style="width: 200px; height: 200px;"></td>
        <td align="center">
        <a href="<?php echo base_url('assets/upload/sarana/'.$user['nama']); ?>" class="btn btn-info btn-md" target="_blank"><i class="fa fa-download"></i></a>
        <a href="<?php echo site_url('admin/sarana/delete/'.$user['nama']);?>" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></a>
        </td>
        </tr>
        <?php $no++; } ?>
        </tbody>
      </table>

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
           <form class="form-horizontal" action="<?php echo site_url('admin/sarana/simpan') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-md-3 control-label">Judul Foto</label>
                <div class="col-md-7">
                  <input type="text" class="form-control" name="judul" required>
                </div>
            </div>
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