<link rel="stylesheet" href="css/Pacotes/edit_pacotes.css">

<div class="main-content">
   <header>
       <div class="titulos">
         <div class="voltar">
            <img src="icone_imagens/Voltar.svg" id="btn-voltar" class="titulo-icone">
            <h3>Editar pacote</h3>
         </div>
         <h4>Altere as informações do pacote</h4>
      </div> 
   </header>
   <div>


      <form action="index.php?menuop=editar_pacote" method="post">
          <div>
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
         <div class="salvar">
            <input type="submit" value="Adicionar" name="btnAdicionar">
         </div>
      </form>
   </div>
</div>

<div id="modal-voltar" class="modal">
   <div class="modal-content">

      <div class="modal-titulo">
         <img src="/sistema_agendamento/icone_imagens/atencao.svg" class="modal-imagem">
         <h3>Atenção!</h3>
      </div>

      <p>Certeza que deseja voltar? Suas alterações não serão salvas.</p>

      <div class="modal-botoes">
            <button id="confirmar-voltar" class="btn-confirmar">Sim</button>
            <button id="cancelar-voltar" class="btn-cancelar">Cancelar</button>
      </div>

   </div>
</div>

<script src="/sistema_agendamento/js/Serviços/modais.js"></script>