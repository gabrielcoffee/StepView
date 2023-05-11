<?php
include_once "PHPconfig.php";
session_start();

$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$senha = $_POST["senha"];

$query = "INSERT INTO funcionario(cpfFuncionario, nomeFuncionario, senhaFuncionario)
 VALUES ('$cpf', '$nome', '$senha');";

$result = $conn->query($query);

if ($result === TRUE) {
    
    ?>
    <script>
        alert("Funcionario cadastrado com sucesso!");
        location.href = "main.html";
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