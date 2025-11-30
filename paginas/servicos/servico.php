<link rel="stylesheet" href="css/servico.css">

<div class="main-content">
  <header>
    <div class="titulos">
      <h3>Listagem de Serviços</h3>
      <h4>Veja todos os seus serviços</h4>
    </div>

    <div class="botao">
      <a href="index.php?menuop=cad_servico">Novo Serviço</a>
    </div>
  </header>

  <?php if (!empty($_REQUEST['servicos'])): ?>
  <table border="1" class="tabela">
      <thead>
          <tr class="titulo-tabela">
              <th>Servico</th>
              <th>Valor</th>
              <th>Descrição</th>
              <th>Duração Estimada</th>
              <th>Status</th>
              <th>Editar</th>
              <th>Excluir</th>
          </tr>
      </thead>

      <tbody class="corpo-tabela">
      <?php foreach ($_REQUEST['servicos'] as $dados): ?>
          <tr>
              <td><?= $dados->getServico()?></td>
              <td><?= $dados->getValor()?></td>
              <td><?= $dados->getDescricao()?></td>
              <td><?= date('H:i', strtotime($dados->getDuracao())) ?></td>

              <td class="<?= $dados->getStatus() == 1 ? 'ativo' : 'inativo' ?>">
                <?= $dados->getStatus() == 1 ? 'Ativo' : 'Inativo' ?>
              </td>

              <td>
                <a href="index.php?menuop=editar_servico&id=<?=$dados->getId()?>">
                  <img src="icone_imagens/editar.svg" alt="editar">
                </a>
              </td>

              <td>
                <a href="#" class="excluir-btn" data-id="<?=$dados->getId()?>">
                  <img src="icone_imagens/excluir.svg" alt="excluir">
                </a>
              </td>
          </tr>
      <?php endforeach; ?>
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

    <p>Tem certeza que deseja excluir este serviço?</p>

    <div class="modal-botoes">
      <a id="btnConfirmar" href="#" class="btn-confirmar">Sim</a>
      <button id="btnCancelar" class="btn-cancelar">Cancelar</button>
    </div>
  </div>
</div>

<script src="/sistema_agendamento/js/Serviços/excluir_modal.js"></script>
