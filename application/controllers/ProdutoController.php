<?php 
use application\core\Controller;

class ProdutoController extends Controller {
    public function index() {
        $this->view('produto/index');
    }
}