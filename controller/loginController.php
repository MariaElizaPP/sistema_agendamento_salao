<?php

require_once '../models/loginModel.php';
require_once '../db/conexao.php';

 session_start();

 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $con = new Conexao();
        $controller = new LoginController($con->getConexao());
        $controller->login();
    

 } else {
    require '../paginas/login.php';

 }

 class LoginController{
    private $usuarioModel;

    public function __construct($con){
        $this->usuarioModel = new UsuarioModel($con);

    }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];

            if ($this->usuarioModel->autenticar($usuario, $senha)) {
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['autenticado'] = true;
                    header("Location: ../index.php");
                    exit();
            } else {
                    $_SESSION['error_message'] = "Usuário ou senha inválidos!";
                    require '../paginas/login/login.html';
                    header("Location: ../paginas/login/login.html");
                    exit();
            }
        } else {
            require '../paginas/login/login.html';
        }

    }

 }


?>