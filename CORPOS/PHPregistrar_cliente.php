<?php
include_once "PHPconfig.php";

$cpf = strval($_POST['cpf']);
$nome = $_POST["nome"];
$email = $_POST["email"];
$sexo = $_POST["sexo"];
$nascimento = $_POST["nascimento"];
$telefone = $_POST["telefone"];

$query = "INSERT INTO cliente(cpf, nome, nascimento, telefone, email, sexo)
 VALUES ('$cpf', '$nome', '$nascimento', '$telefone', '$email', '$sexo');";

$result = $conn->query($query);

if ($result === TRUE) {
    
    ?>
    <script>
        alert("Cliente cadastrado com sucesso!");
        location.href = "visualizar_clientes.php";
    </script>
    <?php

} else {
    ?>
    <script>
        alert("Erro de conexão com servidor, voltando a tela principal");
        location.href = "visualizar_clientes.php";
    </script>
    <?php
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>