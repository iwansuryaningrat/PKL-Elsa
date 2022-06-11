 <section class="content-header">
      <h1>
        Dashboard 
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class=" col-md-4">
          <div class="info-box"><a href="">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
          </a>
            <div class="info-box-content">
              <span class="info-box-text">Total Anggota</span>
              <span class="info-box-number"><?php echo $tanggota; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
          <div class=" col-md-4">
          <div class="info-box"><a href="">
            <span class="info-box-icon bg-green"><i class="fa fa-book"></i></span>
          </a>
            <div class="info-box-content">
              <span class="info-box-text">Total Buku</span>
              <span class="info-box-number"><?php echo $tbuku; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
          <div class=" col-md-4">
          <div class="info-box"><a href="#">
            <span class="info-box-icon bg-blue"><i class="fa fa-university"></i></span>
          </a>
            <div class="info-box-content">
              <span class="info-box-text">Total Kelas</span>
              <span class="info-box-number"><?php echo $tkelas; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
      <div class="row">
         <div class="col-md-4">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> Top 5 Buku Favorit</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Buku</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php $no=1; foreach ($buku->result() as $a) { ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $a->judul_b ?></td>
                  </tr>
                    <?php } ?>
                 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
            </div>
            <!-- /.box-footer -->
          </div>
        </div>
        <div class="col-md-8">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> Top 5 Peminjam</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Jumlah Pinjam</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php $no=1; foreach ($rank->result() as $a) { ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $a->nama_a ?></td>
                    <td><?php echo "$a->total <small>x</small>"  ?></td>
                  </tr>
                    <?php } ?>
                 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
            </div>
            <!-- /.box-footer -->
          </div>
        </div>
     </div>
    </section>