<?php 
$base = __DIR__;
include $base . '/../layout/menu.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Home Page</title>
</head>
<body>
  <h1 style="text-align: center; padding: 20px">Bem-Vindo</h1>
  <?php if (empty($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) : ?>
  <div class="container">
    <div class="card text-center mt-5">
      <div class="card-header">
        <h5 class="card-title">Autenticação necessária</h5>
      </div>
      <div class="card-body">
        <p class="card-text">
          Para visualizar e cadastrar produtos, é necessário se autenticar.
          <br />
          Clique no botão abaixo para ir para a página de login.
        </p>
      </div>
      <div class="card-footer">
        <a href="/login" class="btn btn-primary">Ir para o login</a>
      </div>
    </div>
  </div>
  <?php else: ?>
    <div class="container">
      <div class="card text-center mt-5">
        <div class="card-header">
          <h5 class="card-title">Bem-vindo!</h5>
        </div>
        <div class="card-body">
          <p class="card-text">
            Você está autenticado e liberado para utilizar as funcionalidades do sistema.
            <br />
            Aproveite!
          </p>
        </div>
        <div class="card-footer">
          <a href="/produto" class="btn btn-success">Ver produtos</a>
        </div>
      </div>
    </div>
  <?php endif ?>
</body>
</html>