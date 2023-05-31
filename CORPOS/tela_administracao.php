<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ESTILOS/tela_administracao.css">
    <title>Document</title>
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
            <button>Visualizar Estados</button>
            <button>Visualizar Clientes</button>
            <button onclick="abrirModal()" class="botaoCriar">
                Registrar funcionario
                </button>
        </nav>
        
        <main>
        
        </main>
        <aside class="assideEsquerdo">
            <h1>StepView</h1>
        </aside>
        <aside class="assideDireito">
            <table>
                <tr class="nomeTabela">
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Função<th>
                </tr>
                <?php

                // CÓDIGO PHP 
                include_once "PHPconfig.php";

                // Pega cpf do cliente que foi clicado em editar pelo GET
                if (isset($_GET['cpf'])) {
                    $cpfeditar = $_GET['cpf'];
                }


                // Código sql do que vai ser puxado do banco de dados
                $sql = "SELECT fk_Funcionario_cpf, nome FROM odontologista;";

                // Faz o query (consulta)
                $result = $conn->query($sql);

                // Enquanto ainda estiver retornando resultados para o 
                // (ou seja, se ainda tiver mais clientes na lista para iterar)
                while($funcionario = $result->fetch_assoc())
                {
                    // Pega informações do 
                    $cpf = $funcionario["fk_Funcionario_cpf"];
                    $nome = $funcionario["nome"];
                    $funcao = "Doutor";
                    
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
                    echo "<td class='checkBox'> <button onclick='carregarPaginaCpf(".$cpf.")'>Editar</button> <button onclick='abrirConfirmarDeletar(".$cpf.");'>Deletar</button></td>";
                    echo "</tr>";
                    }
                    
                }
                // FIM DO CÓDIGO PHP
                ?>
                                
                    
            </table>
        </aside>
        <footer>
            <h1>footer</h1>
        </footer>
    </div>
    <script src="../SCRIPTS/tela_administracao.js"></script>
</body>
</html>