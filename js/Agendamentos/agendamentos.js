document.getElementById("tipo").addEventListener("change", function () {
    if (this.value === "pacote") {
        document.getElementById("div-servicos").style.display = "none";
        document.getElementById("div-pacotes").style.display = "block";
    } else {
        document.getElementById("div-servicos").style.display = "block";
        document.getElementById("div-pacotes").style.display = "none";
    }
});