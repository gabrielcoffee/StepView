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
        location.href = "tela_administracao.php";
    </script>
    <?php
}

// Login para Secretárias
$sql = "SELECT * FROM secretaria WHERE senha = '$senha' AND (cpf = '$cpf_ou_nome' OR nome = '$cpf_ou_nome');";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc())
{
    session_start();
    $_SESSION["logged"] = "secretaria";
    ?>
    <script>
        alert("LOGADO COMO SECRETÁRIA");
        location.href = "visualizar_clientes.php";
    </script>
    <?php
}

// Login para Odontólogistas
$sql = "SELECT * FROM odontologista WHERE senha = '$senha' AND (cpf = '$cpf_ou_nome' OR nome = '$cpf_ou_nome');";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc())
{
    session_start();
    $_SESSION["logged"] = "odontologista";
    ?>
    <script>
        alert("LOGADO COMO ODONTOLOGISTA");
        location.href = "visualizar_clientes.php";
    </script>
    <?php
}

// não encontrou o login
?>
<script>
    alert("Funcionario não encontrado");
    location.href = "../";
</script>
<?php

?>