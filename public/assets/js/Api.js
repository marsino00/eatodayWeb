class Api {
  static obtenirEstabliments(establiments, ruta) {
    var myHeaders = new Headers();
    myHeaders.append("Cookie", "ci_session=ppkii8asklu3hft850re0tfpjqruh905");

    var requestOptions = {
      method: "GET",
      headers: myHeaders,
      redirect: "follow",
    };

    fetch("/api/establiment/list", requestOptions)
      .then((response) => response.text())
      .then((result) => {
        // console.log(JSON.parse(result).data.length);
        let length = 0;
        if (ruta == "home") length = 3;
        if (ruta == "establiments") length = JSON.parse(result).data.length;
        for (let index = 0; index < length; index++) {
          let a = document.createElement("a");
          a.href =
            "./establiments/" + JSON.parse(result).data[index].codi_establiment;
          let div = document.createElement("div");
          div.setAttribute("class", "col-lg-4 mt-4 mt-lg-0");
          div.style = "margin-bottom: 1%";
          let divChild = document.createElement("div");
          divChild.setAttribute("class", "box");
          divChild.setAttribute("data-aos", "zoom-in");
          divChild.setAttribute("data-aos-delay", "200");
          let span = document.createElement("span");
          span.textContent = JSON.parse(result).data[index].nom_establiment;
          divChild.appendChild(span);
          let h4 = document.createElement("h4");
          h4.textContent = JSON.parse(result).data[index].tipus_establiment;
          divChild.appendChild(h4);
          let p = document.createElement("p");
          p.textContent = JSON.parse(result).data[index].descripcio;
          divChild.appendChild(p);
          div.appendChild(a);
          a.appendChild(divChild);
          let p2 = document.createElement("p");
          let i = document.createElement("i");
          i.setAttribute("class", "bi bi-star-fill");
          if (JSON.parse(result).data[index].valoracio_mitjana.vm != null) {
            p2.textContent =
              JSON.parse(result).data[index].valoracio_mitjana.vm + " ";
          } else {
            p2.textContent = "No hi ha valoracions ";
          }

          p2.appendChild(i);
          divChild.appendChild(p2);
          establiments.appendChild(div);
        }
      })
      .catch((error) => console.log("error", error));
  }
  static obtenirUnEstabliment(
    codi_establiment,
    diVEstabliment,
    slider,
    slides
  ) {
    var myHeaders = new Headers();
    myHeaders.append("Cookie", "ci_session=urs6gejf1tupjlp4gbgobn7ldubufotk");

    var requestOptions = {
      method: "GET",
      headers: myHeaders,
      redirect: "follow",
    };

    fetch("/api/establiment/show/" + codi_establiment, requestOptions)
      .then((response) => response.text())
      .then((result) => {
        for (
          let index = 0;
          index < JSON.parse(result).data[0].fotos.length;
          index++
        ) {
          let a = document.createElement("a");
          a.href = "#slide-" + index;
          var img = new Image();
          img.src =
            "data:image/png;base64," + JSON.parse(result).data[0].fotos[index];
          img.setAttribute("id", "slide-" + index);
          slides.appendChild(img);
          slider.appendChild(a);
        }
        console.log(JSON.parse(result).data);
        let h1 = document.createElement("h1");
        h1.textContent = JSON.parse(result).data[0].nom_establiment;
        let h5 = document.createElement("h5");
        h5.textContent = JSON.parse(result).data[0].tipus_establiment;
        let p = document.createElement("p");
        p.textContent = JSON.parse(result).data[0].descripcio;

        let i = document.createElement("i");
        i.setAttribute("class", "bi bi-instagram");
        let div = document.createElement("div");
        let div2 = document.createElement("div");
        let div3 = document.createElement("div");
        // i.setAttribute("class", "bi bi-instagram");
        let i2 = document.createElement("i");
        i2.setAttribute("class", "bi bi-facebook");
        let i3 = document.createElement("i");
        i3.setAttribute("class", "bi bi-twitter");
        let a = document.createElement("a");
        let a2 = document.createElement("a");
        let a3 = document.createElement("a");

        //pais,adreça, telefon, horari

        a.href = JSON.parse(result).data[0].rs_instagram;
        div.appendChild(a);
        a.appendChild(i);
        console.log(JSON.parse(result).data[0].rs_facebook);
        a2.href = JSON.parse(result).data[0].rs_facebook;
        div2.appendChild(a2);
        a2.appendChild(i2);

        a3.href = JSON.parse(result).data[0].rs_twitter;
        div3.appendChild(a3);
        a3.appendChild(i3);
        // li.textContent = JSON.parse(result).data.rs_instagram;

        diVEstabliment.appendChild(h1);
        diVEstabliment.appendChild(h5);
        diVEstabliment.appendChild(p);
        let divGeneral = document.createElement("div");
        divGeneral.style = "display:flex;justify-content: space-around";

        let ul = document.createElement("ul");
        let li = document.createElement("li");
        let li2 = document.createElement("li");
        let li3 = document.createElement("li");
        let li4 = document.createElement("li");
        li.textContent = "Adreça: " + JSON.parse(result).data[0].adreca;
        ul.appendChild(li);
        li2.textContent = "Telèfon: " + JSON.parse(result).data[0].telefon;
        ul.appendChild(li2);
        li3.textContent = "Horari: " + JSON.parse(result).data[0].horari;
        ul.appendChild(li3);
        if (JSON.parse(result).data[0].valoracio_mitjana.vm != null) {
          li4.textContent =
            "Valoració mitjana: " +
            JSON.parse(result).data[0].valoracio_mitjana.vm +
            "/5 ";
        } else {
          li4.textContent = "Valoració mitjana: Sense valoracions";
        }

        let i5 = document.createElement("i");
        i5.setAttribute("class", "bi bi-star-fill");
        li4.appendChild(i5);
        ul.appendChild(li4);
        // li.appendChild(icon);
        diVEstabliment.appendChild(ul);
        divGeneral.appendChild(div);
        divGeneral.appendChild(div2);
        divGeneral.appendChild(div3);
        diVEstabliment.appendChild(divGeneral);
        window.sessionStorage.setItem(
          "codi_establiment",
          JSON.parse(result).data[0].codi_establiment
        );
      })
      .catch((error) => console.log("error", error));
  }
  static obtenirCategories(codi_establiment, divCategories) {
    var myHeaders = new Headers();
    myHeaders.append("Cookie", "ci_session=pibnbs85019rdkc3iobh854m0qg4n6uc");

    var requestOptions = {
      method: "GET",
      headers: myHeaders,
      redirect: "follow",
    };

    fetch("/api/categoria/list/" + codi_establiment, requestOptions)
      .then((response) => response.text())
      .then((result) => {
        for (let index = 0; index < JSON.parse(result).data.length; index++) {
          let div = document.createElement("div");

          let h4 = document.createElement("h4");
          h4.textContent = JSON.parse(result).data[index].nom + " ";
          let p = document.createElement("p");
          let i = document.createElement("i");
          i.setAttribute("class", "bi bi-arrow-right-circle");
          i.style = "font-size: 20px;color: tomato;";

          h4.appendChild(i);
          let a = document.createElement("a");
          let hr = document.createElement("hr");
          p.textContent = JSON.parse(result).data[index].descripcio;
          // div.appendChild(h4);
          a.href =
            "/establiments/" +
            codi_establiment +
            "/categories/" +
            JSON.parse(result).data[index].id_categoria;
          a.style = "color:white";

          a.appendChild(h4);
          div.appendChild(a);
          div.appendChild(p);
          div.appendChild(hr);
          divCategories.appendChild(div);
        }
      })
      .catch((error) => console.log("error", error));
  }

  static obtenirValoracions(codi_establiment, divValoracions) {
    var myHeaders = new Headers();
    myHeaders.append("Cookie", "ci_session=7fqf75p13gs9a0kr2ul5go4068u404h9");

    var requestOptions = {
      method: "GET",
      headers: myHeaders,
      redirect: "follow",
    };

    fetch("/api/puntuacio/list/" + codi_establiment, requestOptions)
      .then((response) => response.text())
      .then((result) => {
        console.log(result);
        for (let index = 0; index < JSON.parse(result).data.length; index++) {
          let div = document.createElement("div");

          div.setAttribute("class", "col-lg-6 menu-item filter-starters");
          let h1 = document.createElement("h1");
          h1.textContent =
            JSON.parse(result).data[index].name +
            " " +
            JSON.parse(result).data[index].surnames;
          div.appendChild(h1);
          let h6 = document.createElement("h6");
          h6.textContent = JSON.parse(result).data[index].data_publicacio;
          console.log(h6);
          div.appendChild(h6);
          let p = document.createElement("p");
          p.textContent = JSON.parse(result).data[index].comentari;
          div.appendChild(p);
          let h3 = document.createElement("h3");
          h3.textContent = JSON.parse(result).data[index].valoracio;
          let i5 = document.createElement("i");
          let hr = document.createElement("hr");
          i5.setAttribute("class", "bi bi-star-fill");
          h3.appendChild(i5);
          div.appendChild(h3);
          div.appendChild(hr);
          divValoracions.appendChild(div);
        }
      })
      .catch((error) => console.log("error", error));
  }

  static obtenirCartes(codi_establiment, id_categoria, divCartes) {
    var myHeaders = new Headers();
    myHeaders.append("Cookie", "ci_session=pibnbs85019rdkc3iobh854m0qg4n6uc");

    var requestOptions = {
      method: "GET",
      headers: myHeaders,
      redirect: "follow",
    };

    fetch("/api/carta/list/" + id_categoria, requestOptions)
      .then((response) => response.text())
      .then((result) => {
        for (let index = 0; index < JSON.parse(result).data.length; index++) {
          let div = document.createElement("div");

          let h4 = document.createElement("h4");
          h4.textContent = JSON.parse(result).data[index].nom + " ";
          let p = document.createElement("p");
          let i = document.createElement("i");
          i.setAttribute("class", "bi bi-arrow-right-circle");
          i.style = "font-size: 20px;color: tomato;";

          h4.appendChild(i);
          let a = document.createElement("a");
          let hr = document.createElement("hr");
          p.textContent = JSON.parse(result).data[index].descripcio;
          // div.appendChild(h4);
          a.href =
            "/establiments/" +
            codi_establiment +
            "/categories/" +
            id_categoria +
            "/cartes/" +
            JSON.parse(result).data[index].id_carta;
          a.style = "color:white";

          a.appendChild(h4);
          div.appendChild(a);
          div.appendChild(p);
          div.appendChild(hr);
          divCartes.appendChild(div);
        }
      })
      .catch((error) => console.log("error", error));
  }

  static obtenirPlats(
    codi_establiment,
    id_categoria,
    id_carta,
    divPlats,
    rols
  ) {
    var myHeaders = new Headers();
    myHeaders.append("Cookie", "ci_session=pibnbs85019rdkc3iobh854m0qg4n6uc");

    var requestOptions = {
      method: "GET",
      headers: myHeaders,
      redirect: "follow",
    };

    fetch("/api/plat/list/" + id_carta, requestOptions)
      .then((response) => response.text())
      .then((result) => {
        var esClient = false;
        for (var i = 0; i < rols.length; i++) {
          console.log(rols[i]);
          if (rols[i] == "usuari client") {
            esClient = true;
          }
        }
        for (let index = 0; index < JSON.parse(result).data.length; index++) {
          let div = document.createElement("div");
          div.setAttribute("class", "col-lg-6 menu-item");
          var img = new Image();

          if (JSON.parse(result).data[index].fotos[0] == undefined) {
            img.src = "/assets/img/eatoday_logo_white.png";
          } else {
            img.src =
              "data:image/png;base64," +
              JSON.parse(result).data[index].fotos[0];
          }

          img.setAttribute("class", "menu-img");
          img.style = "border:0px";
          div.appendChild(img);
          let div2 = document.createElement("div");
          div2.setAttribute("class", "menu-content");

          let a = document.createElement("a");
          a.href =
            "/establiments/" +
            codi_establiment +
            "/categories/" +
            id_categoria +
            "/cartes/" +
            id_carta +
            "/plats/" +
            JSON.parse(result).data[index].id_plat;
          a.style = "color:white";
          let h4 = document.createElement("h4");

          h4.textContent = JSON.parse(result).data[index].nom;
          a.appendChild(h4);
          let span = document.createElement("span");
          span.textContent = JSON.parse(result).data[index].preu + " €";

          div2.appendChild(a);
          div2.appendChild(span);
          let button = document.createElement("button");
          let div3 = document.createElement("div");
          div3.setAttribute("class", "menu-ingredients");
          div3.textContent =
            JSON.parse(result).data[index].descripcio_breu + " ";
          // console.log(JSON.parse(window.localStorage.getItem("cistella")));
          if (esClient) {
            button.addEventListener("click", function () {
              var cistella = [];
              if (window.sessionStorage.getItem("cistella")) {
                for (
                  let index = 0;
                  index <
                  JSON.parse(window.sessionStorage.getItem("cistella")).length;
                  index++
                ) {
                  cistella.push(
                    JSON.parse(window.sessionStorage.getItem("cistella"))[index]
                  );
                }
              }
              var plat = {
                id_plat: JSON.parse(result).data[index].id_plat,
                nom: JSON.parse(result).data[index].nom,
                preu: JSON.parse(result).data[index].preu,
                descripcio: JSON.parse(result).data[index].descripcio_breu,
              };
              cistella.push(plat);
              window.sessionStorage.setItem(
                "cistella",
                JSON.stringify(cistella)
              );
              alert("Plat afegit correctament a la cistella");
            });
            button.textContent = "Afegir";
            div3.appendChild(button);
          }

          div.appendChild(div2);
          div.appendChild(div3);
          divPlats.appendChild(div);
        }
      })
      .catch((error) => console.log("error", error));
  }
  static obtenirAlergens(id_plat, divAlergens) {
    var myHeaders = new Headers();
    myHeaders.append("Cookie", "ci_session=7fqf75p13gs9a0kr2ul5go4068u404h9");

    var requestOptions = {
      method: "GET",
      headers: myHeaders,
      redirect: "follow",
    };

    fetch("/api/alergen/list/" + id_plat, requestOptions)
      .then((response) => response.text())
      .then((result) => {
        for (let index = 0; index < JSON.parse(result).data.length; index++) {
          let h5 = document.createElement("h5");
          h5.textContent = JSON.parse(result).data[index].descripcio;
          divAlergens.appendChild(h5);
          let hr = document.createElement("hr");
          divAlergens.appendChild(hr);
        }
      })
      .catch((error) => console.log("error", error));
  }
  static obtenirSuplements(id_plat, divSuplements, rols) {
    var myHeaders = new Headers();
    myHeaders.append("Cookie", "ci_session=7fqf75p13gs9a0kr2ul5go4068u404h9");

    var requestOptions = {
      method: "GET",
      headers: myHeaders,
      redirect: "follow",
    };

    fetch("/api/suplement/list/" + id_plat, requestOptions)
      .then((response) => response.text())
      .then((result) => {
        var esClient = false;
        for (var i = 0; i < rols.length; i++) {
          console.log(rols[i]);
          if (rols[i] == "usuari client") {
            esClient = true;
          }
        }
        for (let index = 0; index < JSON.parse(result).data.length; index++) {
          let h5 = document.createElement("h5");
          h5.textContent = JSON.parse(result).data[index].descripcio;
          let span = document.createElement("span");
          span.textContent = JSON.parse(result).data[index].preu + " €";
          let input = document.createElement("input");
          if (esClient) {
            input.type = "checkbox";
            input.style = "transform:scale(1.5);accent-color: tomato;";
            input.id = JSON.parse(result).data[index].id_suplement;
            divSuplements.appendChild(input);
            // input.addEventListener("check", function (event) {
            //   if (this.checked) {
            //     console.log("Checkbox is  checked..");
            //   } else {
            //     console.log("Checkbox is not checked..");
            //   }
            // });
          }

          // h5.appendChild(span);

          let hr = document.createElement("hr");

          divSuplements.appendChild(h5);
          divSuplements.appendChild(span);
          divSuplements.appendChild(hr);
        }
      })
      .catch((error) => console.log("error", error));
  }

  static obtenirPlat(
    id_carta,
    id_plat,
    divPlatImg,
    divPlatInfo,
    rols,
    divSuplements
  ) {
    var myHeaders = new Headers();
    myHeaders.append("Cookie", "ci_session=pibnbs85019rdkc3iobh854m0qg4n6uc");

    var requestOptions = {
      method: "GET",
      headers: myHeaders,
      redirect: "follow",
    };

    fetch("/api/plat/list/" + id_carta, requestOptions)
      .then((response) => response.text())
      .then((result) => {
        var esClient = false;
        for (var i = 0; i < rols.length; i++) {
          console.log(rols[i]);
          if (rols[i] == "usuari client") {
            esClient = true;
          }
        }
        let obj = JSON.parse(result).data[id_plat - 1];
        // for (let index = 0; index < JSON.parse(result).data.length; index++) {
        let img = document.createElement("img");
        img.src = "data:image/png;base64," + obj.fotos[0];
        if (obj.fotos[0] == undefined) {
          img.src = "/assets/img/eatoday_logo_white.png";
        } else {
          img.src = "data:image/png;base64," + obj.fotos[0];
        }
        divPlatImg.appendChild(img);
        let h3 = document.createElement("h1");
        h3.textContent = obj.nom;
        let p = document.createElement("p");
        p.textContent = obj.preu + " €";
        let p2 = document.createElement("p");
        p2.textContent = obj.descripcio_detallada;
        divPlatInfo.appendChild(h3);
        divPlatInfo.appendChild(p);
        divPlatInfo.appendChild(p2);
        let button = document.createElement("button");
        console.log(JSON.parse(window.sessionStorage.getItem("cistella")));
        if (esClient) {
          button.addEventListener("click", function () {
            var cistella = [];
            if (window.sessionStorage.getItem("cistella")) {
              for (
                let index = 0;
                index <
                JSON.parse(window.sessionStorage.getItem("cistella")).length;
                index++
              ) {
                cistella.push(
                  JSON.parse(window.sessionStorage.getItem("cistella"))[index]
                );
              }
            }
            var aSupl = [];
            for (
              let index = 0;
              index < divSuplements.childNodes.length;
              index++
            ) {}

            var plat = {
              nom: obj.nom,
              preu: obj.preu,
              descripcio: obj.descripcio_breu,
            };
            cistella.push(plat);
            alert("Plat afegit correctament a la cistella");
            window.sessionStorage.setItem("cistella", JSON.stringify(cistella));
          });
          button.textContent = "Afegir";
          divPlatInfo.appendChild(button);
        }
      })
      .catch((error) => console.log("error", error));
  }

  static canviarContrasenya(email, newPassword) {
    var myHeaders = new Headers();

    myHeaders.append(
      "Authorization",
      "Bearer " + window.sessionStorage.getItem("token")
    );
    myHeaders.append("Content-Type", "application/json");

    var raw = JSON.stringify({
      email: email,
      password: newPassword,
    });

    var requestOptions = {
      method: "POST",
      headers: myHeaders,
      body: raw,
      redirect: "follow",
    };

    fetch("/api/user/modifyPassword", requestOptions)
      .then((response) => response.text())
      .then((result) => {
        console.log(result);
        window.sessionStorage.setItem("token", JSON.parse(result).refreshToken);
        alert("Contrasenya canviada correctament");
      })
      .catch((error) => alert(error));
  }

  static canviarUser(email, name, surnames) {
    var myHeaders = new Headers();
    myHeaders.append(
      "Authorization",
      "Bearer " + window.sessionStorage.getItem("token")
    );
    myHeaders.append("Content-Type", "application/json");

    var raw = JSON.stringify({
      email: email,
      name: name,
      surnames: surnames,
    });
    var requestOptions = {
      method: "POST",
      headers: myHeaders,
      body: raw,
      redirect: "follow",
    };

    fetch("/api/user/modifyUser", requestOptions)
      .then((response) => response.text())
      .then((result) => {
        alert("Dades actualitzades correctament");
        window.sessionStorage.setItem("token", JSON.parse(result).refreshToken);
      })
      .catch((error) => console.log("error", error));
  }
  static logIn(email, password) {
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    myHeaders.append("Cookie", "ci_session=ek2mm3m1101kkuv516q7ubkici930na2");

    var raw = JSON.stringify({
      email: email,
      password: password,
    });

    var requestOptions = {
      method: "POST",
      headers: myHeaders,
      body: raw,
      redirect: "follow",
    };

    fetch("/api/user/login", requestOptions)
      .then((response) => response.text())
      .then((result) => {
        window.sessionStorage.setItem("token", JSON.parse(result).token);
      })
      .catch((error) => console.log("error", error));
  }
  static obtenirTaules(codi_establiment, divTaules) {
    var myHeaders = new Headers();
    myHeaders.append("Cookie", "ci_session=lq0dfn8vj4t0417cd3cfeekb35m8fehc");

    var requestOptions = {
      method: "GET",
      headers: myHeaders,
      redirect: "follow",
    };

    fetch("/api/taula/list/" + codi_establiment, requestOptions)
      .then((response) => response.text())
      .then((result) => {
        var res = JSON.parse(result).data;
        var select = document.createElement("select");
        for (let index = 0; index < res.length; index++) {
          // console.log(res[index].codi_taula);
          var opt = document.createElement("option");
          opt.value = res[index].codi_taula;
          opt.innerHTML = res[index].codi_taula;
          select.appendChild(opt);
        }
        console.log(divTaules);
        divTaules.appendChild(select);
      })
      .catch((error) => console.log("error", error));
  }
  static crearComanda(comensals, codi_taula, id_client, divPDF) {
    var myHeaders = new Headers();
    myHeaders.append(
      "Authorization",
      "Bearer " + window.sessionStorage.getItem("token")
    );
    myHeaders.append("Content-Type", "application/json");

    var raw = JSON.stringify({
      estat_comanda: "PAGAT",
      comensals: comensals,
      codi_taula: codi_taula,
      email: id_client,
    });

    var requestOptions = {
      method: "POST",
      headers: myHeaders,
      body: raw,
      redirect: "follow",
    };

    fetch("/api/comanda/add", requestOptions)
      .then((response) => response.text())
      .then((result) => {
        window.sessionStorage.setItem("token", JSON.parse(result).refreshToken);
        // console.log(window.sessionStorage.getItem("token"));
        // console.log(JSON.parse(result));
        // console.log(result);
        console.log("IDCP,AMDA");
        console.log(JSON.parse(result));
        this.crearPlatComanda(JSON.parse(result).data.id_comanda);
        var h3 = document.createElement("h3");
        h3.textContent = "Veure PDF de la comanda";
        var a = document.createElement("a");
        a.href = "/comandaPDF/" + JSON.parse(result).data.id_comanda;
        a.textContent = "Obrir PDF";
        divPDF.appendChild(h3);
        divPDF.appendChild(a);
      })
      .catch((error) => console.log("error", error));
  }
  static crearPlatComanda(id_comanda) {
    // console.log(
    //   JSON.parse(window.sessionStorage.getItem("cistella"))[0].id_plat
    // );
    var arrayPlatsComanda = [];
    for (
      let index = 0;
      index < JSON.parse(window.sessionStorage.getItem("cistella")).length;
      index++
    ) {
      let id_plat = JSON.parse(window.sessionStorage.getItem("cistella"))[index]
        .id_plat;
      // console.log(id_plat);
      let obj = {
        id_plat: id_plat,
        id_comanda: id_comanda,
        estat_plat: "DEMANAT",
      };
      arrayPlatsComanda.push(obj);
    }
    console.log(arrayPlatsComanda);
    var myHeaders = new Headers();
    myHeaders.append(
      "Authorization",
      "Bearer " + window.sessionStorage.getItem("token")
    );
    myHeaders.append("Content-Type", "application/json");

    var raw = JSON.stringify({
      data: arrayPlatsComanda,
    });

    var requestOptions = {
      method: "POST",
      headers: myHeaders,
      body: raw,
      redirect: "follow",
    };

    fetch("/api/platcomanda/add", requestOptions)
      .then((response) => response.text())
      .then((result) => {
        console.log(result);
        window.sessionStorage.setItem("token", JSON.parse(result).refreshToken);
        alert("Comanda creada correctament");
      })
      .catch((error) => console.log("error", error));
  }
  static afegirPuntuacio(valoracio, comentari, user) {
    let email = user.email;
    var myHeaders = new Headers();
    myHeaders.append(
      "Authorization",
      "Bearer " + window.sessionStorage.getItem("token")
    );
    myHeaders.append("Content-Type", "application/json");
    myHeaders.append("Cookie", "ci_session=pfpsgr1dpe989fp4kr0b3foh3rb5v8t3");

    var raw = JSON.stringify({
      valoracio: valoracio,
      comentari: comentari,
      email: email,
      codi_establiment: window.sessionStorage.getItem("codi_establiment"),
    });

    var requestOptions = {
      method: "POST",
      headers: myHeaders,
      body: raw,
      redirect: "follow",
    };

    fetch("/api/puntuacio/add", requestOptions)
      .then((response) => response.text())
      .then((result) => {
        alert("Valoracio creada correctament");
        window.sessionStorage.setItem("token", JSON.parse(result).refreshToken);
      })
      .catch((error) => console.log("error", error));
  }
}
