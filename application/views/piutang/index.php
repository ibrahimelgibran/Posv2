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
                  <th>Invoice</th>
                  <th>Customer</th>
                  <th>Tgl. Piutang</th>
                  <th>Jml. Piutang</th>
                  <th>Jml. Bayar</th>
                  <th>Sisa</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($piutang as $val) { ?>
                  <tr>
                    <td><?php echo $val['invoice'] ?></td>
                    <td><?php echo $val['nama_cs'] ?></td>
                    <td><?php echo $val['tgl_piutang'] ?></td>
                    <td>Rp. <?php echo number_format($val['jml_piutang'], '0', '.', '.') ?></td>
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
                        <a href="#" onclick="detailPay('<?php echo $val['id_piutang'] ?>')" class="btn btn-primary btn-xs"><i class="fa fa-search-plus"></i> Detail Pembayaran</a>
                      <?php } else { ?>
                        <a href="<?php echo base_url('piutang/payment/' . encrypt_url($val['id_piutang'])) ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Payment</a>
                      <?php } ?>

                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url('assets/Javascript/mod-piutang.js') ?>"></script>
<?php include 'detail_payment.php' ?>