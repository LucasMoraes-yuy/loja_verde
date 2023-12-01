<?php

namespace application\models;

class Produto
{
  private $codigo;
  private $nome;
  private $marca;
  private $preco;
  private $imagem;

  public function __construct($nome, $marca, $preco, $imagem = null)
  {
    $this->nome = $nome;
    $this->marca = $marca;
    $this->preco = $preco;
    $this->imagem = base64_encode($imagem);
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
  function getImagemBase64() {
    return base64_encode($this->imagem);
  }
  function getImagemBlob() {
    return $this->imagem;
  }
}
