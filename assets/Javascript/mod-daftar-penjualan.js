function detilJual(e) {
	var html = '';
	$.ajax({
		url: base_url + "dpenjualan/detilPenjualan/" + e,
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			for (var i = 0; i < obj.length; i++) {
				html += '<tr><td>' + obj[i].kode_detil_jual + '</td>' +
					'<td>' + obj[i].barcode + '</td>' +
					'<td>' + obj[i].nama_barang + '</td>' +
					'<td>' + obj[i].harga_jual + '</td>' +
					'<td>' + obj[i].qty_jual + '</td>' +
					'<td>' + obj[i].diskon + '</td>' +
					'<td>' + obj[i].subtotal + '</td>'
				'</tr>';
			}
			$('#detilPenjualanModal').modal('show');
			$('#detilpenjualan').html(html);
		}
	})
}

function cetakResi(e) {
	window.location.href = base_url + "report/struk_penjualan/" + e;
}
