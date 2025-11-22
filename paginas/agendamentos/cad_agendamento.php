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

    <div id="div-servicos">
        <label>Selecione um Serviço:</label>
        <select name="idServico">
            <?php foreach ($_REQUEST['servicos'] as $s): ?>
                <option value="<?= $s->getId() ?>"><?= $s->getServico() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div id="div-pacotes" style="display:none;">
        <label>Selecione um Pacote:</label>
        <select name="idPacote">
            <?php foreach ($_REQUEST['pacotes'] as $p): ?>
                <option value="<?= $p->getId() ?>"><?= $p->getNome() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <label>Valor:</label>
    <input type="number" step="0.01" name="valor" required>

    <label>Data Inicial:</label>
    <input type="datetime-local" name="start" required>

    <label>Status do agendamento</label>
        <select name="flagStatus">
                <option value="0">Em andamento</option>
                <option value="1">Concluído</option>
        </select>

    <label>Status do pagamento</label>
        <select name="statusPagamento">
                <option value="0">Pendente</option>
                <option value="1">Pago</option>
        </select>
    

    <button type="submit">Salvar</button>
</form>

<script>
document.getElementById("tipo").addEventListener("change", function () {
    if (this.value === "pacote") {
        document.getElementById("div-servicos").style.display = "none";
        document.getElementById("div-pacotes").style.display = "block";
    } else {
        document.getElementById("div-servicos").style.display = "block";
        document.getElementById("div-pacotes").style.display = "none";
    }
});
</script>
