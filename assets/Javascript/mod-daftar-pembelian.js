function detilBeli(e) {
	var html = '';
	$.ajax({
		url: base_url + "dpembelian/detilPembelian/" + e,
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			for (var i = 0; i < obj.length; i++) {
				html += '<tr><td>' + obj[i].kode_detil_beli + '</td>' +
					'<td>' + obj[i].barcode + '</td>' +
					'<td>' + obj[i].nama_barang + '</td>' +
					'<td>' + obj[i].harga_beli + '</td>' +
					'<td>' + obj[i].harga_jual + '</td>' +
					'<td>' + obj[i].qty_beli + '</td>' +
					'<td>' + obj[i].subtotal + '</td></tr>';
			}
			$('#detilPembelianModal').modal('show');
			$('#detilpembelian').html(html);
		}
	})
}
