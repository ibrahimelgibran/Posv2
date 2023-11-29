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
				          	<a href="<?php echo base_url('stokopname/entry')?>" class="btn btn-sm btn-primary" title="Tambah Data" id="tambahmutasi"><i class="fa fa-plus"></i> Tambah Data</a>
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
                          <th>Tanggal</th>
                          <th>Kode Brg</th>
                          <th>Nama Item</th>
						              <th>Stok Gudang</th>
                          <th>Stok Nyata</th>
                          <th>Selisih</th>
                          <th>Nilai(Rp)</th>
                          <th>Keterangan</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php foreach($opname as $o){?>
                        <tr>
                          <td><?php echo $o['tanggal']?></td>
                          <td><?php echo $o['kode_barang']?></td>
                          <td><?php echo $o['nama_barang']?></td>
                          <td><?php echo $o['stok']?></td>
                          <td><?php echo $o['stok_nyata']?></td>
                          <td><?php echo $o['selisih']?></td>
                          <td><?php echo $o['nilai']?></td>
                          <td><?php echo $o['keterangan']?></td>
                          <td>
                          <a href="<?php echo base_url('stokopname/edit/').encrypt_url($o['id_stok_opname'])?>" class="btn btn-primary btn-xs" title="Edit Data"><i class="fa fa-edit"></i></a>
                          <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusOpname('<?php echo $o['id_stok_opname']?>')"><i class="fa fa-trash "></i></a>
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
        <script src="<?php echo base_url('assets/Javascript/mod-stokopname.js')?>"></script>
        <?php include 'showdata.php'?>
