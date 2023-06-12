const tela = document.querySelector(".telaModal");
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
/*function searchData()
{
    var search = document.getElementById('pesquisar');
    window.location = 'tela_administracao.php?search='+search.value;
}*/


const filterElement = document.querySelector('.inputPesquisa')

const items = document.querySelectorAll("table td")

filterElement.addEventListener('input', filterItems)

function filterItems()
{
    if(filterElement.value != '')
    {
        for(let item of items)
        {
            let filterText = filterElement.value

            let itemText = item.textContent

            if(!itemText.includes(filterText))
            {
                item.style.background = "white"
            }
            else
            {
                item.style.background = "pink"
            }
          
        }

    }
    else
    {
        for (let item of items)
        {
            item.style.background = "pink"
        }
    }
}


function telaEstado() 
{
    location.href = "tela_estados.php";

}


console.log(items);

console.log(filterElement);

