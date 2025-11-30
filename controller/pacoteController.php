<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../models/pacoteModel.php';
require_once __DIR__ . '/../dao/pacoteDAO.php';
require_once __DIR__ . '/../dao/pacoteServicoDAO.php';
require_once __DIR__ . '/../dao/servicoDAO.php';

class PacoteController{
    public function listar()
    {
    
        $pacotedao = new PacoteDAO();
        $pacotes = $pacotedao->listar();
        $_REQUEST['pacotes'] = $pacotes;

        //mudar o caminho conforme o front
        require_once __DIR__ . '/../paginas/pacotes/pacote.php';
    }
    public function criar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pacote = new Pacote();
            $pacotedao = new PacoteDAO();
            $pacote->setValorTotal($_POST['valor']);
            $pacote->setNome($_POST['pacotes']);
            $pacote->setDescricao($_POST['descricao']);
            $pacote->setQtdSessoes($_POST['sessoes']);
            

            $idPacote = $pacotedao->salvar($pacote);

            $pacoteServicoDAO = new PacoteServicoDAO();
            if (!empty($_POST['servicos'])){
                $pacoteServicoDAO->adicionarServicos($idPacote, $_POST['servicos']);

            }
             
            header('Location: index.php?menuop=pacotes');
            exit();
        }
        $servicoDAO = new ServicoDAO();
        $_REQUEST['servicos'] = $servicoDAO->listar();

        require_once __DIR__ . '/../paginas/pacotes/cad_pacote.php';
    }

    public function editar(){
        $pacote = new Pacote();
        $pacotedao = new PacoteDAO();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pacote->setId($_POST['id']);
            $pacote->setNome($_POST['nome']);
            $pacote->setDescricao($_POST['descricao']);
            $pacote->setQtdSessoes($_POST['sessoes']);
            $pacote->setValorTotal($_POST['valor_total']);

            $pacotedao->atualizar($pacote);

            header('Location: index.php?menuop=pacotes');
            exit();
        } else {
            $id = $_GET['id'];
            $pacotes = $pacotedao->listar();
            foreach ($pacotes as $dados) {
                if ($dados->getId() == $id) {
                    $pacote = $dados;
                    break;
                }
            }
            require_once __DIR__ . '/../paginas/pacotes/editar_pacote.php';
        }
    }


    public function excluir()
    {
        $pacote = new Pacote();
        $pacotedao = new PacoteDAO();
        $pacote->setId($_GET['id']);
        $pacotedao->excluir($pacote);
        header('Location: index.php?menuop=pacotes');
        exit();
    }

}