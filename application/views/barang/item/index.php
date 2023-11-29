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
                    <?php include 'inputitem.php'?>
                    <button type="button" class="btn btn-sm btn-primary" onclick="tambahitem()" title="Tambah Data" id="tambahkaryawan"><i class="fa fa-plus"></i> Tambah Data</button>
                    <button type="button" class="btn btn-sm btn-default" onclick="importExcel()" title="Import Data" id="importExcel"><i class="fa fa-upload"></i> Import Excel</button>
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
                          <th>Kode Item</th>
                          <th>Barcode</th>
                          <th>Nama Item</th>
						              <th>Satuan</th>
                          <th>Kategori</th>
                          <th>Harga Beli</th>
						              <th>Harga Jual</th>
                          <th>Stok</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php foreach($item as $i){?>
                        <tr>
                          <td><?php echo $i['KODE_BARANG']?></td>
                          <td><?php echo $i['BARCODE']?></td>
                          <td><?php echo $i['NAMA_BARANG']?></td>
                          <td><?php echo $i['SATUAN']?></td>
                          <td><?php echo $i['KATEGORI']?></td>
                          <td><?php echo $i['HARGA_BELI']?></td>
                          <td><?php echo $i['HARGA_JUAL']?></td>
                          <td><?php echo $i['STOK']?></td>
                          <td>
                          <a href="<?php echo base_url('barang/edit/').encrypt_url($i['ID_BARANG'])?>" class="btn btn-primary btn-xs" title="Edit Data"><i class="fa fa-edit"></i></a>
                          <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusbarang('<?php echo $i['ID_BARANG']?>')"><i class="fa fa-trash "></i></a>
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
		<?php include 'import.php'?>
    <script src="<?php echo base_url('assets/Javascript/mod-item.js')?>"></script>