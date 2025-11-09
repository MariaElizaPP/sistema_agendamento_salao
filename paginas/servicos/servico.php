
<header>
    <h3>Serviços</h3>
</header>
<div>
    <a href="index.php?menuop=cad_servico">Cadastrar novo serviço</a>
</div>
<?php if (!empty($_REQUEST['servicos'])): ?>
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
    <tbody>
    <?php foreach ($_REQUEST['servicos'] as $dados): ?>
    
        <tr>
            <td><?= $dados->getId()?></td>
            <td><?= $dados->getServico()?></td>
            <td><?= $dados->getValor()?></td>
            <td><?= $dados->getDescricao()?></td>
            <td><?= $dados->getDuracao()?></td>
            <td><?= $dados->getStatus()?></td>            
            <td><a href="index.php?menuop=editar_servico&id=<?=$dados->getId()?>">Editar</a></td>
            <td><a href="index.php?menuop=excluir_servico&id=<?=$dados->getId()?>">Excluir</a></td>
        </tr>
        <?php
            endforeach; 
        ?>
    </tbody>
</table>
<?php endif; ?>