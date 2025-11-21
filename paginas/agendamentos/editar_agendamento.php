<?php
  session_start(); 
    if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {  
        header("Location: paginas/login/login.php"); 
        exit(); 
    } 

?>
<header>
    <h3>Editar</h3>
</header>
<div>
    <form action="index.php?menuop=editar_agendamento" method="post">
        <div>
           <label for="id">ID</label> 
           <input type="hidden" name="id" value="<?=$agendamento->getId()?>">
        </div>
        <div>
           <label for="servico">Serviço</label> 
           <input type="text" name="servico" value="<?=$agendamento->getServico()?>">
        </div>
        <div>
           <label for="cliente">Cliente</label> 
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
       value="<?= date('Y-m-d\TH:i', strtotime($agendamento->getHoraInicio())) ?>">
        
        </div>
        <div>
           <label for="end">Hora de término</label> 
           <input type="datetime-local" name="end"
       value="<?= date('Y-m-d\TH:i', strtotime($agendamento->getHoraFim())) ?>">
        </div>
        <div>
           <label for="valor">Valor</label> 
           <input type="number" name="valor" value="<?=$agendamento->getValor()?>">
        </div>
        <div>
           <input type="submit" value="Salvar" name="btnAdicionar">
        </div>
    </form>
</div>