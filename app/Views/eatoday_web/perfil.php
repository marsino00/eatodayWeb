<?= $this->extend('layouts/layout') ?>
<?= $this->section('css') ?>
<style>
</style>
<?= $this->endSection() ?>

<?= $this->section('sections') ?>
<section class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Perfil</h2>
            <p>Perfil</p>
        </div>
    </div>

    <div class="container" data-aos="fade-up">

        <div class="row mt-1">
            <div class="col-lg-4">
                <h3>Dades del usuari</h3>
                <p>Nom d'usuari: <?= $usuari->username ?></p>
                <p>Email: <?= $usuari->email ?></p>
                <p>Nom: <?= $usuari->name ?></p>
                <p>Cognoms: <?= $usuari->surnames ?></p>
            </div>

        </div>
        <hr>
        <div class="col-lg-8 mt-5 mt-lg-5">

            <h5>Canvi de contrasenya</h5>
            <div class="php-email-form">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <input type="text" name="newPassword" class="form-control" id="newPassword" placeholder="Nova contrasenya" required>
                    </div>

                </div>
                <div class="text-center"><button id="canviarPass" type="submit">Canviar contrasenya</button></div>
            </div>


        </div>
        <hr>
        <div class="col-lg-8 mt-5 mt-lg-5">
            <h5>Actualització de dades</h5>
            <div class="php-email-form">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nom" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" name="surnames" class="form-control" id="surnames" placeholder="Cognoms" required>
                    </div>

                </div>
                <div class="text-center"><button id="canviarUser" type="submit">Actualitzar dades</button></div>
            </div>


        </div>


    </div>
</section><!-- End Contact Section -->

<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script>
    document.getElementById("canviarPass").addEventListener("click", function() {
        Api.canviarContrasenya(" <?= $usuari->email ?>", document.getElementById("newPassword").value)
    })
    document.getElementById("canviarUser").addEventListener("click", function() {
        Api.canviarUser(" <?= $usuari->email ?>", document.getElementById("name").value, document.getElementById("surnames").value)
    })


    // divCartes = document.getElementById("divCartes");
</script>
<?= $this->endSection() ?>