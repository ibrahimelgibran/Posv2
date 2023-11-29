function selectPembelian() {
	var kode = $('#kode_pembelian').val();
	$.ajax({
		url: base_url + "hutang/detail_pembelian/" + kode,
		type: "post",
		dataType: "json",
		success: function (data) {
			$('#id_pembelian').val(data.id_beli);
			$('#supplier').val(data.nama_supplier);
			$('#no_faktur').val(data.faktur_beli);
			$('#tgl_faktur').val(data.tgl_faktur);
			$('#tgl_beli').val(data.tgl);
			$('#total').val(data.total);
		}
	})
}

function hapusPembayaran(e) {
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
				url: base_url + "hutang/hapus_pembayaran/" + e,
				type: "post",
				success: function (data) {
					window.location.reload();
				}
			})
		}
	})
}

function detailPay(e) {
	var html = '';
	$.ajax({
		url: base_url + "hutang/detail_payment/" + e,
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			for (var i = 0; i < obj.length; i++) {
				html += '<tr><td>' + obj[i].nama_lengkap + '</td>' +
					'<td>' + obj[i].tgl_bayar + '</td>' +
					'<td> Rp. ' + obj[i].nominal + '</td></tr>';
			}
			$('#detailHutang').modal('show');
			$('#detail_hutang').html(html);
		}
	})
}
