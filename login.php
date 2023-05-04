<?php
include "config.php"

$email = $_POST["email"];
$senha = $_POST["senha"];

//emailFuncionario = '$email' AND senhaFuncionario = '$senha'
$sql = "SELECT * FROM funcionario WHERE nomeFuncionario = '$email';";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc())
{
    $_SESSION["logged"] = $row["idFuncionario"];
    ?>
    <script>
        alert("Funcionario logado com sucesso");
        location.href = "tela_estados.html";
    </script>
    <?php
}
else
{
    ?>
    <script>
        alert("Funcionario não registrado");
        location.href = "main.html";
    </script>
    <?php
}
?>