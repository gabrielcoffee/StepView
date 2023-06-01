<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StepView</title>
    <link rel="stylesheet" href="../ESTILOS/agenda.css">
</head>
<body>
    <div class="container">
        <div class="containerAgenda">
            <div class="formAgenda">
                <div class="tituloAgenda">
                    <h2>Agenda</h2>
                </div>
                <?php 
                
        
                echo "<form action='PHPcomentar.php' method='POST'>";
                    
                    $cpf = $_GET["CPF"];

                    echo "<input type='hidden' value='$cpf' name='cpf'>";
                   

                    echo"<div class='inputForm'>";
                        echo"<input type='text' name='tipoProcesso' value='' placeholder='Tipo do Processo'>" ;
                    echo "</div>";
                    echo "<div class='inputForm'>";
                        echo "<input type='text' name='descricao' value='' placeholder='Descrição'>";
                    echo "</div>";
                    echo "<div class='inputForm'>";
                        echo "<input type='date' name='data_marcada' value=''>";
                    echo "</div>";
                    echo "<div class='inputForm'>";
                        echo "<input type='text' name='nomeCliente' value='' placeholder='Nome do cliente'>";
                    echo "</div>";
                    echo "<div class='imagemForm'>";
                        echo "<img width='200vw' src='../IMAGENS/calendar-svgrepo-com.svg' alt='imagem de calendário'>";
                    echo "</div>";
                    echo "<div class='botoesForm'>";
                        echo "<div class='botao'>";
                            echo "<button>Adicionar</button>";
                        echo "</div>";
                    
                    echo "</div>";
                echo "</form>";
                ?>
            </div>
            

        </div>
        <div class="comentarios">
            <div class="caixaComentarios">
            
                
                <table class="tabelaComentarios">
                    
                    <tr>
                        <th>Processo</th>
                        <th>Descrição</th>
                        <th>Data</th>
                        <th>Nome</th>
                        <th>Selecione</th>
                    </tr>
                    <?php 
                include_once "PHPconfig.php";

                $cpf = $_GET["CPF"];

                $sql = "SELECT * FROM processo WHERE fk_Cliente_cpf = '$cpf';";
                $result = $conn -> query($sql);
                
                while($processo = $result->fetch_assoc()){
                    $tipoProcesso = $processo["tipoProcesso"];
                    $descricao   = $processo["descricao"];
                    $data = $processo["data_marcada"];
                    $id = $processo["idProcesso"];
                    $nome = $processo['nome'];
                    

                    echo "<tr>";
                    echo "<form action='PHPcomentar_deletar.php' method='POST'>";
                    echo "<input type='hidden' value='$cpf' name='cpf'>";
                    echo "<input type='hidden' value='$id'  name='idproc'>";
                    echo "<td><label class='labelProcesso'>$tipoProcesso</label><input class='inputProcesso' type='hidden' value='$tipoProcesso' name='tipoProcesso' placeholder='Tipo do processo'></td>";
                   
                    echo "<td><label class='labelProcesso'>$descricao</label></td>";
                    
                    echo "<td><label class='labelProcesso'>$data</label><input class='inputData' type='hidden' value='$data' name='data'></td>";

                    echo "<td><label class='labelProcesso'>$nome</label><input class='inputArea' type='hidden' value='$nome' name='descricao' placeholder=''></td>";
                   
                   
                   
                    echo "<td><button class='botaoExcluir' type='submit'>Excluir</button></td>";
                    echo "</form>";
                    echo "</tr>";
                  
                    
                }
                ?>
                </table>

                


            </div>

        </div>
    </div>
</body>
</html>