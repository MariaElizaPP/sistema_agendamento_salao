<link rel="stylesheet" href="css/pacotes.css">

<div class="main-content">
  <header>
      <div class="titulos">
        <h3>Listagem de Pacotes</h3>
        <h4>Veja todos os seus pacotes</h4>
      </div>

      <div class="botao">
        <a href="index.php?menuop=cad_pacote">Pacote</a>
      </div>

    
  </header>

  <?php if (!empty($_REQUEST['pacotes'])): ?>
  <table border="1">
      <thead>
          <tr class=titulo-tabela>
              <th>Nome</th>
              <th>Valor</th>
              <th>Descrição</th>
              <th>Quantidade de sessões</th>
              <th>Editar</th>
              <th>Excluir</th>
          </tr>
      </thead>
      <tbody class="corpo-tabela">
      <?php foreach ($_REQUEST['pacotes'] as $dados): ?>
      
          <tr>
              <td><?= $dados->getNome()?></td>
              <td><?= $dados->getValorTotal()?></td>
              <td><?= $dados->getDescricao()?></td>
              <td><?= $dados->getQtdSessoes()?></td>
            
              <td><a href="index.php?menuop=editar_pacote&id=<?=$dados->getId()?>"><img src="icone_imagens/editar.svg" alt="editar"></a></td>
              <td><a href="index.php?menuop=excluir_pacote&id=<?=$dados->getId()?>"><img src="icone_imagens/excluir.svg" alt="excluir"></a></td>
          </tr>
          <?php
              endforeach; 
          ?>
      </tbody>
  </table>
  <?php endif; ?>
</div>

<!-- Modal fora da tabela -->
<div id="modalExcluir" class="modal" style="display: none;">
  <div class="modal-content">
    <div class="modal-titulo">
      <img src="/sistema_agendamento/icone_imagens/atencao.svg" class="modal-imagem">
      <h3>Atenção!</h3>
    </div>

    <p>Tem certeza que deseja excluir este pacote?</p>

    <div class="modal-botoes">
      <a id="btnConfirmar" href="#" class="btn-confirmar">Sim</a>
      <button id="btnCancelar" class="btn-cancelar">Cancelar</button>
    </div>
  </div>
</div>

<script src="js/Pacotes/excluir_pac.js"></script>

