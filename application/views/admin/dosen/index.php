  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin/home');?>"><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Data Dosen PPKn</li>
  </ol>
<div id="myalert">
  <?php echo $this->session->flashdata('alert', true)?>
</div>
<div class="col-xs-12" align="left">
  <div class="box-header">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalTambah"><i class="fa fa-plus"></i> Tambah Dosen</button>
  </div>
</div>

<div class="col-xs-6">
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-user"></i> Data Dosen PPKn</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama Dosen </th>
          <th style="text-align: center;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($data3 as $user) {?>
        <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $user['nama']; ?></td>
        <td align="center">
          <a href="<?php echo site_url('admin/dosen/edit/'.$user['id_dosen']);?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <a href="<?php echo site_url('admin/dosen/delete/'.$user['id_dosen']);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
          <h4 class="modal-title" id="myModalLabel" align="center">Tambah Data Dosen
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" action="<?php echo site_url('admin/dosen/simpan') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-sm-3 control-label">Nama Dosen</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="nama" placeholder="Nama Dosen" required>
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