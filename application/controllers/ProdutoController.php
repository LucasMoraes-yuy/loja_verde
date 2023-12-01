<?php

use application\core\Controller;
use application\dao\ProdutoDAO;
use application\models\Produto;


class ProdutoController extends Controller
{

    public function index()
    {
        session_start();
        if (empty($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
            $this->view('home/index');
        }

        $produtoDAO = new ProdutoDAO();
        $produtos = $produtoDAO->findAll();
        $this->view('produto/index', ['produtos' => $produtos]);
    }
    public function cadastrar()
    {
        $this->view('produto/cadastrar');
    }
    public function salvar()
    {
        $nome = $_POST['nome_produto'];
        $marca = $_POST['marca'];
        $preco = $_POST['preco'];
        $imagemData = file_get_contents($_FILES['imagem']['tmp_name']);

        if ($imagemData == null) {
            echo "Erro ao salvar imagem!";
        }
        $produto = new Produto($nome, $marca, $preco, $imagemData);
        print_r($_FILES);

        $produtoDAO = new ProdutoDAO();
        $produtoDAO->salvar($produto);

        $this->view('produto/cadastrar', ["msg" => "Sucesso"]);
    }

    public function iniciarEditar($codigo)
    {
        // 1 - Buscar os dados 
        $produtoDAO = new ProdutoDAO();
        $produto = $produtoDAO->findById($codigo);
        // 2 - Mostrar na view
        $this->view('produto/editar', ["produto" => $produto]);
    }

    public function atualizar()
    {
        //RECEBE OS DADOS
        $codigo = filter_input(INPUT_POST, "codigo");
        $nome = filter_input(INPUT_POST, "nome");
        $marca = filter_input(INPUT_POST, "marca");
        $preco = filter_input(INPUT_POST, "preco");

        //CRIA O OBJETO
        $produto = new Produto($nome, $marca, $preco);
        $produto->setCodigo($codigo);
        //CRIA O PRODUTO DAO
        $produtoDAO = new ProdutoDAO();
        $produtoAtualizado = $produtoDAO->atualizar($produto);
        if ($produtoAtualizado) {
            $msg = "Sucesso";
        } else {
            $msg = "Erro ao editar";
        }
        $this->view("produto/editar", ["msg" => $msg, "produto" => $produtoAtualizado]);
    }

    public function deletar()
    {
        $codigo = filter_input(INPUT_POST, "codigo");
        $produtoDAO = new ProdutoDAO();
        if ($produtoDAO->deletar($codigo)) {
            $msg = "Sucessoooo";
        } else {
            $msg = "Deu errooo ";
        }
        $produtos = $produtoDAO->findAll();
        $this->view("produto/index", ["msg" => $msg, "produtos" => $produtos]);
    }
}
