<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../models/servico.php';
require_once __DIR__ . '/../dao/servicoDAO.php';

class ServicoController{
    public function listar()
    {
    
        $servicodao = new ServicoDAO();
        $servicos = $servicodao->listar();
        $_REQUEST['servicos'] = $servicos;

        require_once __DIR__ . '/../paginas/servicos/servico.php';
    }
    public function criar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servico = new Servico();
            $servicodao = new ServicoDAO();
            $servico->setServico($_POST['servico']);
            $servico->setValor($_POST['valor']);
            $servico->setDescricao($_POST['descricao']);
            $servico->setDuracao($_POST['duracao']);
            $servico->setStatus($_POST['status']);
            $servicodao->salvar($servico);

            header('Location: index.php?menuop=servicos');
            exit();
        }
        require_once __DIR__ . '/../paginas/servicos/cad_servico.php';
    }

    public function editar()
    {
        $servico = new Servico();
        $servicodao = new ServicoDAO();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servico->setId($_POST['id']);
            $servico->setServico($_POST['servico']);
            $servico->setValor($_POST['valor']);
            $servico->setDescricao($_POST['descricao']);
            $servico->setDuracao($_POST['duracao']);
            $servico->setStatus($_POST['status']);
            $servicodao->atualizar($servico);
            header('Location: index.php?menuop=servicos');
            exit();
        } else {
            $id = $_GET['id'];
            $servicos = $servicodao->listar();
            foreach ($servicos as $dados) {
                if ($dados->getId() == $id) {
                    $servico = $dados;
                    break;
                }
            }
            require_once __DIR__ . '/../paginas/servicos/editar_servico.php';
        }
    }

    public function excluir()
    {
        $servico = new Servico();
        $servicodao = new ServicoDAO();
        $servico->setId($_GET['id']);
        $servicodao->excluir($servico);
        header('Location: index.php?menuop=servicos');
        exit();
    }

}