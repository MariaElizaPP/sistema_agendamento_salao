<?php

require_once __DIR__. '/../db/conexao.php';
require_once __DIR__ . '/../models/loginModel.php';

class UsuarioDAO {

    private $con;

     public function __construct($con) {
        $this->con = $con;
    }

    public function buscarUsuario($usuario, $senha) {
        $stmt = $this->con->prepare("SELECT * FROM usuario WHERE login = ? AND password = ?");
        $stmt->bind_param("ss", $usuario, $senha);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

}
?>