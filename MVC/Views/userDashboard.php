<div class="container-fluid">
    <h1 class=" text-center"> O seu perfil </h1>
    <hr>
    <div class="modal fade" id="reg-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-title">Editar dados</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="post" action="/eesolutions/update">

                        <div class="mb-3">
                            <label class="form-label" for="username">Nome De Usuário/Username</label>
                            <input type="text" name="username" id="username" class="form-control"
                                value="<?php echo $User->getUsername(); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="nomeCompleto">Nome Completo</label>
                            <input type="text" name="nomeCompleto" id="nomeCompleto"
                                value="<?php echo $User->getName(); ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="email">Endereço email</label>
                            <input type="text" name="email" id="email" class="form-control"
                                value="<?php echo $User->getEMail(); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword"
                                onkeyup="check();" value="<?php echo $User->getPassword(); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="numeroTelefone">Número de telefone</label>
                            <input type="tel" pattern="9[1-9][0-9]{7}" required name="numeroTel" id="numeroTel"
                                class="form-control" value="<?php echo $User->getCellphoneNumber(); ?>" required>
                        </div>


                        <div class="mb-3">
                            <label for="tipodeCliente" class="form-label">Tipo de cliente
                            </label>
                            <?php
                            $clientType = $User->getClientType();
                            ?>
                            <select name="tipodeCliente" id="tipodeCliente" class="form-select"
                                onchange="typeOfClient()" required>
                                <option value="" selected disabled>Selecione um tipo de cliente</option>
                                <option value="1" <?php if ($clientType == "1")
                                    echo "selected"; ?>>Particular</option>
                                <option value="2" <?php if ($clientType == "2")
                                    echo "selected"; ?>>Empresa</option>
                            </select>
                        </div>

                        <div class="mb-3" id="empresaActivities">

                        </div>

                        <div class="mb-3">
                            <label for="provinciaSelect" class="form-label">Província</label>

                            <select name="provinciaSelect" id="provinciaSelect" class="form-select"
                                onchange="alterMunicipios()" required>
                                <option value="" selected disabled>Provincia</option>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="municipioSelect" class="form-label">Município</label>
                            <select name="municipioSelect" id="municipioSelect" class="form-select"
                                onchange="alterComunas()" required>
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
                            <label class="form-label" for="morada">Morada</label>
                            <input type="text" name="morada" id="morada" class="form-control"
                                value="<?php echo $User->getAddress() ?>" required>
                        </div>




                        <div class="mb-3">
                            <label for="nacionalidadeSelect" class="form-label">Nacionalidade</label>
                            <select class="form-select" id="nacionalidadeSelect" name="nacionalidadeSelect" required>
                                <option value="" disabled selected>Nacionalidade</option>


                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Criar</button>
                        </div>
                        <input type="hidden" name="form-submitted" value="1" />
                    </form>


                </div>

            </div>
        </div>
    </div>


</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card mb-4">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nome Completo</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"> <?php
                            echo $User->getName();

                            ?> </p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Tipo De Cliente</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                <?php
                                $tipoDeCliente = $User->getTipoDeCliente();
                                if ($tipoDeCliente == 1) {
                                    echo "Particular";
                                } else
                                    echo "Empresa";

                                ?>

                            </p>
                        </div>
                    </div>

                    <hr>
                    <?php
                    if ($User->getActividadeDaEmpresa() != "null") {
                        ?>

                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Actividade da Empresa</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">
                                    <?php
                                    echo $User->getActividadeDaEmpresa();
                                    ?>
                                </p>
                            </div>
                        </div>

                        <hr>
                        <?php
                    } ?>



                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Username</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"> <?php echo $User->getUsername(); ?></p>
                        </div>
                    </div>



                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"> <?php echo $User->getEMail(); ?></p>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Número de telefone</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                <?php echo $User->getCellphoneNumber(); ?>

                            </p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Província</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"> <?php echo $User->getProvincia(); ?></p>
                        </div>

                        <div class="col-sm-3">
                            <p class="mb-0">Município</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"> <?php echo $User->getMunicipio(); ?></p>
                        </div>

                        <div class="col-sm-3">
                            <p class="mb-0">Comuna</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"> <?php echo $User->getComuna(); ?></p>
                        </div>
                    </div>


                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Morada</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"> <?php echo $User->getAddress(); ?></p>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nacionalidade</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"> <?php echo $User->getNacionalidade(); ?></p>
                            </div>
                        </div>

                        <div class="col-sm-9 my-3">

                            <button class="btn btn-primary" type="button" onclick="fillOptions()" data-bs-toggle="modal"
                                data-bs-target="#reg-modal">
                                <span>Edit</span>
                            </button>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="container" id="push">
    <div id="maintext">
        <p class="fs-3 text-center">As suas solicitações</p>
        <hr />

        
    </div>

    
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Tipo de Outdoor</th>
                <th>Provincia</th>
                <th>Municipio</th>
                <th>Comuna</th>
                <th>Estado do Outdoor</th>
                <th>Data de Início</th>
                <th>Data de fim</th>
                <th>Preço</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($outdoors) && is_array($outdoors) && count($outdoors) > 0):
                foreach ($outdoors as $outdoor): ?>
                    <tr>
                        <td><?php echo $outdoor->getId(); ?></td>
                        <td><?php echo $outdoor->getTipo(); ?></td>
                        <td><?php echo $outdoor->getProvincia(); ?></td>
                        <td><?php echo $outdoor->getMunicipio(); ?></td> <!-- Fix this line -->
                        <td><?php echo $outdoor->getComuna(); ?></td>
                        <td><?php echo $outdoor->getEstado(); ?></td>
                        <td><?php echo $outdoor->getDatadeinicio(); ?></td>
                        <td><?php echo $outdoor->getDatadefim(); ?></td>
                        <td><span><?php echo $outdoor->getPreco(); ?> <strong>Kz</strong></span></td>
                        <td>
                            <?php if($outdoor->getComprovativo()=="null"){ ?>
     <form>
        <div class="mb-3">
            <label for="fileToUpload" class="custom-file-label">
                <i class="bi bi-cloud-arrow-up"></i> Upload de comprovativo
            </label>
            <input type="file" accept="application/pdf" name="fileToUpload" id="fileToUpload" class="custom-file-input">
        </div>
    </form>
                           <?php } ?> 
                        </td>
                    </tr>
                <?php endforeach;
            else: ?>
                <tr>
                    <td colspan="10" class="text-center">Nenhuma solicitação feita.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>