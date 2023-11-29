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
				"mDataProp": "KODE_BARANG",
				bSearchable: true
			},
			{
				"mDataProp": "BARCODE",
				bSearchable: true
			},
			{
				"mDataProp": "NAMA_BARANG",
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
	$('#showDataModal').modal('show');
}

function pilihbarang(e) {
	$.ajax({
		url: base_url + "barang/detilbarang/" + e,
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			$('#hargaitembeli').val(obj.HARGA_JUAL);
			$('#namaitembeli').val(obj.NAMA_BARANG);
			$('#idbarangitembeli').val(obj.ID_BARANG);
			$('#hargabeli').val(obj.HARGA_BELI);
		}
	})
}

function tampilsupplier() {
	$('#daftarsupplier').DataTable({
		"bProcessing": true,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"sAjaxSource": base_url + 'supplier/LoadData',
		"sAjaxDataProp": "aaData",
		"fnRender": function (oObj) {
			uss = oObj.aData["Username"];
		},
		"aoColumns": [{
				"mDataProp": "KODE_SUPPLIER",
				bSearchable: true
			},
			{
				"mDataProp": "NAMA_SUPPLIER",
				bSearchable: true
			},
			{
				"mDataProp": "TELP_SUPPLIER",
				bSearchable: true
			},
			{
				"mDataProp": "EMAIL_SUPPLIER",
				bSearchable: true
			},
			{
				"mDataProp": "BANK",
				bSearchable: true
			},
			{
				"mDataProp": "REKENING",
				bSearchable: true
			},
			{
				"mDataProp": "ALAMAT_SUPPLIER",
				bSearchable: true
			},
			{
				"mDataProp": function (data, type, val) {
					pKode = data.ID_SUPPLIER;
					var btn = '<a href="#" class="btn btn-primary btn-xs" data-dismiss="modal" title="Pilih Data" onclick="pilihsupplier(' + pKode + ')"><i class="fa fa-check-square-o"></i> Select</a>';

					return (btn).toString();
				},
				bSortable: false,
				bSearchable: false
			}
		],
		"bDestroy": true,
	});
	$('#showSupplierModal').modal('show');
}

function pilihsupplier(e) {
	$.ajax({
		url: base_url + "supplier/detilsupplier/" + e,
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			$('#namasupplier').val(obj.NAMA_SUPPLIER);
			$('#idsup').val(obj.ID_SUPPLIER);
		}
	})
}

function addBeliByClick() {
	var qty = $('#qtybeli').val();
	var beli = $('#hargabeli').val();
	var jual = $('#hargaitembeli').val();
	var subtotal = qty * beli;
	var id = $('#idbarangitembeli').val();
	var barcode = document.getElementById('barcodebeli');

	if ($('#namaitembeli').val() == "" || qty == "" || beli == "" || jual == "") {

		alert('Field Tidak Boleh Kosong!');

	} else {
		$.ajax({
			url: base_url + "pembelian/tambahbeli/" + id + '/' + qty + '/' + subtotal + '/' + jual + '/' + beli,
			type: "post",
			success: function (data) {
				var obj = JSON.parse(data);
				LoadItemBeli();
				barcode.value = "";
				barcode.focus();
				$('#grandtotalbeli').text(obj.subtotal);
				$('#totalbeli').val(obj.subtotal);
			}
		});
	}
}

function addBeliByScan() {
	var qty = 1;
	var beli = $('#hargabeli').val();
	var jual = $('#hargaitembeli').val();
	var subtotal = qty * beli;
	var id = $('#idbarangitembeli').val();
	var barcode = document.getElementById('barcodebeli');

	$.ajax({
		url: base_url + "pembelian/tambahbeli/" + id + '/' + qty + '/' + subtotal + '/' + jual + '/' + beli,
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			LoadItemBeli();
			barcode.value = "";
			barcode.focus();
			$('#grandtotalbeli').text(obj.subtotal);
			$('#totalbeli').val(obj.subtotal);
		}
	});
}

