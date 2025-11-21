<?php
    class Servico {
        private $id;
        private $servico;
        private $valor;
        private $descricao;
        private $duracao;
        private $status;

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getServico() {
            return $this->servico;
        }

        public function setServico($servico) {
            $this->servico = $servico;
        }

        public function getValor() {
            return $this->valor;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function getDuracao() {
            return $this->duracao;
        }

        public function setDuracao($duracao) {
            $this->duracao = $duracao;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }
    }
