<?php
    require_once __DIR__ . '/db/conexao.php';
    require_once __DIR__ . '/controller/agendamentoController.php';
    require_once __DIR__ . '/controller/servicoController.php';
    require_once __DIR__ . '/controller/pacoteController.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $agendamentoController = new AgendamentoController();
    $servicoController =  new ServicoController();
    $pacoteController = new PacoteController();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Agendamentos</title>
    <link rel="stylesheet" href="css/index.css">

</head>
<body>
    <aside class="sidebar">

        <a href="index.php">
        <img src="/sistema_agendamento/icone_imagens/logo.svg" alt="Logo" class="logo">
        </a>

        <nav class="sidebar-nav">
            <ul class="nav-list primary-nav">
               
                <li><a href="#"><img src="icone_imagens/Sidebar/Calendario.svg" class="icon"> Calendário</a></li>
                <li><a href="index.php?menuop=agendamentos"><img src="icone_imagens/Sidebar/Agendamentos.svg" class="icon"> Agendamentos</a></li>
                <li><a href="index.php?menuop=servicos"><img src="icone_imagens/Sidebar/Servicos.svg" class="icon"> Serviços</a></li>
                <li><a href="index.php?menuop=pacotes"><img src="icone_imagens/Sidebar/Pacotes.svg" class="icon"> Pacotes</a></li>
                <li><a href="index.php?menuop=configuracao"><img src="icone_imagens/Sidebar/Configuracoes.svg" class="icon"> Configurações</a></li>
            </ul> 
        </nav>
    </aside>
    
    <main>
        <?php
            $menuop = (isset($_GET["menuop"]))?$_GET["menuop"]:"agendamentos";
            //se existe menuop redireciona senão vai automaticante para a home
            switch ($menuop) {
                case 'agendamentos':
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

                case 'pacotes':
                    $pacoteController->listar();
                    break;

                case 'cad_pacote':
                    $pacoteController->criar();
                    break;

                case 'editar_pacote':
                    $pacoteController->editar();
                    break;

                case 'excluir_pacote':
                    $pacoteController->excluir();
                    break;
                
                case 'calendario':
                    //include("paginas/agendamentoCalendario/agendamentos.php");
                    break;

                case 'configuracao':
                    include("paginas/configuracoes/configuracoes.php");
                    break;
                    
            
                default:
                include("paginas/agendamentos/agenda.php");
                break;
            }
        ?>
    </main>
</body>
</html>