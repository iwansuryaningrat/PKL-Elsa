<?php if ($this->session->flashdata('psn')=="batalberhasil") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'blue',
		title:'Pembatalan Berhasil',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<?php if ($this->session->flashdata('psn')=="batalgagal") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'red',
		title:'Pembatalan Sudah Dilakukan',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<div class="box box-info">
	<div class="box-header">
		<h4>Daftar Pengembalian Buku</h4>
	</div>
	<div class="box-body">
		<div class="table-responsive">
			<table id="data" class=" table table-striped table-bordered "> 
				<thead> 
					<th>No</th>
        	<th>Nama Peminjam</th>
        	<th>Kelas</th>
        	<th>Nama Buku</th>
        	<th>Tanggal Pinjam</th>
        	<th>Tanggal Kembali</th>
        	<th width="4%">Jumlah Pinjam</th>
          <th>Telat</th>
          <th>Denda</th>
        	<th>Opsi</th>
				</thead>
				<tbody>
					<?php $no=1; foreach ($kembali->result() as $a) { ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $a->nama_a; ?></td>
							<td><?php echo $a->nama_k; ?></td>
							<td><?php echo $a->judul_b; ?></td>
							<td><?php echo tgl($a->tanggal_pinjam); ?></td>
							<td><?php echo tgl($a->tanggal_kembali); ?></td>
							<td><?php echo $a->jumlah_pinjam; ?></td>
							<td><?php echo $a->telat; ?> Hari</td>
							<td><?php echo rp($a->denda); ?></td>
							<td><a class="btn btn-xs btn-danger" data-target="#batal<?php echo $no; ?>" data-toggle="modal"><i class="fa fa-times"></i> Batal</a></td>
						<div id="batal<?php echo $no; ?>" class="modal">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										Confirmasi Batal Pengembalian
									</div>
									<div class="modal-body">
										<p>Yakin Ingin Membatalkan Pengembalian Dengan Rincian</p>
										<ul>
											<li>Nama : <?php echo $a->nama_a; ?></li>
											<li>Kelas : <?php echo $a->nama_k; ?></li>
											<li>Buku : <?php echo $a->judul_b; ?></li>
										</ul>
										<form method="post" action="<?php echo base_url('ckembali/batalkan'); ?>">
											<input type="hidden" name="id" value="<?php echo $a->Id_pengembalian; ?>">
											<input type="hidden" name="idpinjam" value="<?php echo $a->id_peminjaman; ?>">
											<input type="hidden" name="status" value="P">
											<input type="hidden" name="buku" value="<?php echo $a->judul_b; ?>">
											<input type="hidden" name="jumlah" value="<?php echo $a->jumlah_pinjam; ?>">
									</div>
									<div class="modal-footer">
										<button class="btn btn-primary pull-right"><i class="fa fa-check"></i> Lanjutkan</button>
										</form>
										<button class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
									</div>
								</div>
							</div>
						</div>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>