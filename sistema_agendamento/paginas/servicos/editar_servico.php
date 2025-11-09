<header>
    <h3>Editar</h3>
</header>
<div>
    <form action="index.php?menuop=editar_servico" method="post">
        <div>
           <label for="id">ID</label> 
           <input type="hidden" name="id" value="<?=$servico->getId()?>">
        </div>
        <div>
           <label for="servico">Serviço</label> 
           <input type="text" name="servico" value="<?=$servico->getServico()?>">
        </div>
         <div>
           <label for="valor">Valor</label> 
           <input type="number" name="valor" value="<?=$servico->getValor()?>">
        </div>
        <div>
           <label for="descricao">Descrição</label> 
           <input type="text" name="descricao" value="<?=$servico->getDescricao()?>">
        </div>
        <div>
           <label for="duracao">Descrição</label> 
           <input type="time" name="duracao" value="<?=$servico->getDuracao()?>">
        </div>
        <div>
           <label for="status">Status</label> 
           <select name="status" id="status" >
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
        </div>
       
        <div>
           <input type="submit" value="Salvar" name="btnAdicionar">
        </div>
    </form>
</div>