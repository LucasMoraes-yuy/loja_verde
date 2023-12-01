<?php
$base = __DIR__;
include $base . '/../layout/menu.php';
?>

<html>

<head>

</head>

<body>
    <h1> Listar Produtos </h1>
    <hr />
    <?php if (isset($data['msg'])) { ?>
        <div class="alert alert-danger" role="alert"> Sucesso </div>
    <?php } ?>
    <button type="button" class="btn btn-outline-primary" onclick="window.location.href='/produto/cadastrar'">Adicionar Produto</button>
    <table class="table">
        <thead>
            <th>Imagem</th>
            <th>Código</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Preço</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php foreach ($data['produtos'] as $produto): ?>
                <tr>
                    <td>
                        <?php if ($produto->getImagemBase64()): ?>
                            <img src="data:image/jpeg;base64,<?= $produto->getImagemBase64() ?>" alt="Imagem do Produto" />
                        <?php else: ?>
                            Sem imagem;
                        <?php endif; ?>
                        <?php // var_dump($produto->getImagemBase64()) ?>
                    </td>
                    <td><?= $produto->getCodigo() ?> </td>
                    <td><?= $produto->getNome() ?> </td>
                    <td><?= $produto->getMarca() ?> </td>
                    <td><?= $produto->getPreco() ?> </td>
                    <td>
                        <div style="display: flex; ">
                            <div style="margin-right: 10px;">
                                <button type="button" class="btn btn-outline-primary" onclick="window.location.href='/produto/iniciarEditar/<?= $produto->getCodigo() ?>'">Editar</button>
                            </div>
                            <div>
                                <form action="/produto/deletar" method="post">
                                    <input type="hidden" value="<?= $produto->getCodigo() ?>" name="codigo" />
                                    <button type="submit" class="btn btn btn-outline-danger" onclick="window.location.href='/produto/iniciarEditar/<?= $produto->getCodigo() ?>'">Excluir</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>