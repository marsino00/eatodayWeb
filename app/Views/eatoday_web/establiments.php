<?= $this->extend('layouts/layout') ?>

<?= $this->section('sections') ?>
<!-- Vista del llistat d'establiments -->

<section id="why-us" class="why-us">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <p>Els nostres establiments</p>
        </div>

        <div id="establiments" class="row">
        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script>
    let establiments = document.getElementById("establiments");
    Api.obtenirEstabliments(establiments, "establiments");
</script>
<?= $this->endSection() ?>
</body>