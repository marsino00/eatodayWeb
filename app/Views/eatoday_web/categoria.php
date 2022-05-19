<?= $this->extend('layouts/layout') ?>
<?= $this->section('css') ?>
<style>
    h4:hover {
        color: tomato;
    }
</style>
<?= $this->endSection() ?>

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
<script>
    divCartes = document.getElementById("divCartes");

    Api.obtenirCartes(<?= $codi_establiment ?>, <?= $id_categoria ?>, divCartes);
</script>
<?= $this->endSection() ?>