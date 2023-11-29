 <div class="modal fade" id="inputDataBarang">
	<div class="modal-dialog">
	  <div class="modal-content">

		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		  </button>
		  <h4 class="modal-title" id="inputDataBarang">Entry Data Barang</h4>
		</div>
		<div class="modal-body">
		 <form class="form-horizontal" method="post" action="<?php echo base_url('barang/inputbarang')?>">
		 	<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">BarcodeID</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" class="form-control" id="barcodeitem" name="barcode"autocomplete="off">
				</div>
			  </div>
		 	 <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Barang</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" class="form-control" id="namabarang" name="namabarang" autocomplete="off">
				</div>
			  </div>
		 	 <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Beli</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" class="form-control" id="beli" name="beli" autocomplete="off">
				</div>
			  </div>
		 	 <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Jual</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" class="form-control" id="jual" name="jual" autocomplete="off">
				</div>
			  </div>
			   <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				   <select id="kategori" name="kategori" class="form-control" required>
				   <option value="">- Pilih -</option>
				   <?php foreach($kategori as $k):?>
				    <option value="<?php echo $k['ID_KATEGORI']?>"><?php echo $k['KATEGORI']?></option>
				   <?php endforeach;?>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Satuan</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				   <select id="satuan" name="satuan" class="form-control" required>
				   <option value="">- Pilih -</option>
				   <?php foreach($satuan as $s):?>
				    <option value="<?php echo $s['ID_SATUAN']?>"><?php echo $s['SATUAN']?></option>
				   <?php endforeach;?>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Supplier</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				   <select id="supplier" name="supplier" class="form-control" required>
				   <option value="">- Pilih -</option>
				   <?php foreach($supplier as $sup):?>
				    <option value="<?php echo $sup['ID_SUPPLIER']?>"><?php echo $sup['NAMA_SUPPLIER']?></option>
				   <?php endforeach;?>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Stok Minimal</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <input type="text" class="form-control" name="minimal" id="minimal" value="0" readonly>
				</div>
			  </div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  <button type="submit" class="btn btn-primary">Save changes</button>
			</div>
		  </form>
		</div>
	  </div>
	</div>
  </div>