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
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <div class="row">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                      <h1>Perolehan PPN</h1>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <h1 style="text-align: right" id="totalppn">Rp. <?php echo number_format($total,'0','.','.').',-'?></h1>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <button type="button" class="btn btn-sm btn-primary" onclick="bayarPpn()" title="Bayar PPN" id="bayarppn"><i class="fa fa-plus"></i> Setor Pajak PPN</button>
                    <!-- <a href="<?php //echo base_url('report/kas')?>" target="_blank" class="btn btn-sm btn-default" title="Export PDF"><i class="fa fa-download"></i> Export PDF</a> -->
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
                          <th>Kode Pajak</th>
                          <th>Jenis</th>
                          <th>Nominal (Rp)</th>
                          <th>Tanggal</th>
                          <th>Keterangan</th>
                          <th>User</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($ppn as $ppn){?>
                        <tr>
                            <td><?php echo $ppn['kode_pajak']?></td>
                            <td><?php echo $ppn['jenis']?></td>
                            <td><?php echo $ppn['nominal']?></td>
                            <td><?php echo $ppn['tanggal']?></td>
                            <td><?php echo $ppn['keterangan']?></td>
                            <td><?php echo $ppn['nama_lengkap']?></td>
                            <td>
                            <?php if($ppn['jenis'] == "PPN Disetorkan"):?>
                            <a href="#" onclick="editPpn('<?php echo $ppn['id_pajak']?>')" class="btn btn-primary btn-xs" title="Edit Data"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusPajak('<?php echo $ppn['id_pajak']?>')"><i class="fa fa-trash "></i></a>
                            <?php else:?>
                            <a href="#"  class="btn btn-primary btn-xs" title="Edit Data" disabled><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" disabled><i class="fa fa-trash "></i></a>
                            <?php endif;?>
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
       <script src="<?php echo base_url('assets/Javascript/mod-ppn.js')?>"></script>
        <?php include 'setor.php'?>
        <?php include 'edit.php'?>