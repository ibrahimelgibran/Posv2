function tambahuser() {
	$('#inputUserModal').modal('show');
}

function edituser(e) {
	$.ajax({
		url: base_url + "user/detiluser/" + e,
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			$('#iduser').val(obj.ID_USER);
			$('#editusername').val(obj.USERNAME);
			$('#editnama').val(obj.NAMA_LENGKAP);
			$('#edittelp').val(obj.TELP_USER);
			$('#editemail').val(obj.EMAIL_USER);
			$('#editalamat').val(obj.ALAMAT_USER);
			$('#edittipe').val(obj.TIPE);
		}
	})
	$('#editUserModal').modal('show');
}

function hapususer(e) {
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
				url: base_url + "user/hapususer/" + e,
				type: "post",
				success: function (data) {
					window.location = base_url + "user";
				}
			})
		}
	})
}
