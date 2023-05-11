<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tela_estado.css">
    <title>StepView</title>
</head>

<body>
    
    <div class="container">
        <header>
            <div class="header_titulo">
                <h1>StepView</h1>
            </div>
            <div class="barra_de_pesquisa">
                <input type="text" name="barra_de_pesquisa" placeholder="">
                <a class="loopa" href="">
                    <img src="loupe.png" alt="busca">
                </a>
            </div>
        </header>
        <nav>
            <div class="nav_esquerda">
               
                <button class="botao_criar_nav" onclick= "location.href = '../registrar_cliente.html';" >Criar</button>
               
               
            </div>
            <div class="nav_direita">

            </div>
        </nav>
        <main>
            <div class="board">
                <div class="dropzone">
                    <h3>Agendamento solicitado</h3>
                    <div class="card" draggable="true">
                        <h3>Card1</h3>
                    </div>
                </div>
            </div>
            <div class="board">
                <div class="dropzone">
                    <h3>Pagamento realizado</h3>
                    <div class="card" draggable="true">
                        <h3>Card2</h3>
                    </div>
                </div>
            </div>
            <div class="board">
                <div class="dropzone">
                    <h3>Agendamento realizado</h3>
                    <div class="card" draggable="true">
                        <h3>Card3</h3>
                    </div>
                </div>
            </div>
            <div class="board">
                <div class="dropzone">
                    <h3>Procedimento realizado</h3>
                    <div class="card" draggable="true">
                        <h3>Card4</h3>
                    </div>
                </div>
            </div>
        </main>
        <aside>
            <div class="aside_cima">
         
            </div>
            <div class="aside_baixo">

            </div>
        </aside>
    </div>
    <script src="tela_estado.js">
    </script>
</body>

</html>