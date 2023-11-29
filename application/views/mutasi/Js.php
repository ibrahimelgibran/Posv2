<script>
function tampildata(){
     $('#daftarbarang').DataTable({
	   "bProcessing": true,
	   "bJQueryUI": true,
	   "sPaginationType": "full_numbers",
	   "sAjaxSource": base_url + 'barang/LoadData',
	   "sAjaxDataProp": "aaData",
	   "fnRender": function (oObj){uss = oObj.aData["Username"];},
	   "aoColumns": [
		  {"mDataProp": "KODE_BARANG", bSearchable: true},
		  {"mDataProp": "BARCODE", bSearchable: true},
		  {"mDataProp": "NAMA_BARANG", bSearchable: true},
		  {"mDataProp": "SATUAN", bSearchable: true},
		  {"mDataProp": "HARGA_JUAL", bSearchable: true},
		  {"mDataProp": function (data, type, val){
			pKode = data.ID_BARANG;
			var btn = '<a href="#" class="btn btn-primary btn-xs" data-dismiss="modal" title="Pilih Data" onclick="pilihbarang('+pKode+')"><i class="fa fa-check-square-o"></i> Select</a>';
			
			return (btn).toString();						
		  },
		  bSortable: false,
		  bSearchable: false
		  }
	   ],
	   "bDestroy": true,
   });
	$('#showDataModal').modal('show');
}
function pilihbarang(e){
	$.ajax({
		url: "<?php echo base_url('barang/detilbarang/')?>"+e,
		type: "post",
		success: function(data){
			var obj = JSON.parse(data);
			$('#namabarang').val(obj.NAMA_BARANG);
			$('#iditem').val(obj.ID_BARANG);
		}
	})
}
function scanBarcode(){
	var key = $('#barcode');
		$.ajax({
			url: "<?php echo base_url('barang/caribarang/')?>"+key.val(),
			type: "post",
			success: function(data){
				var obj = JSON.parse(data);
				$('#namabarang').val(obj.NAMA_BARANG);
				$('#stok').val(obj.STOK);
				$('#iditem').val(obj.ID_BARANG);
				$('#harga').val(obj.HARGA_BELI);
				console.log(data)
			}
		})
}
</script>