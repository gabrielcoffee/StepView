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
    const div = document.querySelector(".containerMainEsquerda")
    const div2 = document.querySelector(".containerMainDireita")
    const botao = document.querySelector(".botaoVoltar")
    div2.style.display = "none";
    botao.style.width = "6vw"
    botao.style.height = "3vh"
    div.style.width = "68vw";
    div.style.height = "75vh";
    
   
    
  }


function searchData()
{
    var search = document.getElementById('pesquisar');
    window.location = 'tela_administracao.php?search='+search.value;
}