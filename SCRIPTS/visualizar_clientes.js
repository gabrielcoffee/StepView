const tela = document.querySelector(".tela_cadastro")
const telaEditar = document.querySelector(".tela_editar")

function abrirModal()
{
    tela.classList.add("ola")
}

function abrirEditar()
{
    telaEditar.classList.add("ola")
}

function sairModal()
{
    tela.classList.remove("ola")
    telaEditar.classList.remove("ola")
}








console.log(tela);
