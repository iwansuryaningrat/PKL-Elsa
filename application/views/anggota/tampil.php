<?php if ($this->session->flashdata('psn')=="anggotaedit") { ?>
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
<?php if ($this->session->flashdata('psn')=="angggotasim") { ?>
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
<?php if ($this->session->flashdata('psn')=="anggotahap") { ?>
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
<div class="box box-primary">
	<div class="box-header">
		<h4>Daftar Anggota Perpustakaan</h4>
		<a class="btn btn-primary" href="<?php echo base_url('canggota/tambaha'); ?>"><i class="fa fa-plus"></i> Tambah</a>
	</div>
	<div class="box-body">
		<div class="table-responsive">
			<table id="data" class="table table-striped table-hover table-bordered">
				<thead>
					<th>No</th>
					<th>Nama</th>
					<th>Kelas</th>
					<th>Alamat</th>
					<th>Email</th>
					<th>Opsi</th>
				</thead>
				<tbody>
				<?php $no=1; foreach ($anggota->result() as $a) { ?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $a->nama_a; ?></td>
						<td><?php echo $a->nama_k; ?></td>
						<td><?php echo $a->alamat; ?></td>
						<td><?php echo $a->email; ?></td>
						<td><a class="btn btn-xs btn-success" href="<?php echo base_url('canggota/anggotaedit/').$a->id_a; ?>"><i class="fa fa-pencil" title="Edit"></i></a>|<a class="btn btn-xs btn-danger" data-target="#hapus<?php echo $no; ?>" data-toggle="modal"><i class="fa fa-trash-o"></i></a></td>
					</tr>
					<div id="hapus<?php echo $no; ?>" class="modal">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4>Confirmasi Hapus Anggota</h4>
									</div>
									<div class="modal-body">		
										<p>Jika anda menghapus anggota, maka transaksi yg dilakukan oleh <b><?php echo $a->nama_a; ?></b> akan ikut terhapus</p>
									</div>
									<div class="modal-footer">		
										<a class="btn btn-primary" href="<?php echo base_url('canggota/anggotahap/').$a->id_a; ?>"><i class="fa fa-check"></i> Hapus</a>
												<button class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
									</div>
								</div>
							</div>
						</div>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>