<?= $this->extend('layouts/layout') ?>
<?= $this->section('sections') ?>

<section id="categoria" class="menu section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <p>Cartes</p>
        </div>
        <div id="divCartes">

        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script src="/assets/js/Api.js"></script>
<script>
    divCartes = document.getElementById("divCartes");

    Api.obtenirCartes(<?= $codi_establiment ?>, <?= $id_categoria ?>, divCartes);
</script>
<?= $this->endSection() ?>