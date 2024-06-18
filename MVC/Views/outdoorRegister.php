<section class="container">
    <div id="createoutdoor">
        <p class="fs-3 text-center">Solicite o seu outdoor</p>
        <hr />
    </div>

</section>

<div class="row justify-content-center my-5">
    <div class="col-lg-6">

        <form method="post" id="outdoorform" enctype="multipart/form-data" action="/eesolutions/outdoors">

            <div class="mb-3">
                <label for="tipodeCliente" class="form-label">Tipo de outdoors
                </label>

                <select name="tipoDeOutdoor" id="tipoDeOutdoor" class="form-select" required>
                    <option value="" selected disabled>Selecione um tipo de outdoor</option>
                    <option value="1">Painel Luminoso</option>
                    <option value="2">Paineis Não Luminosos</option>
                    <option value="3">Faixadas</option>
                    <option value="4">Placas Indicativas</option>
                    <option value="5">Lampoles</option>
                </select>
            </div>


            <div class="mb-3">
                <label for="provinciaSelect" class="form-label">Província</label>

                <select name="provinciaSelect" id="provinciaSelect" class="form-select" onchange="alterMunicipios()" required>
                    <option value="" selected disabled>Provincia</option>

                </select>
            </div>

            <div class="mb-3">
                <label for="municipioSelect" class="form-label">Município</label>
                <select name="municipioSelect" id="municipioSelect" class="form-select" onchange="alterComunas()"required>
                    <option value="" selected disabled>Município</option>
                </select>
            </div>



            <div class="mb-3">
                <label for="comunaSelect" class="form-label">Comuna</label>
                <select name="comunaSelect" id="comunaSelect" class="form-select" required>
                    <option value="" disabled selected>Comuna</option>
                </select>
            </div>

            <div class="mb-3">
                <input type="date" name="dataInicio" min="2024-01-01" id="dataInicio">
            </div>

            <div class="mb-3">
                <input type="date" name="dataFim" min="2024-01-01" id="dataFim">
                <p id="error" style="color: red;"></p>
            </div>

            

            <div class="mb-3">
             <input type="file" name="image" id="image" accept="image/*">
            </div>



            <button type="submit" class="btn btn-primary">Solicitar</button>
            <input type="hidden" name="outdoor_register" value="1" />
        </form>
    </div>
</div>