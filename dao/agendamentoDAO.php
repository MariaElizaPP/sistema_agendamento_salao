<?php
require_once __DIR__ . '/../models/agendamento.php';
require_once __DIR__ . '/../db/conexao.php';
require_once __DIR__ . '/../models/Servico.php';

class AgendamentoDAO{

    public function salvar($dados){
        $con = Conexao::getConexao();

        $stmt = $con->prepare("
            INSERT INTO agendamentos 
            (cliente, descricao, telefone, flagStatus, statusPagamento, tipo, id_referencia, sessao_numero, qtd_sessoes_total, valor, start, end)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            "sssiisiiidss",
            $dados['cliente'], 
            $dados['descricao'],
            $dados['telefone'],
            $dados['flagStatus'],
            $dados['statusPagamento'],
            $dados['tipo'],
            $dados['id_referencia'],
            $dados['sessao_numero'],
            $dados['qtd_sessoes_total'],
            $dados['valor'],
            $dados['start'],
            $dados['end']
        );

        $stmt->execute();
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
    $con = Conexao::getConexao();

    $result = $con->query("
        SELECT id, cliente, descricao, telefone, flagStatus, statusPagamento, tipo, id_referencia, valor, start 
        FROM agendamentos
    ");

    $agendamentos = [];

    while ($row = $result->fetch_assoc()) {

        $agendamento = new Agendamento();
        $agendamento->setId($row['id']);
        $agendamento->setCliente($row['cliente']);
        $agendamento->setDescricao($row['descricao']);
        $agendamento->setTelefone($row['telefone']);
        $agendamento->setStatusServico($row['flagStatus']);
        $agendamento->setStatusPagamento($row['statusPagamento']);
        $agendamento->setValor($row['valor']);
        $agendamento->setStart($row['start']);
        $agendamento->setTipo($row['tipo']);
        $agendamento->setIdTipo($row['id_referencia']);

        $agendamento->setServico(
            $this->nomeServicoPacote($row['tipo'], $row['id_referencia'])
        );

        $agendamentos[] = $agendamento;
    }

    $con->close();
    return $agendamentos;
}

private function nomeServicoPacote($tipo, $idReferencia)
{
    $con = Conexao::getConexao();

    if ($tipo === "servico") {
        $stmt = $con->prepare("SELECT servico FROM servicos WHERE id = ?");
    } else {
        $stmt = $con->prepare("SELECT nome FROM pacotes WHERE id = ?");
    }

    $stmt->bind_param("i", $idReferencia);
    $stmt->execute();

    $resultado = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    return $resultado ? array_values($resultado)[0] : "Desconhecido";
}





}


