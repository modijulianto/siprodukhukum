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


</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <img src="<?= base_url('assets/images/new-LOGO.png'); ?>" class="img-fluid brand-logo navbar-brand" alt="Responsive image">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="col-lg-11">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Unit
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php foreach ($unit as $unit) { ?>
                                <a class="dropdown-item" href="<?= base_url('Jdih/') . md5($unit['id_unit']); ?>"><?= $unit['nama_unit']; ?></a>
                            <?php } ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Galeri</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-1">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?= base_url('Auth'); ?>" class="nav-link">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                asdasds
            </div>
        </div>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>