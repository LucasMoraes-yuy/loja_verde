<?php
namespace application\dao;

class ProdutoDAO
{
  public function salvar($produto) {
    $conexao = new Conexao();
    $conn = $conexao->getConexao();

    $nome = $produto->getNome();
    $marca = $produto->getMarca();
    $preco = $produto->getPreco();

    $sql = ("INSERT INTO (...) VALUES (...) ");

    if ($conn->query($sql) === true) {
      return true;
    } else {
      echo "Error: " . $sql . "<br />" . $conn->error;
      return false;
    }
    
  }

  public function pegarTodos() {
  }

  public function pegarPorID($id) {
  }

  public function atualizar($produto) {
  }

  public function apagar($id) {
    $nome = $_POST['nome_produto'];
    $marca = $_POST['marca'];
    $preco = $_POST['preco'];
  }
}
