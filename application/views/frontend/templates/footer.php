<div class="col col-lg-12 bg-dark">
    <footer class="footer mt-auto py-3">
        <div class="row">
            <div class="col-md-5">
                <img src="<?= base_url('assets/images/Logo-Website-Undiksha.png'); ?>" alt=""><br><br>
                <div class="text-light">
                    <b>Jaringan Dokumentasi dan Informasi Hukum</b> <br>
                    Jalan Udayana No.11 Singaraja - Bali 81116 <br>
                    Telephone (0362) 22570, Fax (0362) 25735, Email : humas@undiksha.ac.id
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-light mb-auto" style="margin-top: 10px;">
                    <b>&emsp; UNIT</b>
                    <hr color="white">
                    <?php foreach ($opt_unit as $unit) { ?>
                        <ul>
                            <li style="line-height: 5px;"><a class="text-light" href="<?= base_url('Jdih/unit/') . md5($unit['id_unit']); ?>"><?= $unit['nama_unit']; ?></a><br></li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </footer>
</div>


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


</body>

</html>