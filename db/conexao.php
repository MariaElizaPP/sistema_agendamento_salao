<?php
    Class Conexao{
        public static function getConexao(){
            $host = "localhost"; 	// Nome ou IP do Servidor
            $user = "root"; 		// Usuário do Servidor MySQL
            $senha = "usbw"; 		// Senha do Usuário MySQL
            $banco = "salon_project"; 		// Nome do seu Banco de Dados
            $con = new mysqli($host, $user, $senha, $banco);  
            if ($con->connect_error){
                die("Conexão falhou ". $con->connect_error);
            }
            return $con;
        }
        
       
    }
?>