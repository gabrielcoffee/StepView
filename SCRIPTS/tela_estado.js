

const cards = document.querySelectorAll('.card');
const dropzones = document.querySelectorAll('.dropzone');

cards.forEach(card =>{
    card.addEventListener('dragstart', dragstart);
    card.addEventListener('drag', drag);
    card.addEventListener('dragend', dragend);
});

function dragstart() 
{
    //console.log('> CARD: Star dragging')
    dropzones.forEach(dropzone => dropzone.classList.add('zona_ativada'));
    
    this.classList.add('fazendo_drag');
}
function drag() 
{
    //console.log('> CARD: Is dragging')
}
function dragend() 
{
    //console.log('> CARD: Stop drag!');
    dropzones.forEach(dropzone => dropzone.classList.remove('zona_ativada'));
    this.classList.remove('fazendo_drag');
}


dropzones.forEach(dropzone =>{
    dropzone.addEventListener('dragenter', dragenter);
    dropzone.addEventListener('dragover', dragover);
    dropzone.addEventListener('dragleave', dragleave);
    dropzone.addEventListener('drop', drop);
})

function dragenter() {
    //console.log('> DROPZONE: Enter in zone')
}

function dragover() {
    //console.log('> DROPZONE: Over');

    const cardBeingDragged = document.querySelector('.fazendo_drag');

    this.appendChild(cardBeingDragged);
}

function dragleave() {
    //console.log('> DROPZONE: Leave')
}

function drop() {
    //console.log('> DROPZONE: Dropped')
}


// Adiciona evento de escuta para cada card
cards.forEach(card => {
    card.addEventListener('dragend', () => {

        // Pega o estado atual da carta
        const estado = card.parentNode.parentNode.querySelector('h3').textContent;

        // Pega cpf do cliente
        const cpf = card.querySelector('h3').textContent;

        // Envia AJAX para atualizar banco de dados
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'PHPsalvar_estados.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(`cpf=${cpf}&estado=${estado}`);
    });
});
