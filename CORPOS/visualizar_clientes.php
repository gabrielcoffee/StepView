

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ESTILOS/visualizar_clientes.css">
    <title>StepView</title>
</head>

<body>

     <!-- MINI TELA DE CADASTRAR CLIENTE -->

    <div class="tela_cadastro">
        <h1>Cadastrar Cliente</h1>
        <div class="modal">
            <form action="../CORPOS/PHPregistrar_cliente.php" method="POST">
                <div class="inputClass">
                    CPF:
                    <input type="text" name="cpf" pattern="([0-9]{2}[\.]?[0-9]{3}[\.]?[0-9]{3}[\/]?[0-9]{4}[-]?[0-9]{2})|([0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2})" required>
                </div>
                <div class="inputClass">
                    Nome:
                    <input type="text" name="nome" required>
                </div>
                <div class="inputClass">
                    E-mail:
                    <input type="email" name="email" required>
                </div>
                
                <div class="inputClass">
                    Data de Nascimento:
                    <input type="date" name="nascimento" required>
                </div>
                <div class="inputClass">
                    Telefone:
                    <input type="tel" name="telefone" placeholder="(99) 9 9999-9999" pattern="[0-9]{8,11}" required>
                </div>
                <fieldset class="InputCheckbox">
                    <legend>Sexo do cliente</legend>
                    <input type="radio" id="Masculino" name="sexo" value="M">
                    <label for="Masculino">Masculino</label>
                    <input type="radio" id="Feminino" name="sexo" value="F">
                    <label for="Feminino">Feminino</label>
                    <input type="radio" id="Outros" name="sexo" value="O">
                    <label for="Outros">Outro</label>
                </fieldset>
                <div class="InputBotao">
                    <button type="">Confirmar</button>
                </div>
            </form>
        </div>
            <div class="botaoSair">
                <button onclick="sairModal()">Cancelar</button>
            </div>
        </div>

        <!-- MINI TELA DE DELETAR CADASTRO -->

        <div class="tela_deletar">
            <h1>Deletar</h1>
            <div class="modalEditar">
                <form id="deletar" action="PHPdeletar_cliente.php" method="POST">
                    <div>
                        <h3>Deseja deletar esse cliente?</h3>
                    </div>
                    <div class="InputBotao">
                        <button type="submit">Confirmar e deletar</button>
                    </div>
                </form>
                </div>
                    <div class="botaoSair">
                        <button onclick="sairModal()">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <h1>Clientes</h1>
        <div class="container">

            <button onclick="abrirModal()" class="botaoCriar">
            Cadastrar Cliente
            </button>
            
            <table>
                <!-- CABEÇALHO DA TABELA CLIENTES -->
                <tr class="nome_tabela">
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Sexo</th>
                    <th>Nascimento</th>
                    <th>Selecionar</th>
                </tr>

                <?php

                // CÓDIGO PHP 
                include_once "../CORPOS/PHPconfig.php";

                // Pega cpf do cliente que foi clicado em editar pelo GET
                if (isset($_GET['cpf'])) {
                    $cpfeditar = $_GET['cpf'];
                }
                
                
                // Código sql do que vai ser puxado do banco de dados
                $sql = "SELECT cpf, nome, email, telefone, sexo, nascimento
                FROM cliente;";

                // Faz o query (consulta)
                $result = $conn->query($sql);

                // Enquanto ainda estiver retornando resultados para o 
                // (ou seja, se ainda tiver mais clientes na lista para iterar)
                while($cliente = $result->fetch_assoc())
                {
                    // Pega informações do 
                    $cpf        = $cliente["cpf"];
                    $nome       = $cliente["nome"];
                    $email      = $cliente["email"];
                    $telefone   = $cliente["telefone"];
                    $nascimento = $cliente["nascimento"];
                    $sexo       = $cliente["sexo"];

                    // Corrige texto do sexo
                    if ($sexo == 'M')
                        $sexo = "Masculino";
                    else if ($sexo == "F")
                        $sexo = "Feminino";
                    else
                        $sexo = "Outro";

                    // Poe na table de html os dados do 
                    
                    if (isset($_GET['cpf']) && $cpf == $cpfeditar)
                    {
                        echo "<tr>\n";
                        echo "<form action='PHPeditar_cliente.php' method='POST'>";
                        echo "<td class='td_principal'>".$cpf."<input type='hidden' name='cpf' value=".$cpf."></td>\n";
                        echo "<td class='td_principal'><input type='text' name='nome' value=".$nome."></td>\n";
                        echo "<td class='td_principal'><input type='email' name='email' value=".$email."></td>\n";
                        echo "<td class='td_principal'><input type='tel' name='telefone' pattern='[0-9]{8,11}' value=".$telefone."></td>\n";

                        echo "<td class='td_principal'>";
                        if ($sexo == 'Masculino')
                            echo "<input type='radio' id='Masculino' name='sexo' value='M' checked>";
                        else
                            echo "<input type='radio' id='Masculino' name='sexo' value='M'>";
                        echo "<label for='Masculino'>M</label> &nbsp";

                        if ($sexo == 'Feminino')
                            echo "<input type='radio' id='Feminino' name='sexo' value='F' checked>";
                        else
                            echo "<input type='radio' id='Feminino' name='sexo' value='F'>";
                        echo "<label for='Feminino'>F</label> &nbsp";

                        if ($sexo == 'Outro')
                            echo "<input type='radio' id='Outros' name='sexo' value='O' checked>";
                        else
                            echo "<input type='radio' id='Outros' name='sexo' value='O'>";
                        echo "<label for='Outros'>O</label>";

                        echo "</td>\n";

                        echo "<td class='td_principal'><input type='date' name='nascimento' value=".$nascimento."></td>\n";

                        echo "<td class='checkBox'> <button type='submit'>Confirmar</button> <button type='button' form='deletar' onclick='recarregarPagina()'>Cancelar</button> </td>";
                        echo "</form>";
                        echo "</tr>";
                    }
                    else
                    {
                        echo "<tr>\n";
                    echo "<td class='td_principal'>".$cpf."</td>\n";
                    echo "<td class='td_principal'><a href='registrar_cliente.html'>".$nome."</a></td>\n";
                    echo "<td class='td_principal'>".$email."</td>\n";
                    echo "<td class='td_principal'>".$telefone."</td>\n";
                    echo "<td class='td_principal'>".$sexo."</td>\n";
                    echo "<td class='td_principal'>".$nascimento."</td>\n";
                    echo "<td class='checkBox'> <button onclick='carregarPaginaCpf(".$cpf.")'>Editar</button> <button onclick='abrirConfirmarDeletar(".$cpf.");'>Deletar</button></td>";
                    echo "</tr>";
                    }
                    
                }
                // FIM DO CÓDIGO PHP
                ?>
            </table>
        </div>
        <script src="../SCRIPTS/visualizar_clientes.js">

        </script>
</body>




</html>