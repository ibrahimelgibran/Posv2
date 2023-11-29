 <div class="modal fade" id="editDetilBeli">
	<div class="modal-dialog bs-example-modal-sm">
	  <div class="modal-content">

		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		  </button>
		  <h4 class="modal-title" id="editDetilBeli">Edit Detail Pembelian</h4>
		</div>
		<div class="modal-body">
		 <form class="form-horizontal" method="post" action="<?php echo base_url('penjualan/editdetiljual')?>">
			  <div class="form-group">
				<div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
					<input type="hidden" class="form-control has-feedback-left" id="iddetilbeli" name="iddetilbeli">
					<input type="hidden" class="form-control" id="iddetilbarang" name="iddetilbarang">
				  </div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Barcode</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <input type="text" class="form-control" name="editdetilbarcode" id="editdetilbarcode" autocomplete="off" readonly>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Item</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <input type="text" class="form-control" name="namadetilitem" id="namadetilitem" readonly>
				</div>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <input type="hidden" class="form-control" name="hargadetilitem" id="hargadetilitem" readonly>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Qty</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <input type="text" class="form-control" name="detilqty" id="detilqty" autocomplete="off">
				  <input type="hidden" class="form-control" name="qtylama" id="qtylama" autocomplete="off">
				</div>
			  </div>
			   <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Total (Rp)</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				   <input type="text" class="form-control" name="detiltotalitem" id="detiltotalitem" readonly>
				</div>
			  </div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  <button type="button" data-dismiss="modal" onclick="updateDetilBeli()" class="btn btn-primary">Save changes</button>
			</div>
		  </form>
		</div>
	  </div>
	</div>
  </div>