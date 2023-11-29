<script>
function tampildata_brg() {
	$('#barang_operasional').DataTable({
		"bProcessing": true,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"sAjaxSource": base_url + 'barang/LoadData',
		"sAjaxDataProp": "aaData",
		"fnRender": function (oObj) {
			uss = oObj.aData["Username"];
		},
		"aoColumns": [{
				"mDataProp": "BARCODE",
				bSearchable: true
			},
			{
				"mDataProp": "NAMA_BARANG",
				bSearchable: true
			},
			{
				"mDataProp": "SATUAN",
				bSearchable: true
			},
			{
				"mDataProp": "HARGA_BELI",
				bSearchable: true
			},
			{
				"mDataProp": "HARGA_JUAL",
				bSearchable: true
			},
			{
				"mDataProp": function (data, type, val) {
					pKode = data.ID_BARANG;
					var btn = '<a href="#" class="btn btn-primary btn-xs" data-dismiss="modal" title="Pilih Data" onclick="pilihbarang(' + pKode + ')"><i class="fa fa-check-square-o"></i> Select</a>';

					return (btn).toString();
				},
				bSortable: false,
				bSearchable: false
			}
		],
		"bDestroy": true,
	});
	$('#dialogBrg').modal('show');
}

function pilihbarang(e) {
	$.ajax({
		url: base_url + "barang/detilbarang/" + e,
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			$('#namabarang').val(obj.NAMA_BARANG);
			$('#iditem').val(obj.ID_BARANG);
			$('#harga').val(obj.HARGA_BELI);
			$('#stok').val(obj.STOK);
		}
	})
}

function scanBarcode() {
	var key = $('#barcode');
	$.ajax({
		url: base_url + "barang/caribarang/" + key.val(),
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			$('#namabarang').val(obj.NAMA_BARANG);
			$('#stok').val(obj.STOK);
			$('#iditem').val(obj.ID_BARANG);
			$('#harga').val(obj.HARGA_BELI);
		}
	})
}

function hapusRusak(e){
    Swal.fire({
		title: "Are you sure ?",
		text: "Deleted data can not be restored!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, delete it!"
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: base_url + "barang/hapus_operasional/" + e,
				type: "post",
				success: function (data) {
					window.location.href = base_url + "barang/barang_rusak/";
				}
			})
		}
	})
}
</script>