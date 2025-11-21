<?php
require_once __DIR__ . '/../models/agendamento.php';
require_once __DIR__ . '/../db/conexao.php';
require_once __DIR__ . '/../models/Servico.php';

class AgendamentoDAO{

    /*public function salvar(Agendamento $agendamento)
    {
        $con =  Conexao::getConexao();
        $stmt = $con->prepare("INSERT INTO agendamentos (cliente, descricao, telefone, flagStatus, statusPagamento) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssii", 
            $agendamento->getCliente(),
            $agendamento->getDescricao(),
            $agendamento->getTelefone(),
            $agendamento->getStatusServico(),
            $agendamento->getStatusPagamento()
            
        );
        $stmt->execute();

        $idAgendamento = $con->insert_id;
        $stmt->close();

        $stmt2 = $con->prepare("
            INSERT INTO agendamento_servicos (id_agendamento, id_servico, start, end, valor)
            VALUES (?, ?, ?, ?, ?)
        ");

        foreach ($servicosSelecionados as $s) {
            $stmt2->bind_param("isssd",
                $idAgendamento,
                $s['id_servico'],
                $s['start'],
                $s['end'],
                $s['valor']
            );
            $stmt2->execute();
        }

        $stmt2->close();

        $con->close();
    }*/

    /*public function salvar($dados)
    {
        $con = Conexao::getConexao();
        $stmt = $con->prepare("INSERT INTO agendamentos (cliente, descricao, telefone, start) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss",
            $dados['cliente'],
            $dados['descricao'],
            $dados['telefone'],
            $dados['start']
        );
        $stmt->execute();
        $stmt->close();
        $con->close();
    }*/

    private function salvarAgendamentoPrincipal($dados) {
        $con = Conexao::getConexao();
        $stmt = $con->prepare("INSERT INTO agendamentos (cliente, descricao, telefone, flagStatus, statusPagamento) VALUES (?, ?, ?, 0, 0)");
        $stmt->bind_param("sss", $dados['cliente'], $dados['descricao'], $dados['telefone']);
        $stmt->execute();
        $id = $con->insert_id;
        $stmt->close();
        return $id;
    }

    public function salvarSimples($dados) {
        $idAgendamento = $this->salvarAgendamentoPrincipal($dados);

        $con = Conexao::getConexao();
        $stmt = $con->prepare("
            INSERT INTO agendamento_servicos (id_agendamento, id_servico, start, end, valor)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("isssd", $idAgendamento, $dados['idServico'], $dados['start'], $dados['start'], $dados['valor']);
        $stmt->execute();
        $stmt->close();
    }

    public function salvarRecorrente($dados) {
        $idAgendamento = $this->salvarAgendamentoPrincipal($dados);
        $con = Conexao::getConexao();

        $stmt = $con->prepare("
            INSERT INTO agendamento_servicos (id_agendamento, id_servico, start, end, valor)
            VALUES (?, ?, ?, ?, ?)
        ");

        for ($i = 0; $i < $dados['qtdDias']; $i++) {
            $data = date("Y-m-d H:i:s", strtotime("+$i day", strtotime($dados['start'])));
            $stmt->bind_param("isssd", $idAgendamento, $dados['idServico'], $data, $data, $dados['valor']);
            $stmt->execute();
        }

        $stmt->close();
    }

    public function atualizar(Agendamento $agendamento){
        $con = Conexao::getConexao();

        $stmt = $con->prepare("UPDATE agendamentos SET cliente=?, descricao=?, telefone=?, flagStatus=?, statusPagamento=? WHERE id=?");
        $stmt->bind_param(
            "sssiii",
            $agendamento->getCliente(),
            $agendamento->getDescricao(),
            $agendamento->getTelefone(),
            $agendamento->getStatusServico(),
            $agendamento->getStatusPagamento(),
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
        $result = $con->query("SELECT id, cliente, descricao, telefone, flagStatus, statusPagamento FROM agendamentos");
        $agendamentos = [];
        while ($row = $result->fetch_assoc()) {
            $agendamento = new Agendamento();
            $agendamento->setId($row['id']);
            $agendamento->setCliente($row['cliente']);
            $agendamento->setDescricao($row['descricao']);
            $agendamento->setTelefone($row['telefone']);
            $agendamento->setStatusServico($row['flagStatus']);
            $agendamento->setStatusPagamento($row['statusPagamento']);
            $agendamentos[] = $agendamento;
        }
        $con->close();
        return $agendamentos;
    }




}


