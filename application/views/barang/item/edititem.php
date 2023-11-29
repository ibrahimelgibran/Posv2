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
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					 <form class="form-horizontal" method="post" action="<?php echo base_url('barang/editbarang')?>">
					  <div class="form-group">
						<input type="hidden" class="form-control" id="iditem" name="iditem" value="<?php echo $item['ID_BARANG']?>">
						<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
							<label for="">BarcodeID :</label>
							  <input type="text" class="form-control" name="barcode" value="<?php echo $item['BARCODE']?>" autocomplete="off" required />
						  </div>
						 <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
							<label for="">Nama Item :</label>
							  <input type="text" id="namabarang" class="form-control" name="namabarang" value="<?php echo $item['NAMA_BARANG']?>" autocomplete="off" required />
						  </div>
					  </div>
					  <div class="form-group">
						<div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
							<label for="">Harga Beli :</label>
							  <input type="text" id="beli" class="form-control" name="beli" value="<?php echo $item['HARGA_BELI']?>" autocomplete="off" required />
						  </div>
						  <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
							<label for="">Harga Jual :</label>
							  <input type="text" id="jual" class="form-control" name="jual" value="<?php echo $item['HARGA_JUAL']?>" autocomplete="off" required />
						  </div>
						  <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
							<label for="">Supplier :</label>
							<select id="supplier" name="supplier" class="form-control" required>
							<option value="">- Pilih -</option>
								  <?php foreach($supplier as $sup):?>
								  <?php if($sup['ID_SUPPLIER'] == $item['ID_SUPPLIER']):?>
								   <option value="<?php echo $sup['ID_SUPPLIER']?>" selected><?php echo $sup['NAMA_SUPPLIER']?></option>
								  <?php else:?>
								   <option value="<?php echo $sup['ID_SUPPLIER']?>"><?php echo $sup['NAMA_SUPPLIER']?></option>
								  <?php endif;?>
								  <?php endforeach;?>
							  </select>
						  </div>
					  </div>
					  <div class="form-group">
						<div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
							<label for="">Kategori :</label>
							   <select id="kategori" name="kategori" class="form-control" required>
							   <option value="">- Pilih -</option>
								  <?php foreach($kategori as $kategori):?>
								  <?php if($kategori['ID_KATEGORI'] == $item['ID_KATEGORI']):?>
								   <option value="<?php echo $kategori['ID_KATEGORI']?>" selected><?php echo $kategori['KATEGORI']?></option>
								  <?php else:?>
								   <option value="<?php echo $kategori['ID_KATEGORI']?>"><?php echo $kategori['KATEGORI']?></option>
								  <?php endif;?>
								  <?php endforeach;?>
							  </select>
						  </div>
						  <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
							<label for="">Satuan :</label>
							   <select id="satuan" name="satuan" class="form-control" required>
								  <?php foreach($satuan as $satuan):?>
								  <?php if($satuan['ID_SATUAN'] == $item['ID_SATUAN']):?>
								   <option value="<?php echo $satuan['ID_SATUAN']?>" selected><?php echo $satuan['SATUAN']?></option>
								  <?php else:?>
								    <option value="<?php echo $satuan['ID_SATUAN']?>"><?php echo $satuan['SATUAN']?></option>
								  <?php endif;?>
								  <?php endforeach;?>
							  </select>
						  </div>
						   <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
							<label for="">Stok Minimal :</label>
							  <input type="text" id="minimal" class="form-control" name="minimal" value="<?php echo $item['STOK_MINIMAL']?>" readonly required />
						  </div>
					  </div>
					  <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
				  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		<script src="<?php echo base_url('assets/Javascript/mod-item.js')?>"></script>