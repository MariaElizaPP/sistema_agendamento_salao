<?php

class Agendamento{

    public $id;
    public $servico;
    public $cliente;
    public $descricao;
    public $telefone;
    public $statusServico;
    public $statusPagamento;
   
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setServico($servico)
    {
        $this->servico = $servico;
    }

    public function getServico(){
        return $this->servico;
    }

    public function setCliente($cliente){
        $this->cliente = $cliente;
    }

    public function getCliente(){
        return $this->cliente;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setStatusServico($statusServico)
    {
        $this->statusServico = $statusServico;
    }

    public function getStatusServico(){
        return $this->statusServico;
    }

    public function setStatusPagamento($statusPagamento)
    {
        $this->statusPagamento = $statusPagamento;
    }

    public function getStatusPagamento(){
        return $this->statusPagamento;
    }


}




?>