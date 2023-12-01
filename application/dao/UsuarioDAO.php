<?php

namespace application\dao;

use application\models\Usuario;

class UsuarioDAO
{
  public function salvar($usuario)
  {
    $conexao = new Conexao();
    $conn = $conexao->getConexao();
    $login =  $usuario->getLogin();
    $senha = $usuario->getSenha();
    $email = $usuario->getEmail();
    $SQL = "INSERT INTO usuarios(codigo, login, senha, email) VALUES (null, '$login', '$senha', '$email')";
    if ($conn->query($SQL) === TRUE) {
      return true;
    } else {
      echo "Error: " . $SQL . "<br />" . $conn->error;
      return false;
    }
  }
    public function findByLogin($login)
    {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        $SQL = "SELECT * FROM usuarios WHERE login ='" . $login."'";
        $result = $conn->query($SQL);
        $row = $result->fetch_assoc();
        $usuario = new Usuario($row["login"], $row["senha"], $row["email"], $row["tipo"]);
        $usuario->setCodigo($row["codigo"]);
        return $usuario;
    }
    public function findById($codigo)
    {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        $SQL = "SELECT * FROM usuarios WHERE codigo =" . $codigo;
        $result = $conn->query($SQL);
        $row = $result->fetch_assoc();
        $usuario = new Usuario($row["login"], $row["senha"], $row["email"], $row["tipo"]);
        $usuario->setCodigo($row["codigo"]);
        return $usuario;
    }
    public function findAll() {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        $SQL = "SELECT * FROM usuarios";
        $result = $conn->query($SQL);
        $usuarios = [];

        while ($row = $result->fetch_assoc()) {
          $usuario = new Usuario($row["login"], $row["senha"], $row["email"], $row['tipo']);
          $usuario->setCodigo($row["codigo"]);
          array_push($usuarios, $usuario);
        }

        return $usuarios;
    }
    public function atualizar($usuario)
    {

        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        $codigo = $usuario->getcodigo();
        $login = $usuario->getLogin();
        $senha = $usuario->getSenha();
        $email = $usuario->getEmail();
        $tipo = $usuario->getTipo();
        $sql = "update usuarios set login = '$login', senha = '$senha', email = '$email', tipo = '$tipo' where codigo =" . $codigo;

        if ($conn->query($sql) === true) {
            return $this->findbyid($codigo);
        }
        print_r("error: " . $sql . "<br />" . $conn->error);
        return $usuario;
    }
    public function deletar($codigo)
    {
        $conexao = new Conexao();
        $conn = $conexao->getConexao();
        $sql = "delete from usuarios where codigo = " . $codigo;
        if ($conn->query($sql) === true) {
            return true;
        }
        return false;
    }
}
