<?php
$base = __DIR__;
include $base . '/../layout/menu.php';
$usuario = $data['usuario'];
?>
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form action="/usuario/atualizar" method="post">
        <input type="hidden" id="codigo" name="codigo" value="<?= $usuario->getCodigo() ?>">
        <div class="mb-3">
          <label for="login" class="form-label">Login</label>
          <input type="text" class="form-control" id="login" name="login" 
            value="<?= $usuario->getLogin() ?>">
        </div>
        <div class="mb-3">
          <label for="senha" class="form-label">Senha</label>
          <input type="password" class="form-control" id="senha" name="senha" 
            value="<?= $usuario->getSenha() ?>">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" 
            value="<?= $usuario->getEmail() ?>">
        </div>
        <div class="mb-3">
          <label for="tipo" class="form-label">Tipo de usuário</label>
          <select class="form-select" id="tipo" name="tipo">
            <option selected><?= $usuario->getTipo() == "A" ? "Admin" : "Usuário" ?></option>
            <option value="A">Admin</option>
            <option value="U">Usuário</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
    </div>
  </div>
</div>