<header>
    <h3>Adicionar novo</h3>
</header>
<div>
    <form action="index.php?menuop=cad_agendamento" method="post">
        <div>
           <label for="servico">Serviço</label> 
           <input type="text" name="servico">
        </div>
        <div>
           <label for="cliente">Cliente</label> 
           <input type="text" name="cliente">
        </div>
        <div>
           <label for="descricao">Descrição</label> 
           <input type="text" name="descricao">
        </div>
        <div>
           <label for="telefone">Telefone</label> 
           <input type="text" name="telefone">
        </div>
        <div>
           <label for="start">Hora marcada</label> 
           <input type="datetime-local" name="start">
        </div>
        <div>
           <label for="end">Hora de término</label> 
           <input type="datetime-local" name="end">
        </div>
        <div>
           <label for="valor">Valor</label> 
           <input type="number" name="valor">
        </div>
        <div>
           <input type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>