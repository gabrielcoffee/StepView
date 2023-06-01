const tela = document.querySelector(".tela_cadastro");
const telaDeletar = document.querySelector(".tela_deletar");

function abrirModal()
{
    tela.classList.add("ola");
}

function abrirConfirmarDeletar(cpf)
{
    if (window.confirm("Realmente deseja deletar cliente?")) {
        location.href = "PHPdeletar_cliente.php?cpf=" + cpf;
    }
    
}

function recarregarPagina()
{
    location.href = "visualizar_clientes.php";
}

function carregarPaginaCpf(cpf)
{
    location.href = "visualizar_clientes.php?cpf=" + cpf;
}

function sairModal()
{
    tela.classList.remove("ola");
    telaDeletar.classList.remove("ola");
}


console.log(tela);
