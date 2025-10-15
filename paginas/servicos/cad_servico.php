<header>
    <h3>Adicionar novo serviço</h3>
</header>
<div>
    <form action="index.php?menuop=inserir_servico" method="post">
        <div>
           <label for="nomeServico">Serviço</label> 
           <input type="text" name="nomeServico">
        </div>
        <div>
           <label for="valorServico">Valor</label> 
           <input type="number" name="valorServico">
        </div>
        <div>
           <label for="descricaoServico">Descrição</label> 
           <input type="text" name="descricaoServico">
        </div>
        <div>
           <label for="duracaoEstimada">Duração estimada</label> 
           <input type="time" name="duracaoEstimada">
        </div>
       <div>
            <label for="statusServico">Defina o status do serviço:</label>
            <select name="statusServico" id="status">
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
       </div>
        <div>
           <input type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>