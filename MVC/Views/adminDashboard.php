<section class="container" id="push">
    <div id="maintext">
        <p class="fs-3 text-center">Gestão de usuários</p>
        <hr />
    </div>

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
                        <td><?php echo $usuario->getTipoDeCliente() == "1" ? "Particular" : "Empresa"; ?></td>
                        <td><?php echo $usuario->getEstadoConta(); ?></td>
                        <td>
                            <form action="/eesolutions/dashboard" method="POST" style="display:inline;">
                                <button class="btn btn-outline-danger" type="submit">
                                    <i class="bi bi-x"></i>
                                </button>
                                <input type="hidden" name="delete" value="<?php echo $usuario->getUserId(); ?>">
                            </form>
                            <form action="/eesolutions/dashboard" method="POST" style="display:inline;">
                                <button class="btn btn-success" type="submit">
                                    <i class="bi bi-check"></i>
                                </button>
                                <input type="hidden" name="patch" value="<?php echo $usuario->getUserId(); ?>">
                            </form>
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
