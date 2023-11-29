function tambahKas() {
	$('#inputKasModal').modal('show');
}

function editKas(e) {
	$.ajax({
		url: base_url + "kas/detilkas/" + e,
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			$('#idkas').val(obj.ID_KAS);
			$('#jenis').val(obj.JENIS);
			$('#nominal').val(obj.NOMINAL);
			$('#keterangan').val(obj.KETERANGAN);
		}
	})
	$('#editKasModal').modal('show');
}

function hapusKas(e) {
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
				url: base_url + "kas/hapus/" + e,
				type: "post",
				success: function (data) {
					window.location = base_url + "kas";
				}
			})
		}
	})
}
