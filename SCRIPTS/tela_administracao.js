const tela = document.querySelector(".telaModal");

function abrirModal()
{
    tela.classList.add("ola");
}

function sairModal()
{
    tela.classList.remove("ola");
}

function alo()
{
    location.href = "visualizar_clientes.php";

}
function animarDiv() {
    var div = document.querySelector(".containerMainEsquerda")
    div.style.width = "34vw";
    div.style.height = "75vh";
  }