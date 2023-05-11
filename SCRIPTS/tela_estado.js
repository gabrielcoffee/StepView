
/*
//Criando card do cliente.
var cardCliente = document.createElement("div");

cardCliente.classList = "div_criada"; // Colocando uma classe nessa div

//Criando variavel da onde nós queremos colocar esse elemento.
var container = document.querySelector(".estado1");

//Adicionando o elemento filho no elemento pai por appendChild.
container.appendChild(cardCliente);
*/

const cards = document.querySelectorAll('.card')
const dropzones = document.querySelectorAll('.dropzone')

cards.forEach(card =>{
    card.addEventListener('dragstart', dragstart)
    card.addEventListener('drag', drag)
    card.addEventListener('dragend', dragend)
})

function dragstart() 
{
    //console.log('> CARD: Star dragging')
    dropzones.forEach(dropzone => dropzone.classList.add('zona_ativada'))

    this.classList.add('fazendo_drag')
}
function drag() 
{
    //console.log('> CARD: Is dragging')
}
function dragend() 
{
    //console.log('> CARD: Stop drag!')
    dropzones.forEach(dropzone => dropzone.classList.remove('zona_ativada'))
    this.classList.remove('fazendo_drag')
}


dropzones.forEach(dropzone =>{
    dropzone.addEventListener('dragenter', dragenter)
    dropzone.addEventListener('dragover', dragover)
    dropzone.addEventListener('dragleave', dragleave)
    dropzone.addEventListener('drop', drop)
})

function dragenter() {
    //console.log('> DROPZONE: Enter in zone')
}

function dragover() {
    //console.log('> DROPZONE: Over')

    const cardBeingDragged = document.querySelector('.fazendo_drag')

    this.appendChild(cardBeingDragged)
}

function dragleave() {
    //console.log('> DROPZONE: Leave')
}

function drop() {
    //console.log('> DROPZONE: Dropped')
}