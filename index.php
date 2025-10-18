<?php
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require_once __DIR__ . '/db/conexao.php';
    require_once __DIR__ . '/controller/agendamentoController.php';
    require_once __DIR__ . '/controller/servicoController.php';


    $agendamentoController = new AgendamentoController();
    $servicoController =  new ServicoController();
	
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Agendamentos</title>
</head>
<body>
    <header>
        <h1>Sistema de Agendamentos dos Serviços</h1>
        <nav>
            <a href="index.php?menuop=home">Home</a> |
            <a href="index.php?menuop=agendamento">Agendamentos</a> |
            <a href="index.php?menuop=servicos">Serviços</a> |
            <a href="index.php?menuop=calendario">Calendário</a> |
            <a href="index.php?menuop=configuracao">Configuração</a> 
        </nav>
    </header>
    <main>
        <?php
            $menuop = (isset($_GET["menuop"]))?$_GET["menuop"]:"home";
            //se existe menuop redireciona senão vai automaticante para a home
            switch ($menuop) {
                case 'home':
                    include("paginas/home/home.php");
                    break;
                    
                case 'agendamento':
                    $agendamentoController->listar();
                    break;

                case 'cad_agendamento':
                    $agendamentoController->criar();
                    break;
                
                case 'editar_agendamento':
                    $agendamentoController->editar();
                    break;
                
                case 'excluir_agendamento':
                    $agendamentoController->excluir();
                    break;
                
                case 'servicos':
                    $servicoController->listar();
                    break;

                case 'cad_servico':
                    $servicoController->criar();
                    break;

                case 'editar_servico':
                    $servicoController->editar();
                    break;

                case 'excluir_servico':
                    $servicoController->excluir();
                    break;
                
                case 'calendario':
                    include("paginas/agendamentoCalendario/agendamentos.php");
                    break;

                case 'configuracao':
                    include("paginas/configuracoes/configuracoes.php");
                    break;
                    
            
                default:
                    include("paginas/home/home.php");
                    break;
            }
        ?>
    </main>
</body>
</html>