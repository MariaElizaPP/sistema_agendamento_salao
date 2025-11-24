<div class="main-content">
   <header>
      <h3>Adicionar novo serviço</h3>
   </header>
   <div>
      <form action="index.php?menuop=cad_servico" method="post">
         <div>
            <label for="servico">Serviço</label> 
            <input type="text" name="servico">
         </div>
         <div>
            <label for="valor">Valor</label> 
            <input type="number" name="valor">
         </div>
         <div>
            <label for="descricao">Descrição</label> 
            <input type="text" name="descricao">
         </div>
         <div>
            <label for="duracao">Duração estimada</label> 
            <input type="time" name="duracao">
         </div>
         <div>
               <label for="status">Defina o status do serviço:</label>
               <select name="status" id="status">
                  <option value="1">Ativo</option>
                  <option value="0">Inativo</option>
               </select>
         </div>
         <div>
            <input type="submit" value="Adicionar" name="btnAdicionar">
         </div>
      </form>
   </div>
</div>
