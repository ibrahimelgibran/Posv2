function tambahkaryawan() {
	$('#inputKaryawanModal').modal('show');
}

function editKaryawan(e) {
	$.ajax({
		url: base_url + "karyawan/detilkaryawan/" + e,
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			$('#idkaryawan').val(obj.ID_KARYAWAN);
			$('#editnama').val(obj.NAMA_KARYAWAN);
			$('#editkelamin').val(obj.JENIS_KELAMIN);
			$('#editemail').val(obj.EMAIL_KARYAWAN);
			$('#edittelp').val(obj.TELP_KARYAWAN);
			$('#edittmptlahir').val(obj.TMPT_LAHIR);
			$('#edittgllahir').val(obj.TGL_LAHIR);
			$('#edittglmasuk').val(obj.TGL_MASUK);
			$('#editstatus').val(obj.STATUS_KARYAWAN);
			$('#editalamat').val(obj.ALAMAT);
		}
	})
	$('#editKaryawanModal').modal('show');
}

function hapusKaryawan(e) {
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
				url: base_url + "karyawan/hapuskaryawan/" + e,
				type: "post",
				success: function (data) {
					window.location = base_url + "karyawan";
				}
			})
		}
	})
}

function importKar() {
	$('#importKaryawanModal').modal('show');
}
