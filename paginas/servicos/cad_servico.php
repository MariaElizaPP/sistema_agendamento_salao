
<link rel="stylesheet" href="css/Serviços/cad_servico.css">

<div class="main-content">
   <header>
      <div class="titulos">
         <div class="voltar">
            <img src="icone_imagens/Voltar.svg" id="btn-voltar" class="titulo-icone">
            <h3>Novo serviço</h3>
         </div>
         <h4>Preencha os dados para registrar um novo serviço</h4>
      </div>  
   </header>
   <div>

      <form action="index.php?menuop=cad_servico" method="post">
         <div class="campo">
            <label for="servico">Serviço</label> 
            <input type="text" name="servico" placeholder="Insira o nome do serviço">
         </div>
         <div class="campo">
            <label for="valor">Valor</label> 
            <input type="number" name="valor" placeholder="R$">
         </div>
         <div class="campo">
            <label for="descricao">Descrição</label> 
            <input type="text" name="descricao" id="descricao" placeholder="Insira a descrição">
         </div>
         <div class="campo">
            <label for="duracao">Duração estimada</label> 
            <input type="time" name="duracao">
         </div>
         <div class="campo">
               <label for="status" >Defina o status do serviço:</label>
               <select name="status" id="status" >
                  <option value="" disabled selected>Selecione o status</option>
                  <option value="1">Ativo</option>
                  <option value="0">Inativo</option>
               </select>
         </div>
         <div class="cadastrar">
            <input type="submit" value="Cadastrar" name="btnAdicionar">
         </div>
      </form>

        <!-- Modal de confirmação -->
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




