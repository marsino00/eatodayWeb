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
        // let icon = document.createElement("i");
        // icon.setAttribute("class", "bi bi-facebook");

        // ul.appendChild(icon);
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
        for (let index = 0; index < JSON.parse(result).data.length; index++) {
          let div = document.createElement("div");

          let h1 = document.createElement("h1");
          h1.textContent =
            JSON.parse(result).data[index].name +
            " " +
            JSON.parse(result).data[index].surnames;
          div.appendChild(h1);
          let h6 = document.createElement("h6");
          h6.textContent = JSON.parse(result).data[index].data_publicacio;
          div.appendChild(h6);
          let p = document.createElement("p");
          div.setAttribute("class", "col-lg-6 menu-item filter-starters");
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

  static obtenirPlats(codi_establiment, id_categoria, id_carta, divPlats) {
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
        for (let index = 0; index < JSON.parse(result).data.length; index++) {
          let div = document.createElement("div");
          div.setAttribute("class", "col-lg-6 menu-item");

          var img = new Image();
          img.src =
            "data:image/png;base64," +
            JSON.parse(result).data[index].fotos[index];
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
          let div3 = document.createElement("div");
          div3.setAttribute("class", "menu-ingredients");
          div3.textContent = JSON.parse(result).data[index].descripcio_breu;
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
  static obtenirSuplements(id_plat, divSuplements) {
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
        for (let index = 0; index < JSON.parse(result).data.length; index++) {
          let h5 = document.createElement("h5");
          h5.textContent = JSON.parse(result).data[index].descripcio;
          let span = document.createElement("span");
          span.textContent = JSON.parse(result).data[index].preu;
          // h5.appendChild(span);

          let hr = document.createElement("hr");
          divSuplements.appendChild(h5);
          divSuplements.appendChild(span);
          divSuplements.appendChild(hr);
        }
      })
      .catch((error) => console.log("error", error));
  }

  static obtenirPlat(id_carta, id_plat, divPlatImg, divPlatInfo) {
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
        let obj = JSON.parse(result).data[id_plat - 1];
        // for (let index = 0; index < JSON.parse(result).data.length; index++) {
        let img = document.createElement("img");
        img.src = "data:image/png;base64," + obj.fotos[0];
        divPlatImg.appendChild(img);
        let h3 = document.createElement("h1");
        h3.textContent = obj.nom;
        let p = document.createElement("p");
        p.textContent = obj.preu;
        let p2 = document.createElement("p");
        p2.textContent = obj.descripcio_detallada;
        divPlatInfo.appendChild(h3);
        divPlatInfo.appendChild(p);
        divPlatInfo.appendChild(p2);
      })
      .catch((error) => console.log("error", error));
  }

  static canviarContrasenya(token, email, newPassword) {
    var myHeaders = new Headers();

    myHeaders.append("Authorization", "Bearer " + token);
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
      .then((result) => console.log(result))
      .catch((error) => console.log("error", error));
  }

  static canviarUser(token, email, name, surnames) {
    var myHeaders = new Headers();
    myHeaders.append("Authorization", "Bearer " + token);
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
      .then((result) => console.log(result))
      .catch((error) => console.log("error", error));
  }
}
