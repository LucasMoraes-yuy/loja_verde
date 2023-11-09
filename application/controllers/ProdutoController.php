<?php 
use application\core\Controller;
use application\dao\ProdutoDAO;
use application\models\Produto;

class ProdutoController extends Controller {
    public function index() {
        $this->view('produto/index');
    }
    
    public function cadastrar() {
        $this->view('produto/cadastrar');
    }

    public function salvar() {
        $nome = $_POST['nome'];
        $marca = $_POST['marca'];
        $preco = $_POST['preco'];

        $produto = new Produto($nome, $marca, $preco);

        $produtoDAO = new ProdutoDAO();
        $produtoDAO->salvar($produto);
    }
}