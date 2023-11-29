function tambahsupplier() {
	$('#inputSupplierModal').modal('show');
}

function editSupplier(e) {
	$.ajax({
		url: base_url + "supplier/detilsupplier/" + e,
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			$('#idsupplier').val(obj.ID_SUPPLIER);
			$('#editnamasup').val(obj.NAMA_SUPPLIER);
			$('#editemailsup').val(obj.EMAIL_SUPPLIER);
			$('#edittelpsup').val(obj.TELP_SUPPLIER);
			$('#editfaxsup').val(obj.FAX_SUPPLIER);
			$('#editbanksup').val(obj.BANK);
			$('#editreksup').val(obj.REKENING);
			$('#editatasnamasup').val(obj.ATAS_NAMA);
			$('#editalamatsup').val(obj.ALAMAT_SUPPLIER);
		}
	})
	$('#editSupplierModal').modal('show');
}

function hapusSupplier(e) {
	$.ajax({
		url: base_url + "supplier/cek_delete/" + e,
		type: "post",
		success: function (data) {
			var obj = JSON.parse(data);
			if (obj.num == 1) {
				Swal.fire({
					title: "Cannot Delete This Data!",
					text: "Please check your data relation!",
					icon: "error",
				});
			} else {
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
							url: base_url + "supplier/hapussupplier/" + e,
							type: "post",
							success: function (data) {
								window.location = base_url + "supplier";
							}
						})
					}
				})
			}
		}
	});
}

function importSupp() {
	$('#importSupplier').modal('show');
}
