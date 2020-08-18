$(function () {
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
});
