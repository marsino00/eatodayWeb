<?= $this->extend('layouts/layout') ?>

<?= $this->section('sections') ?>

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
<script src="/assets/js/Api.js"></script>
<script>
    divEstabliment = document.getElementById("establiments")
    Api.obtenirUnEstabliment(<?= $codi_establiment ?>, divEstabliment);
</script>
<?= $this->endSection() ?>
</body>