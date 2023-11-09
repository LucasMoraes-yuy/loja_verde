<?php
namespace application\dao;

class Conexao {
    private $dbName = "loja";
    private $usuario = "lucas";
    private $senha = "15975348655";
    private $host = "localhost";

    private $conn;
    public function __construct() {
        $this-> conn = new  \mysqli($this->host, $this->usuario, $this->senha, $this->dbName);
    }

    public function getConexao() {
        if ($this->conn->connect_error) {
            die("A conexão falhou. " . $this->conn->connect_error);
        }

        return $this->conn;
    }
    public function conectar(){}
    public function desconectar(){
        $this->conn->close();
    }
}