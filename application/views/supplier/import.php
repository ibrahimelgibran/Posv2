<div class="modal fade" id="importSupplier">
	<div class="modal-dialog">
	  <div class="modal-content">

		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		  </button>
		  <h4 class="modal-title" id="importSupplier">Import Data Supplier</h4>
		</div>
		<div class="modal-body">
		 <form class="form-horizontal" method="post" action="<?php echo base_url('import/supplier')?>" enctype="multipart/form-data">
			  <div class="form-group">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<input type="file" class="form-control" id="importsupp" name="importsupp">
				  </div>
			  </div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  <button type="submit" class="btn btn-primary"><i class="fa fa-download"></i> Import</button>
			</div>
		  </form>
		</div>
	  </div>
	</div>
  </div>