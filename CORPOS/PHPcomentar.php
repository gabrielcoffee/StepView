<?php
include_once "PHPconfig.php";

$cpf = $_POST["cpf"];
$descricao = $_POST["descricao"];
$data = $_POST["data"];
$tipoProcesso = $_POST["tipoProcesso"];


$query = "INSERT INTO processo(tipoProcesso, descricao, data_marcada, fk_Cliente_cpf)
VALUES ('$tipoProcesso', '$descricao', '$data', '$cpf');";

$result = $conn->query($query);

if ($result === TRUE) {

    ?>
    <script>
        alert("Comentario adicionado com sucesso!");
        location.href = "../CORPOS/tela_estados.php";
    </script>
    <?php

} else {
    ?>
    <script>
        alert("Erro de conexão com servidor, voltando...");

    </script>
    <?php
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
