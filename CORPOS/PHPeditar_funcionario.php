<?php
include_once "PHPconfig.php";

$cpf = strval($_POST['cpf']);
$nome = $_POST["nome"];
$funcao = $_POST["funcao"];

if ($funcao == "odontologista")
{
    $query = "UPDATE odontologista
          SET  nome = '$nome', funcao = '$funcao'
          WHERE cpf = '$cpf', especialidade = '$especialidade';";
    $result = $conn->query($query);
}
else if ($funcao == "secretaria")
{
    $query = "UPDATE secretaria
        SET  nome = '$nome', funcao = '$funcao'
        WHERE cpf = '$cpf';";
    $result = $conn->query($query);
}

if ($result === TRUE) {

    ?>
    <script>
        alert("Funcionário editado com sucesso!");
        location.href = "tela_administracao.php";
    </script>
    <?php

} else {
    ?>
    <script>
        alert("Erro de conexão com servidor, voltando...");
        location.href = "tela_administracao.php";
    </script>
    <?php
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>