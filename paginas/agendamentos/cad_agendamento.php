<header>
    <h3>Adicionar novo</h3>
</header>
<div>
    <form action="index.php?menuop=inserir_agendamento" method="post">
        <div>
           <label for="nomeServico">Serviço</label> 
           <input type="text" name="nomeServico">
        </div>
        <div>
           <label for="nomeCliente">Cliente</label> 
           <input type="text" name="nomeCliente">
        </div>
        <div>
           <label for="descricaoAgendamento">Descrição</label> 
           <input type="text" name="descricaoAgendamento">
        </div>
        <div>
           <label for="telefoneContato">Telefone</label> 
           <input type="text" name="telefoneContato">
        </div>
        <div>
           <label for="horaInicio">Hora marcada</label> 
           <input type="datetime-local" name="horaInicio">
        </div>
        <div>
           <label for="horaFim">Hora de término</label> 
           <input type="datetime-local" name="horaFim">
        </div>
        <div>
           <label for="valorServico">Valor</label> 
           <input type="number" name="valorServico">
        </div>
        <div>
           <input type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>