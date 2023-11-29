<?php cek_user()?>
		 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $title?></h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				     <div class="row">
				    <div class="col-md-9 col-sm-12 col-xs-12">
					  <h1>Saldo</h1>
				    </div>
              <div class="col-md-3 col-sm-12 col-xs-12">
                <h1 style="text-align: right" id="totalkas">Rp. <?php echo number_format($total,'0','.','.').',-'?></h1>
                </div>
              </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <button type="button" class="btn btn-sm btn-primary" onclick="tambahKas()" title="Tambah Kas" id="tambahkas"><i class="fa fa-plus"></i> Tambah Kas</button>
                    <!-- <a href="<?php //echo base_url('report/kas')?>" target="_blank" class="btn btn-sm btn-default" title="Export PDF"><i class="fa fa-download"></i> Export PDF</a> -->
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				          <?php echo $this->session->flashdata('message'); ?>
                    <table id="datakas" width="100%" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Kode</th>
                          <th>Waktu</th>
                          <th>Jenis</th>
                          <th>Nominal (Rp)</th>
                          <th>Keterangan</th>
                          <th>User</th>
						              <th>Opsi</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		<?php include 'edit.php'?>
		<?php include 'inputkas.php'?>
    <script src="<?php echo base_url('assets/Javascript/mod-kas.js')?>"></script>