<?php
session_start(); 

// Verifica se o usuário está logado
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {  
    header("Location: ../paginas/login/login.php"); 
    exit(); 
} 
?>

<link rel="stylesheet" href="/sistema_agendamento/css/Agendamentos/agenda.css">

<div class="main-content">
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
            <thead class="titulo-tabela">
                <tr>
                    <th>Cliente</th>
                    <th>Telefone</th>
                    <th>Serviço</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Status do pagamento</th>
                    <th>Status do agendamento</th>
                    <th>Data marcada</th>
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
                        <td><?= $dados->getValor() ?></td>
                        
                        <td class="<?= $dados->getStatusPagamento() == 1 ? 'Pago' : 'Pendente' ?>">
                            <?= $dados->getStatusPagamento() == 1 ? 'Pago' : 'Pendente' ?>
                        </td>
                        
                        <td class="<?= $dados->getStatusServico() == 1 ? 'Concluído' : 'Em andamento' ?>">
                            <?= $dados->getStatusServico() == 1 ? 'Concluído' : 'Em andamento' ?>
                        </td>


                        <td><?= $dados->getStart()?></td>
                       
                        <td><a href="index.php?menuop=editar_agendamento&id=<?= $dados->getId() ?>">
                            <img src="icone_imagens/editar.svg" alt="Editar" class="icone-botao">
                        </a></td>
                        <td>
                            <img src="icone_imagens/excluir.svg" 
                                alt="excluir" 
                                class="icone-botao excluir-btn"
                                data-id="<?= $dados->getId() ?>">
                        </td>

                        

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum agendamento cadastrado.</p>
    <?php endif; ?>
</div>

<!-- Modal confirmar exclusão -->
<div id="modalExcluir" class="modal" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <img src="icone_imagens/atencao.svg">
            <h2>Atenção</h2>
        </div>

        <p class="modal-text">Deseja realmente excluir este agendamento?</p>

        <div class="modal-buttons">
            <button id="btnCancelar">Cancelar</button>
            <a id="btnConfirmar" href="#">
                <button class="confirmar">Excluir</button>
            </a>
        </div>
    </div>
</div>

<!-- JS -->
<script src="/sistema_agendamento/js/Agendamentos/agendamentos.js"></script>
<script src="/sistema_agendamento/js/Agendamentos/modal-exclusao.js"></script>



