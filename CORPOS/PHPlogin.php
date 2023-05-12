<?php
include_once "PHPconfig.php";

$cpf_ou_nome = $_POST["cpf_ou_nome"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM funcionario WHERE senha = '$senha' AND (cpf = '$cpf_ou_nome' OR nome = '$cpf_ou_nome');";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc())
{
    $_SESSION["logged"] = $row["cpf"];
    ?>
    <script>
        alert("Funcionario logado com sucesso");
        location.href = "visualizar_clientes.php";
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