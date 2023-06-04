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

function abrirConfirmarDeletar(idProcesso)
{
    if (window.confirm("Realmente deseja deletar o processo?")) {
        location.href = "PHPdeletar_processo.php?id_pro=" + idProcesso;
    }
    
}

/*
function animarDiv() {
    var div = document.querySelector(".containerMainEsquerda");
    var div2 = document.querySelector(".containerMainDireita");
    var botao = document.querySelector(".botaoVoltar");
    console.log(div);


    div2.style.display = "none";
    botao.style.width = "6vw"
    botao.style.height = "3vh"
    div.style.width = "68vw";
    div.style.height = "75vh";
    
   
    
}*/

function searchData()
{
    var data = document.getElementById('pro_data').value;
    location.href = 'tela_administracao.php?pesquisar=' + data;
}


function validarFormulario(event) {
    var senhaInput = document.getElementsByName('senha')[0];
    var senha = senhaInput.value;

    var senhaRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>])[A-Za-z\d!@#$%^&*()\-_=+{};:,<.>]{8,}$/;

    
    if (senhaRegex.test(senha) == false) {
        event.preventDefault(); // Impede o envio do formulário se a senha for inválida
        alert("A senha deve conter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas, números e caracteres especiais.");
    }
}


