<?php
include_once "config.php";
session_start();

$cpf      = $_POST["cpfcrudform"];
$username = $_POST["namecrudform"];
$endereco = $_POST["enderecocrudform"];
$email    = $_POST["emailcrudform"];
$telefone = $_POST["telefonecrudform"];
$password = $_POST["passwordcrudform"];
$birth    = $_POST["birthcrudform"];

$query = "INSERT INTO Usuario(cpf, nome, endereco, email, pontos, telefone, senha, dat_nasc, imagem)
 VALUES ('$cpf', '$username', '$endereco', '$email', '0', '$telefone', '$password', '$birth', NULL);";

$result = $conn->query($query);

if ($result === TRUE) {
    $_SESSION["logged"] = $cpf;
    
    ?>
    <script>
        alert("Usuario cadastrado com sucesso!");
        location.href = "home.php";
    </script>
    <?php

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>