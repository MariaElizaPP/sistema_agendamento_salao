<?php
session_start(); 

// Verifica se o usuário está logado
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {  
    header("Location: ../paginas/login/login.php"); 
    exit(); 
} 
?>

<link rel="stylesheet" href="css/agenda.css">

<header>
  <div class="titulos">
    <h3>Listagem de agendamentos</h3>
    <h4>Veja todos os seus agendamentos</h4>
  </div>

  <div class="botao">
    <a href="index.php?menuop=cad_agendamento">Novo agendamento</a>
  </div>
</header>


<?php if (!empty($_REQUEST['agendamentos'])): ?>
    <table border="0.5" class="tabela">
        <thead class=titulo-tabela>
            <tr>
                <th>Cliente</th>
                <th>Telefone</th>
                <th>Serviço</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody class="corpo-tabela">
            <?php foreach ($_REQUEST['agendamentos'] as $dados): ?>
                <tr>
                    <td><?= $dados->getCliente() ?></td>
                    <td><?= $dados->getTelefone() ?></td>
                    <td><?= $dados->getServico() ?></td>
                    <td><?= $dados->getDescricao() ?></td>
                    
                    <td><a href="index.php?menuop=editar_agendamento&id=<?= $dados->getId() ?>">
                        <img src="icone_imagens/editar.svg" alt="Editar" class="icone-botao">
                    </a>
                    </td>
                    <td><a href="index.php?menuop=excluir_agendamento&id=<?= $dados->getId() ?>"><img src="icone_imagens/excluir.svg" alt="excluir"></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Nenhum agendamento cadastrado.</p>
<?php endif; ?>
