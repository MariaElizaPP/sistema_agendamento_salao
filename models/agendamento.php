<?php

class Agendamento{

    private $id;
    private $servico;
    private $cliente;
    private $descricao;
    private $telefone;
    private $statusServico;
    private $statusPagamento;
    private $tipo;
    private $idTipo;
    private $qtdSessoes;
    private $qtdSessoesTotal;
    private $valor;
    private $start;
    private $end;
   
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
    public function getStatusPagamento()
    {
        return $this->statusPagamento;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    

    public function getTipo(){
        return $this->tipo;
    }

    public function setIdTipo($idTipo)
    {
        $this->idTipo = $idTipo;
    }

    public function getIdTipo(){
        return $this->idTipo;
    }

    public function setQtdSessoes($qtdSessoes)
    {
        $this->qtdSessoes = $qtdSessoes;
    }

    public function getQtdSessoes(){
        return $this->qtdSessoes;
    }

    public function setQtdSessoesTotal($qtdSessoesTotal)
    {
        $this->qtdSessoesTotal = $qtdSessoesTotal;
    }

    public function getQtdSessoesTotal(){
        return $this->qtdSessoesTotal;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setStart($start)
    {
        $this->start = $start;
    }

    public function getStart(){
        return $this->start;
    }

    public function setEnd($end)
    {
        $this->end = $end;
    }

    public function getEnd(){
        return $this->end;
    }

    
    


   

}




?>