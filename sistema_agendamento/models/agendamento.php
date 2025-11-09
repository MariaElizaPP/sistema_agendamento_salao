<?php

class Agendamento{

    public $id;
    public $servico;
    public $cliente;
    public $descricao;
    public $telefone;
    public $horaInicio;
    public $horaFim;
    public $valor;

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

    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;
    }

    public function getHoraInicio(){
        return $this->horaInicio;
    }

    public function setHoraFim($horaFim)
    {
        $this->horaFim = $horaFim;
    }

    public function getHoraFim(){
        return $this->horaFim;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getValor(){
        return $this->valor;
    }


}




?>