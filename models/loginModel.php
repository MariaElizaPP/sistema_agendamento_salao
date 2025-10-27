<?php
    require_once '../dao/loginDAO.php';

    class UsuarioModel{
        private $usuarioDAO;

        public function __construct($con)
        {
            $this->usuarioDAO = new UsuarioDAO($con);
        }

        public function autenticar($usuario, $senha){
            $usuarioData = $this->usuarioDAO->buscarUsuario($usuario, $senha);
            return $usuarioData !== null;
        }

    }




?>