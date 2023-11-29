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
                      <h2>Grafik Pendapatan Bulan Ini</h2>
                      <div class="clearfix"></div>
                    </div>
                      <div class="x_content">
                        <canvas id="grafikPendapatan" style="height:200px"></canvas>
                      </div>
                  </div>
              </div>
                
          </div>

          <div class="row">

            <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                      <h2>Grafik Kategori Barang</h2>
                      <div class="clearfix"></div>
                    </div>
                      <div class="x_content" >
                        <canvas id="grafikKategori" style="height: 302px"></canvas>
                      </div>
                  </div>
              </div>

              <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Grafik Kas</h2>
                      <div class="clearfix"></div>
                    </div>
                      <div class="x_content">
                        <canvas id="chartKas"></canvas>
                      </div>
                  </div>
                </div>

          </div>
          <!-- <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Rata - Rata Transaksi Pelanggan</h2>
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content" style="height: 390px">
                      <canvas id="transaksiPelanggan"></canvas>
                    </div>
                 </div>
                </div>
              </div>

            </div> -->

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>10 Barang Terlaris Bulan Ini</h2>
                      <div class="clearfix"></div>
                    </div>
                      <div class="x_content" style="height: 390px">
                        <canvas id="grafikTerlaris"></canvas>
                      </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
      </div>
      <?php include 'Js.php'?>