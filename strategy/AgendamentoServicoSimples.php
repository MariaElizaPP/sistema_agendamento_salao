<?php
require_once 'AgendamentoStrategy.php';

class AgendamentoServicoSimples implements AgendamentoStrategy {
    public function gerarAgendamentos($dao, $dados) {
        $dao->salvar($dados);
    }
}
