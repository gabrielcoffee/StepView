<?php
// Inicia session
session_start();

// Confere se funcionario esta logado senão envia para login
if (!isset($_SESSION["logged"]) || $_SESSION["logged"] == false)
{
    header("Location: ../index.html");
}

$login = $_SESSION["logged"];

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ESTILOS/tela_estado.css">
    <title>StepView Estados</title>
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
                    <img src="../IMAGENS/loupe.png" alt="busca">
                </a>
            </div>
        </header>
        <nav>
            <div class="nav_esquerda">
                <button class="botao_criar_nav" onclick= "location.href = 'visualizar_clientes.php';" >Lista Clientes</button>            
               
            </div>
            <div class="nav_direita">

            </div>
        </nav>
        <main>
            <div class="board">
                <div class="dropzone">
                    <h3>Agendamento solicitado</h3>

                    <?php

                    include_once "PHPconfig.php";

                    $sql = "SELECT * FROM cliente WHERE estado = 1";

                    $result = $conn->query($sql);

                    while($cliente = $result->fetch_assoc())
                    {
                        $cpf        = $cliente["cpf"];
                        $nome       = $cliente["nome"];
                        
                        if ($login == "odontologista")
                        {
                            echo "<div class='card'><h3>".$cpf."</h3><h2>".$nome."</h2></div>";
                        }
                        else
                        {
                            echo "<div class='card' draggable='true'><h3>".$cpf."</h3><h2>".$nome."</h2></div>";
                        }
                    }
                    ?>
                    

                </div>
            </div>
            <div class="board">
                <div class="dropzone">
                    <h3>Pagamento realizado</h3>

                    <?php
                    
                    $sql = "SELECT * FROM cliente WHERE estado = 2";

                    $result = $conn->query($sql);

                    while($cliente = $result->fetch_assoc())
                    {
                        $cpf        = $cliente["cpf"];
                        $nome       = $cliente["nome"];

                        if ($login == "odontologista")
                        {
                            echo "<div class='card'><h3>".$cpf."</h3><h2>".$nome."</h2></div>";
                        }
                        else
                        {
                            echo "<div class='card' draggable='true'><h3>".$cpf."</h3><h2>".$nome."</h2></div>";
                        }
                    }

                    ?>

                </div>
            </div>
            <div class="board">
                <div class="dropzone">
                    <h3>Agendamento realizado</h3>

                    <?php
                    
                    $sql = "SELECT * FROM cliente WHERE estado = 3";

                    $result = $conn->query($sql);


                    while($cliente = $result->fetch_assoc())
                    {
                        $cpf        = $cliente["cpf"];
                        $nome       = $cliente["nome"];

                        if ($login == "odontologista")
                        {
                            echo "<div class='card'><h3>".$cpf."</h3><h2>".$nome."</h2></div>";
                        }
                        else
                        {
                            echo "<div class='card' draggable='true'><h3>".$cpf."</h3><h2>".$nome."</h2></div>";
                        }
                    }

                    ?>

                </div>
            </div>
            <div class="board">
                <div class="dropzone">
                    <h3>Procedimento realizado</h3>

                    <?php
                    
                    $sql = "SELECT * FROM cliente WHERE estado = 4";

                    $result = $conn->query($sql);

                    while($cliente = $result->fetch_assoc())
                    {
                        $cpf        = $cliente["cpf"];
                        $nome       = $cliente["nome"];

                        if ($login == "odontologista")
                        {
                            echo "<div class='card'><h3>".$cpf."</h3><h2>".$nome."</h2></div>";
                        }
                        else
                        {
                            echo "<div class='card' draggable='true'><h3>".$cpf."</h3><h2>".$nome."</h2></div>";
                        }
                    }

                    ?>

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
    <script src="../SCRIPTS/tela_estado.js">
    </script>
</body>

</html>