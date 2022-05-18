<?= $this->extend('layouts/layout') ?>
<?= $this->section('css') ?>
<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 40%;
        border-radius: 5px;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    img {
        border-radius: 5px 5px 0 0;
    }

    .container {
        padding: 2px 16px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('sections') ?>

<section class="menu section-bg">
    <div id="seccioCistella" class="container" data-aos="fade-up">
        <div style="padding-top: 30px;" class="section-title">

            <p>Cistella</p>
            <h5>Usuari: <?= $usuari->email ?></h5>
        </div>


    </div>


</section>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script src="/assets/js/Api.js"></script>
<script>
    var cistella = JSON.parse(localStorage.getItem("cistella"));
    var llistatCistella = document.getElementById("llistatCistella");
    for (let index = 0; index < cistella.length; index++) {
        var seccioCistella = document.getElementById("seccioCistella");
        var div = document.createElement("div");
        div.setAttribute("class", "card my-5");
        var div2 = document.createElement("div");
        div2.setAttribute("class", "container");
        div2.style = "display:flex;justify-content: space-between;";
        var div3 = document.createElement("div");
        var h4 = document.createElement("h4");
        h4.style = "color:tomato";

        h4.textContent = cistella[index].nom;
        var p = document.createElement("p");
        // console.log(cistella[index].descripcio)
        p.textContent = cistella[index].descripcio;
        p.style = "color:black"
        var span = document.createElement("span");
        span.style = "color: black;align-self: center;";
        span.textContent = cistella[index].preu + " €";
        div3.appendChild(h4);
        div3.appendChild(p);
        div2.appendChild(div3);
        div2.appendChild(span);
        div.appendChild(div2);
        var hr = document.createElement("hr");

        seccioCistella.appendChild(div);
        seccioCistella.appendChild(hr);


    }
</script>
<?= $this->endSection() ?>