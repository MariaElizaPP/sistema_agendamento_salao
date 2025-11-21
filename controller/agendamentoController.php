<?php
require_once __DIR__ . '/../models/agendamento.php';
require_once __DIR__ . '/../dao/agendamentoDAO.php';
require_once __DIR__ . '/../strategy/AgendamentoServicoSimples.php';
require_once __DIR__ . '/../strategy/AgendamentoPacoteRecorrente.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class AgendamentoController{
    public function listar()
    {
        $agendamentodao = new AgendamentoDAO();
        $agendamento = $agendamentodao->listar();
        $_REQUEST['agendamentos'] = $agendamento;
        require_once __DIR__ . '/../paginas/agendamentos/agenda.php';
    }
    public function criar() {
    $servicoDAO = new ServicoDAO();
    $pacoteDAO = new PacoteDAO();
    $_REQUEST['servicos'] = $servicoDAO->listar();
    $_REQUEST['pacotes'] = $pacoteDAO->listar();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dados = $_POST;
        $agendamentoDAO = new AgendamentoDAO();

        if ($dados['tipo'] == 'servico') {
            $strategy = new AgendamentoServicoSimples();
        } else {
            $strategy = new AgendamentoPacoteRecorrente();
        }

        $strategy->gerarAgendamentos($agendamentoDAO, $dados);

        header('Location: index.php?menuop=agendamento');
        exit();
    }

    require_once __DIR__ . '/../paginas/agendamentos/cad_agendamento.php';
}

    public function editar()
    {
        $agendamento = new Agendamento();
        $agendamentodao = new AgendamentoDAO();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $agendamento->setId($_POST['id']);
            $agendamento->setServico($_POST['servico']);
            $agendamento->setCliente($_POST['cliente']);
            $agendamento->setDescricao($_POST['descricao']);
            $agendamento->setTelefone($_POST['telefone']);
            //$agendamento->setValor($_POST['valor']);
            $agendamentodao->atualizar($agendamento);
            header('Location: index.php?menuop=agendamento');
            exit();
        } else {
            $id = $_GET['id'];
            $agendamentos = $agendamentodao->listar();
            foreach ($agendamentos as $dados) {
                if ($dados->getId() == $id) {
                    $agendamento = $dados;
                    break;
                }
            }
            require_once __DIR__ . '/../paginas/agendamentos/editar_agendamento.php';
        }
    }

    public function excluir()
    {
        $agendamento = new Agendamento();
        $agendamentodao = new AgendamentoDAO();
        $agendamento->setId($_GET['id']);
        $agendamentodao->excluir($agendamento);
        header('Location: index.php?menuop=agendamento');
        exit();
    }

}