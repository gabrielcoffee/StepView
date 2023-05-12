<?php
include_once "PHPconfig.php";

$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$sexo = $_POST["sexo"];
$nascimento = $_POST["nascimento"];
$telefone = $_POST["telefone"];

$query = "UPDATE cliente
          SET nome = '$nome', email = '$email', sexo = '$sexo', nascimento = '$nascimento', telefone = '$telefone'
          WHERE cpf = '$cpf';";

$result = $conn->query($query);

if ($result === TRUE) {

    ?>
    <script>
        alert("Cliente editado com sucesso!");
        location.href = "visualizar_clientes.php";
    </script>
    <?php

} else {
    ?>
    <script>
        alert("Erro de conexão com servidor, voltando...");
        location.href = "visualizar_clientes.php";
    </script>
    <?php
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>