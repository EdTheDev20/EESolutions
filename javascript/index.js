window.addEventListener("load", function () {
  if (
    window.location.href == "http://localhost/eesolutions/" ||
    window.location.href == "http://127.0.0.1/eesolutions/"
  ) {
    this.fetch("/EESolutions/javascript/db.json")
      .then((response) => response.json())
      .then((data) => {
        const cardDiv = document.getElementById("cardReceiver");

        data.outdoors.forEach((outdoor) => {
          const card = document.createElement("div");
          card.classList.add("col");
          card.classList.add("mb-5");
          card.innerHTML = ` <div class="card h-100">
        <!--Image-->
        <img
          src="${outdoor.path}"
          alt=""
          
          class="card-img-top"
        />
        <!--Details-->
        <div class="card-body p-4">
          <div class="text-center">
            <!--Name of the product-->
            <h5 class="fw-bolder">${outdoor.titulo}</h5>
            <!--Price-->
            <p class="priceText">${outdoor.price}<p class="priceText fw-semibold">Kz</p></p>
          </div>
        </div>
        <!--Actions(example: Buy)-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
          <div class="text-center">
            <a class="btn btn-outline-dark mt-auto" href="#"
              >Ver opções</a
            >
          </div>
        </div>
      </div>`;

          cardDiv.appendChild(card);
        });
      });
  }

  if (
    window.location.href == "http://localhost/eesolutions/register" ||
    window.location.href == "http://127.0.0.1/eesolutions/register") {
    $.ajax({
      type: "GET",
      url: "/eesolutions/scripts/ajax.php",
      data: {
        nacionalidades: "",
      },
      dataType: "json",
      success: function (response) {
        const nacionalidadeSelect = document.getElementById(
          "nacionalidadeSelect"
        );
        response.forEach((nacionalidade) => {
          const option = document.createElement("option");
          option.value = nacionalidade.idtnacionalidade;
          option.innerHTML = nacionalidade.nome;
          nacionalidadeSelect.appendChild(option);
        });
      },
      error: function (xhr, status, error) {
        console.log(xhr);
        console.log(status);
        console.log(error);
      },
    });
    $.ajax({
      type: "GET",
      url: "/eesolutions/scripts/ajax.php",
      data: {
        provincias: "dummy",
      },
      dataType: "json",
      success: function (response) {
        const provinciaSelect = document.getElementById("provinciaSelect");
        response.forEach((provincia) => {
          const option = document.createElement("option");
          option.value = provincia.idtprovincia;
          option.innerHTML = provincia.nome;
          provinciaSelect.appendChild(option);
        });
      },
      error: function (xhr, status, error) {
        console.log(error);
        console.log(status);
        console.log(xhr);
      },
    });
  }
});


  function alterMunicipios() {
    var selectedOption = document.getElementById("provinciaSelect");
    const municipioSelect = document.getElementById("municipioSelect");
    if (!municipioSelect.innerHTML == "") {
      while (municipioSelect.firstChild) {
        municipioSelect.removeChild(municipioSelect.firstChild);
      }
    }

    $.ajax({
      type: "GET",
      url: "/eesolutions/scripts/ajax.php",
      data: {
        municipios: selectedOption.value,
      },
      dataType: "json",
      success: function (response) {
        response.forEach((municipio) => {
          const option = document.createElement("option");
          option.value = municipio.idtmunicipio;
          option.innerHTML = municipio.nome;
          municipioSelect.appendChild(option);
        });
      },
      error: function (xhr, status, error) {
        console.log(error);
        console.log(status);
        console.log(xhr);
      },
    });
  }

  function alterComunas() {
    const municipioSelect = document.getElementById("municipioSelect");
    const comunaSelect = document.getElementById("comunaSelect");

    $.ajax({
      type: "GET",
      url: "/eesolutions/scripts/ajax.php",
      data: {
        munID: municipioSelect.value,
      },
      dataType: "json",
      success: function (response) {
        response.forEach((comuna) => {
          const option = document.createElement("option");
          option.value = comuna.idtcomunas;
          option.innerHTML = comuna.nome;
          comunaSelect.appendChild(option);
        });
      },
      error: function (xhr, status, error) {
        console.log(error);
        console.log(status);
        console.log(xhr);
      },
    });
  }

  function check() {
    if (
      document.getElementById("inputPassword").value ==
      document.getElementById("checkPassword").value
    ) {
      document.getElementById("message").style.color = "green";
      document.getElementById("message").innerHTML = "Passwords iguais";
    } else {
      document.getElementById("message").style.color = "red";
      document.getElementById("message").innerHTML = "Passwords diferentes";
    }
  }

  function typeOfClient() {
    var tipodeClienteSelect = document.getElementById("tipodeCliente");
    var clienteId = tipodeClienteSelect.value;
    var empresaActivitiesDiv = document.getElementById("empresaActivities");
    if (clienteId == 2) {
      empresaActivitiesDiv.innerHTML = `<label for="actividadeDaEmpresa" class="form-label">Actividade Da Empresa</label>
    <textarea class="form-control" id="actividadeDaEmpresa" name="actividadeDaEmpresa" rows="3" required></textarea>`;
    } else {
      empresaActivitiesDiv.innerHTML = "";
    }
  }

  function fillOptions(){
  $.ajax({
    type: "GET",
    url: "/eesolutions/scripts/ajax.php",
    data: {
      nacionalidades: "",
    },
    dataType: "json",
    success: function (response) {
      const nacionalidadeSelect = document.getElementById(
        "nacionalidadeSelect"
      );
      response.forEach((nacionalidade) => {
        const option = document.createElement("option");
        option.value = nacionalidade.idtnacionalidade;
        option.innerHTML = nacionalidade.nome;
        nacionalidadeSelect.appendChild(option);
      });
    },
    error: function (xhr, status, error) {
      console.log(xhr);
      console.log(status);
      console.log(error);
    },
  });
  $.ajax({
    type: "GET",
    url: "/eesolutions/scripts/ajax.php",
    data: {
      provincias: "dummy",
    },
    dataType: "json",
    success: function (response) {
      const provinciaSelect = document.getElementById("provinciaSelect");
      response.forEach((provincia) => {
        const option = document.createElement("option");
        option.value = provincia.idtprovincia;
        option.innerHTML = provincia.nome;
        provinciaSelect.appendChild(option);
      });
    },
    error: function (xhr, status, error) {
      console.log(error);
      console.log(status);
      console.log(xhr);
    },
  });

}


