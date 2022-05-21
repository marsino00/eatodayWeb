<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>eatoday</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/eatoday_logo.png" rel="icon">
    <link href="/assets/img/eatoday_logo.png" rel="apple-touch-icon">

    <!-- Google /Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- arxiu /CSS Files -->
    <link href="/assets/arxiu/animate.css/animate.min.css" rel="stylesheet">
    <link href="/assets/arxiu/aos/aos.css" rel="stylesheet">
    <link href="/assets/arxiu/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/arxiu/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/arxiu/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/arxiu/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/arxiu/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <?= $this->renderSection('css') ?>


</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-center justify-content-md-between">
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-cente">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0"><a href="<?= base_url() . '#' ?>">Ea<span style="color: red;">t</span>oday</a></h1>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto " href="<?= base_url() . '#' ?>">Home</a></li>
                    <li><a class="nav-link scrollto <?php if (str_contains(base_url(), "#about")) echo 'active'; ?>" href="<?= base_url() . '#about' ?>">Valors</a></li>

                    <li><a class="nav-link scrollto <?php if (str_contains(base_url(), "establiments")) echo 'active'; ?>" href="<?= base_url() . '/establiments' ?> ">Establiments</a></li>
                    <li><a class="nav-link scrollto <?php if (str_contains(base_url(), "#specials")) echo 'active'; ?>" href="<?= base_url() . '#specials' ?>">Donar-se d'alta</a></li>
                    <li><a class="nav-link scrollto<?php if (str_contains(base_url(), "#contact")) echo 'active'; ?>" href="<?= base_url() . '#contact' ?>">Contactar</a></li>
                    <li><a class="nav-link scrollto<?php if (str_contains(base_url(), "introduirCodi")) echo 'active'; ?>" href="<?= base_url() . '/introduirCodi' ?>">Insertar codi</a></li>
                    <li><a class="nav-link scrollto<?php if (str_contains(base_url(), "cistella")) echo 'active'; ?>" href="<?= base_url() . '/cistella' ?>">Veure cistella</a></li>
                    <li><a class="nav-link scrollto" href="<?= base_url() . '/crud/usuaris' ?>">Administració</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
            <a href="<?= $ruta ?>" class="book-a-table-btn scrollto d-none d-lg-flex"><?= $text ?></a>
            <a href="<?= $ruta2 ?>" id="<?= $text2 ?>" class="book-a-table-btn scrollto d-none d-lg-flex"><?= $text2 ?></a>

        </div>
    </header><!-- End Header -->

    <?= $this->renderSection('sections') ?>

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container">
            <div class="copyright">
                &copy <strong><span>David Ribalaigua & Roger Marsino</span></strong>
            </div>
        </div>
    </footer>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- arxiu JS Files -->
    <script src="/assets/arxiu/aos/aos.js"></script>
    <script src="/assets/arxiu/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/arxiu/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/arxiu/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/arxiu/php-email-form/validate.js"></script>
    <script src="/assets/arxiu/swiper/swiper-bundle.min.js"></script>


    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>
    <script>
        document.getElementById("<?= $text2 ?>").addEventListener("click", function() {
            window.sessionStorage.removeItem("token");
            window.sessionStorage.removeItem("taula");
            window.sessionStorage.removeItem("cistella");
        })
    </script>
    <script src="/assets/js/Api.js"></script>

    <?= $this->renderSection('js') ?>

</body>