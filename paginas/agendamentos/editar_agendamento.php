<?php
//aqui mostra os dados
    require_once __DIR__ . '/../../db/conexao.php';
    $con = Conexao::getConexao();
    $idServico = $_GET["id"];
    $sql = "SELECT * FROM agendamentos WHERE id = {$idServico}";
    $rs = mysqli_query($con, $sql) or die("Erro ao executar a consulta. " . mysqli_error($con));
    $dados = mysqli_fetch_assoc($rs); 
?>
<header>
    <h3>Editar</h3>
</header>
<div>
    <form action="index.php?menuop=atualizar_agendamento" method="post">
        <div>
           <label for="idServico">ID</label> 
           <input type="text" name="idServico" value="<?=$dados["id"]?>">
        </div>
        <div>
           <label for="nomeServico">Serviço</label> 
           <input type="text" name="nomeServico" value="<?=$dados["servico"]?>">
        </div>
        <div>
           <label for="nomeCliente">Cliente</label> 
           <input type="text" name="nomeCliente" value="<?=$dados["cliente"]?>">
        <div>
           <label for="descricaoAgendamento">Descrição</label> 
           <input type="text" name="descricaoAgendamento" value="<?=$dados["descricao"]?>">
        </div>
        <div>
           <label for="telefoneContato">Telefone</label> 
           <input type="text" name="telefoneContato" value="<?=$dados["telefone"]?>">
        </div>
        <div>
           <label for="horaInicio">Hora marcada</label> 
           <input type="datetime-local" name="horaInicio"
       value="<?= date('Y-m-d\TH:i', strtotime($dados['start'])) ?>">
        
        </div>
        <div>
           <label for="horaFim">Hora de término</label> 
           <input type="datetime-local" name="horaFim"
       value="<?= date('Y-m-d\TH:i', strtotime($dados['end'])) ?>">
        </div>
        <div>
           <label for="valorServico">Valor</label> 
           <input type="number" name="valorServico" value="<?=$dados["valor"]?>">
        </div>
        <div>
           <input type="submit" value="Salvar" name="btnAdicionar">
        </div>
    </form>
</div>