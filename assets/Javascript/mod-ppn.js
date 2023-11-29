function bayarPpn() {
	$('#inputPpnModal').modal('show');
}

function editPpn(e) {
	$.ajax({
		url: base_url + "ppn/detail/" + e,
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			console.log(data);
			$('#id_ppn').val(obj.ID_PAJAK);
			$('#editnominal_ppn').val(obj.NOMINAL);
			$('#editjenis_ppn').val(obj.JENIS);
			$('#editketerangan_ppn').val(obj.KETERANGAN);
		}
	})
	$('#editPpnModal').modal('show');
}

function hapusPajak(e) {
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
				url: base_url + "ppn/delete/" + e,
				type: "post",
				success: function (data) {
					window.location = base_url + "ppn"
				}
			})
		}
	})
}
