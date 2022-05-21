<?= $this->extend('layouts/layout') ?>
<?= $this->section('css') ?>
<style>
    h4:hover {
        color: tomato;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('sections') ?>
<!-- Vista de la carta -->
<section id="categoria" class="menu section-bg">
    <div class="container" data-aos="fade-up">

        <div style="padding-top: 30px;" class="section-title">
            <p>Plats</p>
        </div>

        <div id="divPlats" class="row" data-aos="fade-up" data-aos-delay="200">

        </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script>
    divCartes = document.getElementById("divCartes");

    Api.obtenirPlats(<?= $codi_establiment ?>, <?= $id_categoria ?>, <?= $id_carta ?>, divPlats, <?= json_encode($rols); ?>);
</script>
<?= $this->endSection() ?>