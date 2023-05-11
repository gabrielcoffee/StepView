

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
                <button onclick="sairModal()">Sair</button>
            </div>
        </div>

        <!-- MINI TELA DE EDITAR CADASTRO -->

        <div class="tela_editar">
            <h1>Editar Cliente</h1>
            <div class="modalEditar">
                <form action="" method="POST">
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
                        <input type="date" name="datanascimento" required>
                    </div>
                    <div class="inputClass">
                        Telefone:
                        <input type="tel" name="telefone" placeholder="(99) 9 9999-9999" pattern="([0-9]{2}) 9 [0-9]{4}-[0-9]{4}" required>
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
                        <button type="">Confirmar mudanças</button>
                    </div>
                </form>
            </div>
                <div class="botaoSair">
                    <button onclick="sairModal()">Sair</button>
                </div>
    
        </div>

        <!-- MINI TELA DE DELETAR CADASTRO -->

        <div class="tela_deletar">
            <h1>Deletar</h1>
            <div class="modalEditar">
                <form action="" method="POST">
                    <div>
                        <h3>Você quer deletar?</h3>
                    </div>
                    <div class="InputBotao">
                        <button type="">Confirmar mudanças</button>
                    </div>
                </form>
            </div>
                <div class="botaoSair">
                    <button onclick="sairModal()">Sair</button>
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
                // CÓDIGO PHP (TABELA CLIENTES)
                include_once "../CORPOS/PHPconfig.php";

                // Código sql do que vai ser puxado do banco de dados
                $sql = "SELECT cpfPaciente, nomePaciente, emailPaciente, telefonePaciente, sexoPaciente, nascimentoPaciente
                FROM paciente;";

                // Faz o query (consulta)
                $result = $conn->query($sql);

                // Enquanto ainda estiver retornando resultados para o paciente
                // (ou seja, se ainda tiver mais clientes na lista para iterar)
                while($paciente = $result->fetch_assoc())
                {
                    // Pega informações do paciente
                    $cpf        = $paciente["cpfPaciente"];
                    $nome       = $paciente["nomePaciente"];
                    $email      = $paciente["emailPaciente"];
                    $telefone   = $paciente["telefonePaciente"];
                    $nascimento = $paciente["nascimentoPaciente"];
                    $sexo       = $paciente["sexoPaciente"];

                    // Corrige texto do sexo
                    if ($sexo == 'M')
                        $sexo = "Masculino";
                    else if ($sexo == "F")
                        $sexo = "Feminino";
                    else
                        $sexo = "Outro";

                    // Poe na table de html os dados do paciente
                    echo "<tr>\n";
                    echo "<td class='td_principal'>".$cpf."</td>\n";
                    echo "<td class='td_principal'>".$nome."</td>\n";
                    echo "<td class='td_principal'>".$email."</td>\n";
                    echo "<td class='td_principal'>".$telefone."</td>\n";
                    echo "<td class='td_principal'>".$sexo."</td>\n";
                    echo "<td class='td_principal'>".$nascimento."</td>\n";
                    echo "<td class='checkBox'> <button onclick='abrirEditar()'>Editar</button> <button onclick='abrirModalDeletar()'>Deletar</button> </td>";
                    echo "</tr>";
                }
                // FIM DO CÓDIGO PHP
                ?>
            </table>
        </div>
</body>
<script src="../SCRIPTS/visualizar_clientes.js">

</script>

</html>