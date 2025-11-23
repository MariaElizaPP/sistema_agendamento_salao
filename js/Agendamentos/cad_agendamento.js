document.getElementById("tipo").addEventListener("change", function () {

    let selectServ = document.querySelector("select[name='idServico']");
    let selectPac = document.querySelector("select[name='idPacote']");

    if (this.value === "pacote") {

        document.getElementById("div-servicos").style.display = "none";
        document.getElementById("div-pacotes").style.display = "block";

        // controla required
        selectServ.removeAttribute("required");
        selectPac.setAttribute("required", "required");

    } else {

        document.getElementById("div-servicos").style.display = "block";
        document.getElementById("div-pacotes").style.display = "none";

        // controla required
        selectPac.removeAttribute("required");
        selectServ.setAttribute("required", "required");
    }
});
