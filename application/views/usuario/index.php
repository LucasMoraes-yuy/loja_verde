<?php
$base = __DIR__;
include $base . '/../layout/menu.php';
?>

<html>
<head>
</head>
<body>
    <h1> Listar Usuários </h1>
    <hr />
    <?php if (isset($data['msg'])) { ?>
        <div class="alert alert-danger" role="alert"> Sucesso </div>
    <?php } ?>
    <p> <a href="/usuario/cadastrar"> Adicionar usuário </a> </p>
    <table class="table">
        <thead>
            <th>Código</th>
            <th>Login</th>
            <th>Senha</th>
            <th>Email</th>
            <th>Tipo</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($data['usuarios'] as $usuario) : ?>
                <tr>
                    <td><?= $usuario->getCodigo() ?> </td>
                    <td><?= $usuario->getLogin() ?> </td>
                    <td> *********** </td>
                    <td><?= $usuario->getEmail() ?> </td>
                    <td><?= $usuario->getTipo() ?> </td>
                    <td>
                        <a href="/usuario/iniciarEditar/<?= $usuario->getCodigo() ?>">
                            EDITAR
                        </a>
                        <span>
                            <form action="/usuario/deletar" method="post">
                                <input type="hidden" value="<?= $usuario->getCodigo() ?>" name="codigo" />
                                <input type="submit" value="X" />
                            </form>
                        </span>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>