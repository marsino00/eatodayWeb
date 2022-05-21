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
<!-- Vista de la cistella -->

<section class="menu section-bg">
    <div id="seccioCistella" class="container" data-aos="fade-up">
        <div style="padding-top: 20px;display:flex;justify-content: space-between;" class="section-title">
            <div>
                <h5>Usuari:
                    <?=
                    $usuari->email;
                    ?>
                </h5>
                <p>Cistella</p>
            </div>
            <button class="book-a-table-btn scrollto" style="background-color:black;" id="novaComanda">Començar nova comanda</button>

        </div>




    </div>
    <div class="container">
        <h3>Resum de la comanda:</h3>

        <p> Base: <span id="preuBase"></span> €</p>
        <p> IVA 10%: <span id="preuIVA"></span> €</p>
        <p><strong> Total: <span id="preuTotal"></span> €</strong></p>

    </div>
    <hr>
    <div class="container" id="pagamentOnline" hidden>
        <label for="Número de comensals">Introduir comensals: <input type="number" name="" id="comensalsOnline"></label>
        <h4 style="text-decoration: underline;padding-top:20px">Dades de pagament</h4>
        <!-- <h5>Introduir targeta:</h5> -->
        <label for="Número de la targeta">Número de la targeta: </label>
        <input id="numsTargeta" maxlength="19" type="text">
        <label for="Data de caducitat">Data de caducitat: </label>
        <input id="dataCaducitat" maxlength="5" type="text">

        <button class="book-a-table-btn scrollto" style="background-color:black;" id="pagar">Pagar</button>

    </div>
    <div class="container" id="pagamentFisic" hidden>
        <label for="Número de comensals">Introduir comensals: <input type="number" name="" id="numComensals"></label>
        <button class="book-a-table-btn scrollto" style="background-color:black;" id="avisarCambrer">Avisar cambrer</button>
    </div>
    <div id="pdf">
    </div>

</section>
<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script>
    document.getElementById("novaComanda").addEventListener("click", function() {
        // A clickar a nova comanda m'elimina els elements anteriors
        window.sessionStorage.removeItem("taula")
        window.sessionStorage.removeItem("cistella")
        window.location = "/introduirCodi"
    })
    var cistella = window.sessionStorage.getItem("cistella");
    // console.log(JSON.parse(cistella)[0]);

    //
    /**
     * Obtinc els items de la cistella i el codi de taula,
     * En cas de ser 0000 serà online i permetrà introduir la targeta
     * de crèdit
     */
    if (JSON.parse(sessionStorage.getItem("cistella"))) {
        console.log(window.sessionStorage.getItem("taula"));
        if (window.sessionStorage.getItem("taula") == 0000) {
            document.getElementById("pagamentOnline").hidden = false;
            var divPDF = document.getElementById("pdf");

            document.getElementById("pagar").addEventListener("click", function() {
                if (document.getElementById("comensalsOnline").value != "" && document.getElementById("numsTargeta").value != "" && document.getElementById("dataCaducitat").value != "") {
                    Api.crearComanda(document.getElementById("comensalsOnline").value, window.sessionStorage.getItem("taula"), " <?= $email ?>", divPDF);

                } else {
                    alert("No poden existir camps buits")
                }
            })


        } else {
            document.getElementById("pagamentFisic").hidden = false;
            document.getElementById("avisarCambrer").addEventListener("click", function() {

                var divPDF = document.getElementById("pdf");
                console.log(document.getElementById("numComensals").value);
                if (document.getElementById("numComensals").value != "") {
                    Api.crearComanda(document.getElementById("numComensals").value, window.sessionStorage.getItem("taula"), "<?= $email ?>", divPDF);
                } else {
                    alert("Introdueix el número de comensals")

                }

            })

        }
        /** Obtinc els elements de la cistella i els mostro,
         * també calculo el iva i mostro el total
         */
        var cistella = JSON.parse(sessionStorage.getItem("cistella"));
        var llistatCistella = document.getElementById("llistatCistella");
        var preuBase = 0.00;
        for (let index = 0; index < cistella.length; index++) {
            var seccioCistella = document.getElementById("seccioCistella");
            var div = document.createElement("div");
            div.setAttribute("class", "card my-3");
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
            preuBase = preuBase + parseFloat(cistella[index].preu);
            div3.appendChild(h4);
            div3.appendChild(p);
            div2.appendChild(div3);
            div2.appendChild(span);
            div.appendChild(div2);
            var hr = document.createElement("hr");

            seccioCistella.appendChild(div);
        }
        var hr = document.createElement("hr");
        seccioCistella.appendChild(hr);

        var varpreuBase = document.getElementById("preuBase");
        var preuIVA = document.getElementById("preuIVA");
        var preuTotal = document.getElementById("preuTotal");
        preuIVA.textContent = (preuBase * 0.1).toFixed(2);
        varpreuBase.textContent = (preuBase - preuIVA.textContent).toFixed(2);
        preuTotal.textContent = preuBase.toFixed(2);
    } else {

    }
</script>
<script>
    var suma = 0;
    numsTargeta = document.getElementById("numsTargeta");

    numsTargeta.addEventListener("keyup", function(evt) {
        var caracter = numsTargeta.value.charCodeAt(numsTargeta.value.length - 1); //Comprovo l'ultim caràcter del input
        var valorCaracter = numsTargeta.value.charAt(numsTargeta.value.length - 1);
        suma = suma + parseInt(valorCaracter);
        console.log(suma);

        if (caracter >= 48 && caracter <= 57) {
            // console.log("És un numero");
        } else { //Si no és un número l'elimino del input
            evt.preventDefault();
            numsTargeta.value = numsTargeta.value.slice(0, -1);

        }
        if (numsTargeta.value.length == 4 || numsTargeta.value.length == 9 || numsTargeta.value.length == 14) {
            //Afegeixo el guio despres de cada 4 nums en el cas que la suma sigui 10, sino elimino els 4 ultims nums


            numsTargeta.value = numsTargeta.value + "-";

        }
    })

    dataCaducitat = document.getElementById("dataCaducitat");

    dataCaducitat.addEventListener("keyup", function(evt) {
        var caracter = dataCaducitat.value.charCodeAt(dataCaducitat.value.length - 1); //Comprovo l'ultim caràcter del input

        if (caracter >= 48 && caracter <= 57) {
            // console.log("ES un numero");
        } else { //Si no és un número l'elimino del input
            evt.preventDefault();
            dataCaducitat.value = dataCaducitat.value.slice(0, -1);

        }
        if (dataCaducitat.value.length == 2) {
            if (dataCaducitat.value < 1 || dataCaducitat.value > 12) { //Comprovo que el mes es correcte
                alert("El mes de la data de caducitat no és correcte")
                dataCaducitat.value = "";
            } else { //Si ho és afegeixo una barra abans de l'any
                dataCaducitat.value = dataCaducitat.value + "/";
            }
        }
    })
</script>
<?= $this->endSection() ?>