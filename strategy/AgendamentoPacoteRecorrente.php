<?php
require_once 'AgendamentoStrategy.php';
//teste
class AgendamentoPacoteRecorrente implements AgendamentoStrategy {

    public function gerarAgendamentos($dao, $dados) {

        $qtd = (int)$dados['quantidade_sessoes'];
        $start = new DateTime($dados['start']);

        for ($i = 0; $i < $qtd; $i++) {

            $sessaoStart = clone $start;

            $end = clone $sessaoStart;
            $end->modify("+{$dados['duracao']} minutes");

            $dados['start'] = $sessaoStart->format("Y-m-d H:i:s");
            $dados['end']   = $end->format("Y-m-d H:i:s");
            $dados['sessao_numero'] = $i + 1;

            $dao->salvar($dados);

            $start->modify("+1 week");
        }
    }
}

