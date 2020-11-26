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
    <link href="<?= base_url("assets/vendors/bootstrap/dist/css/bootstrap.min.css") ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url("assets/vendors/font-awesome/css/font-awesome.min.css") ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url("assets/vendors/nprogress/nprogress.css") ?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url("assets/vendors/iCheck/skins/flat/green.css") ?>" rel="stylesheet">
    <!-- custom style -->
    <link rel="stylesheet" href="<?= base_url('assets/build/css/style.css'); ?>">
    <!-- jQuery -->
    <script src="<?= base_url("assets/vendors/jquery/dist/jquery.min.js") ?>"></script>


</head>

<body class="bg-light">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow p-3 mb-5 bg-white rounded">
        <div class="container-fluid">
            <img src="<?= base_url('assets/images/new-LOGO.png'); ?>" class="img-fluid brand-logo navbar-brand" alt="Responsive image">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="col-lg-10">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= site_url('/'); ?>">Beranda <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Unit
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php foreach ($opt_unit as $unit) { ?>
                                    <a class="dropdown-item" href="<?= site_url('Jdih/unit/') . md5($unit['id_unit']); ?>"><?= $unit['nama_unit']; ?></a>
                                <?php } ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('Jdih/statistik'); ?>">Statistik</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php if ($this->session->userdata('email') != null) { ?>
                                <?php if ($this->session->userdata('role_id') == 1) { ?>
                                    <a href="<?= base_url('User'); ?>" class="nav-link">Dashboard</a>
                                <?php } ?>
                            <?php } ?>
                        </li>
                        <li class="nav-item">
                            <?php if ($this->session->userdata('email') == null) { ?>
                                <a href="<?= base_url('Auth'); ?>" class="nav-link">Login</a>
                            <?php } else { ?>
                                <a href="<?= base_url('Auth/logout'); ?>" class="nav-link">Logout</a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid" style="margin-top: 100px;">
        <div class="row">
            <?php $this->load->view($content); ?>
        </div>
    </div>