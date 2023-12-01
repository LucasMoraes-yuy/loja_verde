<?php

namespace application\models;

class Usuario
{
  private $codigo;
  private $login;
  private $senha;
  private $email;
  private $tipo; // A - Admin U - Usuario

  public function __construct($login, $senha, $email, $tipo)
  {
    $this->login = $login;
    $this->senha = $senha;
    $this->email = $email;
    $this->tipo = $tipo;
  }

  function getCodigo()
  {
    return $this->codigo;
  }

  function setCodigo($codigo): void
  {
    $this->codigo = $codigo;
  }

  function getLogin()
  {
    return $this->login;
  }

  function setLogin($login): void
  {
    $this->login = $login;
  }

  function getSenha()
  {
    return $this->senha;
  }
  function setMarca($senha): void
  {
    $this->senha = $senha;
  }

  function getEmail()
  {
    return $this->email;
  }

  function setEmail($email): void
  {
    $this->email = $email;
  }
  function getTipo()
  {
    return $this->tipo;
  }
  function setTipo($tipo)
  {
    $this->tipo = $tipo;
  }

}
