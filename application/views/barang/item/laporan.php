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
              <div class="col-md-5 col-sm-6 col-xs-12">
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
                    <h4>Pilih menu ini jika ingin mengexport semua data barang di toko anda</h4><br>
                    <a href="<?php echo base_url('report/semua_barang')?>" class="btn btn-primary btn-block"><i class="fa fa-download"></i> Export Data</a>
                  </div>
                </div>
              </div>
              <div class="col-md-5 col-sm-6 col-xs-12">
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
                    <h4>Export Data berdasarkan Supplier.</h4>
                    <form action="<?php echo base_url('report/itemBySupplier')?>" method="post">
                      <div class="form-group">
                        <select class="form-control select2" id="lbarangsup" name="itemsupp">
                          <option> - Supplier - </option>
                          <?php foreach($supplier as $s){?>
                          <option value="<?php echo $s['ID_SUPPLIER']?>"><?php echo $s['NAMA_SUPPLIER']?></option>
                          <?php }?>
                          </select>
                        </div>
                      <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-download"></i> Export Data</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
