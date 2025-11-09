<?php
require_once __DIR__ . '/../models/agendamento.php';
require_once __DIR__ . '/../dao/agendamentoDAO.php';

class AgendamentoController{
    public function listar()
    {
        $agendamentodao = new AgendamentoDAO();
        $agendamento = $agendamentodao->listar();
        $_REQUEST['agendamentos'] = $agendamento;
        require_once __DIR__ . '/../paginas/agendamentos/agenda.php';
    }
    public function criar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $agendamento = new Agendamento();
            $agendamentodao = new AgendamentoDAO();
            $agendamento->setServico($_POST['servico']);
            $agendamento->setCliente($_POST['cliente']);
            $agendamento->setDescricao($_POST['descricao']);
            $agendamento->setTelefone($_POST['telefone']);
            $agendamento->setHoraInicio($_POST['start']);
            $agendamento->setHoraFim($_POST['end']);
            $agendamento->setValor($_POST['valor']);
            $agendamentodao->salvar($agendamento);
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
            $agendamento->setHoraInicio($_POST['start']);
            $agendamento->setHoraFim($_POST['end']);
            $agendamento->setValor($_POST['valor']);
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