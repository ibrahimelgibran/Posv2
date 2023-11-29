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
                    <a href="<?php echo base_url('barang/barang_rusak/input')?>" class="btn btn-sm btn-primary" title="Tambah Data" id=""><i class="fa fa-plus"></i> Tambah Data</a>
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
                          <th>Barcode</th>
                          <th>Nama Item</th>
                          <th>Satuan</th>
                          <th>Jumlah</th>
                          <th>Nilai</th>
                          <th>Jenis</th>
                          <th>Tanggal</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($load as $load){?>
                        <tr>
                          <td><?php echo $load['barcode']?></td>
                          <td><?php echo $load['nama_barang']?></td>
                          <td><?php echo $load['satuan']?></td>
                          <td><?php echo $load['jml']?></td>
                          <td><?php echo $load['nilai']?></td>
                          <td><?php echo $load['jenis']?></td>
                          <td><?php echo $load['tanggal']?></td>
                          <td>
                          <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusRusak('<?php echo $load['id_brg_operasional']?>')"><i class="fa fa-trash "></i></a>
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
        <?php include 'Js.php'?>
