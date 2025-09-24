<header>
    <h3>Adicionar</h3>
</header>
<?php
    require_once __DIR__ . '/../../db/conexao.php';
    $con = Conexao::getConexao();

    $nomeServico = mysqli_real_escape_string($con, $_POST["nomeServico"]);
    $nomeCliente = mysqli_real_escape_string($con, $_POST["nomeCliente"]);
    $descricaoAgendamento = mysqli_real_escape_string($con, $_POST["descricaoAgendamento"]);
    $telefoneContato = mysqli_real_escape_string($con, $_POST["telefoneContato"]);
    $horaInicio = mysqli_real_escape_string($con, $_POST["horaInicio"]);
    $horaFim = mysqli_real_escape_string($con, $_POST["horaFim"]);
    $valorServico = mysqli_real_escape_string($con, $_POST["valorServico"]);
    $sql = "INSERT INTO agendamentos (
        servico,
        cliente,
        descricao,
        telefone,
        start,
        end,
        valor
        ) VALUES(
            '{$nomeServico}',
            '{$nomeCliente}',
            '{$descricaoAgendamento}',
            '{$telefoneContato}',
            '{$horaInicio}',
            '{$horaFim}',
            '{$valorServico}'

        )";
    mysqli_query($con, $sql) or die("Erro ao executar a consulta. " . mysqli_error($con));

    echo "Sucesso! Agendamento adicionado ao cronograma do salão";

?>