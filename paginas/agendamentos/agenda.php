<?php
  session_start(); 
    if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {  
        header("Location: ../paginas/login/login.html"); 
        exit(); 
    } 

?>   
<header>
    <h3>Agendamento</h3>
</header>
<div>
    <a href="index.php?menuop=cad_agendamento">Novo agendamento</a>
</div>
<?php if (!empty($_REQUEST['agendamentos'])): ?>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Serviço</th>
            <th>Cliente</th>
            <th>Descrição</th>
            <th>Telefone</th>
            <th>Data início</th>
            <th>Data fim</th>
            <th>Valor</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_REQUEST['agendamentos'] as $dados): ?>
        <tr>
            <td><?= $dados->getId() ?></td>
            <td><?= $dados->getServico() ?></td>
            <td><?= $dados->getCliente() ?></td>
            <td><?= $dados->getDescricao() ?></td>
            <td><?= $dados->getTelefone() ?></td>
            <td><?= $dados->getHoraInicio() ?></td>
            <td><?= $dados->getHoraFim() ?></td>
            <td><?= $dados->getValor() ?></td>
            <td><a href="index.php?menuop=editar_agendamento&id=<?= $dados->getId() ?>">Editar</a></td>
            <td><a href="index.php?menuop=excluir_agendamento&id=<?= $dados->getId() ?>">Excluir</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>
