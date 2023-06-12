<?php
// Inicia session
session_start();

// Confere se funcionario esta logado senão envia para login
if (!isset($_SESSION["logged"]) || $_SESSION["logged"] == false || $_SESSION["logged"] != "admin")
{
    header("Location: ../index.html");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stepview</title>
    <link rel="stylesheet" href="../ESTILOS/tela_administracao.css">
</head>
<body>
<div class="telaModal">
        <div class="botaoSair">
            <button onclick="sairModal()" id="botaoSair">X</button>
        </div>
        <div class="containerModal">
            <div class="titulo">
                
            </div>
            <div class="containerForm">
                <div class="formOdonto">
                    <div class="titulo">
                        <h1>Registrar Odontólogo</h1>
                    </div>
                    <form action="PHPregistrar_odontologo.php" method="POST">
                        <div>
                            <input name="nome" type="text" placeholder="Nome">
                        </div>
                        <div>
                            <input name="especialidade" type="text" placeholder="especialidade">
                        </div>  
                        <div>
                            <input name="cpf" type="text" placeholder="Cpf">
                        </div>
                        <div>
                            <input name="crm" type="text" placeholder="Crm">
                        </div>
                     
                        <div>
                            <input name="senha" type="password" placeholder="Senha" id="senha1">
                        </div>
                        <div>
                            <input name="senha" type="password" placeholder="Senha" id="senha2">
                        </div>
                        <div>
                            <span id="error" class="error"></span><br>

                        </div>
                        <div class="botoes">
                            <button onclick="validarFormulario(event)" type="submit">Registrar</button>
                        </div>



                        

                    </form>
                </div>
                <div class="formSecre">

                    <div class="titulo">
                        <h1>Registrar Secretaria</h1>
                    </div>
                    <form action="PHPregistrar_secretaria.php" method="POST">
                        <div>
                            <input name="nome" type="text" placeholder="Nome">
                        </div>
                        <div>
                            <input name="cpf" type="text" placeholder="Cpf">
                        </div>
                        <div>
                            <input name="senha" type="password" placeholder="Senha">
                        </div>
                        <div>
                            <input name="senha" type="password" placeholder="Senha">
                            <span id="error" class="error"></span><br>
                        </div>
                        <div class="botoes">

                        <button onclick="validarFormulario(event)" type="submit">Registrar</button>

                        </div>
                    </form>
                </div>
            </div>

        </div>


    </div>
    <div class="container">
        <aside class="asideEsquerdo">
            <div class="containerAside">
                <div class="asideCima">
                    <button onclick="abrirModal()">Cadastrar Funcionário</button>
                    <button onclick="irTela()">Tela Estados</button>
                    <form action="PHPlogou.php" method="post">
                    <input type="submit" name="logout" value="Sair">
                    </form>


                </div>
                <div class="asideTitulo">
                    <h2>Stepview</h2>
                </div>
                <div class="asideBaixo">

                </div>
            </div>
        </aside>
        <aside class="asideDireito">

        </aside>
        <header>

        </header>
        <div class="containerData">
            <div class="tituloData">
                <h2>Processos</h2>
            </div>
            <div class="pesquisarDiv">
                <form class="formPesquisar">
                    <input type="date" name="pesquisar" id="pro_data" placeholder="Pesquisar" class="inputPesquisa">
                    <button id="pesquisar" onclick="searchData()"><svg fill="#000000" width="1vw" height="2vh" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.027 9.92L16 13.95 14 16l-4.075-3.976A6.465 6.465 0 0 1 6.5 13C2.91 13 0 10.083 0 6.5 0 2.91 2.917 0 6.5 0 10.09 0 13 2.917 13 6.5a6.463 6.463 0 0 1-.973 3.42zM1.997 6.452c0 2.48 2.014 4.5 4.5 4.5 2.48 0 4.5-2.015 4.5-4.5 0-2.48-2.015-4.5-4.5-4.5-2.48 0-4.5 2.014-4.5 4.5z" fill-rule="evenodd"/>
                    </svg></button>
                </form>
            </div>
 

            <table class="tabelaData">

                <tr>
                    <td class="tituloDataTabela">Cliente</td>
                    <td class="tituloDataTabela">Tipo</td>
                    <td class="tituloDataTabela">Descricao</td>
                    <td class="tituloDataTabela">Data</td>
                    <td class="tituloDataTabela">Selecionar</td>
                </tr>

                <?php
                // CÓDIGO PHP 
                include_once "PHPconfig.php";

                $sql = "SELECT pro.idProcesso, pro.tipoProcesso, pro.descricao, pro.data_marcada, cli.nome 
                FROM processo as pro, cliente as cli
                WHERE cli.cpf = pro.fk_Cliente_cpf;";
                
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
        <div class="containerFuncionario">
            <div class="tituloFuncionario">
                <h2>Funcionários</h2>
            </div>
            <div class="pesquisarDivFuncionario">
                <form class="formPesquisarFuncionario">
                    <input type="hidden" name="pesquisar" value="" placeholder="Pesquisar" class="inputPesquisaFuncionario">
                  
                </form>
            </div>
            <table class="tabelaFuncionarios">
                <tr>
                    <td class="tituloFuncionarioTabela">CPF</td>
                    <td class="tituloFuncionarioTabela">Nome</td>
                    <td class="tituloFuncionarioTabela">Especialidade</td>
                    <td class="tituloFuncionarioTabela">Função</td>
                    <td class="tituloFuncionarioTabela">Selecionar</td>
                </tr>

                <?php
                // CÓDIGO PHP 
                include_once "PHPconfig.php";

                // Pega cpf do cliente que foi clicado em editar pelo GET
                if (isset($_GET['cpf'])) {
                    $cpfeditar = strval($_GET['cpf']);;
                }


                // Código para Odontologista
                $sql = "SELECT cpf, nome, especialidade FROM odontologista";

                // Faz o query (consulta)
                $result = $conn->query($sql);

                // Enquanto ainda estiver retornando resultados para o 
                // (ou seja, se ainda tiver mais clientes na lista para iterar)
                while($funcionario = $result->fetch_assoc())
                {
                    // Pega informações do 
                    $cpf = $funcionario["cpf"];
                    $nome = $funcionario["nome"];
                    $funcao = "odontologista";
                    $especialidade = $funcionario["especialidade"];
                
                    echo "<tr>\n";
                    echo "<td class='itemFuncionarioTabela'>".$cpf."</td>\n";
                    echo "<td class='itemFuncionarioTabela'><a>".$nome."</a></td>\n";
                    echo "<td class='itemFuncionarioTabela'><a>".$especialidade."</a></td>\n";
                    echo "<td class='itemFuncionarioTabela'><a>".$funcao."</a></td>\n";
                    echo "<td class='itemFuncionarioTabela'><button onclick='abrirConfirmarDeletarFunc(\"".$cpf."\");'>Deletar</button></td>";
                    echo "</tr>";
                }

                // Código Para Secretária
                $sql = "SELECT cpf ,nome FROM secretaria";

                // Faz o query (consulta)
                $result = $conn->query($sql);

                // Enquanto ainda estiver retornando resultados para o 
                // (ou seja, se ainda tiver mais clientes na lista para iterar)
                while($funcionario = $result->fetch_assoc())
                {
                    // Pega informações do 
                    $cpf = $funcionario["cpf"];
                    $nome = $funcionario["nome"];
                    $funcao = "secretaria";
                    
                    echo "<tr>\n";
                    echo "<td class='itemFuncionarioTabela'>".$cpf."</td>\n";
                    echo "<td class='itemFuncionarioTabela'><a>".$nome."</a></td>\n";
                    echo "<td class='itemFuncionarioTabela'></td>\n";
                    echo "<td class='itemFuncionarioTabela'><a>".$funcao."</a></td>\n";
                    echo "<td class='itemFuncionarioTabela'><button onclick='abrirConfirmarDeletarFunc(\"".$cpf."\");'>Deletar</button></td>";
                    echo "</tr>";
                    
                }
                // FIM DO CÓDIGO PHP
                ?>
                                
            </table>
        </div>
        <aside class="asideDireito">
            
        </aside>
        <footer>

        </footer>
        <script src="../SCRIPTS/tela_administracao.js"></script>
    </div>

    
</body>
</html>