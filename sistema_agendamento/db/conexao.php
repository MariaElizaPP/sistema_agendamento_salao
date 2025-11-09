<?php
class Conexao {
    public static function getConexao() {
        $host = "localhost";        // Servidor MySQL
        $usuario = "root";             // Usuário padrão do XAMPP
        $senha = "";                // Senha padrão é vazia
        $banco = "salon_project";   // Nome do seu Banco de Dados
        $porta = 3306;              // Porta padrão do MySQL no XAMPP

        $con = new mysqli($host, $usuario, $senha, $banco, $porta);

        if ($con->connect_error) {
            die("Conexão falhou: " . $con->connect_error);
        }

        return $con;
    }
}
?>

