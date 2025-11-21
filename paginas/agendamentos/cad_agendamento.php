
<h3>Novo Agendamento</h3>

<form action="index.php?menuop=cad_agendamento" method="POST">

    <label>Cliente:</label>
    <input type="text" name="cliente" required>

    <label>Telefone:</label>
    <input type="text" name="telefone" required>

    <label>Descrição:</label>
    <input type="text" name="descricao">

    <label>Tipo:</label>
    <select name="tipo" id="tipo">
        <option value="servico">Serviço</option>
        <option value="pacote">Pacote</option>
    </select>

    <label>Selecione um Serviço:</label>
    <select name="idServico">
        <?php foreach ($_REQUEST['servicos'] as $s): ?>
            <option value="<?= $s->getId() ?>"><?= $s->getServico() ?></option>
        <?php endforeach; ?>
    </select>

    <label>Valor:</label>
    <input type="number" step="0.01" name="valor" required>

    <label>Data Inicial:</label>
    <input type="datetime-local" name="start" required>

    <label>Quantidade de dias:</label>
    <input type="number" name="qtdDias" min="1" max="30" value="1">

    <button type="submit">Salvar</button>
</form>
