<?php

require_once __DIR__ . '/../models/servico.php';
require_once __DIR__ . '/../db/conexao.php';

class ServicoDAO{

    public function salvar(Servico $servico)
    {
        $con =  Conexao::getConexao();
        $stmt = $con->prepare("INSERT INTO servicos (servico, valor, descricao, duracao, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sdssi", 
            $servico->getServico(),
            $servico->getValor(),
            $servico->getDescricao(),
            $servico->getDuracao(),
            $servico->getStatus()
        );
        $stmt->execute();
        $stmt->close();
        $con->close();
    }

    public function atualizar(Servico $servico){
        $con = Conexao::getConexao();

        $stmt = $con->prepare("UPDATE servicos SET  servico=?, valor=?, descricao=?, duracao=?, status=? WHERE id=?");
        $stmt->bind_param(
            "sdssii",
            $servico->getServico(),
            $servico->getValor(),
            $servico->getDescricao(),
            $servico->getDuracao(),
            $servico->getStatus(),
            $servico->getId()
        );
        $stmt->execute();
        $stmt->close();
        $con->close();

    }

    public function excluir(Servico $servico)
    {
        $conn =  Conexao::getConexao();
        $stmt = $conn->prepare("DELETE FROM servicos WHERE id=?");
        $stmt->bind_param("i", $servico->getId());
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public function listar()
    {
        $con =  Conexao::getConexao();
        $result = $con->query("SELECT id, servico, valor, descricao, duracao, status FROM servicos");
        $servicos = [];
        while ($row = $result->fetch_assoc()) {
            $servico = new Servico();
            $servico->setId($row['id']);
            $servico->setServico($row['servico']);
            $servico->setValor($row['valor']);
            $servico->setDescricao($row['descricao']);
            $servico->setDuracao($row['duracao']);
            $servico->setStatus($row['status']);
            $servicos[] = $servico;
        }
        $con->close();
        return $servicos;
    }


}


