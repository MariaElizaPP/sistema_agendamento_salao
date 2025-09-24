<header>
    <h3>Atualizar</h3>
</header>
<?php
    require_once __DIR__ . '/../../db/conexao.php';
    $con = Conexao::getConexao();
    $idServico = mysqli_real_escape_string($con, $_POST["idServico"]);
    $nomeServico = mysqli_real_escape_string($con, $_POST["nomeServico"]);
    $nomeCliente = mysqli_real_escape_string($con, $_POST["nomeCliente"]);
    $descricaoAgendamento = mysqli_real_escape_string($con, $_POST["descricaoAgendamento"]);
    $telefoneContato = mysqli_real_escape_string($con, $_POST["telefoneContato"]);
    $valorServico = mysqli_real_escape_string($con, $_POST["valorServico"]);

    $horaInicio = !empty($_POST["horaInicio"]) 
        ? str_replace("T", " ", mysqli_real_escape_string($con, $_POST["horaInicio"])) . ":00"
        : null;

    $horaFim = !empty($_POST["horaFim"]) 
        ? str_replace("T", " ", mysqli_real_escape_string($con, $_POST["horaFim"])) . ":00"
        : null;

    $sql = "UPDATE agendamentos SET 
        servico = '{$nomeServico}',
        cliente = '{$nomeCliente}',
        descricao = '{$descricaoAgendamento}',
        telefone = '{$telefoneContato}',
        start = '{$horaInicio}',
        end = '{$horaFim}',
        valor = '{$valorServico}'
    WHERE id = '{$idServico}'";

        mysqli_query($con, $sql) or die("Erro ao executar a consulta. " . mysqli_error($con));

        echo "Sucesso! Agendamento atualizado no cronograma do salão";

?>