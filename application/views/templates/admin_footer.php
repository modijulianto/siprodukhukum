<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<script src="<?= base_url("assets") ?>/vendors/validator/multifield.js"></script>
<script src="<?= base_url("assets") ?>/vendors/validator/validator.js"></script>

<!-- Bootstrap -->
<script src="<?= base_url("assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js") ?>"></script>
<!-- FastClick -->
<script src="<?= base_url("assets/vendors/fastclick/lib/fastclick.js") ?>"></script>
<!-- NProgress -->
<script src="<?= base_url("assets/vendors/nprogress/nprogress.js") ?>"></script>
<!-- Chart.js -->
<script src="<?= base_url("assets/vendors/Chart.js/dist/Chart.min.js") ?>"></script>
<!-- gauge.js -->
<script src="<?= base_url("assets/vendors/gauge.js/dist/gauge.min.js") ?>"></script>
<!-- bootstrap-progressbar -->
<script src="<?= base_url("assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js") ?>"></script>
<!-- iCheck -->
<script src="<?= base_url("assets/vendors/iCheck/icheck.min.js") ?>"></script>
<!-- Skycons -->
<script src="<?= base_url("assets/vendors/skycons/skycons.js") ?>"></script>
<!-- morris.js -->
<script src="<?= base_url('assets'); ?>/vendors/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendors/morris.js/morris.min.js"></script>
<!-- Flot -->
<script src="<?= base_url("assets/vendors/Flot/jquery.flot.js") ?>"></script>
<script src="<?= base_url("assets/vendors/Flot/jquery.flot.pie.js") ?>"></script>
<script src="<?= base_url("assets/vendors/Flot/jquery.flot.time.js") ?>"></script>
<script src="<?= base_url("assets/vendors/Flot/jquery.flot.stack.js") ?>"></script>
<script src="<?= base_url("assets/vendors/Flot/jquery.flot.resize.js") ?>"></script>
<!-- Flot plugins -->
<script src="<?= base_url("assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js") ?>"></script>
<script src="<?= base_url("assets/vendors/flot-spline/js/jquery.flot.spline.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/flot.curvedlines/curvedLines.js") ?>"></script>
<!-- DateJS -->
<script src="<?= base_url("assets/vendors/DateJS/build/date.js") ?>"></script>
<!-- JQVMap -->
<script src="<?= base_url("assets/vendors/jqvmap/dist/jquery.vmap.js") ?>"></script>
<script src="<?= base_url("assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js") ?>"></script>
<script src="<?= base_url("assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js") ?>"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?= base_url("assets/vendors/moment/min/moment.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/bootstrap-daterangepicker/daterangepicker.js") ?>"></script>

<!-- jQuery custom content scroller -->
<script src="<?= base_url("assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js") ?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?= base_url("assets/build/js/custom.min.js") ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/build/js/dst/jquery.mask.min.js") ?>"></script>

<!-- Datatables -->
<script src="<?= base_url("assets/vendors/datatables.net/js/jquery.dataTables.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-buttons/js/buttons.flash.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-buttons/js/buttons.html5.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-buttons/js/buttons.print.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js") ?>"></script>
<script src="<?= base_url("assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/jszip/dist/jszip.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/pdfmake/build/pdfmake.min.js") ?>"></script>
<script src="<?= base_url("assets/vendors/pdfmake/build/vfs_fonts.js") ?>"></script>


<!-- SweatAlert -->
<script language="JavaScript" type="text/javascript" src="<?= base_url("assets/build/js/dist/sweetalert2.all.min.js") ?>"></script>
<script language="JavaScript" type="text/javascript" src="<?= base_url("assets/build/js/dist/myscript.js") ?>"></script>

<script language="JavaScript" type="text/javascript" src="<?= base_url("assets/build/js/script.js") ?>"></script>
<script language="JavaScript" type="text/javascript" src="<?= base_url("assets/build/js/script-export.js") ?>"></script>

<script language="JavaScript" type="text/javascript" src="<?= base_url("assets/vendors/select2/dist/js/select2.min.js") ?>"></script>


<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });


    $("#tentang").select2({
        minimumInputLength: 3,
        allowClear: true,
        placeholder: 'masukkan tentang',
        ajax: {
            url: "<?php echo base_url(); ?>Admin/find_tentang",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    tentang: params.term // search term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

    function previewFile() {
        const produk = document.querySelector('#produk');
        const produkLabel = document.querySelector('.custom-file-label');
        const filePreview = document.querySelector('.file-preview');

        produkLabel.textContent = produk.files[0].name;

        const fileproduk = new FileReader();
        fileproduk.readAsDataURL(produk.files[0]);

        fileproduk.onload = function(e) {
            $('.label-filePdf').removeAttr('hidden');
            $('.file-preview').removeAttr('hidden');
            filePreview.src = e.target.result;
        }
    }
</script>
</body>

</html>