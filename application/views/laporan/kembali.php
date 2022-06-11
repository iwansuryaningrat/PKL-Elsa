    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#rekap" data-toggle="tab">Rekap Data Pengembalian</a></li>
      </ul>
      <div class="tab-content">
        <!-- Font Awesome Icons -->
        <div class="tab-pane active" id="detail">
          <div class="box">
            <div class="box-header">
              Rekap berdasarkan tanggal mulai dan tanggal akhir
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" action="<?php echo base_url('claporan/kembalianH'); ?>" target="_blank">
                <div class="col-md-8 col-xs-12">
                  <div class="input-daterange input-group">
                    <input type="date" class="form-control" name="mulai" value="<?php echo date('Y-m-d'); ?>" />
                    <span class="input-group-addon bg-info b-0 text-white">Sampai</span>
                    <input type="date" class="form-control" name="akhir" value="<?php echo date('Y-m-d'); ?>" />
                  </div>
                </div>
                <div class="col-md-4 col-xs-12">
                  <button class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Print PDF</button>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box">
            <div class="box-header">
              Rekap berdasarkan Bulan
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" class="form-horizontal" action="<?php echo base_url('claporan/kembalianB') ?>" target="_blank">
                <div class="col-md-5 col-xs-12">
                  <div class="input-group">
                    <span class="input-group-addon bg-info b-0 text-white">Bulan</span>
                    <select name="bulan" class="form-control">
                      <?php for ($rin = 1; $rin <= 12; $rin++) { ?>
                        <option value="<?php echo $rin; ?>"><?php echo bulan($rin); ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 col-xs-12">
                  <div class="input-group">
                    <span class="input-group-addon bg-info b-0 text-white">Tahun</span>
                    <input type="text" class="form-control" required="" name="tahun" onkeypress="return hanyaangka(event)" placeholder="<?php echo date('Y'); ?>" />
                  </div>
                </div>
                <div class="col-md-3 col-xs-12">
                  <div class="form-group">
                    <button class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Print PDF</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </div>