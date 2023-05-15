<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ESTILOS/agenda.css">
    <title>StepView Agenda</title>
</head>
<body>
    <div class="container">
        <header>
            <div class="titulo">
                <h2>Cliente</h2>
            </div>
        </header>
        <!--<div class="telaEsquerda">
            <div class="conteudoEsquerda">
                <h2>Estado atual</h2>
                <div class="estados">
                    <form>
                        <label>Ola</label>
                        <input type="checkbox">
                        <label>Ola</label>
                        <input type="checkbox">
                        <label>Ola</label>
                        <input type="checkbox">
                        <label>Ola</label>
                        <input type="checkbox">
                        <div class="botaoEstado">
                            <button>Alterar</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div> -->
        <div class="telaDireita">
            <fieldset class="tabelaPegar">
                <legend>Comentarios</legend>
                <?php 
                include_once "../CORPOS/PHPconfig.php";

                $cpf = $_GET["CPF"];

                $sql = "SELECT * FROM processo WHERE fk_Cliente_cpf = '$cpf';";
                $result = $conn -> query($sql);
                
                while($processo = $result->fetch_assoc()){
                    $tipoProcesso = $processo["tipoProcesso"];
                    $descricao   = $processo["descricao"];
                    $data = $processo["data"];

                    echo "<fieldset>";
                    echo "<table>";
                    echo "<form action='PHPcomentar_deletar.php' method='POST'>";
                    echo "<input type='hidden' value='$cpf' name='cpf'>";
                    echo "<td><label class='labelProcesso'>$tipoProcesso</label></td>";
                    echo "<td><input class='inputProcesso' type='hidden' value='$tipoProcesso' name='tipoProcesso' placeholder='Tipo do processo'></td>";
                    echo "<td><label class='labelProcesso'>$descricao</label></td>";
                    echo "<td><input class='inputArea' type='hidden' value='$descricao' name='descricao' placeholder='$descricao'></td>";
                    echo "<td><label class='labelProcesso'>$data</label></td>";
                    echo "<td><input class='inputData' type='hidden' value='$data' name='data'></td>";
                    echo "<td><button class='botaoExcluir' type='submit'>Excluir</button></td>";
                    echo "</form>";
                    echo "</table>";
                    echo "</fieldset>";
                    
                }
                ?>
             
            </fieldset>
            <div class='tabelaCriar'>
                
                <?php 
                include_once "../CORPOS/PHPconfig.php";

                $cpf = $_GET["CPF"];
                echo "<h3>Adicionar comentario</h3>";
                echo "<form action='PHPcomentar.php' method='POST'>";
                echo "<table>";
                echo "<input type='hidden' value='$cpf' name='cpf'>";
                echo "<td><input class='inputProcesso' type='text' value='' name='tipoProcesso' placeholder='Tipo do processo'></td>";
                echo "<td><textarea class='inputArea' type='text' value='' name='descricao' placeholder='Descrição'></textarea></td>";
                echo "<td><input class='inputData' type='date' value='' name='data'></td>";
                echo "<td><button>Salvar</button></td>";
                echo "</table>";
                echo "</form>";
                ?>
        </div>
        </div>


    </div>
</body>
</html>