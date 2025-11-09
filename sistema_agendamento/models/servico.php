<?php

class Servico{

    public $id;
    public $servico;
    public $valor;
    public $descricao;
    public $duracao;
    public $status;
    

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

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDuracao($duracao)
    {
        $this->duracao = $duracao;
    }

    public function getDuracao(){
        return $this->duracao;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus(){
        return $this->status;
    }

}




