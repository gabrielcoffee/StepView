<?php
include_once "PHPconfig.php";

$cpf = strval($_POST['cpf']);
$nome = $_POST["nome"];
$nome = $_POST["especialidade"];
$senha = $_POST["senha"];

$query = "INSERT INTO funcionario (cpf, nome, senha, especialidade)
 VALUES ('$cpf', '$nome', '$senha', '$especialidade');";

$result = $conn->query($query);

if ($result === TRUE) {
    
    ?>
    <script>
        alert("Funcionario cadastrado com sucesso!");
        location.href = "../index.html";
    </script>
    <?php

} else {
    ?>
    <script>
        alert("Erro de conexão com servidor, voltando a tela principal");
        location.href = "../index.html";
    </script>
    <?php
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>