<?php
include_once "config.php";
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
        location.href = "main.php";
    </script>
    <?php

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>