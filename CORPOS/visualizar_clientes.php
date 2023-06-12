<?php
// Inicia session
session_start();

// Confere se admin esta logado senão envia para login
if (!isset($_SESSION["logged"]) || $_SESSION["logged"] == false)
{
    header("Location: ../index.html");
}

$login = $_SESSION["logged"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stepview</title>
    <link rel="stylesheet" href="../ESTILOS/visualizar_clientes.css">
</head>
<body>

    <div class="telaModal">
        <div class="containerModal">
            
            <div class="tituloRegistrar">
                
                <h2>Registrar Cliente</h2>
            </div>
            <div class="formRegistrar">
                <legend class="legendaBotao"><button onclick="sairModal()" class="botaoSair">X</button></legend>
                <form action="PHPregistrar_cliente.php" method="POST">
                    <div class="inputForm">
                        <input type="text"name="cpf" placeholder="CPF" pattern="[0-9]{11}" required>
                    </div>
                    <div class="inputForm">
                        <input type="text" name="nome" placeholder="Nome" required>
                    </div>
                    <div class="inputForm">
                        <input type="email" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="inputForm">
                        <label>Data de Nascimento</label>
                        <input type="date" name="nascimento" min="1900-01-01" max="2023-05-15" required>
                    </div>
                    <div class="inputForm">
                        <input type="text" name="telefone" placeholder="Telefone (99) 9 9999-9999" pattern="[0-9]{8,11}" required>
                    </div>
                    <div class="inputForm">
                        <fieldset class="InputCheckbox">
                            <legend>Sexo do cliente</legend>
                            <input type="radio" id="Masculino" name="sexo" value="M">
                            <label for="Masculino">Masculino</label>
                            <input type="radio" id="Feminino" name="sexo" value="F">
                            <label for="Feminino">Feminino</label>
                            <input type="radio" id="Outros" name="sexo" value="O">
                            <label for="Outros">Outro</label>
                        </fieldset>
                    </div>
                    <div class="botoesForm">
                        <button type="submit">Adicionar</button>
                        
                    </div>

                </form>
            </div>
        </div>

    </div>


    <div class="container">
        <header>
            <div class="titulo">
                <h2>Clientes</h2>
            </div>
        </header>
        <main>
            <div class="barraDePesquisa">
                <form class="formPesquisar">
                    <input type="text" name="pesquisar" value="" placeholder="Pesquisar" class="inputPesquisa">
                    <button id="pesquisar" onclick="searchData()"><svg fill="#000000" width="1vw" height="2vh" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.027 9.92L16 13.95 14 16l-4.075-3.976A6.465 6.465 0 0 1 6.5 13C2.91 13 0 10.083 0 6.5 0 2.91 2.917 0 6.5 0 10.09 0 13 2.917 13 6.5a6.463 6.463 0 0 1-.973 3.42zM1.997 6.452c0 2.48 2.014 4.5 4.5 4.5 2.48 0 4.5-2.015 4.5-4.5 0-2.48-2.015-4.5-4.5-4.5-2.48 0-4.5 2.014-4.5 4.5z" fill-rule="evenodd"/>
                    </svg></button>
                </form>

            </div>
            <div class="tabela">
                <table>
                    <tr class="tituloTabelaPai">
                        <th class="tituloTabela">CPF</th>
                        <th class="tituloTabela">Nome</th>
                        <th class="tituloTabela">e-mail</th>
                        <th class="tituloTabela">Telefone</th>
                        <th class="tituloTabela">Sexo</th>
                        <th class="tituloTabela">Nascimento</th>
                        <th class="tituloTabela">Selecionar</th>
                    </tr>
                    <?php

                    // CÓDIGO PHP 
                    include_once "PHPconfig.php";
    
                    // Pega cpf do cliente que foi clicado em editar pelo GET
                    if (isset($_GET['cpf'])) {
                        $cpfeditar = strval($_GET['cpf']);
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
                        
                        // Poe na table de html os dados do cliente selecionado como input para mudanças (tudo dentro de um form para enviar ao phpeditar)
                        if (isset($_GET['cpf']) && $cpf == $cpfeditar && $login != "odontologista")
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
    
                            echo "<td class='td_principal'><input type='date' name='nascimento'min='1900-01-01' max='2023-05-15'  value=".$nascimento."></td>\n";
    
                            echo "<td class='checkBox'> <button type='submit'>Confirmar</button> <button type='button' form='deletar' onclick='recarregarPagina()'>Cancelar</button> </td>";
                            echo "</form>";
                            echo "</tr>";
                        }
                        else
                        {
                            echo "<tr>\n";
                            echo "<td class='td_principal'>".$cpf."</td>\n";
                            echo "<td class='td_principal'><a href='agenda.php?CPF=".$cpf."'>".$nome."</a></td>\n";
                            echo "<td class='td_principal'>".$email."</td>\n";
                            echo "<td class='td_principal'>".$telefone."</td>\n";
                            echo "<td class='td_principal'>".$sexo."</td>\n";
                            echo "<td class='td_principal'>".$nascimento."</td>\n";

                            if ($login == "odontologista")
                            {
                                echo "<td class='checkBox'> <button>RESTRITO</button> <button>RESTRITO</button></td>";
                            }
                            else
                            {
                                echo "<td class='checkBox'> <button onclick='carregarPaginaCpf(".$cpf.")'>Editar</button> <button onclick='abrirConfirmarDeletar(".$cpf.");'>Deletar</button></td>";

                            }
                            echo "</tr>";
                        }
                        
                    }
                    // FIM DO CÓDIGO PHP
                    ?>
                </table>
            </div>
        </main>
        <aside>
            <div class="containerAside">
                <div class="asideCima">
                    <button onclick="abrirModal()">Cadastrar Cliente</button>
                    <button onclick="telaEstado()">Tela Estados</button>
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
    </div>
    <script src="../SCRIPTS/visualizar_clientes.js"></script>
</body>
</html>