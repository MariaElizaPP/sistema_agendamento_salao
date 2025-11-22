<?php
require_once __DIR__ . '/../models/agendamento.php';
require_once __DIR__ . '/../dao/agendamentoDAO.php';
require_once __DIR__ . '/../dao/pacoteServicoDAO.php';
require_once __DIR__ . '/../dao/servicoDAO.php';
require_once __DIR__ . '/../dao/pacoteDAO.php';
require_once __DIR__ . '/../strategy/AgendamentoServicoSimples.php';
require_once __DIR__ . '/../strategy/AgendamentoPacoteRecorrente.php';

class AgendamentoController {

    public function criar() {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $dados = [];
            $dados['cliente'] = $_POST['cliente'];
            $dados['telefone'] = $_POST['telefone'];
            $dados['descricao'] = $_POST['descricao'];
            $dados['tipo'] = $_POST['tipo'];
            $dados['start'] = $_POST['start'];
            $dados['valor'] = $_POST['valor'];
            $dados['flagStatus'] = $_POST['flagStatus'];
            $dados['statusPagamento'] = $_POST['statusPagamento'];

            if ($dados['tipo'] === "servico") {
                $dados['id_referencia'] = $_POST['idServico'];
            } else {
                $dados['id_referencia'] = $_POST['idPacote'];
            }

            $agendamentoDAO = new AgendamentoDAO();

            if ($dados['tipo'] === "servico") {

                $servicoDAO = new ServicoDAO();
                $servico = $servicoDAO->buscarPorId($dados['id_referencia']);

                if (!$servico) {
                    throw new Exception("Serviço não encontrado.");
                }

                $dados['duracao'] = $servico->getDuracao();
                $dados['quantidade_sessoes'] = 1;

                $strategy = new AgendamentoServicoSimples();
            }
            else if ($dados['tipo'] === "pacote") {

                $pacoteDAO = new PacoteDAO();
                $pacote = $pacoteDAO->buscarPorId($dados['id_referencia']);

                if (!$pacote) {
                    throw new Exception("Pacote não encontrado.");
                }
                $dados['quantidade_sessoes'] = $pacote->getQtdSessoes();

                $pacoteServicoDAO = new PacoteServicoDAO();
                $servicosPacote = $pacoteServicoDAO->buscarServicosPacotes($dados['id_referencia']);

                $duracaoTotal = 0;
                foreach ($servicosPacote as $s) {
                    $duracaoTotal += $s->getDuracao();
                }

                $dados['duracao'] = $duracaoTotal;

                $strategy = new AgendamentoPacoteRecorrente();
            }

            $dados['qtd_sessoes_total'] = $dados['quantidade_sessoes'];
            $dados['sessao_numero'] = 1;

            $strategy->gerarAgendamentos($agendamentoDAO, $dados);

            header("Location: index.php?menuop=agendamentos");
            exit();
        }

        $servicoDAO = new ServicoDAO();
        $pacoteDAO  = new PacoteDAO();

        $_REQUEST['servicos'] = $servicoDAO->listar();
        $_REQUEST['pacotes']  = $pacoteDAO->listar();

        require_once __DIR__ . '/../paginas/agendamentos/cad_agendamento.php';
    }

    public function listar() {
        $dao = new AgendamentoDAO();
        $_REQUEST['agendamentos'] = $dao->listar();
        require_once __DIR__ . '/../paginas/agendamentos/agenda.php';
    }

    public function editar(){
        $dao = new AgendamentoDAO();
        $agendamento = new Agendamento();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $agendamento->setId($_POST['id']);
            $agendamento->setCliente($_POST['cliente']);
            $agendamento->setTelefone($_POST['telefone']);
            $agendamento->setDescricao($_POST['descricao']);
            $agendamento->setStatusServico($_POST['flagStatus']);
            $agendamento->setStatusPagamento($_POST['statusPagamento']);

            $dao->atualizar($agendamento);

            header("Location: index.php?menuop=agendamentos");
            exit();
        }

        // GET (carregar dados)
        $id = $_GET['id'];
        $lista = $dao->listar();

        foreach ($lista as $a) {
            if ($a->getId() == $id) {
                $agendamento = $a;
                break;
            }
        }

        $_REQUEST['agendamento'] = $agendamento;

        require_once __DIR__ . '/../paginas/agendamentos/editar_agendamento.php';
    }
    public function excluir() {
        $agendamento = new Agendamento();
        $dao = new AgendamentoDAO();

        $agendamento->setId($_GET['id']);
        $dao->excluir($agendamento);

        header("Location: index.php?menuop=agendamentos");
        exit();
    }

}
