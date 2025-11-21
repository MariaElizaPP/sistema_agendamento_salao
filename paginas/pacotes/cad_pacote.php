<header>
    <h3>Adicionar novo pacote</h3>
</header>
<div>
    <form action="index.php?menuop=cad_pacote" method="post">
        <div>
           <label for="pacotes">Nome</label> 
           <input type="text" name="pacotes">
        </div>
        <div>
           <label for="valor">Valor total</label> 
           <input type="number" name="valor">
        </div>
        <div>
           <label for="descricao">Descrição</label> 
           <input type="text" name="descricao">
        </div>
        <div>
           <label for="sessoes">Quantidade de sessões</label> 
           <input type="number" name="sessoes">
        </div>
        <div>
           <input type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>