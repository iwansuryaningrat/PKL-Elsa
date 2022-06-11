<?php if ($this->session->flashdata('psn')=="berhasiled") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'blue',
		title:'Berhasil Diedit',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<?php if ($this->session->flashdata('psn')=="kelassim") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'blue',
		title:'Berhasil Disimpan',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<?php if ($this->session->flashdata('psn')=="kelashap") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'blue',
		title:'Berhasil Dihapus',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<div class="box box-success">
	<div class="box-content">
		<div class="box-header">
			<h4>Daftar Kelas</h4>
			<a data-target="#tambah" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
		</div>
		<div class="box-body">
			<div class="table-responsive">
				<table id="data" class="table table-striped table-bordered">
					<thead>
						<th>NO</th>
						<th>Nama Kelas</th>
						<th>Opsi</th>
					</thead>
					<tbody>
					<?php $no=1; foreach ($kelas->result() as $a) { ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $a->nama_k; ?></td>
							<td><a class="btn btn-xs btn-success" data-target="#edit<?php echo $no; ?>" data-toggle="modal" title="Edit"  data-placement="left"><i class="fa fa-pencil" ></i></a>	|	<a class="btn btn-xs btn-danger" data-toggle="modal" title="Hapus" data-target="#hapus<?php echo $no; ?>"  data-placement="right"><i class="fa fa-trash-o"></i></a></td>
						</tr>
						<div id="edit<?php echo $no; ?>" class="modal">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4>Edit Data Kelas <?php echo $a->nama_k; ?></h4>
									</div>
									<div class="modal-body">		
										<form method="post" action="<?php echo base_url('ckelas/edit'); ?>">
											<div class="form-group">
												<input type="hidden" name="id" value="<?php echo $a->id_k; ?>">
											    <label>Nama Kelas</label>
											    <input type="text" class="form-control" placeholder="" name="nama" value="<?php echo $a->nama_k; ?>">
											</div>
									</div>
									<div class="modal-footer">		
												<button class="btn btn-primary pull-right"><i class="fa fa-save"></i> Perbarui</button>
											</form>
												<button class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
									</div>
								</div>
							</div>
						</div>
						<div id="hapus<?php echo $no; ?>" class="modal">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4>Confirmasi Hapus Kelas <?php echo $a->nama_k; ?></h4>
									</div>
									<div class="modal-body">		
										<p>Jika Anda Menghapus Kelas Maka Semua Data Yang Berhubungan Dengan Kelas Ini Akan Ikut Terhapus</p>
									</div>
									<div class="modal-footer">		
										<a class="btn btn-primary" href="<?php echo base_url('ckelas/hapus/').$a->id_k; ?>"><i class="fa fa-check"></i> Hapus</a>
												<button class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>						
					</tbody>
				</table>
				<div id="tambah" class="modal">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4>Tambah Data Kelas</h4>
									</div>
									<div class="modal-body">		
										<form method="post" action="<?php echo base_url('ckelas/tambahkel'); ?>">
											<div class="form-group">
											    <label>Nama Kelas</label>
											    <input type="text" class="form-control" placeholder="Nama Kelas" name="nama" required="" autofocus="">
											</div>
									</div>
									<div class="modal-footer">		
												<button class="btn btn-primary pulll-right"><i class="fa fa_save"></i> Simpan</button>
										</form>
												<button class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
									</div>
								</div>
							</div>
						</div>
			</div>
		</div>
	</div>
</div>