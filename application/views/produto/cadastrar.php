<?php include __DIR__ . '/../layout/menu.php' ?>

<h1 style="text-align: center;margin: 20px 20px">Cadastrar</h1>
<hr>

<form action="/produto/salvar" method="POST">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" placeholder="Nome...">
    <label for="marca">Marca</label>
    <input type="text" name="marca" id="marca">
    <label for="categoria">Categoria</label>
    <input type="text" name="categoria" id="categoria">
    <label for="preco">Preço</label>
    <input type="text" name="preco" id="preco">
    <input type="submit" value="Cadastrar">
</form>