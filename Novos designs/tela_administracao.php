<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stepview</title>
    <link rel="stylesheet" href="tela_administracao.css">
</head>
<body>
    <div class="container">
        <aside class="asideEsquerdo">
            <div class="containerAside">
                <div class="asideCima">
                    <button onclick="abrirModal()">Cadastrar Cliente</button>
                    <button>Tela Estados</button>
                    <button>Sair</button>


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
                <h2>Data</h2>
            </div>
            <div class="pesquisarDiv">
                <form class="formPesquisar">
                    <input type="date" name="pesquisar" value="" placeholder="Pesquisar" class="inputPesquisa">
                    <button id="pesquisar" onclick="searchData()"><svg fill="#000000" width="1vw" height="2vh" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.027 9.92L16 13.95 14 16l-4.075-3.976A6.465 6.465 0 0 1 6.5 13C2.91 13 0 10.083 0 6.5 0 2.91 2.917 0 6.5 0 10.09 0 13 2.917 13 6.5a6.463 6.463 0 0 1-.973 3.42zM1.997 6.452c0 2.48 2.014 4.5 4.5 4.5 2.48 0 4.5-2.015 4.5-4.5 0-2.48-2.015-4.5-4.5-4.5-2.48 0-4.5 2.014-4.5 4.5z" fill-rule="evenodd"/>
                    </svg></button>
                </form>
            </div>
 

            <table class="tabelaData">

                <tr>
                    <td class="tituloDataTabela">Processo</td>
                    <td class="tituloDataTabela">Data</td>
                    <td class="tituloDataTabela">Descricao</td>
                    <td class="tituloDataTabela">Nome</td>
                </tr>
            </table>

        </div>
        <div class="containerFuncionario">
            <div class="tituloFuncionario">
                <h2>Funcionários</h2>
            </div>
            <div class="pesquisarDivFuncionario">
                <form class="formPesquisarFuncionario">
                    <input type="text" name="pesquisar" value="" placeholder="Pesquisar" class="inputPesquisaFuncionario">
                    <button id="pesquisarFuncionario" onclick="searchData()"><svg fill="#000000" width="1vw" height="2vh" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.027 9.92L16 13.95 14 16l-4.075-3.976A6.465 6.465 0 0 1 6.5 13C2.91 13 0 10.083 0 6.5 0 2.91 2.917 0 6.5 0 10.09 0 13 2.917 13 6.5a6.463 6.463 0 0 1-.973 3.42zM1.997 6.452c0 2.48 2.014 4.5 4.5 4.5 2.48 0 4.5-2.015 4.5-4.5 0-2.48-2.015-4.5-4.5-4.5-2.48 0-4.5 2.014-4.5 4.5z" fill-rule="evenodd"/>
                    </svg></button>
                </form>
            </div>
            <table class="tabelaFuncionarios">
                <tr>
                    <td class="tituloFuncionarioTabela">Nome</td>
                    <td class="tituloFuncionarioTabela">CPF</td>
                    <td class="tituloFuncionarioTabela">Função</td>
                    <td class="tituloFuncionarioTabela" >Selecionar</td>
                </tr>

                <?php
                // CÓDIGO PHP 
                include_once "../CORPOS/PHPconfig.php";

                // Pega cpf do cliente que foi clicado em editar pelo GET
                if (isset($_GET['cpf'])) {
                    $cpfeditar = $_GET['cpf'];
                }


                // Código sql do que vai ser puxado do banco de dados
                $sql = "SELECT td1.fk_Funcionario_cpf, td1.nome, td2.fk_Funcionario_cpf, td2.nome  
                FROM odontologista as td1, secretaria as td2";

                // Faz o query (consulta)
                $result = $conn->query($sql);

                // Enquanto ainda estiver retornando resultados para o 
                // (ou seja, se ainda tiver mais clientes na lista para iterar)
                while($funcionario = $result->fetch_assoc())
                {
                    // Pega informações do 
                    $cpf = $funcionario["fk_Funcionario_cpf"];
                    $nome = $funcionario["nome"];
                    $funcao = "Nada definido";
                    
                    // Poe na table de html os dados do cliente selecionado como input para mudanças (tudo dentro de um form para enviar ao phpeditar)
                    if (isset($_GET['cpf']) && $cpf == $cpfeditar)
                    {
                        echo "<tr>\n";
                        echo "<form action='PHPeditar_cliente.php' method='POST'>";
                        echo "<td class='itemFuncionarioTabela'>".$cpf."<input type='hidden' name='cpf' value=".$cpf."></td>\n";
                        echo "<td class='itemFuncionarioTabela'><input type='text' name='nome' value=".$nome."></td>\n";
                        
                        echo "</td>\n";

                        

                        echo "<td class='checkBox'> <button type='submit'>Confirmar</button> <button type='button' form='deletar' onclick='recarregarPagina()'>Cancelar</button> </td>";
                        echo "</form>";
                        echo "</tr>";
                    }
                    else
                    {
                    echo "<tr>\n";
                    echo "<td class='itemFuncionarioTabela'>".$cpf."</td>\n";
                    echo "<td class='itemFuncionarioTabela'><a>".$nome."</a></td>\n";
                    echo "<td class='itemFuncionarioTabela'><a>".$funcao."</a></td>\n";
                    echo "<td class='itemFuncionarioTabela'> <button onclick='carregarPaginaCpf(".$cpf.")'>Editar</button> <button onclick='abrirConfirmarDeletar(".$cpf.");'>Deletar</button></td>";
                    echo "</tr>";
                    }
                    
                }
                // FIM DO CÓDIGO PHP
                ?>
                                
            </table>
        </div>
        <aside class="asideDireito">
            
        </aside>
        <footer>

        </footer>
    </div>

    
</body>
</html>