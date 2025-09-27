<header>
    <h3>Excluir contato</h3>
</header>
<?php
require_once __DIR__ . '/../../db/conexao.php';
$con = Conexao::getConexao();
$idServico = $_GET["id"];
$idServico = mysqli_real_escape_string($con, $_GET["id"]);   
$sql = "DELETE FROM agendamentos WHERE id = {$idServico}";

mysqli_query($con, $sql) or die ("Erro ao excluir o registro " . mysqli_error($con));
echo "Agendamento excluído com sucesso!";


?>