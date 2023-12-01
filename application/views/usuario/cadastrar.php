<?php
$base = __DIR__;
include $base . '/../layout/menu.php';
?>
<?php
if (isset($data["msg"])) {
?>

  <div class="alert alert-success" role="alert"> Sucesso </div>
<?php } ?>

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form action="/usuario/salvar" method="post">
        <div class="mb-3">
          <label for="login" class="form-label">Login</label>
          <input type="text" class="form-control" id="login" name="login" required>
        </div>
        <div class="mb-3">
          <label for="senha" class="form-label">Senha</label>
          <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="tipo" class="form-label">Tipo de usuário</label>
          <select class="form-select" id="tipo" name="tipo">
            <option value="A">Admin</option>
            <option selected value="U">Usuário</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
    </div>
  </div>
</div>
