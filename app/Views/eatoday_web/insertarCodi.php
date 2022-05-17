<?= $this->extend('layouts/layout') ?>
<?= $this->section('css') ?>
<style>
    #linkEstabliments {
        background: white;
        border: 0;
        padding: 10px 35px;
        color: black;
        transition: 0.4s;
        border-radius: 50px;

    }
</style>
<?= $this->endSection() ?>

<?= $this->section('sections') ?>

<section class="contact">

    <div class="col-lg-8 mt-5 mt-lg-5 m-5">

        <h2>Introduir codi</h2>
        <div class="php-email-form my-5">
            <div class="row">
                <div class="col-md-6 form-group">
                    <input type="text" name="codi" class="form-control" id="codi" maxlength="11" placeholder="codi_establiment - codi_taula" required>
                </div>

            </div>
            <div class="text-center"><button id="canviarPass" type="submit">Entrar amb codi</button></div>

        </div>
        <hr class="my-5">
        <div class="php-email-form my-5">
            <div class="text-center"><a href="/establiments" id="linkEstabliments">Accedir a tots els establiments</a></div>
        </div>

    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script src="/assets/js/Api.js"></script>
<script>
    var codi = document.getElementById("codi");
    codi.addEventListener("keyup", function(evt) {
        if (codi.value.length == 4) {
            codi.value = codi.value + " - ";
            console.log(codi.value.length);
        }
    });

    // console.log(codi.value.length);
</script>
<?= $this->endSection() ?>