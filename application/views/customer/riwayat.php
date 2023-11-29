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
                    <a href="<?php echo base_url('customer/poin')?>" class="btn btn-sm btn-primary" title="Back"><i class="fa fa-long-arrow-left"></i> BACK</a>
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
                    <table id="datapoin" width="100%" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Kode</th>
                          <th>Nama Customer</th>
                          <th>Tanggal Perolehan</th>
                          <th>Poin per Transaksi</th>
                          <th>Jumlah Transaksi</th>
                          <th>Total Poin </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($poin as $val){?>
                        <tr>
                            <td><?php echo $val['kode_cs']?></td>
                            <td><?php echo $val['nama_cs']?></td>
                            <td><?php echo $val['tanggal']?></td>
                            <td><?php echo '1'?></td>
                            <td><?php echo $val['jml_transaksi']?></td>
                            <td>
                            <span class="label label-success"><?php echo $val['total_poin']?></span>
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
    <script src="<?php echo base_url('assets/Javascript/mod-customer.js')?>"></script>