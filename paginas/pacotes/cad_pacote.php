
<link rel="stylesheet" href="css/Pacotes/cad_pacote.css">

<div class="main-content">
   <header>
      <div class="titulos">
         <div class="voltar">
            <img src="icone_imagens/Voltar.svg" id="btn-voltar" class="titulo-icone">
            <h3>Novo Pacote</h3>
         </div>
         <h4>Preencha os dados para registrar um novo pacote</h4>
      </div>  
   </header>
   <div>

      <form action="index.php?menuop=cad_pacote" method="post">
        
         <div>
            <label for="pacotes">Nome</label> 
            <input type="text" name="pacotes" placeholder="Insira o nome do pacote">
         </div>
   
         <div>
            <label for="valor">Valor total</label> 
            <input type="number" name="valor" placeholder="R$">
         </div>
         <div>
            <label for="descricao">Descrição</label> 
            <input type="text" name="descricao" id="descricao" placeholder="Insira a descrição">
         </div>
         <div>
            <label for="sessoes">Quantidade de sessões</label> 
            <input type="number" name="sessoes" placeholder="Insira a quantidade">
         </div>
          <div class="cadastrar">
            <input type="submit" value="Cadastrar" name="btnAdicionar">
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