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
          // var image = new Image();

          // let img = document.createElement("img");
          var img = new Image();
          img.onload = function () {
            callback(img);
          };
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
        li4.textContent =
          "Valoració mitjana: " +
          JSON.parse(result).data[0].valoracio_mitjana.vm +
          "/5";
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
}
