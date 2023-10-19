<?php

class Produto
{
  private $codigo;
  private $nome;
  private $marca;
  private $preco;

  public function __construct($nome, $marca, $preco)
  {
    $this->nome = $nome;
    $this->marca = $marca;
    $this->preco = $preco;
  }

  function getCodigo()
  {
    return $this->codigo;
  }

  function setCodigo($codigo): void
  {
    $this->codigo = $codigo;
  }

  function getNome()
  {
    return $this->nome;
  }

  function setNome($nome): void
  {
    $this->nome = $nome;
  }

  function getMarca()
  {
    return $this->marca;
  }
  function setMarca($marca): void
  {
    $this->marca = $marca;
  }

  function getPreco()
  {
    return $this->preco;
  }

  function setPreco($preco): void
  {
    $this->preco = $preco;
  }
}
