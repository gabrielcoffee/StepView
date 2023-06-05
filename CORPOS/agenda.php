<?php
// Inicia session
session_start();

// Confere se funcionario esta logado senão envia para login
if (!isset($_SESSION["logged"]) || $_SESSION["logged"] == false)
{
    header("Location: ../index.html");
}


?>

<!DOCTYPE html>
<html lang="PT-BR">
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
                        echo "<svg version='1.0' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' 
                        width='8vw'  viewBox='0 0 64 64' enable-background='new 0 0 64 64' xml:space='preserve'>
                   <g>
                       <path fill='#231F20' d='M11,54h6c0.553,0,1-0.447,1-1v-5c0-0.553-0.447-1-1-1h-6c-0.553,0-1,0.447-1,1v5C10,53.553,10.447,54,11,54
                           z M12,49h4v3h-4V49z'/>
                       <path fill='#231F20' d='M23,54h6c0.553,0,1-0.447,1-1v-5c0-0.553-0.447-1-1-1h-6c-0.553,0-1,0.447-1,1v5C22,53.553,22.447,54,23,54
                           z M24,49h4v3h-4V49z'/>
                       <path fill='#231F20' d='M35,54h6c0.553,0,1-0.447,1-1v-5c0-0.553-0.447-1-1-1h-6c-0.553,0-1,0.447-1,1v5C34,53.553,34.447,54,35,54
                           z M36,49h4v3h-4V49z'/>
                       <path fill='#231F20' d='M11,43h6c0.553,0,1-0.447,1-1v-5c0-0.553-0.447-1-1-1h-6c-0.553,0-1,0.447-1,1v5C10,42.553,10.447,43,11,43
                           z M12,38h4v3h-4V38z'/>
                       <path fill='#231F20' d='M23,43h6c0.553,0,1-0.447,1-1v-5c0-0.553-0.447-1-1-1h-6c-0.553,0-1,0.447-1,1v5C22,42.553,22.447,43,23,43
                           z M24,38h4v3h-4V38z'/>
                       <path fill='#231F20' d='M35,43h6c0.553,0,1-0.447,1-1v-5c0-0.553-0.447-1-1-1h-6c-0.553,0-1,0.447-1,1v5C34,42.553,34.447,43,35,43
                           z M36,38h4v3h-4V38z'/>
                       <path fill='#231F20' d='M47,43h6c0.553,0,1-0.447,1-1v-5c0-0.553-0.447-1-1-1h-6c-0.553,0-1,0.447-1,1v5C46,42.553,46.447,43,47,43
                           z M48,38h4v3h-4V38z'/>
                       <path fill='#231F20' d='M11,32h6c0.553,0,1-0.447,1-1v-5c0-0.553-0.447-1-1-1h-6c-0.553,0-1,0.447-1,1v5C10,31.553,10.447,32,11,32
                           z M12,27h4v3h-4V27z'/>
                       <path fill='#231F20' d='M23,32h6c0.553,0,1-0.447,1-1v-5c0-0.553-0.447-1-1-1h-6c-0.553,0-1,0.447-1,1v5C22,31.553,22.447,32,23,32
                           z M24,27h4v3h-4V27z'/>
                       <path fill='#231F20' d='M35,32h6c0.553,0,1-0.447,1-1v-5c0-0.553-0.447-1-1-1h-6c-0.553,0-1,0.447-1,1v5C34,31.553,34.447,32,35,32
                           z M36,27h4v3h-4V27z'/>
                       <path fill='#231F20' d='M47,32h6c0.553,0,1-0.447,1-1v-5c0-0.553-0.447-1-1-1h-6c-0.553,0-1,0.447-1,1v5C46,31.553,46.447,32,47,32
                           z M48,27h4v3h-4V27z'/>
                       <path fill='#231F20' d='M60,4h-7V3c0-1.657-1.343-3-3-3s-3,1.343-3,3v1H17V3c0-1.657-1.343-3-3-3s-3,1.343-3,3v1H4
                           C1.789,4,0,5.789,0,8v52c0,2.211,1.789,4,4,4h56c2.211,0,4-1.789,4-4V8C64,5.789,62.211,4,60,4z M49,3c0-0.553,0.447-1,1-1
                           s1,0.447,1,1v3v4c0,0.553-0.447,1-1,1s-1-0.447-1-1V6V3z M13,3c0-0.553,0.447-1,1-1s1,0.447,1,1v3v4c0,0.553-0.447,1-1,1
                           s-1-0.447-1-1V6V3z M62,60c0,1.104-0.896,2-2,2H4c-1.104,0-2-0.896-2-2V17h60V60z M62,15H2V8c0-1.104,0.896-2,2-2h7v4
                           c0,1.657,1.343,3,3,3s3-1.343,3-3V6h30v4c0,1.657,1.343,3,3,3s3-1.343,3-3V6h7c1.104,0,2,0.896,2,2V15z'/>
                   </g>
                   </svg>";
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
                    <th class="tituloDataTabela">Cliente</th>
                    <th class="tituloDataTabela">Tipo</th>
                    <th class="tituloDataTabela">Descricao</th>
                    <th class="tituloDataTabela">Data</th>
                    <th class="tituloDataTabela">Selecionar</th>
                </tr>

                <?php
                // CÓDIGO PHP 
                include_once "PHPconfig.php";

                // Código para Processos em certa data
                if (isset($_GET['pesquisar'])) {
                    $data = $_GET['pesquisar'];

                    $sql = "SELECT pro.idProcesso, pro.tipoProcesso, pro.descricao, pro.data_marcada, cli.nome 
                    FROM processo as pro, cliente as cli
                    WHERE cli.cpf = pro.fk_Cliente_cpf AND pro.data_marcada = '$data';";
                }
                else
                // Código para todos os Processos
                {
                    $sql = "SELECT pro.idProcesso, pro.tipoProcesso, pro.descricao, pro.data_marcada, cli.nome 
                    FROM processo as pro, cliente as cli
                    WHERE cli.cpf = pro.fk_Cliente_cpf;";
                }

                // Faz o query (consulta)
                $result = $conn->query($sql);

                while($processo = $result->fetch_assoc())
                {
                    // Pega informações do Processo
                    $id_pro = $processo["idProcesso"];
                    $tipo = $processo["tipoProcesso"];
                    $data = $processo["data_marcada"];
                    $desc = $processo["descricao"];
                    $cliente = $processo["nome"];

                    echo "<tr>\n";
                    echo "<td class='itemFuncionarioTabela'>".$cliente."</td>\n";
                    echo "<td class='itemFuncionarioTabela'>".$tipo."</td>\n";
                    echo "<td class='itemFuncionarioTabela'>".$desc."</td>\n";
                    echo "<td class='itemFuncionarioTabela'>".$data."</td>\n";
                    echo "<td class='itemFuncionarioTabela'><button onclick='abrirConfirmarDeletar(".$id_pro.");'>Deletar</button></td>";
                    echo "</tr>";
                }
                
                ?>
            </table>
            </div>
        </div>
    </div>
</body>
</html>