<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- SITE TITTLE -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title; ?></title>

        <!-- PLUGINS CSS STYLE -->
        <link href="<?= BASE_URL; ?>/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="<?= BASE_URL; ?>/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= BASE_URL; ?>/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- Owl Carousel -->
        <link href="<?= BASE_URL; ?>/plugins/slick-carousel/slick/slick.css" rel="stylesheet">
        <link href="<?= BASE_URL; ?>/plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
        <!-- Fancy Box -->
        <link href="<?= BASE_URL; ?>/plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
        <link href="<?= BASE_URL; ?>/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
        <link href="<?= BASE_URL; ?>/plugins/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css" rel="stylesheet">
        <!-- CUSTOM CSS -->
        <link href="<?= BASE_URL; ?>/css/style.css" rel="stylesheet">

        <!-- FAVICON -->
        <link href="<?= BASE_URL; ?>/img/favicon.png" rel="shortcut icon">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    </head>

    <body class="body-wrapper">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg  navigation">
                            <a class="navbar-brand" href="index.html">
                                <img src="images/logo.png" alt="">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <?php 
                                print render_menu_links($links);
                                ?>
                                <ul class="navbar-nav ml-auto mt-10">
                                    <li class="nav-item">
                                        <a class="nav-link login-button" href="index.html">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link add-button" href="#"><i class="fa fa-plus-circle"></i> Add Listing</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </section>