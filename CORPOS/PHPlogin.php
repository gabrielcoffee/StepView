<?php
include_once "PHPconfig.php";

$cpf_ou_nome = $_POST["cpf_ou_nome"];
$senha = $_POST["senha"];

// Login para admin
$sql = "SELECT * FROM administrador WHERE senha = '$senha' AND (cpf = '$cpf_ou_nome' OR nome = '$cpf_ou_nome');";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc())
{
    session_start();
    $_SESSION["logged"] = "admin";
    ?>
    <script>
        alert("LOGADO COMO ADMINISTRADOR");
        location.href = "visualizar_clientes.php";
    </script>
    <?php
}
else
{
    ?>
    <script>
        alert("Funcionario não encontrado");
        location.href = "../";
    </script>
    <?php
}

// Login para funcionarios (Odontologista e Secretária)
$sql = "SELECT * FROM funcionario WHERE senha = '$senha' AND (cpf = '$cpf_ou_nome' OR nome = '$cpf_ou_nome');";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc())
{
    session_start();
    $_SESSION["logged"] = "funcionario";
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
        location.href = "../";
    </script>
    <?php
}
?>