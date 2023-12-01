<?php
$base = __DIR__;
include $base . '/../layout/menu.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form action="/login/login" method="post">
            <div class="form-group">
              <label for="username">Usuário</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
              <label for="password">Senha</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Logar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
    body {
      font-family: sans-serif;
    }

    .container {
      width: 500px;
    }

    .card {
      margin-top: 20px;
    }

    .card-header {
      background-color: #333;
      color: #fff;
      padding: 10px;
    }

    .card-body {
      padding: 20px;
    }

    .form-group {
      margin-bottom: 10px;
    }

    .form-control {
      width: 100%;
    }

    .btn {
      margin-top: 10px;
    }
</style>

</body>
</html>