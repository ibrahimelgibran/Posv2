function diskon() {
	var qty = $('#detilqty');
	var diskon = $('#detildiskonitem');
	var subtotal = $('#detiltotalitem');
	var peritem = $('#hargadetilitem');
	qty.keyup(function () {
		var jum = document.getElementById('detilqty').value;
		if (jum == null) {
			subtotal.val(subtotal.val());
		} else {
			var total = peritem.val() * qty.val();
			subtotal.val(total);
		}
	});
	diskon.keyup(function () {
		var disk = document.getElementById('detildiskonitem').value;
		if (disk == null) {
			subtotal.val(subtotal.val());
		} else {
			var total = peritem.val() * qty.val();
			var hargaakhir = total - diskon.val();
			subtotal.val(hargaakhir);
		}
	})
}

function discbeli() {
	var diskbeli = $('#diskonbeli');
	var grand = $('#grandtotalbeli');
	diskbeli.keyup(function () {
		var discount = document.getElementById('diskonbeli').value;
		if (discount == null) {
			grand.text($('#totalbeli').val());
		} else {
			var grandtot = $('#totalbeli').val() - diskbeli.val();
			grand.text(grandtot);
		}
	});
}

function invoice() {
	$.ajax({
		url: base_url + "penjualan/kodeinvoice",
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			$('#invoice').text(obj);
		}
	})
}

function totalbayar() {
	var grand = $('#grandtotal');
	var bayar = $('#bayar');
	bayar.keyup(function () {
		var byr = document.getElementById('bayar').value;
		if (byr == null) {
			var nilai = 0;
			byr = nilai;
		} else {
			var hasil = bayar.val() - grand.val();
			$('#kembali').val(hasil);
		}
	})
}
