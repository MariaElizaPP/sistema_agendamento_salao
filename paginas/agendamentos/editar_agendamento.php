<?php
  session_start(); 
    if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {  
        header("Location: paginas/login/login.php"); 
        exit(); 
    } 

?>

<link rel="stylesheet" href="/sistema_agendamento/css/Agendamentos/cad_agendamento.css">
 
<div class="main-content">
    <header>
        <div class="titulos">
             <div class="h3-com-icone">
                <img src="icone_imagens/Voltar.svg" id="btn-voltar" class="titulo-icone">
                <h3>Editar Agendamento</h3>
            </div>
            <h4>Altere as informações do agendamento</h4>
        </div>
    </header>

<div>
    <form action="index.php?menuop=editar_agendamento" method="post">
        <div>
           <!--<label for="id">ID</label> 
           <input type="hidden" name="id" value="<?=$agendamento->getId()?>">-->
        </div>
        <div>
           <label for="servico">Serviço</label> 
           <input type="text" name="servico" value="<?=$agendamento->getServico()?>">
        </div>
        <div>
           <label for="cliente">Nome do cliente</label> 
           <input type="text" name="cliente" value="<?=$agendamento->getCliente()?>">
        <div>
           <label for="descricao">Descrição</label> 
           <input type="text" name="descricao" value="<?=$agendamento->getDescricao()?>">
        </div>
        <div>
           <label for="telefone">Telefone</label> 
           <input type="text" name="telefone" value="<?=$agendamento->getTelefone()?>">
        </div>
        <div>
           <label for="start">Hora marcada</label> 
           <input type="datetime-local" name="start"
       value="<?= date('Y-m-d\TH:i', strtotime($agendamento->getStart())) ?>">
        </div>
   
        <div>
           <label for="valor">Valor</label> 
           <input type="number" name="valor" value="<?=($agendamento->getValor())?>">
        </div>

        <label>Status do agendamento</label>
        <select name="flagStatus">
                <option value="0">Em andamento</option>
                <option value="1">Concluído</option>
        </select>

        <label>Status do pagamento</label>
        <select name="statusPagamento">
                <option value="0">Pendente</option>
                <option value="1">Pago</option>
        </select>

        <div>
           <button type="submit">Alterar agendamento</button>
        </div>
    </form>
</div>
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