<section class="container" id="push">
    <div id="maintext">
        <p class="fs-3 text-center">Gestão de usuários</p>
        <hr />

        <button class="btn btn-outline-info" type="button" onclick="fillOptions()" data-bs-toggle="modal"  data-bs-target="#reg-modal">
            <span>Criar gestor</span>
        </button>
    </div>


    <div class="modal fade" id="reg-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-title">Criar gestor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="post" action="/eesolutions/register">

                        <div class="mb-3">
                            <label class="form-label" for="username">Nome De Usuário/Username</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="nomeCompleto">Nome Completo</label>
                            <input type="text" name="nomeCompleto" id="nomeCompleto" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="email">Endereço email</label>
                            <input type="text" name="email" id="email" class="form-control" required>
                            <div class="form-text" required id="emailHelp">Nunca iremos partilhar o seu email</div>
                        </div>

                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword"
                                onkeyup="check();" required>
                        </div>

                        <div class="mb-3">
                            <label for="checkPassword" class="form-label">Confirme a password</label>
                            <input type="password" class="form-control" id="checkPassword" name="checkPassword"
                                onkeyup="check();" required>
                            <span id="message"></span>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="numeroTelefone">Número de telefone</label>
                            <input type="tel" pattern="9[1-9][0-9]{7}" required name="numeroTel" id="numeroTel"
                                class="form-control" required>
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
                            <input type="text" name="morada" id="morada" class="form-control" required>
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


    <!--
       <div class="modal fade" id="regmodal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-title">Criar gestor</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Criar usuários</button>
      </div>
    </div>
  </div>
</div>

-->



    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Username</th>
                <th>Tipo de Cliente</th>
                <th>Situação</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($users) && is_array($users) && count($users) > 0):
                foreach ($users as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario->getUserId(); ?></td>
                        <td><?php echo $usuario->getName(); ?></td>
                        <td><?php echo $usuario->getUsername(); ?></td> <!-- Fix this line -->
                        <td><?php 
                            $typeofClients = $usuario->getTipoDeCliente();
                            if($typeofClients=="1"){
                                echo "Particular";
                            }else
                            if($typeofClients=="2"){
                                echo "Empresa";
                            }else{
                                echo "Gestor";
                            } ?></td>
                        <td><?php echo $usuario->getEstadoConta(); ?></td>
                        <td>
                            <form action="/eesolutions/dashboard" method="POST" style="display:inline;">
                                <button class="btn btn-outline-danger" type="submit">
                                    <i class="bi bi-x"></i>
                                </button>
                                <input type="hidden" name="delete" value="<?php echo $usuario->getUserId(); ?>">
                            </form>
                            <?php if ($usuario->getEstadoConta() != "Activo"): ?>

                                <form action="/eesolutions/dashboard" method="POST" style="display:inline;">
                                    <button class="btn btn-outline-success" type="submit">
                                        <i class="bi bi-check"></i>
                                    </button>
                                    <input type="hidden" name="patch" value="<?php echo $usuario->getUserId(); ?>">
                                </form>

                                <?php
                            endif; ?>

                            <?php if ($usuario->getEstadoConta() != "Bloqueado"): ?>

                                <form action="/eesolutions/dashboard" method="POST" style="display:inline;">
                                    <button class="btn btn-outline-warning" type="submit">
                                        <i class="bi bi-pause"></i>
                                    </button>
                                    <input type="hidden" name="block" value="<?php echo $usuario->getUserId(); ?>">
                                </form>

                                <?php
                            endif; ?>






                        </td>
                    </tr>
                <?php endforeach;
            else: ?>
                <tr>
                    <td colspan="6" class="text-center">Nenhum usuário encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>