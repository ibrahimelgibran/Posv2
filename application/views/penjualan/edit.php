    <div class="right_col" role="main">
    	<div class="">
    		<div class="page-title">
    			<div class="title_left">
    				<h3><?php echo $title ?></h3>
    			</div>
    		</div>
    		<div class="clearfix"></div>
    		<?php echo $this->session->flashdata('message'); ?>
    		<div class="row">
    			<div class="col-md-12 col-sm-12 col-xs-12">
    				<div class="x_panel">
    					<div class="x_title">
    						<div class="clearfix"></div>
    					</div>
    					<div class="x_content">
    						<div class="row">
    							<div class="col-md-12 col-sm-12 col-xs-12">
    								<h2 style="text-align: right"> Invoice <b id="invoice"></b></h2>
    							</div>
    						</div>
    						<div class="row">
    							<div class="col-md-9 col-sm-12 col-xs-12">
    								<h1>Total (Rp)</h1>
    							</div>
    							<div class="col-md-3 col-sm-12 col-xs-12">
    								<h1 style="text-align: right" id="subtot"> 0</h1>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    		<form class="form-horizontal" method="post" action="<?php echo base_url('penjualan/simpanpenjualan') ?>">
    			<div class="row">
    				<div class="col-md-4 col-sm-12 col-xs-12">
    					<div class="x_panel">
    						<div class="x_title">
    							<div class="clearfix"></div>
    						</div>
    						<div class="x_content">
    							<div class="form-group">
    								<input type="hidden" class="form-control" name="idjual" id="idjual">
    								<label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal</label>
    								<div class="col-md-9 col-sm-9 col-xs-12">
    									<input type="text" class="form-control" name="tanggal" id="tanggal" value="<?php echo date('d/m/Y') ?>" readonly>
    								</div>
    							</div>
    							<div class="form-group">
    								<input type="hidden" class="form-control" name="idoperator" id="idoperator" readonly value="<?php echo $user['ID_USER'] ?>">
    								<label class="control-label col-md-3 col-sm-3 col-xs-12">Operator</label>
    								<div class="col-md-9 col-sm-9 col-xs-12">
    									<input type="text" class="form-control" name="operator" id="operator" readonly value="<?php echo $user['NAMA_LENGKAP'] ?>">
    								</div>
    							</div>
    							<div class="form-group">
    								<label class="control-label col-md-3 col-sm-3 col-xs-12">Customer</label>
    								<div class="col-md-9 col-sm-9 col-xs-12">
    									<select id="customer" name="customer" class="form-control" required>
    										<?php foreach ($customer as $c) : ?>
    											<option value="<?php echo $c['ID_CS'] ?>"><?php echo $c['NAMA_CS'] ?></option>
    										<?php endforeach; ?>
    									</select>
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    				<div class="col-md-4 col-sm-12 col-xs-12">
    					<div class="x_panel">
    						<div class="x_title">
    							<div class="clearfix"></div>
    						</div>
    						<div class="x_content">
    							<div class="form-group">
    								<input type="hidden" class="form-control" name="idbarangitem" id="idbarangitem" readonly>
    								<label class="control-label col-md-3 col-sm-3 col-xs-12">Barcode</label>
    								<div class="input-group">
    									<input type="text" class="form-control" name="barcode" id="barcode" autofocus autocomplete="off">
    									<span class="input-group-btn">
    										<button type="button" onclick="tampildata()" class="btn btn-primary"><i class="fa fa-search"></i></button>
    									</span>
    								</div>
    							</div>
    							<div class="form-group">
    								<label class="control-label col-md-3 col-sm-3 col-xs-12">Qty</label>
    								<div class="col-md-9 col-sm-9 col-xs-12">
    									<input type="text" class="form-control" name="qty" id="qty" autocomplete="off">
    								</div>
    							</div>
    							<div style="text-align: right">
    								<button type="button" onclick="tambahitembarang()" class="btn btn-success btn-sm"><i class="fa fa-shopping-cart m-right-xs"></i> Tambah</button>
    							</div>
    						</div>
    					</div>
    				</div>
    				<div class="col-md-4 col-sm-12 col-xs-12">
    					<div class="x_panel">
    						<div class="x_title">
    							<div class="clearfix"></div>
    						</div>
    						<div class="x_content">
    							<div class="form-group">
    								<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
    								<div class="col-md-9 col-sm-9 col-xs-12">
    									<input type="text" class="form-control" name="namaitem" id="namaitem" readonly>
    								</div>
    							</div>
    							<div class="form-group">
    								<label class="control-label col-md-3 col-sm-3 col-xs-12">Harga</label>
    								<div class="col-md-9 col-sm-9 col-xs-12">
    									<input type="text" class="form-control" name="harga" id="harga" readonly>
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
    							<div class="clearfix"></div>
    						</div>
    						<div class="x_content">
    							<table id="editDetil" width="100%" class="table table-striped table-bordered">
    								<thead>
    									<tr>
    										<th>Barcode</th>
    										<th>Nama Item</th>
    										<th>Harga</th>
    										<th>Qty</th>
    										<th>Disc / Item</th>
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
    				<div class="col-md-12 col-sm-12 col-xs-12">
    					<div class="x_panel">
    						<div class="x_title">
    							<!-- <div class="clearfix"></div> -->
    						</div>
    						<div class="x_content">
    							<!-- <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Total</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
							  <input type="text" class="form-control" name="subtotal" id="subtotal" readonly>
							</div>
						  </div>
						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Diskon (Rp)</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
							  <input type="text" class="form-control" name="diskon1" id="diskon1">
							</div>
						  </div>
						   <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Grand Total</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
							  <input type="text" class="form-control" name="grandtotal" id="grandtotal" readonly>
							</div>
						  </div> -->
    							<div style="text-align: right" class="pt-3">
    								<button type="reset" class="btn btn-danger"><i class="fa fa-recycle m-right-xs"></i> Cancel</button>
    								<button type="button" onclick="editPenjualan()" class="btn btn-primary"><i class="fa fa-paper-plane-o m-right-xs"></i> Payment</button>
    							</div>
    						</div>
    					</div>
    				</div>
    				<!-- <div class="col-md-6 col-sm-12 col-xs-12">
					<div class="x_panel">
					  <div class="x_title">
						<div class="clearfix"></div>
					  </div>
					  <div class="x_content">
						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Bayar</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
							  <input type="text" class="form-control" name="bayar" id="bayar">
							</div>
						  </div>
						  <div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Kembali</label>
							<div class="col-md-9 col-sm-9 col-xs-12">
							  <input type="text" class="form-control" name="kembali" id="kembali" readonly>
							</div>
						  </div>
						  <div style="text-align: right">
							<button type="reset" class="btn btn-danger"><i class="fa fa-recycle m-right-xs"></i> Batal</button>
							<button type="button" onclick="simpanPenjualan()" class="btn btn-primary"><i class="fa fa-paper-plane-o m-right-xs"></i> Simpan</button>
						  </div>
						</div>
					</div>
				  </div> -->
    			</div>
    		</form>
    	</div>
    </div>
    <?php include 'showdata.php' ?>
    <?php include 'editdetil.php' ?>
    <?php include 'hapusdetil.php' ?>
    <?php include 'editcheckout.php' ?>