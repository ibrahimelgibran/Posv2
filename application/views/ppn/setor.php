<div class="modal fade" id="inputPpnModal">
	<div class="modal-dialog">
	  <div class="modal-content">

		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		  </button>
		  <h4 class="modal-title" id="inputPpnModal">Setor Pajak PPN</h4>
		</div>
		<div class="modal-body">
		 <form class="form-horizontal" method="post" action="<?php echo base_url('ppn/input')?>">
			   <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <input type="text" class="form-control" name="jenis_ppn" id="jenis_ppn"  readonly value="PPN Disetorkan">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Nominal</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <input type="text" class="form-control" name="nominal_ppn" id="nominal_ppn" autocomplete="off">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				 <textarea name="keterangan_ppn" id="keterangan_ppn" cols="3" rows="2" class="form-control"></textarea>
				</div>
			  </div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  <button type="submit" class="btn btn-primary">Save changes</button>
			</div>
		  </form>
		</div>
	  </div>
	</div>
  </div>