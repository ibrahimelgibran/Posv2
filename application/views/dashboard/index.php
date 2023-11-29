	<?php cek_user()?>
	<div class="right_col" role="main">
	  <div class="">
		<div class="row top_tiles">
		  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
			  <div class="icon"><i class="fa fa-tags"></i></div>
			  <div class="count"><?php echo $barang?></div>
			  <h3> Barang</h3>
			  <p>Jumlah barang.</p>
			</div>
		  </div>
		  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
			  <div class="icon"><i class="fa fa-truck"></i></div>
			  <div class="count"><?php echo $supplier?></div>
			  <h3> Supplier</h3>
			  <p>Jumlah supllier.</p>
			</div>
		  </div>
		  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
			  <div class="icon"><i class="fa fa-users"></i></div>
			  <div class="count"><?php echo $customer?></div>
			  <h3> Customer</h3>
			  <p>Jumlah customer.</p>
			</div>
		  </div>
		  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
			  <div class="icon"><i class="fa fa-shopping-cart"></i></div>
			  <div class="count"><?php echo $jual['total']?></div>
			  <h3>Penjualan Hari Ini</h3>
			  <p>Jumlah penjualan hari ini.</p>
			</div>
		  </div>
		</div>
		<div class="row top_tiles">
		  <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
			  <div class="icon"><i class="fa fa- fa-sign-in"></i></div>
			  <div class="count">Rp. <?php echo number_format($pemasukan,'0','.','.').',-'?></div>
			  <h3> Kas Masuk Hari Ini</h3>
			  <p>Jumlah kas masuk hari ini.</p>
			</div>
		  </div>
		  <div class="animated flipInY col-lg-6 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
			  <div class="icon"><i class="fa  fa-sign-out"></i></div>
			  <div class="count">Rp. <?php echo number_format($pengeluaran,'0','.','.').',-'?></div>
			  <h3> Kas Keluar Hari Ini</h3>
			  <p>Jumlah kas keluar hari ini.</p>
			</div>
		  </div>
		</div>
		<div class="row">
		   <div class="col-md-4 col-sm-12 col-xs-12">
			<div class="x_panel">
			  <div class="x_title">
			   <h2>Histori Login</h2>
				<div class="clearfix"></div>
			  </div>
			   <div class="x_content">
			   <ul class="list-unstyled top_profiles scroll-view">
				<?php foreach($userlog as $u):?>
				  <li class="media event">
					<a class="pull-left border-green profile_thumb">
					  <i class="fa fa-user green"></i>
					</a>
					<div class="media-body">
					  <a class="title" href="#"><?php echo $u['nama_lengkap']?></a>
					  <p><?php echo $u['tipe']?></p>
					  <p> <small><?php echo $u['waktu']?></small>
					  </p>
					</div>
				  </li>
				  <?php endforeach;?>
				</ul>
			   </div>
			</div>
		  </div>
		  
		  <div class="col-md-8 col-sm-6 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Grafik Pendapatan Bulan Ini</h2>
					<div class="clearfix"></div>
				</div>
					<div class="x_content">
						<canvas id="grafikPendapatan"></canvas>
					</div>
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
					<div class="x_content">
						<canvas id="grafikKategori"></canvas>
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
						<canvas id="grafikKas"></canvas>
					</div>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
				<div class="x_title">
					<h2>Data Barang Hampir Habis</h2>
					<div class="clearfix"></div>
				</div>
					<div class="x_content">
					<table width="100%" class="table table-striped table-bordered datatable">
                      <thead>
                        <tr>
                          <th>Kode Item</th>
                          <th>Barcode</th>
                          <th>Nama Item</th>
						  <th>Satuan</th>
                          <th>Kategori</th>
                          <th>Stok</th>
                        </tr>
					  </thead>
					  <tbody>
                        <?php foreach($stok as $s):?>
                          <tr>
                            <td><?php echo $s['KODE_BARANG']?></td>
                            <td><?php echo $s['BARCODE']?></td>
                            <td><?php echo $s['NAMA_BARANG']?></td>
                            <td><?php echo $s['SATUAN']?></td>
                            <td><?php echo $s['KATEGORI']?></td>
                            <td><span class="label label-danger"><?php echo $s['STOK']?></span></td>
                          </tr>
						<?php endforeach;?>
                      </tbody>
                    </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php include 'Js.php'?>

