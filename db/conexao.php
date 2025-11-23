<?php
    class Conexao {
        public static function getConexao() {
            $host = "localhost";     // Nome ou IP do Servidor
            $user = "root";          // Usuário do Servidor MySQL
            $senha = "usbw";         // Senha do Usuário MySQL -> raquel deixar vazia a senha
            $banco = "salon_project"; // Nome do seu Banco de Dados
            $porta = 3308;           // Porta do MySQL -> descomentar para rafaella

            //$con = new mysqli($host, $user, $senha, $banco);
            //para o codigo da rafa é só descomentar a linha a baixo e comentar a de cima
            $con = new mysqli($host, $user, $senha, $banco, $porta);

            if ($con->connect_error) {
                die("Conexão falhou: " . $con->connect_error);
            }

            return $con;
        }
    }
?>
