$(function () {
	// AJAX OWNER
	$(".tombolTambahOperator").on("click", function () {
		$("#judulModal").html("Input Data Operator");
		$(".modal-footer button[type=submit]").html("Add Data");
		$(".modal-body form").attr("action", "http://localhost/siprohum/Admin/data_operator");
		// alert($('.modal-body form').attr('action'));

		// show form input
		$("#labelPasswordOperator").show();
		$("#passwordOperator").show();
		$("#labelEmailOperator").show();
		$("#emailOperator").show();

		$("#id").val("");
		$("#nama").val("");
		$("#emailOperator").val("");
		$("#passwordOperator").val("");
	});
	// END AJAX OWNER

	// AJAX PEGAWAI
	$(".tombolTambahPegawai").on("click", function () {
		$("#judulModal").html("Input Data Pegawai");
		$(".modal-footer button[type=submit]").html("Add Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/akamana-coffee/Owner/data_pegawai"
		);

		// show form input
		$("#labelPasswordPegawai").show();
		$("#passwordPegawai").show();
		$("#labelEmailPegawai").show();
		$("#emailPegawai").show();

		$("#id").val("");
		$("#nama").val("");
		$("#emailPegawai").val("");
		$("#passwordPegawai").val("");
	});
	// END AJAX PEGAWAI

	// AJAX MAKANAN
	$(".tombolTambahMakanan").on("click", function () {
		$("#judulModal").html("Input Data Makanan");
		$(".modal-footer button[type=submit]").html("Add Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/akamana-coffee/Admin/save_makanan"
		);

		$("#id").val("");
		$("#nama").val("");
		$("#id_kat_menu").val(1);
		$("#harga").val("");
		$("#deskripsi").val("");
	});
	// END AJAX MAKANAN

	// AJAX MINUMAN
	$(".tombolTambahMinuman").on("click", function () {
		$("#judulModal").html("Input Data");
		$(".modal-footer button[type=submit]").html("Tambah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/akamana-coffee/Admin/save_minuman"
		);

		$("#id").val("");
		$("#nama").val("");
		$("#harga").val("");
		$("#deskripsi").val("");
	});
	// END AJAX MINUMAN

	// AJAX PELANGGAN
	$(".tombolTambahPelanggan").on("click", function () {
		$("#judulModal").html("Input Data Pelanggan");
		$(".modal-footer button[type=submit]").html("Add Data");

		// show form input
		$("#labelPasswordPelanggan").show();
		$("#passwordPelanggan").show();
		$("#labelEmailPelanggan").show();
		$("#emailPelanggan").show();

		$("#id_pelanggan").val("");
		$("#id_akun").val("");
		$("#nama").val("");
		$("#alamat").val("");
		$("#telepon").val("");
		$("#old_image").val("");
		$("#email").val("");
		$("#password").val("");
	});
	// END AJAX PELANGGAN

	// AJAX MENU
	$(".tombolTambahMenu").on("click", function () {
		$("#judulModal").html("Input Data");
		$(".modal-footer button[type=submit]").html("Tambah Data");

		$("#id").val("");
		$("#menu").val("");
	});

	$(".modalUbahMenu").on("click", function () {
		$("#judulModal").html("Update Data");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/akamana-coffee/Menu/saveUpdate_menu"
		);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/akamana-coffee/Menu/update_menu",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id").val(data.id);
				$("#menu").val(data.menu);
			},
		});
	});
	// END AJAX MENU

	// AJAX SUB MENU
	$(".tombolTambahSubMenu").on("click", function () {
		$("#judulModal").html("Input Data");
		$(".modal-footer button[type=submit]").html("Tambah Data");

		$("#sub_id").val("");
		$("#title").val("");
		$("#menu_id").val("");
		$("#url").val("");
		$("#icon").val("");
		$("#is_active").val("");
	});

	$(".modalUbahSubMenu").on("click", function () {
		$("#judulModal").html("Update Data");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/akamana-coffee/Menu/saveUpdate_subMenu"
		);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/akamana-coffee/Menu/update_subMenu",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id").val(data.sub_id);
				$("#title").val(data.title);
				$("#menu_id").val(data.menu_id);
				$("#url").val(data.url);
				$("#icon").val(data.icon);
				$("#is_active").val(data.is_active);
				if (data.is_active == "1") {
					document.getElementById("ya").checked = true;
				} else {
					document.getElementById("tidak").checked = true;
				}
			},
		});
	});
	// END AJAX SUB MENU

	// AJAX ROLE
	$(".tombolTambahRole").on("click", function () {
		$("#judulModal").html("Input Data Role");
		$(".modal-footer button[type=submit]").html("Add Data");
		$(".modal-body form").attr(
			"action",
			"http://localhost/akamana-coffee/Owner/role"
		);

		$("#id").val("");
		$("#role").val("");
	});
	// END AJAX ROLE

	// AJAX PENGELUARAN
	$(".tombolTambahPengeluaran").on("click", function () {
		$("#judulModal").html("Input Data Pengeluaran");
		$(".modal-footer button[type=submit]").html("Tambah Data");

		$("#id").val("");
		$("#uraian").val("");
		$("#nominal").val("");
		$("#jenis_pengeluaran").val("");
	});

	$(".modalUbahPengeluaran").on("click", function () {
		$("#judulModal").html("Update Data Pengeluaran");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		// $('.modal-body input[type=password]').html('readonly');
		$(".modal-body form").attr(
			"action",
			"http://localhost/akamana-coffee/Admin/saveUpdate_pengeluaran"
		);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/akamana-coffee/Admin/update_pengeluaran",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id").val(data.id_pengeluaran);
				$("#uraian").val(data.uraian);
				$("#nominal").val(data.nominal);
				$("#jenis_pengeluaran").val(data.jenis_pengeluaran);
			},
		});
	});
	// END AJAX PENGELUARAN

	// AJAX LAPORAN
	$(".tombolTambahLaporan").on("click", function () {
		$("#judulModal").html("Input Data Laporan");
		$(".modal-footer button[type=submit]").html("Tambah Data");

		$("#id").val("");
		$("#uraian").val("");
		$("#nominal").val("");
		$("#jenis").val("");
	});

	$(".modalUbahLaporan").on("click", function () {
		$("#judulModal").html("Update Data Laporan");
		$(".modal-footer button[type=submit]").html("Ubah Data");
		// $('.modal-body input[type=password]').html('readonly');
		$(".modal-body form").attr(
			"action",
			"http://localhost/akamana-coffee/Admin/saveUpdate_laporan"
		);

		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost/akamana-coffee/Admin/update_laporan",
			data: { id: id },
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id").val(data.id_laporan);
				$("#uraian").val(data.uraian);
				$("#nominal").val(data.nominal);
				$("#jenis").val(data.jenis);
			},
		});
	});
	// END AJAX LAPORAN

	// $(document).ready(function () {
	// $('#id_kat_menu').change(function () {
	//     var id = $(this).val();
	//     $.ajax({
	//         url: 'http://localhost/akamana-coffee/Admin/get_subkategori',
	//         data: { id: id },
	//         method: 'POST',
	//         async: false,
	//         dataType: 'json',
	//         success: function (data) {
	//             var html = '';
	//             var i;
	//             for (i = 0; i < data.length; i++) {
	//                 html += '<option>' + data[i].nama_sub_kat + '</option>';
	//             }
	//             $('.id_sub_kat').html(html);

	//         }
	//     });
	// });
	// });
});
