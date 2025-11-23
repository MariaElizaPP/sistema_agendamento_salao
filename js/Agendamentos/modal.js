document.getElementById("btn-voltar").addEventListener("click", () => {
    document.getElementById("modalVoltar").style.display = "flex";
});

document.getElementById("cancel-btn").addEventListener("click", () => {
    document.getElementById("modalVoltar").style.display = "none";
});

document.getElementById("confirm-btn").addEventListener("click", () => {
    window.location.href = "/sistema_agendamento/index.php?menuop=agendamentos";
});
