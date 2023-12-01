<?php

use application\core\Controller;
use application\dao\UsuarioDAO;
use application\models\Usuario;

session_start();

class UsuarioController extends Controller
{

    public function index()
    {
        if (empty($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
            $this->view('home/index');
        }

        $usuarioDAO = new UsuarioDAO();
        $usuarios = $usuarioDAO->findAll();
        $this->view('usuario/index', ['usuarios' => $usuarios]);
    }
    public function cadastrar()
    {
        $this->view('usuario/cadastrar');
    }
    public function salvar()
    {
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        $tipo = $_POST['tipo'];

        $usuario = new Usuario($login, $senha, $email, $tipo);

        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->salvar($usuario);

        $this->view('usuario/cadastrar', ["msg" => "Sucesso"]);
    }

    public function iniciarEditar($codigo)
    {
        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->findById($codigo);
        $this->view('usuario/editar', ["usuario" => $usuario]);
    }

    public function atualizar()
    {
        $codigo = filter_input(INPUT_POST, "codigo");
        $login = filter_input(INPUT_POST, "login");
        $senha = filter_input(INPUT_POST, "senha");
        $email = filter_input(INPUT_POST, "email");
        $tipo = filter_input(INPUT_POST, "tipo");

        $usuario = new Usuario($login, $senha, $email, $tipo);
        $usuario->setCodigo($codigo);
        $usuarioDAO = new UsuarioDAO();
        $usuarioAtualizado = $usuarioDAO->atualizar($usuario);
        if ($usuarioAtualizado) {
            $msg = "Sucesso";
        } else {
            $msg = "Erro ao editar";
        }
        $this->view("usuario/editar", ["msg" => $msg, "usuario" => $usuarioAtualizado]);
    }

    public function deletar()
    {
        $codigo = filter_input(INPUT_POST, "codigo");
        $usuarioDAO = new UsuarioDAO();
        if ($usuarioDAO->deletar($codigo)) {
            $msg = "Sucesso!";
        } else {
            $msg = "Erro ao excluir usuário!";
        }
        $usuarios = $usuarioDAO->findAll();
        $this->view("usuario/index", ["msg" => $msg, "usuarios" => $usuarios]);
    }
}
