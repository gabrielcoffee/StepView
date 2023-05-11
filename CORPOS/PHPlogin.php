<?php
include_once "PHPconfig.php";

$cpf_ou_nome = $_POST["cpf_ou_nome"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM funcionario WHERE senhaFuncionario = '$senha' AND (cpfFuncionario = '$cpf_ou_nome' OR nomeFuncionario = '$cpf_ou_nome');";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc())
{
    $_SESSION["logged"] = $row["cpfFuncionario"];
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