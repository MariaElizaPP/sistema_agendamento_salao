const modal = document.getElementById("modalExcluir");
    const btnCancelar = document.getElementById("btnCancelar");
    const btnConfirmar = document.getElementById("btnConfirmar");

    document.querySelectorAll(".excluir-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            let id = btn.dataset.id;
            
            btnConfirmar.href = `index.php?menuop=excluir_agendamento&id=${id}`;

            modal.style.display = "flex";
        });
    });

    btnCancelar.addEventListener("click", () => {
        modal.style.display = "none";
    });