<?php 
use application\core\Controller;

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
        $categoria = $_POST['categoria'];
        $preco = $_POST['preco'];

        print_r($nome);
        print_r($marca);
    }
}