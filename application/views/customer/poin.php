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
                    <a href="<?php echo base_url('customer/index')?>" class="btn btn-sm btn-primary" title="Back"><i class="fa fa-long-arrow-left"></i> BACK</a>
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
                    <table width="100%" class="table table-striped table-bordered datatable">
                      <thead>
                        <tr>
                          <th>Kode</th>
                          <th>Nama Customer</th>
                          <th>Telp</th>
                          <th>Email</th>
                          <th>Alamat</th>
                          <th>Total Poin</th>
                          <th>Riwayat</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($poin as $val){?>
                        <tr>
                            <td><?php echo $val['kode_cs']?></td>
                            <td><?php echo $val['nama_cs']?></td>
                            <td><?php echo $val['telp']?></td>
                            <td><?php echo $val['email']?></td>
                            <td><?php echo $val['alamat']?></td>
                            <td>
                            <span class="label label-success"><?php echo $val['total']?></span>
                            </td>
                            <td>
                            <a href="<?php echo base_url('customer/riwayat_poin/').$val['id_cs']?>" class="btn btn-primary btn-xs" title="Riwayat"><i class="fa fa-search-plus"></i></a>
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