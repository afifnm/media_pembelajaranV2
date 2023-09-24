  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Data File</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
  <?php $this->session->set_flashdata('alert', ''); ?>
</div>
<div class="col-xs-3" align="left">
  <div class="box-header">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalTambah"><i class="fa fa-plus"></i> Tambah Link Terkait</button>
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
          <th>Judul</th>
          <th>Link</th>
          <th>Tanggal Dibuat</th>
          <th width="13%" style="text-align: center;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($data2 as $user) {?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $user['judul']; ?></td>
        <td><?php echo $user['link']; ?></td>
        <td><?php echo $user['created_at']; ?></td>
        <td align="center">
          <a href="<?php echo site_url('admin/link/edit/'.$user['id']);?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <a onClick="return confirm('Apakah anda yakin menghapus data ini?')"
           href="<?php echo site_url('admin/link/delete/'.$user['id']);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
    <div class="modal-dialog modal-md" role="document">
      <div class="col-md-11">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" align="center">Tambah Link Terkait
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="<?php echo site_url('admin/link/simpan') ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label class="col-sm-2 control-label">Judul</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="judul" placeholder="Label Link" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Link</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="link" placeholder="sertakan http://" required>
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