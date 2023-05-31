<?php
include_once "PHPconfig.php";

$cpf = $_POST["cpf"];
$idSecretaria = rand(1,100);
$senha = $_POST["senha"];
$nome = $_POST["nome"];


$query = "INSERT INTO secretaria(fk_Funcionario_cpf, idSecretaria, senha, nome)
 VALUES ('$cpf', '$idSecretaria', '$senha', '$nome');";

$result = $conn->query($query);

if ($result === TRUE) {
    
    ?>
    <script>
        alert("Odontologista cadastrado com sucesso!");
        location.href = "tela_administracao.php";
    </script>
    <?php

} else {
    ?>
    <script>
        alert("Erro de conexão com servidor, voltando a tela principal");
        location.href = "tela_administracao.php";
    </script>
    <?php
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>