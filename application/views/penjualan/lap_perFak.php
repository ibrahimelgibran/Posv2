    <?php cek_user() ?>
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3><?php echo $title ?></h3>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <!-- Laporan Penjualan Per-Faktur-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form class="form-horizontal" method="post" action="<?php echo base_url('report/penjualan_perFak') ?>">
                  <div class="form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <h3>Laporan Penjualan Per-Faktur</h3>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label for="">Tanggal Awal :</label>
                      <input type="date" id="awal" class="form-control datepicker" name="awal" required />
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label for="">Tanggal Akhir :</label>
                      <input type="date" id="akhir" class="form-control datepicker" name="akhir" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                      <button type="submit" class="btn btn-sm btn-primary btn-block"><i class="fa fa-file-pdf-o"></i> Export PDF</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- All Detil Laporan Penjualan Faktur $ barang-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <form class="form-horizontal" method="post" action="<?php echo base_url('report/penjualan_detilFak') ?>">
                  <div class="form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <h3>Detil Laporan Penjualan Barang & Faktur</h3>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label for="">Tanggal Awal :</label>
                      <input type="date" id="awal" class="form-control datepicker" name="awal" required />
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <label for="">Tanggal Akhir :</label>
                      <input type="date" id="akhir" class="form-control datepicker" name="akhir" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12 col-sm-6 col-xs-12">
                      <button type="submit" class="btn btn-sm btn-primary btn-block"><i class="fa fa-file-pdf-o"></i> Export PDF</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>