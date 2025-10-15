<header>
    <h3>Adicionar serviço</h3>
</header>
<?php
    require_once __DIR__ . '/../../db/conexao.php';
    $con = Conexao::getConexao();

    $nomeServico = mysqli_real_escape_string($con, $_POST["nomeServico"]);
    $valorServico = mysqli_real_escape_string($con, $_POST["valorServico"]);
    $descricaoServico = mysqli_real_escape_string($con, $_POST["descricaoServico"]);
    $duracaoEstimada = mysqli_real_escape_string($con, $_POST["duracaoEstimada"]);
    $statusServico = mysqli_real_escape_string($con, $_POST["statusServico"]);
    
    $sql = "INSERT INTO servicos (
        servico,
        valor,
        descricao,
        duracao,
        status
        ) VALUES(
            '{$nomeServico}',
            '{$valorServico}',
            '{$descricaoServico}',
            '{$duracaoEstimada}',
            '{$statusServico}'
            

        )";
    mysqli_query($con, $sql) or die("Erro ao executar a consulta. " . mysqli_error($con));

    echo "Sucesso! Serviço adicionado ao cronograma do salão";

?>