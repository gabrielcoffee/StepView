<?php
include_once "PHPconfig.php";

$id = $_POST["id"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM funcionario WHERE idFuncionario = '$id' AND senhaFuncionario = '$senha';";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc())
{
    $_SESSION["logged"] = $row["idFuncionario"];
    ?>
    <script>
        alert("Funcionario logado com sucesso");
        location.href = "TelaDosEstados/tela_estados.html";
    </script>
    <?php
}
else
{
    ?>
    <script>
        alert("Funcionario não encontrado");
        location.href = "main.html";
    </script>
    <?php
}
?>