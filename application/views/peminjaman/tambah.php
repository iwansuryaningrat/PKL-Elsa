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
	<div class="box-header">
		<h3>Input Peminjaman</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
        <div class="box box-success box-solid collapse-box">
          <div class="box-header with-border">
            <p class="box-title"><i class="fa fa-book"></i> Rincian Buku</p>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-striped">
            	<tbody>
	            	<tr>
	            		<th>Kode Buku</th>
	            		<th>Judul Buku</th>
	            		<th>Pengarang</th>
	            		<th>Tahun Terbit</th>
	            		<th>Jumlah Buku</th>
	            		<th>Opsi</th>
	            	</tr>
	            	<?php
	            	$ro = $bukunew->row_array();
	            	 foreach ($bukunew->result() as $a ) { ?>
	            		<tr>
	            			<td><?php echo $a->kode_b; ?></td>
	            			<td><?php echo $a->judul_b; ?></td>
	            			<td><?php echo $a->pengarang; ?></td>
	            			<td><?php echo $a->tahun_terbit; ?></td>
	            			<td ><?php echo $a->jumlah_b; ?></td>
	            			<td style="width: 5%"><a href="<?php echo base_url('cpinjam/tambahpinjamnew'); ?>" class="btn btn-danger btn-small btn-flat"><i class="fa fa-times"></i> Buku Salah</a></td>
	            		</tr>
	            	<?php } ?>
            	</tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
		</div>
		<form method="post" action="<?php echo base_url('cpinjam/simpanpinjam'); ?>">
			<input type="hidden" name="buku" value="<?php echo $ro['judul_b']; ?>">
			<div class="form-group">
			    <label>Kelas Peminjam</label>
			    <select class="form-control" name="kelas" id="kelas" required="">
			    	<option selected="" disabled="">--Pilih Kelas--</option>
			    	<?php foreach ($kelas->result() as $b) { ?>
			    		<option value="<?php echo $b->id_k; ?>"><?php echo $b->nama_k; ?></option>
			    	<?php } ?>
			    </select>
			</div>
			<div class="form-group">
			    <label>Nama Peminjam</label>
			    <select class="form-control select2" id="nama" name="nama" required=""></select>
			</div>
			<div class="form-group">
			    <label>Jumlah Pinjam</label>
			    <select class="form-control" id="jumlah" name="jumlah" required="">
			    <option value="salah" selected="">~~MAK <?php echo $ro['jumlah_b']; ?>~~</option>
			    <?php for ($j=1; $j <=$ro['jumlah_b']; $j++) { ?>
			    	<option value="<?php echo $j; ?>"><?php echo $j; ?></option>
			    <?php } ?>
			    </select>
			</div>
			<div class="form-group">
			    <label>Lama Pinjam</label>
			    <select class="form-control select2" name="lama" required="">
			    	<option selected="" disabled="">--Pilih--</option>
			    	<?php for ($i=1; $i <=30; $i++) { ?>
			    		<option value="<?php echo $i; ?>"><?php echo $i; ?> Hari</option>
			    	<?php } ?>
			    </select>
			</div>
			<input type="hidden" name="status" value="P">
			<button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
		</form>
	</div>
</div>
<script>
	$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
  // $('#buku').change(function (){
  // 	var id = $(this).val();
  // 	$.ajax({
  // 		url : "<?php echo base_url(); ?>index.php/cpinjam/ajaxbuku",
  // 		method : "POST",
  // 		data : {id : id},
  // 		async : false,
  // 		dataType : json,
  // 		success : function(data){
  // 			var html = '';
  // 			var i;
  // 			for (i = 0; i < data.length; i++) {
  // 				html += '<option>'+data[i].jumlah_b+'</option>';
  // 			}
  // 			$('#jumlah').html(html);
  // 		}
  // 	});
  // });
</script>
<script>
	$(document).ready(function(){
		$('#buku').change(function(){
			var id=$(this).val();
			$.ajax({
				url : "<?php echo base_url();?>index.php/cpinjam/ajaxbuku",
				method : "POST",
				data : {id: id},
				async : false,
		    dataType : 'json',
				success: function(data){
					var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<option selected="" disabled="">Max '+data[i].jumlah_b+'</option>';
		            	for (var a = 1; a <=data[i].jumlah_b; a++) {
		                html += '<option value="'+a+'">'+a+'</option>';
		            	}
		            }
		            $('#jumlah').html(html);
					
				}
			});
		});
		$('#kelas').change(function(){
			var id=$(this).val();
			$.ajax({
				url : "<?php echo base_url();?>index.php/cpinjam/ajaxkelas",
				method : "POST",
				data : {id: id},
				async : false,
		    dataType : 'json',
				success: function(data){
					var html = '';
		            var o;
		            for(o=0; o<data.length; o++){
		                html += '<option value="'+data[o].nama_a+'">'+data[o].nama_a+'</option>';
		            }
		            $('#nama').html(html);
					
				}
			});
		});
	});
</script>
</script>