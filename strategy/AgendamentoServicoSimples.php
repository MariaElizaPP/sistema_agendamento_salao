<?php
require_once 'AgendamentoStrategy.php';
require_once 'dao/agendamentoDAO.php';

class AgendamentoServicoSimples implements AgendamentoStrategy {

    public function gerarAgendamentos($dao, $dados) {

        $start = new DateTime($dados['start']);
        $end = clone $start;

        // duração em minutos
        $end->modify("+{$dados['duracao']} minutes");

        $dados['end'] = $end->format("Y-m-d H:i:s");

        $dao->salvar($dados);
    }
}

