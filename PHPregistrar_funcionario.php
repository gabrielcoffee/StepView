<?php
include_once "PHPconfig.php";
session_start();

$id    = $_POST["id"];
$senha = $_POST["senha"];

$query = "INSERT INTO funcionario(idFuncionario, senhaFuncionario )
 VALUES ('$id', '$senha');";

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