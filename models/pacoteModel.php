<?php

class Pacote{

    public $id;
    public $nome;
    public $descricao;
    public $quantidade_sessoes;
    public $valor_total;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    
    public function getDescricao(){
        return $this->descricao;
    }

    
    public function setQtdSessoes($quantidade_sessoes)
    {
        $this->quantidade_sessoes = $quantidade_sessoes;
    }
    
    public function getQtdSessoes(){
        return $this->quantidade_sessoes;
    }



    public function setValorTotal($valor_total)
    {
        $this->valor_total = $valor_total;
    }

    public function getValorTotal(){
        return $this->valor_total;
    }

}




