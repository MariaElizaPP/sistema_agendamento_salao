document.addEventListener("DOMContentLoaded", () => {
  // elementos do modal
  const modal = document.getElementById("modalExcluir");
  const btnCancelar = document.getElementById("btnCancelar");
  const btnConfirmar = document.getElementById("btnConfirmar");

  if (!modal) {
    console.warn("modalExcluir não encontrado no DOM");
    return;
  }
  if (!btnConfirmar) console.warn("btnConfirmar não encontrado");
  if (!btnCancelar) console.warn("btnCancelar não encontrado");

  // delegação: pega todos os links .excluir-btn
  const botoesExcluir = document.querySelectorAll(".excluir-btn");
  console.log("excluir-btn encontrados:", botoesExcluir.length);

  botoesExcluir.forEach(btn => {
    btn.addEventListener("click", (event) => {
      event.preventDefault(); // impede navegação imediata
      const id = btn.dataset.id;
      console.log("clicou excluir, id =", id);

      if (!id) {
        console.error("data-id não encontrado no botão excluir");
        return;
      }

      // define href do confirmar (link)
      btnConfirmar.setAttribute("href", `index.php?menuop=excluir_servico&id=${encodeURIComponent(id)}`);
      // mostra modal
      modal.style.display = "flex";
      modal.setAttribute("aria-hidden", "false");
    });
  });

  // cancelar fecha modal
  btnCancelar && btnCancelar.addEventListener("click", (e) => {
    e.preventDefault();
    modal.style.display = "none";
    modal.setAttribute("aria-hidden", "true");
  });

  // fechar clicando no overlay (fora do conteúdo)
  modal.addEventListener("click", (e) => {
    if (e.target === modal) {
      modal.style.display = "none";
      modal.setAttribute("aria-hidden", "true");
    }
  });

  // segurança: se btnConfirmar for clicado e href for "#", evita ação
  btnConfirmar && btnConfirmar.addEventListener("click", (e) => {
    const href = btnConfirmar.getAttribute("href");
    if (!href || href === "#") {
      e.preventDefault();
      console.warn("btnConfirmar sem href válido");
    } else {
      // aqui o link seguirá para a URL de exclusão (DELETE por GET no seu fluxo)
      // Se preferir fazer via fetch/AJAX, posso te mostrar como.
      console.log("Confirmar irá navegar para:", href);
    }
  });
});
