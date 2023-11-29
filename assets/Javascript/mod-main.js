var tablekaryawan = $('#datakaryawan').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'karyawan/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "KODE_KARYAWAN",
			bSearchable: true
		},
		{
			"mDataProp": "NAMA_KARYAWAN",
			bSearchable: true
		},
		{
			"mDataProp": "TELP_KARYAWAN",
			bSearchable: true
		},
		{
			"mDataProp": "EMAIL_KARYAWAN",
			bSearchable: true
		},
		{
			"mDataProp": "ALAMAT",
			bSearchable: true
		},
		{
			"mDataProp": "STATUS_KARYAWAN",
			bSearchable: true
		},
		{
			"mDataProp": "TGL_MASUK",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.ID_KARYAWAN;
				var btn = '<a href="#" class="btn btn-primary btn-xs" title="Edit Data" onclick="editKaryawan(' + pKode + ')"><i class="fa fa-edit"></i></a> \n\ <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusKaryawan(' + pKode + ')"><i class="fa fa-trash "></i></a>';

				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});
var tableSupplier = $('#datasupplier').DataTable({
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
				var btn = '<a href="#" class="btn btn-primary btn-xs" title="Edit Data" onclick="editSupplier(' + pKode + ')"><i class="fa fa-edit"></i></a> \n\ <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusSupplier(' + pKode + ')"><i class="fa fa-trash "></i></a>';

				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});
var tableCustomer = $('#datacustomer').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'customer/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "KODE_CS",
			bSearchable: true
		},
		{
			"mDataProp": "NAMA_CS",
			bSearchable: true
		},
		{
			"mDataProp": "TELP",
			bSearchable: true
		},
		{
			"mDataProp": "EMAIL",
			bSearchable: true
		},
		{
			"mDataProp": "ALAMAT",
			bSearchable: true
		},
		{
			"mDataProp": "JENIS_CS",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.ID_CS;
				var btn = '<a href="#" class="btn btn-primary btn-xs" title="Edit Data" onclick="editCustomer(' + pKode + ')"><i class="fa fa-edit"></i></a> \n\ <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusCustomer(' + pKode + ')"><i class="fa fa-trash "></i></a>';

				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});
var tableKategori = $('#datakategori').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'kategori/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "KATEGORI",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.ID_KATEGORI;
				var btn = '<a href="#" class="btn btn-primary btn-xs" title="Edit Data" onclick="editkategori(' + pKode + ')"><i class="fa fa-edit"></i></a> \n\ <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapuskategori(' + pKode + ')"><i class="fa fa-trash "></i></a>';

				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});
var tableSatuan = $('#datasatuan').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'satuan/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "SATUAN",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.ID_SATUAN;
				var btn = '<a href="#" class="btn btn-primary btn-xs" title="Edit Data" onclick="editsatuan(' + pKode + ')"><i class="fa fa-edit"></i></a> \n\ <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapussatuan(' + pKode + ')"><i class="fa fa-trash "></i></a>';

				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});
var tableUser = $('#datauser').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'user/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "USERNAME",
			bSearchable: true
		},
		{
			"mDataProp": "TIPE",
			bSearchable: true
		},
		{
			"mDataProp": "NAMA_LENGKAP",
			bSearchable: true
		},
		{
			"mDataProp": "ALAMAT_USER",
			bSearchable: true
		},
		{
			"mDataProp": "TELP_USER",
			bSearchable: true
		},
		{
			"mDataProp": "EMAIL_USER",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.ID_USER;
				var btn = '<a href="#" class="btn btn-primary btn-xs" title="Edit Data" onclick="edituser(' + pKode + ')"><i class="fa fa-edit"></i></a> \n\ <a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapususer(' + pKode + ')"><i class="fa fa-trash "></i></a>';

				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});
var dPenjualan = $('#daftarjual').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'dpenjualan/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "invoice",
			bSearchable: true
		},

		{
			"mDataProp": "nama_lengkap",
			bSearchable: true
		},
		{
			"mDataProp": "nama_cs",
			bSearchable: true
		},
		{
			"mDataProp": "diskon",
			bSearchable: true
		},
		{
			"mDataProp": "total",
			bSearchable: true
		},
		{
			"mDataProp": "qty",
			bSearchable: true
		},
		{
			"mDataProp": "tgl",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.id_jual;
				var btn = '<a href="#" class="btn btn-primary btn-xs" title="Detail Data" onclick="detilJual(' + pKode + ')"><i class="fa fa-search-plus"></i></a> \n\ <a href="#" class="btn btn-success btn-xs" title="Print Resi" onclick="cetakResi(' + pKode + ')"><i class="fa fa-print"></i></a>';
				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});
var dPembelian = $('#daftarpembelian').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'dpembelian/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "kode_beli",
			bSearchable: true
		},
		{
			"mDataProp": "faktur_beli",
			bSearchable: true
		},
		{
			"mDataProp": "tgl_faktur",
			bSearchable: true
		},
		{
			"mDataProp": "nama_supplier",
			bSearchable: true
		},
		{
			"mDataProp": "diskon",
			bSearchable: true
		},
		{
			"mDataProp": "qty_beli",
			bSearchable: true
		},
		{
			"mDataProp": "total",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.id_beli;
				var btn = '<a href="#" class="btn btn-primary btn-xs" title="Detail Data" onclick="detilBeli(' + pKode + ')"><i class="fa fa-search-plus"></i></a> ';

				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});

var dataKas = $('#datakas').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'kas/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "KODE_KAS",
			bSearchable: true
		},
		{
			"mDataProp": "TANGGAL",
			bSearchable: true
		},
		{
			"mDataProp": "JENIS",
			bSearchable: true
		},
		{
			"mDataProp": "NOMINAL",
			bSearchable: true
		},
		{
			"mDataProp": "KETERANGAN",
			bSearchable: true
		},
		{
			"mDataProp": "NAMA_LENGKAP",
			bSearchable: true
		},
		{
			"mDataProp": function (data, type, val) {
				pKode = data.ID_KAS;
				var btn = '<a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusKas(' + pKode + ')"><i class="fa fa-trash "></i></a>';

				return (btn).toString();
			},
			bSortable: false,
			bSearchable: false
		}
	],
	"bDestroy": true,
});

var tableUserlog = $('#datauserlog').DataTable({
	"bProcessing": true,
	"bJQueryUI": true,
	"sPaginationType": "full_numbers",
	"sAjaxSource": base_url + 'userlog/LoadData',
	"sAjaxDataProp": "aaData",
	"fnRender": function (oObj) {
		uss = oObj.aData["Username"];
	},
	"aoColumns": [{
			"mDataProp": "username",
			bSearchable: true
		},
		{
			"mDataProp": "nama_lengkap",
			bSearchable: true
		},
		{
			"mDataProp": "tipe",
			bSearchable: true
		},
		{
			"mDataProp": "waktu",
			bSearchable: true
		},
	],
	"bDestroy": true,
});
