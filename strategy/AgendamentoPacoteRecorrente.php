<?php
require_once 'AgendamentoStrategy.php';

class AgendamentoPacoteRecorrente implements AgendamentoStrategy {
    public function gerarAgendamentos($dao, $dados) {
        $qtd = (int)$dados['quantidade_sessoes'];
        $data = new DateTime($dados['start']);
        $intervalo = new DateInterval("P1W");

        for ($i = 0; $i < $qtd; $i++) {
            $dados['start'] = $data->format('Y-m-d H:i:s');
            $dao->salvar($dados);
            $data->add($intervalo);
        }
    }
}
