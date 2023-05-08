<?php
include_once "PHPconfig.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$sexo = $_POST["sexo"];
$data_cadastro = $_POST["datacadastro"];

$query = "INSERT INTO cliente(idCliente, nomeCliente, emailCliente, sexoCliente, dataCadastro)
 VALUES ('$id', '$nome', '$email', '$sexo', '$data_cadastro');";

$result = $conn->query($query);

if ($result === TRUE) {
    
    ?>
    <script>
        alert("Cliente cadastrado com sucesso!");
        location.href = "TelaDosEstados/tela_estados.html";
    </script>
    <?php

} else {
    ?>
    <script>
        alert("Erro de conexão com servidor, voltando a tela principal");
        location.href = "main.html";
    </script>
    <?php
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>