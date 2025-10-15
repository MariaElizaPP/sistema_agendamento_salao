<?php
    require_once __DIR__ . '/../../db/conexao.php';
    $con = Conexao::getConexao();
?>
<header>
    <h3>Serviços</h3>
</header>
<div>
    <a href="index.php?menuop=cad_servico">Cadastrar novo serviço</a>
</div>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Servico</th>
            <th>Valor</th>
            <th>Descrição</th>
            <th>Duração Estimada</th>
            <th>Status</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <?php
        $sql = "SELECT * from servicos";
        $rs = mysqli_query($con, $sql) or die("Erro ao executar a consulta" . mysqli_error($con));
        while($dados = mysqli_fetch_assoc($rs)){

        
    ?>
    <tbody>
        <tr>
            <td><?= $dados["id"]?></td>
            <td><?= $dados["servico"]?></td>
            <td><?= $dados["valor"]?></td>
            <td><?= $dados["descricao"]?></td>
            <td><?= $dados["duracao"]?></td>
            <td><?= $dados["status"]?></td>            
            <td><a href="index.php?menuop=editar_servico&id=<?=$dados['id']?>">Editar</a></td>
            <td><a href="index.php?menuop=excluir_servico&id=<?=$dados['id']?>">Excluir</a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>