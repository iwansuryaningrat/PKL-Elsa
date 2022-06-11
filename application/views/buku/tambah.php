<div class="box box-success">
	<div class="box-header">
		<h4>Input Data Buku</h4>
		<a class="btn btn-primary" href="<?php echo base_url('cbuku/buktampil'); ?>"><i class="fa fa-reply"></i> Kembali</a>
	</div>
	<div class="box-body">
		<form method="post" role="form" action="<?php echo base_url('cbuku/tambahsim'); ?>">
		<div class="form-group">
	    <label>Kode Buku</label>
	    <input type="text" class="form-control" placeholder="Kode Buku" name="kode" autofocus="" required="" onkeyup="this.value = this.value.toUpperCase()">
	  </div>
	  <div class="form-group">
	    <label>Judul Buku</label>
	    <input type="text" class="form-control" placeholder="Judul Buku" name="judul" autofocus="" required="">
	  </div>
	  <div class="form-group">
	      <label>Tahun Terbit</label>
	      <input type="date" class="form-control" placeholder="Tahun Terbit" name="tahun">
	  </div>
	  <div class="form-group">
        <label>Pengarang</label>
        <input type="text" class="form-control" placeholder="Pengarang" name="pengarang">
    </div>
    <div class="form-group">
          <label>Jumlah Buku</label>
          <input type="number" class="form-control" placeholder="Jumlah Buku" name="jumbuk" required="">
    </div>  
</div>
	<div class="box-footer">
	  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
	</div>
</form>
</div>