function LoadItemBeli() {
	$('#detilitembeli').DataTable({
		"bProcessing": true,
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"sAjaxSource": base_url + 'pembelian/LoadData',
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
				"mDataProp": "harga_beli",
				bSearchable: true
			},
			{
				"mDataProp": "harga_jual",
				bSearchable: true
			},
			{
				"mDataProp": "qty_beli",
				bSearchable: true
			},
			{
				"mDataProp": "subtotal",
				bSearchable: true
			},
			{
				"mDataProp": function (data, type, val) {
					pKode = data.id_detil_beli;
					var btn = '<a href="#" class="btn btn-primary btn-xs" title="Edit Data" onclick="editDetilBeli(' + pKode + ')"><i class="fa fa-edit"></i></a> \n\ <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusDetilBeli(' + pKode + ')"><i class="fa fa-trash "></i></a>';

					return (btn).toString();
				},
				bSortable: false,
				bSearchable: false
			}
		],
		"bDestroy": true,
	});
}

function hapusDetilBeli(e) {
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
				url: base_url + "pembelian/hapusdetil/" + e,
				type: "post",
				success: function (data) {
					LoadItemBeli();
					var obj = JSON.parse(data);
					if (obj.subtotalbeli == null) {
						$('#grandtotalbeli').text(0);
						$('#totalbeli').val(0);
					} else {
						$('#grandtotalbeli').text(obj.subtotalbeli);
						$('#totalbeli').val(obj.subtotalbeli);
					}
				}
			})
		}
	})
}

function simpanBeli() {
	var supplier = $('#idsup').val();
	var user = $('#idoperator').val();
	var tfaktur = $('#tanggalf').val();
	var nfaktur = $('#nofaktur').val();
	var diskon = $('#diskonbeli').val();
	var total = $('#grandtotalbeli').text();

	if (tfaktur == "" || diskon == "" || nfaktur == "" || $('#namasupplier').val() == "") {
		alert('Field Tidak Boleh Kosong!');
	} else {

		$('#sup').val(supplier);
		$('#kasir').val(user);
		$('#tgl_faktur').val(tfaktur);
		$('#no_faktur').val(nfaktur);
		$('#diskon1').val(diskon);
		$('#grandtotal').val(total);
		$('#pembayaranModal').modal('show');
	}




}

function editDetilBeli(e) {
	var qty = $('#detilqty');
	var diskon = $('#detildiskonitem');
	var subtotal = $('#detiltotalitem');
	$.ajax({
		url: base_url + "pembelian/detilitembeli/" + e,
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			$('#iddetilbeli').val(obj.id_detil_beli);
			$('#iddetilbarang').val(obj.id_barang);
			$('#editdetilbarcode').val(obj.barcode);
			$('#namadetilitem').val(obj.nama_barang);
			$('#hargadetilitem').val(obj.harga_beli);
			$('#detilqty').val(obj.qty_beli);
			$('#qtylama').val(obj.qty_beli);
			$('#detildiskonitem').val(obj.diskon);
			$('#detiltotalitem').val(obj.subtotal);

		}
	});
	$('#editDetilBeli').modal('show');
}

function updateDetilBeli() {
	var id = $('#iddetilbeli').val();
	var qty = $('#detilqty').val();
	var qty1 = $('#qtylama').val();
	var subtotal = $('#detiltotalitem').val();
	var idBrg = $('#iddetilbarang').val();
	$.ajax({
		url: base_url + "pembelian/editdetilbeli/" + id + '/' + qty + '/' + subtotal,
		type: "post",
		success: function (data) {
			LoadItemBeli();
			var stok = qty - qty1;
			updateStok(stok, idBrg);
			$.ajax({
				url: base_url + "pembelian/hargatotal",
				type: "post",
				success: function (data) {
					var obj = JSON.parse(data);
					$('#grandtotalbeli').text(obj.subtotal);
					$('#totalbeli').val(obj.subtotal);
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

function scanBarcode() {
	var key = $('#barcodebeli');
	$.ajax({
		url: base_url + "barang/caribarang/" + key.val(),
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			$('#hargaitembeli').val(obj.HARGA_JUAL);
			$('#hargabeli').val(obj.HARGA_BELI);
			$('#namaitembeli').val(obj.NAMA_BARANG);
			$('#idbarangitembeli').val(obj.ID_BARANG);
			// console.log(data);
			addBeliByScan();
		}
	})
}
