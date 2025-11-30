document.addEventListener("DOMContentLoaded", function () {
    const btnVoltar = document.getElementById("btn-voltar");
    const modalVoltar = document.getElementById("modal-voltar");
    const confirmarVoltar = document.getElementById("confirmar-voltar");
    const cancelarVoltar = document.getElementById("cancelar-voltar");

    if (btnVoltar && modalVoltar) {
        btnVoltar.addEventListener("click", function (e) {
            e.preventDefault();
            modalVoltar.style.display = "flex";
        });
    }

    if (confirmarVoltar) {
        confirmarVoltar.addEventListener("click", function () {
            window.history.back();
        });
    }

    if (cancelarVoltar && modalVoltar) {
        cancelarVoltar.addEventListener("click", function () {
            modalVoltar.style.display = "none";
        });
    }
});
