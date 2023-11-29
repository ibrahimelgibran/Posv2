<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><?php echo $title ?></h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <!-- <a href="<?php //echo base_url('hutang/add')
                          ?>" class="btn btn-sm btn-primary" title="Tambah Hutang Ke Supplier"><i class="fa fa-plus"></i> Tambah Hutang Ke Supplier</a> -->
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
                  <th>Kode Beli</th>
                  <th>Supplier</th>
                  <th>Tgl. Hutang</th>
                  <th>Jml. Hutang</th>
                  <th>Jml. Bayar</th>
                  <th>Sisa</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <?php foreach ($hutang as $val) { ?>
                <tr>
                  <td><?php echo $val['kode_beli'] ?></td>
                  <td><?php echo $val['nama_supplier'] ?></td>
                  <td><?php echo $val['tgl_hutang'] ?></td>
                  <td>Rp. <?php echo number_format($val['jml_hutang'], '0', '.', '.') ?></td>
                  <td>Rp. <?php echo number_format($val['bayar'], '0', '.', '.') ?></td>
                  <td>Rp. <?php echo number_format($val['sisa'], '0', '.', '.') ?></td>
                  <td>
                    <?php if ($val['status'] == 'Lunas') { ?>
                      <span class="label label-success"><?php echo $val['status'] ?></span>
                    <?php } else { ?>
                      <span class="label label-danger"><?php echo $val['status'] ?></span>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if ($val['status'] == 'Lunas') { ?>
                      <a href="#" onclick="detailPay('<?php echo $val['id_hutang'] ?>')" class="btn btn-primary btn-xs"><i class="fa fa-search-plus"></i> Detail Pembayaran</a>
                    <?php } else { ?>
                      <a href="<?php echo base_url('hutang/payment/' . encrypt_url($val['id_hutang'])) ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Payment</a>
                    <?php } ?>

                  </td>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url('assets/Javascript/mod-hutang.js') ?>"></script>
<?php include 'detail_payment.php' ?>