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
              <div class="col-md-7 col-sm-12 col-xs-12">
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
				 <form class="form-horizontal" method="post" action="<?php echo base_url('hutang/save')?>">
					<div class="form-group">
					  <input type="hidden" class="form-control" name="id_pembelian" id="id_pembelian" readonly>
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Pembelian</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select name="kode_pembelian" id="kode_pembelian" class="form-control select2" onchange="selectPembelian()">
                                <option value="" disabled selected>Pilih Kode Pembelian</option>
                                <?php foreach($pembelian as $val){?>
                                    <option value="<?php echo $val['ID_BELI']?>"><?php echo $val['KODE_BELI']?></option>
                                <?php }?>
                            </select>
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Supplier</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
						  <input type="text" class="form-control" name="supplier" id="supplier"readonly>
						</div>
					  </div>
					   <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Faktur</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
						  <input type="text" class="form-control" name="no_faktur" id="no_faktur" autocomplete="off" required readonly>
						</div>
					  </div>
					   <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Faktur</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
						  <input type="text" class="form-control" name="tgl_faktur" id="tgl_faktur" autocomplete="off" required readonly>
						</div>
					  </div>
					   <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Pembelian</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
						  <input type="text" class="form-control" name="tgl_beli" id="tgl_beli" autocomplete="off" required readonly>
						</div>
					  </div>
					   <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Total Pembelian</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
						  <input type="text" class="form-control" name="total" id="total" autocomplete="off" required readonly>
						</div>
					  </div>
					   <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Hutang</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
						  <input type="date" class="form-control" name="tgl_hutang" id="tgl_hutang" autocomplete="off" required>
						</div>
					  </div>
					   <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Hutang</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
						  <input type="text" class="form-control" name="jml_hutang" id="jml_hutang" autocomplete="off" required>
						</div>
					  </div>
					   
					  <div style="text-align: right">
						<button type="reset" class="btn btn-danger"><i class="fa fa-recycle m-right-xs"></i> Batal</button>
						<button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane-o m-right-xs"></i> Simpan</button>
					  </div>
				  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		<script src="<?php echo base_url('assets/Javascript/mod-hutang.js')?>"></script>