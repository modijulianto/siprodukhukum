<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= (isset($title)) ? $title : ""; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= (isset($meta)) ? $meta : ""; ?>">
    <meta name="author" content="Akamana Coffee">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/Undiksha.ico') ?>" style="width:16px; height:16px">

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <!-- Datatables -->
    <link href="<?= base_url("assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url("assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url("assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url("assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url("assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css") ?>" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="<?= base_url("assets/vendors/bootstrap/dist/css/bootstrap.min.css") ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url("assets/vendors/font-awesome/css/font-awesome.min.css") ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url("assets/vendors/nprogress/nprogress.css") ?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url("assets/vendors/iCheck/skins/flat/green.css") ?>" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?= base_url("assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css") ?>" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?= base_url("assets/vendors/jqvmap/dist/jqvmap.min.css") ?>" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="<?= base_url("assets/vendors/bootstrap-daterangepicker/daterangepicker.css") ?>" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="<?= base_url("assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css") ?>" rel="stylesheet" />

    <!-- Custom Theme Style -->
    <link href="<?= base_url("assets/build/css/custom.min.css") ?>" rel="stylesheet">
    <script language="JavaScript" type="text/javascript" src="<?= base_url("assets/build/js/google_chart/loader.js") ?>"></script>

    <!-- autocomplete -->
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/build/js/jquery.autocomplete.js"></script> -->



</head>

<body class="nav-md">