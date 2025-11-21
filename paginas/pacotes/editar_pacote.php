<header>
    <h3>Adicionar novo pacote</h3>
</header>
<div>
    <form action="index.php?menuop=editar_pacote" method="post">
        <div>
            <label for="id">ID</label> 
            <input type="hidden" name="id" value="<?=$pacote->getId()?>">
        </div>
        <div>
           <label for="nome">Nome</label> 
           <input type="text" name="nome" value="<?=$pacote->getNome()?>">
        </div>
        <div>
           <label for="valor">Valor total</label> 
           <input type="number" name="valor_total"  value="<?=$pacote->getValorTotal()?>">
        </div>
        <div>
           <label for="descricao">Descrição</label> 
           <input type="text" name="descricao"  value="<?=$pacote->getDescricao()?>">
        </div>
        <div>
           <label for="sessoes">Quantidade de sessões</label> 
           <input type="number" name="sessoes"  value="<?=$pacote->getQtdSessoes()?>">
        </div>
        <div>
           <input type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>