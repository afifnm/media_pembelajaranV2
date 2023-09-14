  <div id="myalert">
  	<?php echo $this->session->flashdata('alert', true)?>
  </div>
  <div class="col-xs-12" align="left">
  	<div class="box-header">
  		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalTambah"><i
  				class="fa fa-plus"></i> Tambah Dosen</button>
  	</div>
  </div>
  <div class="col-md-12">
  	<div class="box box-solid">
  		<!-- /.box-header -->
  		<div class="box-body">
  			<table id="example2" class="table table-bordered table-hover">
  				<thead>
  					<tr>
  						<th>No</th>
  						<th>Nama Dosen </th>
  						<th>Email </th>
  						<th>Whatsapp</th>
  						<th style="text-align: center;">Aksi</th>
  					</tr>
  				</thead>
  				<tbody>
  					<?php  $no = 1; foreach ($data3 as $user) {?>
  					<tr>
  						<td><?php echo $no; ?></td>
  						<td><?php echo $user['nama']; ?></td>
  						<td><?php echo $user['email']; ?></td>
  						<td><?php echo $user['wa']; ?></td>
  						<td align="center">
  							<button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
  								data-target="#edit<?=$no?>">
  								<i class="fa fa-edit"></i></button>
  							<a onClick="return confirm('Apakah anda yakin menghapus data ini?')"
  								href="<?php echo site_url('admin/dosen/delete/'.$user['id_dosen']);?>"
  								class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
  						</td>
  					</tr>
  					<?php $no++; } ?>
  				</tbody>
  			</table>
  		</div>
  		<!-- /.box-body -->
  	</div>
  </div>
  <?php $no = 1; foreach ($data3 as $user) {?>
  <div class="modal fade" id="edit<?=$no?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog modal-md" role="document">
  		<div class="col-md-11">
  			<div class="modal-content">
  				<div class="modal-header">
  					<h4 class="modal-title" id="myModalLabel">Perbarui Data Dosen
  						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
  								aria-hidden="true">&times;</span></button>
  					</h4>
  				</div>
  				<div class="modal-body">
  					<form class="form-horizontal" action="<?php echo site_url('admin/dosen/update') ?>" method="POST">
  						<div class="box-body">
  							<div class="form-group">
  								<label class="col-sm-3 control-label">Nama Dosen</label>
  								<div class="col-sm-7">
  									<input type="hidden" class="form-control" name="id"
  										value="<?php echo $user['id_dosen']; ?>">
  									<input type="text" class="form-control" name="nama"
  										value="<?php echo $user['nama']; ?>">
  								</div>
  							</div>
  							<div class="form-group">
  								<label class="col-sm-3 control-label">Email</label>
  								<div class="col-sm-7">
  									<input type="email" class="form-control" name="email"
  										value="<?php echo $user['email']; ?>">
  								</div>
  							</div>
  							<div class="form-group">
  								<label class="col-sm-3 control-label">Nomor Whatsapp</label>
  								<div class="col-sm-7">
  									<input type="text" class="form-control" name="wa"
  										value="<?php echo $user['wa']; ?>">
  								</div>
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
  <?php $no++; } ?>
  <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog modal-md" role="document">
  		<div class="col-md-11">
  			<div class="modal-content">
  				<div class="modal-header">
  					<h4 class="modal-title" id="myModalLabel">Tambah Data Dosen
  						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
  								aria-hidden="true">&times;</span></button>
  					</h4>
  				</div>
  				<div class="modal-body">
  					<form class="form-horizontal" action="<?php echo site_url('admin/dosen/simpan') ?>" method="POST"
  						enctype="multipart/form-data">
  						<div class="box-body">
  							<div class="form-group">
  								<label class="col-sm-3 control-label">Nama Dosen</label>
  								<div class="col-sm-7">
  									<input type="text" class="form-control" name="nama" placeholder="Nama Dosen"
  										required>
  								</div>
  							</div>
  							<div class="form-group">
  								<label class="col-sm-3 control-label">Email</label>
  								<div class="col-sm-7">
  									<input type="email" class="form-control" name="email" placeholder="Email"
  										required>
  								</div>
  							</div>
  							<div class="form-group">
  								<label class="col-sm-3 control-label">Nomor Whatsapp</label>
  								<div class="col-sm-7">
  									<input type="text" class="form-control" name="wa"
  										placeholder="Nomor Whatsapp tulis dengan +62800" required>
  								</div>
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
