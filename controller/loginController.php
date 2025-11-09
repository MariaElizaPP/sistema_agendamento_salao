<?php
session_start();
require_once '../db/conexao.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new LoginController();
    $controller->login();
} else {
    require '../paginas/login/login.php'; 
}

class LoginController {

    public function login() {
        $usuario = $_POST['usuario'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $con = new Conexao();
        $mysqli = $con->getConexao();

        // Primeiro pega o usuário pelo login
        $stmt = $mysqli->prepare("SELECT * FROM usuario WHERE login = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($row = $resultado->fetch_assoc()) {
            // Compara a senha (texto simples)
            if ($senha === $row['password']) {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['autenticado'] = true;
                header('Location: ../index.php');
                exit();
            } else {
                $_SESSION['error_message'] = 'Usuário ou senha inválidos!';
                require '../paginas/login/login.php';
                exit();
            }
        } else {
            $_SESSION['error_message'] = 'Usuário ou senha inválidos!';
            require '../paginas/login/login.php';
            exit();
        }
    }
}
?>
