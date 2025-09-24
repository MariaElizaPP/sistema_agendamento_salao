<?php
    require_once __DIR__ . '/db/conexao.php';
    //criando o objeto mysql e conectando ao banco de dados
	//$dados = $mysql->sqlquery($sqlconsulta,'consulta.php');

    $codigo = $_POST['codigo'];
    $sqlconsulta =  "select * from agendamentos";
	

	
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
            <a href="index.php?menuop=agendamento">Agendamento</a> |
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
                    include("paginas/agendamentos/agenda.php");
                    break;

                case 'cad_agendamento':
                    include("paginas/agendamentos/cad_agendamento.php");
                    break;
                
                case 'editar_agendamento':
                    include("paginas/agendamentos/editar_agendamento.php");
                    break;
                
                case 'atualizar_agendamento':
                    include("paginas/agendamentos/atualizar_agendamento.php");
                    break;

                case 'calendario':
                    include("paginas/agendamentoCalendario/agendamentos.php");
                    break;

                case 'configuracao':
                    include("paginas/configuracoes/configuracoes.php");
                    break;
                    
                case 'inserir_agendamento':
                    include("paginas/agendamentos/inserir_agendamento.php");
                    break;
                default:
                    include("paginas/home/home.php");
                    break;
            }
        ?>
    </main>
</body>
</html>