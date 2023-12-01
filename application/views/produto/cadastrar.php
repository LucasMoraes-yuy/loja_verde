<?php
$base = __DIR__;
include $base . '/../layout/menu.php';
?>
<?php
if (isset($data["msg"])) {
?>
  <div class="alert alert-success" role="alert"> Sucesso </div>
<?php } ?>
<form action="/produto/salvar" method="POST" class="form-control" enctype="multipart/form-data">
  <label> Nome Produto </label>
  <input type="text" name="nome_produto" class="form-control" />
  <label> Marca </label>
  <input type="text" name="marca" class="form-control" />
  <label> Preço </label>
  <input type="text" name="preco" class="form-control" />
  <label> Imagem </label>
  <input type="file" name="imagem" class="form-control" accept="image/jpeg" />
  <input type="submit" value="Cadastrar" class="form-control" />
</form>
