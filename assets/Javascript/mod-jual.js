function tampildata() {

	$('#daftarbarang').DataTable({
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
			"mDataProp": "STOK",
			bSearchable: true
		},
		{
			"mDataProp": "HARGA_JUAL",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.ID_BARANG;
				if (data.STOK < 1) {
					var btn = '<a href="#" id="pilihitem" class="btn btn-primary btn-xs" data-dismiss="modal" title="Pilih Data" onclick="pilihbarang(' + pKode + ')" disabled><i class="fa fa-check-square-o"></i> Select</a>';
				} else {
					var btn = '<a href="#" id="pilihitem" class="btn btn-primary btn-xs" data-dismiss="modal" title="Pilih Data" onclick="pilihbarang(' + pKode + ')"><i class="fa fa-check-square-o"></i> Select</a>';
				}

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

function pilihbarang(e) {
	$.ajax({
		url: base_url + "barang/detilbarang/" + e,
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			$('#harga').val(obj.HARGA_JUAL);
			$('#namaitem').val(obj.NAMA_BARANG);
			$('#idbarangitem').val(obj.ID_BARANG);
		}
	})
}

function addItemByClick() {
	var qty = $('#qty').val();
	var harga = $('#harga').val();
	var subtotal = qty * harga;
	var id = $('#idbarangitem').val();
	var barcode = document.getElementById('barcode');

	if (qty == "") {
		alert('Field Tidak Boleh Kosong!')
	} else {
		$.ajax({
			url: base_url + "penjualan/tambahbarang/" + id + '/' + qty + '/' + subtotal + '/' + harga,
			type: "post",
			success: function (response) {
				var res = JSON.parse(response);
				if (res.status === 'success') {
					var obj = res.data;
					LoadItemBarang();
					barcode.value = "";
					barcode.focus();
					document.getElementById('qty').value = "";
					var ppn = obj.subtotal * 10 / 100;
					var hargaAkhir = ppn + Number(obj.subtotal);
					$('#subtot').html(obj.subtotal);
					$('#subtotal').val(obj.subtotal);
					$('#grandtotal').val(obj.subtotal);
					// $('#nominal_ppn').val(ppn);
					$('#nominal').val(obj.subtotal);
					$("#error-harga").hide();
				} else {
					console.log();
					//error
					$('#error-harga').text(res.message);
					$('#error-harga').show();
				}
			}
		});
	}
}

function addItemByScan() {
	var qty = 1;
	var harga = $('#harga').val();
	var subtotal = qty * harga;
	var id = $('#idbarangitem').val();
	var barcode = document.getElementById('barcode');

	$.ajax({
		url: base_url + "penjualan/tambahbarang/" + id + '/' + qty + '/' + subtotal + '/' + harga,
		type: "post",
		success: function (response) {
			var res = JSON.parse(response);
			if (res.status === 'success') {
				var obj = res.data;
				LoadItemBarang();
				barcode.value = "";
				barcode.focus();
				document.getElementById('qty').value = "";
				var ppn = obj.subtotal * 10 / 100;
				var hargaAkhir = ppn + Number(obj.subtotal);
				$('#subtot').html(obj.subtotal);
				$('#subtotal').val(obj.subtotal);
				$('#grandtotal').val(obj.subtotal);
				// $('#nominal_ppn').val(ppn);
				$('#nominal').val(obj.subtotal);
				$("#error-harga").hide();
			} else {
				console.log();
				//error
				$('#error-harga').text(res.message);
				$('#error-harga').show();
			}

		}
	});
}

function LoadItemBarang() {
	$('#detilitem').DataTable({
		"bProcessing": true,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"sAjaxSource": base_url + 'penjualan/LoadData',
		"sAjaxDataProp": "aaData",
		"fnRender": function (oObj) {
			uss = oObj.aData["Username"];
		},
		"aoColumns": [{
			"mDataProp": "barcode",
			bSearchable: true
		},
		{
			"mDataProp": "nama_barang",
			bSearchable: true
		},
		{
			"mDataProp": "harga_jual",
			bSearchable: true
		},
		{
			"mDataProp": "qty_jual",
			bSearchable: true
		},
		{
			"mDataProp": "diskon",
			bSearchable: true
		},
		{
			"mDataProp": "subtotal",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.id_detil_jual;
				var btn = '<a href="#" class="btn btn-primary btn-xs" title="Edit Data" onclick="editDetilItem(' + pKode + ')"><i class="fa fa-edit"></i></a> \n\ <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusDetilItem(' + pKode + ')"><i class="fa fa-trash "></i></a>';

				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
		],
		"bDestroy": true,
	});
}

function editDetilItem(e) {
	var qty = $('#detilqty');
	var diskon = $('#detildiskonitem');
	var subtotal = $('#detiltotalitem');
	$.ajax({
		url: base_url + "penjualan/detilitemjual/" + e,
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			$('#iddetiljual').val(obj.id_detil_jual);
			$('#iddetilbarang').val(obj.id_barang);
			$('#editdetilbarcode').val(obj.barcode);
			$('#namadetilitem').val(obj.nama_barang);
			$('#hargadetilitem').val(obj.harga_jual);
			$('#detilqty').val(obj.qty_jual);
			$('#hideqty').val(obj.qty_jual);
			$('#detildiskonitem').val(obj.diskon);
			$('#detiltotalitem').val(obj.subtotal);

		}
	});
	$('#editDetilModal').modal('show');
}

function hapusDetilItem(e) {
	Swal.fire({
		title: "Kamu Yakin ?",
		text: "Data Ini Akan di Hapus",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "YES"
	}).then((result) => {
		if (result.value) {
			$.ajax({
				url: base_url + "penjualan/hapusdetil/" + e,
				type: "post",
				success: function (data) {
					LoadItemBarang();
					var obj = JSON.parse(data);
					var ppn = obj.subtotal * 10 / 100;
					var hargaAkhir = ppn + Number(obj.subtotal);
					if (obj.subtotal != null) {
						$('#subtot').text(obj.subtotal);
					} else {
						$('#subtot').text(0);
					}
				}
			})
		}
	})
}

function editDetilJual() {
	var id = $('#iddetiljual').val();
	var harga = $('#hargadetilitem').val();
	var qty = $('#detilqty').val();
	var qty1 = $('#hideqty').val();
	var diskon = $('#detildiskonitem').val();
	var subtotal = $('#detiltotalitem').val();
	var idBrg = $('#iddetilbarang').val();
	$.ajax({
		url: base_url + "penjualan/editdetiljual/" + id + '/' + harga + '/' + diskon + '/' + qty + '/' + subtotal,
		type: "post",
		success: function (data) {
			var stok = qty1 - qty;
			updateStok(stok, idBrg);
			LoadItemBarang();
			$.ajax({
				url: base_url + "penjualan/hargatotal",
				type: "post",
				success: function (response) {
					var res = JSON.parse(response);
					console.log(res);
					if (res.status === 'success') {
						var obj = res.data;
						var ppn = obj.subtotal * 10 / 100;
						var hargaAkhir = ppn + Number(obj.subtotal);
						$('#subtot').html(obj.subtotal);
						$('#subtotal').val(obj.subtotal);
						$('#grandtotal').val(obj.subtotal);
						$('#diskon1').val(obj.diskon);
					} else {
						alert(res.message);
					}


				}
			});
		}
	});
}

function updateStok(stok, id) {
	$.ajax({
		url: base_url + "barang/updateStok/" + stok + '/' + id,
		type: "post",
		success: function (data) {

		}
	});
}

function simpanPenjualan() {
	var cs = $('#customer').val();
	var kary = $('#karyawan').val();
	var user = $('#idoperator').val();
	$('#cus').val(cs);
	$('#kary').val(kary);
	$('#kasir').val(user);
	$.ajax({
		url: base_url + "penjualan/hargatotal",
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			var ppn = obj.subtotal * 10 / 100;
			var hargaAkhir = ppn + Number(obj.subtotal);
			$('#diskon1').val(obj.diskon);
			$('#subtot').html(obj.subtotal);
			$('#subtotal').val(obj.subtotal);
			$('#grandtotal').val(obj.subtotal);
			// $('#nominal_ppn').val(ppn);
			$('#nominal').val(obj.subtotal);

		}
	});
	$('#pembayaranModal').modal('show');
}

function editPenjualan() {
	$('#editPembayaranModal').modal('show');
}

function detilJual(e) {
	$('#detilPenjualanModal').modal('show');
}

function scanBarcode() {
	var key = $('#barcode');
	$.ajax({
		url: base_url + "barang/caribarang/" + key.val(),
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			$('#harga').val(obj.HARGA_JUAL);
			$('#namaitem').val(obj.NAMA_BARANG);
			$('#idbarangitem').val(obj.ID_BARANG);
			$('#kodebrg').val(obj.KODE_BARANG);
			addItemByScan();
		}
	})
}


$(document).ready(function () {
	LoadItemBarang();
});