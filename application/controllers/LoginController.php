<?php

use application\core\Controller;
use application\dao\UsuarioDAO;
use application\models\Usuario;

class LoginController extends Controller
{
    public function index() {
        $this->view('login/index');
    }
    public function login()
    {
        // Verificar se os dados do formulário foram enviados
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['username'];
            $password = $_POST['password'];

            // Aqui você deve implementar a lógica de verificação no banco de dados
            // Verifique se o usuário e a senha correspondem

            // Exemplo básico de verificação (não seguro - apenas para fins educacionais)
            if ($this->validateLogin($login, $password)) {
                // Login bem-sucedido, redirecione para outra página ou execute a lógica desejada
                session_start();
                $_SESSION['autenticado'] = true;

                $this->view('home/index');
            } else {
                // Login falhou, exiba uma mensagem de erro ou redirecione para a página de login
                echo 'Invalid credentials!';
            }
        } else {
            // Se o método não for POST, exiba a página de login
            $this->view('login');
        }
    }

    // Método simples de validação (substitua isso com sua lógica real de validação)
    private function validateLogin($login, $password)
    {
        $usuarioDAO = new UsuarioDAO;
        $usuario = $usuarioDAO->findByLogin($login);
        // fiz correndo, nem sei se vai funcionar
        if ($usuario->getTipo() == 'A') {
            $_SESSION['tipo'] = $usuario->getTipo();
        } else {
            $_SESSION['tipo'] = $usuario->getTipo();
        }

        // Retorne true se as credenciais são válidas, false caso contrário
        return ($login === $usuario->getLogin() && $password === $usuario->getSenha());
    }
}
