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
            <div class="col-md-4 col-sm-4 col-xs-12">
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
                    <form action="<?php echo base_url('hutang/bayar')?>" method="post" class="form-horizontal">
                          <div class="form-group">
                            <label>Sisa Piutang</label>
                              <input type="hidden" class="form-control" name="id_hutang" id="id_hutang" value="<?php echo $val['id_hutang']?>" readonly>
                              <input type="text" class="form-control" name="sisa" id="sisa" value="<?php echo $val['sisa']?>" readonly>
                            </div>
                            <div class="form-group">
                            <label>Nominal Pembayaran</label>
                              <input type="text" class="form-control" name="nominal" id="nominal" autocomplete="off">
                            </div>
                          <div class="form-group">
                            <button class="btn btn-primary btn-block"><i class="fa fa-paper-plane-o m-right-xs"></i> Payment</button>
                          </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-md-8 col-sm-8 col-xs-12">
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
                    <?php echo $this->session->flashdata('message'); ?>
                    <table width="100%" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Operator</th>
                          <th>Tanggal</th>
                          <th>Nominal</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($detail as $detail){?>
                        <tr>
                          <td><?php echo $detail['nama_lengkap']?></td>
                          <td><?php echo $detail['tgl_bayar']?></td>
                          <td>Rp. <?php echo number_format($detail['nominal'],'0','.','.')?></td>
                          <td>
                            <a href="#" onclick="hapusPembayaran('<?php echo $detail['id_detil_hutang']?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
                          </td>
                        </tr>
                      <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script src="<?php echo base_url('assets/Javascript/mod-hutang.js')?>"></script>