<?php if ($this->session->flashdata('psn')=="pilihkode") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'red',
		title:'~~Silahkan PIlih Kode Buku~~',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<?php if ($this->session->flashdata('psn')=="tambahberhasil") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'blue',
		title:'Berhasil Meminjam Buku',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<?php if ($this->session->flashdata('psn')=="tambahgagal") { ?>
<script>
	iziToast.show({
		timeout:6000,
		color:'red',
		title:'Data Peminjam Sudah Ada',
		position: 'topRight',
		pauseOnHover: true,
		transitionIn: true
	})
</script>
<?php } ?>
<div class="box box-success">
	<div class="box-header"><h4>Cari Buku</h4></div>
	<div class="box-body">
		<form method="post" action="<?php echo base_url('cpinjam/tambahpinjam'); ?>">
			<div class="input-group col-xs-5">
				<select class="form-control select2" name="kd_b" required="">
		    	<option selected="" value="salah">--Pilih Kode Buku--</option>
		    	<?php foreach ($buku->result() as $a) { ?>
		    		<option value="<?php echo $a->judul_b; ?>"><?php echo $a->kode_b ?></option>
		    	<?php } ?>
		    </select>
			<span class="input-group-btn">
				<button class="btn btn-primary"><i class="fa fa-search"></i>Cari Buku</button>
			</span>
			</div>
		</form>
	</div>
</div>
