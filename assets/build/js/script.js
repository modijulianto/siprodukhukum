$(function () {
	// AJAX ADMINISTRATOR
	$(".tombolTambahAdmin").on("click", function () {
		$("#judulModal").html("Input Data Administrator");
		$(".modal-footer button[type=submit]").html("Add Data");
		$(".modal-body form").attr("action", "http://localhost/siprohum/Admin/data_admin");
		// alert($('.modal-body form').attr('action'));

		// show form input
		$("#labelPasswordAdmin").show();
		$("#passwordAdmin").show();
		$("#labelEmailAdmin").show();
		$("#emailAdmin").show();

		$("#id").val("");
		$("#nama").val("");
		$("#emailAdmin").val("");
		$("#passwordAdmin").val("");
	});
	// END AJAX OPERATOR

	// AJAX OPERATOR
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
	// END AJAX OPERATOR

	// AJAX UNIT
	$(".tombolTambahUnit").on("click", function () {
		$("#judulModal").html("Input Data Unit");
		$(".modal-footer button[type=submit]").html("Add Data");
		$(".modal-body form").attr("action", "http://localhost/siprohum/Admin/data_unit");

		$("#id").val("");
		$("#unit").val("");
	});
	// END AJAX UNIT

	// AJAX JENIS PRODUK
	$(".tombolTambahJenis").on("click", function () {
		$("#judulModal").html("Input Data Jenis Produk");
		$(".modal-footer button[type=submit]").html("Add Data");
		$(".modal-body form").attr("action", "http://localhost/siprohum/Admin/data_jenisProduk");

		$("#id").val("");
		$("#jenis").val("");
	});
	// END AJAX JENIS PRODUK

	// AJAX KATEGORI
	$(".tombolTambahKategori").on("click", function () {
		$("#judulModal").html("Input Data Kategori");
		$(".modal-footer button[type=submit]").html("Add Data");
		$(".modal-body form").attr("action", "http://localhost/siprohum/Admin/data_kategori");

		$("#id").val("");
		$("#kategori").val("");
	});
	// END AJAX KATEGORI

	// AJAX TENTANG
	$(".tombolTambahTentang").on("click", function () {
		$("#judulModal").html("Input Data Tentang");
		$(".modal-footer button[type=submit]").html("Add Data");
		$(".modal-body form").attr("action", "http://localhost/siprohum/Admin/data_tentang");

		$("#id").val("");
		$("#tentang").val("");
	});
	// END AJAX TENTANG

	$('#btnSimpan').on("click", function () {
		var tentangBaru = $('#tentangBaru').val();
		// alert($('#form-tentangBaru').attr('action'));

		$.ajax({
			type: 'POST',
			url: $('#form-tentangBaru').attr('action'),
			dataType: 'JSON',
			data: {
				tentangBaru: tentangBaru
			},
			beforeSend: function () {
				$('.btnSimpan').attr('disable', 'disabled');
				$('.btnSimpan').html('<i class="fa fa-spin fa-spinner"></i>');
			},
			complete: function () {
				$('.btnSimpan').removeAttr('disable');
				$('.btnSimpan').html('Tambah Data');
			},
			success: function (data) {
				Swal.fire({
					icon: 'success',
					title: 'Success!',
					text: "Data tentang baru berhasil ditambahkan"
				})
				$('[name="tentangBaru"]').val("");
				$('#modalTentangBaru').modal('hide');
			}
		});
		return false;
	});
});
