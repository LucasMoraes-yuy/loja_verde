<?php

namespace application\dao;

use application\models\Produto;

class ProdutoDAO
{
  public function salvar($produto)
  {
    $conexao = new Conexao();
    $conn = $conexao->getConexao();
    $nome =  $produto->getNome();
    $marca = $produto->getMarca();
    $preco = $produto->getPreco();
    $imagem = $produto->getImagemBlob();
    $SQL = "INSERT INTO produtos(codigo, nome, marca, preco, imagem) VALUES (null, '$nome', '$marca', '$preco', '$imagem')";
    if ($conn->query($SQL) === TRUE) {
      return true;
    } else {
      echo "Error: " . $SQL . "<br />" . $conn->error;
      return false;
    }
  }
  public function findAll()
  {
    $conexao = new Conexao();
    $conn = $conexao->getConexao();
    $SQL = "SELECT codigo, nome, marca, preco, to_base64(imagem) as imagem FROM produtos";
    $result = $conn->query($SQL);
    $produtos = [];
    while ($row = $result->fetch_assoc()) {
      $produto = new Produto($row["nome"], $row["marca"], $row["preco"], $row['imagem']);
      $produto->setCodigo($row["codigo"]);
      array_push($produtos, $produto);
    }
    return $produtos;
  }
  public function findById($id)
  {
    $conexao = new Conexao();
    $conn = $conexao->getConexao();
    $SQL = "SELECT * FROM produtos WHERE codigo =" . $id;
    $result = $conn->query($SQL);
    $row = $result->fetch_assoc();
    $produto = new Produto($row["nome"], $row["marca"], $row["preco"]);
    $produto->setCodigo($row["codigo"]);
    return $produto;
  }
  public function atualizar($produto)
  {

    // Criar o conexao
    $conexao = new Conexao();
    $conn = $conexao->getConexao();
    // pega os dados
    $codigo = $produto->getCodigo();
    $nome = $produto->getNome();
    $marca = $produto->getMarca();
    $preco = $produto->getPreco();
    $SQL = "UPDATE produtos SET nome = '$nome', marca = '$marca', preco = '$preco' WHERE codigo =" . $codigo;

    if ($conn->query($SQL) === TRUE) {
      return $this->findById($codigo);
    }
    print_r("Error: " . $SQL . "<br />" . $conn->error);
    return $produto;
  }
  public function deletar($id)
  {
    $conexao = new Conexao();
    $conn = $conexao->getConexao();

    $SQL = "delete from produtos where codigo = " . $id;
    if ($conn->query($SQL) === TRUE) {
      return true;
    }
    return false;
  }
}
