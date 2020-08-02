$(function () {
    $(document).ready(function () { // Ketika halaman selesai di load
        $('#form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function () { // Ketika user memilih filter
            if ($(this).val() == '1') { // Jika filter nya 1 (per bulan)
                $('#form-bulan, #form-tahun').hide(); // Tampilkan form bulan dan tahun
                $('#bulan').val('');
            } else if ($(this).val() == '2') { // Jika filter nya 1 (per bulan)
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
                $('#bulan').val('');
            } else { // Jika filternya 2 (per tahun)
                $('#form-bulan').hide(); // Tampilkan form tahun
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })

    // PENGELUARAN
    $('#excelPengeluaran').on('click', function () {
        $('.modal-body form').attr('action', 'http://localhost/akamana-coffee/Export/excel_pengeluaran');
        // alert($('.modal-body form').attr('action'))
    });

    $('#pdfPengeluaran').on('click', function () {
        $('.modal-body form').attr('action', 'http://localhost/akamana-coffee/Export/pdf_pengeluaran');
        // alert($('.modal-body form').attr('action'))
    });

    // LAPORAN
    $('#excelLaporan').on('click', function () {
        $('.modal-body form').attr('action', 'http://localhost/akamana-coffee/Export/excel_laporan');
        // alert($('.modal-body form').attr('action'))
    });

    $('#pdfLaporan').on('click', function () {
        $('.modal-body form').attr('action', 'http://localhost/akamana-coffee/Export/pdf_laporan');
        // alert($('.modal-body form').attr('action'))
    });


    // PEMASUKAN
    $('#excelPemasukan').on('click', function () {
        $('.modal-body form').attr('action', 'http://localhost/akamana-coffee/Export/excel_pemasukan');
        // alert($('.modal-body form').attr('action'))
    });

    $('#pdfPemasukan').on('click', function () {
        $('.modal-body form').attr('action', 'http://localhost/akamana-coffee/Export/pdf_masukPerbulan');
        // alert($('.modal-body form').attr('action'))
    });
})