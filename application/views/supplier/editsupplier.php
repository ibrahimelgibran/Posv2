 <div class="modal fade" id="editSupplierModal">
	<div class="modal-dialog">
	  <div class="modal-content">

		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		  </button>
		  <h4 class="modal-title" id="editSupplierModal">Edit Data Supplier</h4>
		</div>
		<div class="modal-body">
		 <form class="form-horizontal" method="post" action="<?php echo base_url('supplier/editsupplier')?>">
			  <input type="hidden" class="form-control has-feedback-left" id="idsupplier" name="idsupplier">
			  <div class="form-group">
			 	<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Supplier</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" class="form-control" id="editnamasup" name="editnamasup" autocomplete="off">
				</div>
			  </div>
			  <div class="form-group">
			 	<label class="control-label col-md-3 col-sm-3 col-xs-12">Email Supplier</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" class="form-control" id="editemailsup" name="editemailsup" autocomplete="off">
				</div>
			  </div>
			  <div class="form-group">
			 	<label class="control-label col-md-3 col-sm-3 col-xs-12">No. Telp</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" class="form-control" id="edittelpsup" name="edittelpsup" autocomplete="off">
				</div>
			  </div>
			  <div class="form-group">
			 	<label class="control-label col-md-3 col-sm-3 col-xs-12">Fax</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="text" class="form-control" id="editfaxsup" name="editfaxsup" autocomplete="off">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Bank</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <input type="text" class="form-control" name="editbanksup" id="editbanksup" autocomplete="off">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Rekening</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <input type="text" class="form-control" name="editreksup" id="editreksup" autocomplete="off">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Atas Nama</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <input type="text" class="form-control" name="editatasnamasup" id="editatasnamasup" autocomplete="off">
				</div>
			  </div>
			   <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <textarea col="7" rows="2" class="form-control" name="editalamatsup" id="editalamatsup"></textarea>
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