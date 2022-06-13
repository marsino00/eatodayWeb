<?= $this->extend('layouts/layout') ?>

<?= $this->section('sections') ?>
<!-- Vista de la gestió de Comandes -->

<section id="why-us" class="why-us">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <p>Gestió de Comandes</p>
        </div>

        <div id="comandes" class="row">
        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script>
    // let establiments = document.getElementById("establiments");
    // Api.obtenirEstabliments(establiments, "establiments");
</script>
<?= $this->endSection() ?>
</body>