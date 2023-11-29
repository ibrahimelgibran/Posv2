function pilihbarang(e) {
	$.ajax({
		url: base_url + "barang/detilbarang/" + e,
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			$('#namabarang').val(obj.NAMA_BARANG);
			$('#iditem').val(obj.ID_BARANG);
			$('#kodebrg').val(obj.KODE_BARANG);
			$('#generateBarcode').val(obj.BARCODE);
			$('#barcode_num').val(obj.BARCODE);

			var kode = $('#generateBarcode').val();
			var id = $('#iditem').val();
			var html = ' <img src="' + base_url + 'barcode/generate/' + kode + '" width="180">';
			$('.view-barcode').html('');
			$('.view-barcode').append(html);
		}
	})
}

function Generate() {
	var kode = $('#generateBarcode').val();
	var id = $('#iditem').val();
	var html = ' <img src="' + base_url + 'barcode/generate/' + kode + '" width="180">';
	$('.view-barcode').html('');
	$('.view-barcode').append(html);
}

function printBarcode() {
	$('#printBarcodeModal').modal('show');
}
