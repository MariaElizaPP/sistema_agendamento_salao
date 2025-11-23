<?php
session_start(); 

// Verifica se o usuário está logado
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {  
    header("Location: ../paginas/login/login.php"); 
    exit(); 
} 
?>

<link rel="stylesheet" href="/sistema_agendamento/css/Agendamentos/cad_agendamento.css">

<div class="main-content">
    <header>
        <div class="titulos">
             <div class="h3-com-icone">
                <img src="icone_imagens/Voltar.svg" id="btn-voltar" class="titulo-icone">
                <h3>Novo Agendamento</h3>
            </div>
            <h4>Preencha os dados para registrar um novo agendamento</h4>
        </div>
    </header>


    <form action="index.php?menuop=cad_agendamento" method="POST">

        <label>Nome do cliente:</label>
        <input type="text" name="cliente" placeholder="Digite o nome do cliente" required>

        <label>Telefone:</label>
        <input type="text" name="telefone" placeholder="Digite o telefone" required>

        <label>Descrição:</label>
       <textarea name="descricao" placeholder="Digite uma descrição"></textarea>

        <label>Tipo:</label>
        <select name="tipo" id="tipo" required>
            <option value="" disabled selected>Selecione o tipo</option>
            <option value="servico">Serviço</option>
            <option value="pacote">Pacote</option>
        </select>

        <div id="div-servicos">
            <label>Selecione um serviço:</label>
            <select name="idServico">
                <option value="" disabled selected>Escolha um serviço</option>
                <?php foreach ($_REQUEST['servicos'] as $s): ?>
                    <option value="<?= $s->getId() ?>"><?= $s->getServico() ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div id="div-pacotes" style="display:none;">
            <label>Selecione um pacote:</label>
            <select name="idPacote">
                <option value="" disabled selected>Escolha um pacote</option>
                <?php foreach ($_REQUEST['pacotes'] as $p): ?>
                    <option value="<?= $p->getId() ?>"><?= $p->getNome() ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <label>Valor:</label>
        <input type="number" step="0.01" name="valor" placeholder="Digite o valor" required>

        <label>Data Inicial:</label>
        <input type="datetime-local" name="start" required>


        <label>Status do agendamento</label>
        <select name="flagStatus" required>
            <option value="" disabled selected>Selecione o status</option>
            <option value="0">Em andamento</option>
            <option value="1">Concluído</option>
        </select>

        <label>Status do pagamento</label>
        <select name="statusPagamento" required>
            <option value="" disabled selected>Selecione o status do pagamento</option>
            <option value="0">Pendente</option>
            <option value="1">Pago</option>
        </select>

        <button type="submit">Cadastrar agendamento</button>
    </form>

</div>

<!-- Modal -->
<div id="modalVoltar" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <img src="/sistema_agendamento/icone_imagens/atencao.svg" alt="Atenção">
      <h2>Atenção</h2>
    </div>

    <p class="modal-text">Certeza que deseja voltar? Suas alterações não serão salvas</p>

    <div class="modal-buttons">
      <button id="cancel-btn" type="button">Cancelar</button>

      <button id="confirm-btn" type="button">Voltar</button>
    </div>
  </div>
</div>

<script src="/sistema_agendamento/js/Agendamentos/cad_agendamento.js"></script>
<script src="/sistema_agendamento/js/Agendamentos/modal.js"></script>

