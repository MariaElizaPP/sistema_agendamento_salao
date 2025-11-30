<link rel="stylesheet" href="css/Serviços/edit_servico.css">
<div class="main-content">
   <header>
       <div class="titulos">
         <div class="voltar">
            <img src="icone_imagens/Voltar.svg" id="btn-voltar" class="titulo-icone">
            <h3>Editar serviço</h3>
         </div>
         <h4>Altere as informações do serviço</h4>
      </div> 
   </header>
   <div>

      <form action="index.php?menuop=editar_servico" method="post">
         <div> 
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
            <input type="text" name="descricao"  id="descricao" value="<?=$servico->getDescricao()?>">
         </div>
         <div>
            <label for="duracao">Duração estimada</label> 
            <input type="time" name="duracao" value="<?=$servico->getDuracao()?>">
         </div>
         <div>
            <label for="status">Status</label> 
            <select name="status" id="status" >
                  <option value="1">Ativo</option>
                  <option value="0">Inativo</option>
               </select>
         </div>
         
         <div class="salvar">
            <input type="submit" value="Salvar" name="btnAdicionar">
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

<script src="/sistema_agendamento/js/Pacotes/modal_pac.js"></script>
