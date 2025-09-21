<?php
    Class BancodeDados{
        private $host = "localhost"; 	// Nome ou IP do Servidor
        private $user = "root"; 		// Usuário do Servidor MySQL
        private $senha = "usbw"; 		// Senha do Usuário MySQL
        private $banco = "salon_project"; 		// Nome do seu Banco de Dados
        public $con;   
        
        //metodo para conexao com a base de dados
        function conecta() {
        try {
            $this->con = new PDO(
                "mysql:host={$this->host};dbname={$this->banco};charset=utf8",
                $this->user,
                $this->senha
            );
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Problemas com a conexão: " . $e->getMessage());
        }
    }

    function fechar() {
        $this->con = null;
    }

    }
?>