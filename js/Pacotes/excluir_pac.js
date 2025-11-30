document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("modalExcluir");
  const btnCancelar = document.getElementById("btnCancelar");
  const btnConfirmar = document.getElementById("btnConfirmar");

  if (!modal) return;

  const botoesExcluir = document.querySelectorAll(".excluir-btn");

  botoesExcluir.forEach(btn => {
    btn.addEventListener("click", (event) => {
      event.preventDefault();

      const id = btn.dataset.id;

      // ► CORREÇÃO: rota correta do pacote
      btnConfirmar.setAttribute(
        "href",
        `index.php?menuop=excluir_pacote&id=${encodeURIComponent(id)}`
      );

      modal.style.display = "flex";
      modal.setAttribute("aria-hidden", "false");
    });
  });

  btnCancelar?.addEventListener("click", (e) => {
    e.preventDefault();
    modal.style.display = "none";
  });

  modal.addEventListener("click", (e) => {
    if (e.target === modal) modal.style.display = "none";
  });
});
