<?php
    require_once __DIR__ . '/../../db/conexao.php';
    $con = Conexao::getConexao();
?>
<header>
    <h3>Agenda</h3>
</header>
<div>
    <a href="index.php?menuop=cad_agendamento">Novo agendamento</a>
</div>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Servico</th>
            <th>Cliente</th>
            <th>Descrição</th>
            <th>Telefone</th>
            <th>Data do serviço</th>
            <th>Data final</th>
            <th>Valor</th>
            <th>Status</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <?php
        $sql = "SELECT * from agendamentos";
        $rs = mysqli_query($con, $sql) or die("Erro ao executar a consulta" . mysqli_error($con));
        while($dados = mysqli_fetch_assoc($rs)){

        
    ?>
    <tbody>
        <tr>
            <td><?= $dados["id"]?></td>
            <td><?= $dados["servico"]?></td>
            <td><?= $dados["cliente"]?></td>
            <td><?= $dados["descricao"]?></td>
            <td><?= $dados["telefone"]?></td>
            <td><?= $dados["start"]?></td>
            <td><?= $dados["end"]?></td>
            <td><?= $dados["valor"]?></td>
            <td><?= $dados["flagStatus"]?></td>            
            <td><a href="index.php?menuop=editar_agendamento&id=<?=$dados['id']?>">Editar</a></td>
            <td><a href="index.php?menuop=excluir_agendamento&id=<?=$dados['id']?>">Excluir</a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>