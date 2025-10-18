<?php
require_once __DIR__ . '/../models/agendamento.php';
require_once __DIR__ . '/../db/conexao.php';

class AgendamentoDAO{

    public function salvar(Agendamento $agendamento)
    {
        $con =  Conexao::getConexao();
        $stmt = $con->prepare("INSERT INTO agendamentos (servico, cliente, descricao, telefone, start, end, valor) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssd", 
            $agendamento->getServico(),
            $agendamento->getCliente(),
            $agendamento->getDescricao(),
            $agendamento->getTelefone(),
            $agendamento->getHoraInicio(),
            $agendamento->getHoraFim(),
            $agendamento->getValor()
        );
        $stmt->execute();
        $stmt->close();
        $con->close();
    }

    public function atualizar(Agendamento $agendamento){
        $con = Conexao::getConexao();

        $stmt = $con->prepare("UPDATE agendamentos SET  servico=?, cliente=?, descricao=?, telefone=?, start=?, end=?, valor=?  WHERE id=?");
        $stmt->bind_param(
            "ssssssdi",
            $agendamento->getServico(),
            $agendamento->getCliente(),
            $agendamento->getDescricao(),
            $agendamento->getTelefone(),
            $agendamento->getHoraInicio(),
            $agendamento->getHoraFim(),
            $agendamento->getValor(),
            $agendamento->getId()
        );
        $stmt->execute();
        $stmt->close();
        $con->close();

    }

    public function excluir(Agendamento $agendamento)
    {
        $conn =  Conexao::getConexao();
        $stmt = $conn->prepare("DELETE FROM agendamentos WHERE id=?");
        $stmt->bind_param("i", $agendamento->getId());
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public function listar()
    {
        $con =  Conexao::getConexao();
        $result = $con->query("SELECT id, servico, cliente, descricao, telefone, start, end, valor FROM agendamentos");
        $agendamentos = [];
        while ($row = $result->fetch_assoc()) {
            $agendamento = new Agendamento();
            $agendamento->setId($row['id']);
            $agendamento->setServico($row['servico']);
            $agendamento->setCliente($row['cliente']);
            $agendamento->setDescricao($row['descricao']);
            $agendamento->setTelefone($row['telefone']);
            $agendamento->setHoraInicio($row['start']);
            $agendamento->setHoraFim($row['end']);
            $agendamento->setValor($row['valor']);
            $agendamentos[] = $agendamento;
        }
        $con->close();
        return $agendamentos;
    }


}


