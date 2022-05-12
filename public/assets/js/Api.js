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
          //   console.log(document.getElementById("establiments"));
        }
      })
      .catch((error) => console.log("error", error));
  }
  static obtenirUnEstabliment(codi_establiment, diVEstabliment) {
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
        console.log(JSON.parse(result).data.nom_establiment);
        diVEstabliment.appendChild(
          (document.createElement("p").textContent = result)
        ).data.nom_establiment;
      })
      .catch((error) => console.log("error", error));
  }

  // document.addEventListener("DOMContentLoader", function() {
}
