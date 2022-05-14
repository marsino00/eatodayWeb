<?= $this->extend('layouts/layout') ?>
<?= $this->section('sections') ?>

<section id="about" class="about">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                <div class="about-img">
                    <img src="/assets/img/eatoday_logo_white.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                <h3>CheeseBurguer</h3>
                <p class="fst-italic">
                    Hamburguesa amb formatge amb carn de vedella de les vaques del Pirineu
                </p>
                <ul>
                    <li><i class="bi bi-circle-fill"></i> Experiències culinàries úniques</li>
                    <li><i class="bi bi-circle-fill"></i> Àpats de qualitat</li>
                    <li><i class="bi bi-circle-fill"></i> Comandes al establiment i per emportar</li>
                </ul>
                <!-- <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
              voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p> -->
            </div>
        </div>

    </div>
</section><!-- End About Section -->
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script src="/assets/js/Api.js"></script>
<script>
    // divCartes = document.getElementById("divCartes");

    // Api.obtenirPlats(<?= $codi_establiment ?>, <?= $id_categoria ?>, <?= $id_carta ?>, divPlats);
</script>
<?= $this->endSection() ?>