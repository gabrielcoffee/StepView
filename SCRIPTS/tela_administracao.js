const tela = document.querySelector(".telaModal");

function irTela()
{
    location.href = "tela_estados.php"
}





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

function carregarPaginaCpf(cpf)
{
    location.href = "tela_administracao.php?cpf=" + cpf;
}

function abrirConfirmarDeletarFunc(cpf)
{
    if (window.confirm("Realmente deseja deletar este funcionário(a)?")) {
        location.href = "PHPdeletar_funcionario.php?cpf=" + cpf;
    }
}

function recarregarPagina()
{
    location.href = "tela_administracao.php";
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


// Obtém referências para os campos de senha
const senhaInput = document.getElementsByName('senha')[0];
const errorSpan = document.getElementById('error');

// Adiciona evento de escuta de digitação no campo de senha
senhaInput.addEventListener('keyup', validarSenha);

// Função de validação de senha
function validarSenha() {
    const senha = senhaInput.value;
    const senhaRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[A-Z]).{8,}$/;

    if (senhaRegex.test(senha) == false) {
    errorSpan.textContent = 'A senha deve conter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas, números e caracteres especiais.';
    } else {
        errorSpan.textContent = "";
        const password1Input = document.getElementById('senha1');
        const password2Input = document.getElementById('senha2');
    }
}

// Função de validação do formulário
function validarFormulario(event) {
    const senha = senhaInput.value;
    const senhaRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[A-Z]).{8,}$/; 

    if (senhaRegex.test(senha) == false) {
    event.preventDefault(); // Impede o envio do formulário se a senha for inválida
    errorSpan.textContent ='A senha deve conter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas, números e caracteres especiais.';
    } else {
        const password1Input = document.getElementById('senha1');
        const password2Input = document.getElementById('senha2');

    }
}

// Adiciona evento de escuta de digitação nos campos de senha
password1Input.addEventListener('keyup', validatePassword);
password2Input.addEventListener('keyup', validatePassword);

// Função de validação de senha
function validatePassword() {
  const password1 = password1Input.value;
  const password2 = password2Input.value;

  if (password1 !== password2) {
    errorSpan.textContent = 'As senhas não estão iguais';
  } else {
    errorSpan.textContent = '';
  }
}

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