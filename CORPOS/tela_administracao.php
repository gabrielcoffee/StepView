<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ESTILOS/tela_administracao.css">
    <title>StepView</title>
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
                    <h1>Adicionar Odontologo</h1>
                    <form action="PHPregistrar_odontologo.php" method="POST">
                        <div>
                            <input name="nome" type="text" placeholder="Nome">
                        </div>  
                        <div>
                            <input name="cpf" type="text" placeholder="Cpf">
                        </div>
                        <div>
                            <input name="crm" type="text" placeholder="Crm">
                        </div>
                     
                        <div>
                            <input name="" type="password" placeholder="Senha">
                        </div>
                        <div>
                            <input name="senha" type="password" placeholder="Senha">
                        </div>
                        <div class="botoes">
                            <button type="submit">Registrar</button>
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
                        </div>
                        <div class="botoes">
                            <button>Registrar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </div>
    <div class="container">

    
        <header>
            <h3>Seja bem vindo!</h3>
        </header>
        <nav>
            <button onclick="animarDiv()">Dados</button> 
            <button>Visualizar Estados</button>
            <button onclick="alo()">Visualizar Clientes</button>
            <button onclick="abrirModal()" class="botaoCriar">
                Registrar funcionario
            </button>

        </nav>
        
        <main>
            <?php
                include_once "PHPconfig.php";
                if(isset($_GET['search']))
                {
                    $data = $_GET['search'];
                    
                    
                    
                    $sql = "SELECT tipoProcesso, descricao, data_marcada FROM processo WHERE data_marcada LIKE '%$data%'";
                    


                   

                    $result = $conn->query($sql);
                    if ($result === TRUE) {
    
                        ?>
                        <script>
                            alert("Funcionario encontrado com sucesso!!");
                        </script>
                        <?php
                    
                    } else {
                        ?>
                        <script>
                            alert($data2);
                            location.href = "tela_administracao.php";
                        </script>
                        <?php
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    


                }
                else
                {
                   
                }
            ?>
            <div class="containerMainEsquerda">
                
                <button class="botaoVoltar"><<<</button>    
            </div>
            <div class="containerMainDireita">
                   <div class="formMain">
                        <div class="barraDePesquisa">
                            <button onclick="searchData()">
                                <svg xmlns="http://www.w3.org/2000/svg"     width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>
                            <input id="pesquisar" type="date" value="" name="filtrar">
                        </div>
                        <div class="datasFiltradas">
                            <table class="tabelaDatas">
                                <tr class="nomeTabela">
                                    <th class="tabelaItens">Processo</th>
                                    <th class="tabelaItens">Descrição</th>
                                    <th class="tabelaItens">Doutor</th>
                                    <th class="tabelaItens">Data</th>
                                </tr>
                            </table>
                        </div>
                   </div>
            </div>
        
        </main>
        <aside class="assideEsquerdo">
            <h1>StepView</h1>
        </aside>
        <aside class="assideDireito">
            <table class="tableFuncionarios">
                <tr class="nomeTabela">
                    <th class="tabelaTitulos">CPF</th>
                    <th class="tabelaTitulos" >Nome</th>
                    <th class="tabelaTitulos">Função</th>
                    <th class="tabelaTitulos">Selecionar</th>
                </tr>
                <?php

                // CÓDIGO PHP 
                include_once "PHPconfig.php";

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
                        echo "<td class='td_principal'>".$cpf."<input type='hidden' name='cpf' value=".$cpf."></td>\n";
                        echo "<td class='td_principal'><input type='text' name='nome' value=".$nome."></td>\n";
                        
                        echo "</td>\n";

                        

                        echo "<td class='checkBox'> <button type='submit'>Confirmar</button> <button type='button' form='deletar' onclick='recarregarPagina()'>Cancelar</button> </td>";
                        echo "</form>";
                        echo "</tr>";
                    }
                    else
                    {
                    echo "<tr>\n";
                    echo "<td class='td_principal'>".$cpf."</td>\n";
                    echo "<td class='td_principal'><a>".$nome."</a></td>\n";
                    echo "<td class='td_principal'><a>".$funcao."</a></td>\n";
                    echo "<td class='checkBox'> <button onclick='carregarPaginaCpf(".$cpf.")'>Editar</button> <button onclick='abrirConfirmarDeletar(".$cpf.");'>Deletar</button></td>";
                    echo "</tr>";
                    }
                    
                }
                // FIM DO CÓDIGO PHP
                ?>
                                
                    
            </table>
        </aside>
        <footer>
        </footer>
    </div>
    <script src="../SCRIPTS/tela_administracao.js">
    
    </script>
</body>
</html>