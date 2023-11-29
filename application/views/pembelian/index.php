<?php cek_user() ?>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3><?php echo $title ?></h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<?php echo $this->session->flashdata('message') ?>
		<form class="form-horizontal" method="post" action="<?php echo base_url('pembelian/tambahbeli') ?>">
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Faktur</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="date" class="form-control" name="tanggalf" id="tanggalf">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Faktur</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="text" class="form-control" name="nofaktur" id="nofaktur" autocomplete="off">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="form-group">
								<input type="hidden" class="form-control" name="idsup" id="idsup">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Supplier</label>
								<div class="input-group">
									<input type="text" class="form-control" name="namasupplier" id="namasupplier" autocomplete="off">
									<span class="input-group-btn">
										<button type="button" onclick="tampilsupplier()" class="btn btn-primary"><i class="fa fa-search"></i></button>
									</span>
								</div>
							</div>
							<div class="form-group">
								<input type="hidden" class="form-control" name="idoperator" id="idoperator" readonly value="<?php echo $user['ID_USER'] ?>">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Operator</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="text" class="form-control" name="operator" id="operator" readonly value="<?php echo $user['NAMA_LENGKAP'] ?>">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="form-group">
								<input type="hidden" class="form-control" name="idbarangitembeli" id="idbarangitembeli" readonly>
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Barcode</label>
								<div class="input-group">
									<input type="text" class="form-control" name="barcodebeli" id="barcodebeli" autofocus onkeypress="scanBarcode()" autocomplete="off">
									<span class="input-group-btn">
										<button type="button" onclick="tampildata()" class="btn btn-primary"><i class="fa fa-search"></i></button>
									</span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="text" class="form-control" name="namaitembeli" id="namaitembeli" autocomplete="off" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Qty</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="text" class="form-control" name="qtybeli" id="qtybeli" autocomplete="off">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Beli</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="text" class="form-control" name="hargabeli" id="hargabeli" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Jual</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="text" class="form-control" name="hargaitembeli" id="hargaitembeli" autocomplete="off">
								</div>
							</div>
							<div style="text-align: right">
								<button type="button" onclick="addBeliByClick()" class="btn btn-success btn-sm"><i class="fa fa-shopping-cart m-right-xs"></i> Tambah</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<table id="detilitembeli" width="100%" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Barcode</th>
										<th>Nama Item</th>
										<th>Harga Beli</th>
										<th>Harga Jual</th>
										<th>Qty</th>
										<th>Total</th>
										<th>Opsi</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5 col-sm-5 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="form-group">
								<input type="hidden" class="form-control" name="idoperator" id="idoperator">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Diskon (Rp)</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<input type="text" class="form-control" name="diskonbeli" id="diskonbeli" autocomplete="off">
								</div>
							</div>
							<div style="margin-left: 20px">
								<span><i>Note: Diskon disini merupakan diskon keseluruhan dari pembelian. Jika diskon di nota adalah diskon per satuan, maka harap dijumlahkan secara keseluruhan.</i></span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-7 col-sm-7 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="row">
								<div class="col-md-9 col-sm-12 col-xs-12">
									<h1>Total (Rp)</h1>
								</div>
								<div class="col-md-3 col-sm-12 col-xs-12">
									<input type="hidden" class="form-control" name="totalbeli" id="totalbeli">
									<h1 style="text-align: right" id="grandtotalbeli"> 0</h1>
								</div>
							</div>
							<div class="row">
								<div style="text-align: right">
									<button type="reset" class="btn btn-danger"><i class="fa fa-recycle m-right-xs"></i> Batal</button>
									<button type="button" onclick="simpanBeli()" class="btn btn-primary"><i class="fa fa-paper-plane-o m-right-xs"></i> Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- <div class="row">
			   
            </div> -->
		</form>
	</div>
</div>
<?php include 'showbarang.php' ?>
<?php include 'showsupplier.php' ?>
<?php include 'editdetil.php' ?>
<?php include 'checkout.php' ?>
<script src="<?php echo base_url('assets/Javascript/mod-beli.js') ?>"></script>