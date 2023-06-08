<?php
include_once "PHPconfig.php";

$cpf = strval($_GET['cpf']);

$sql = "DELETE FROM cliente WHERE cpf = '$cpf';";
$result = $conn->query($sql);

if ($result === TRUE)
{
    ?>
    <script>
        alert("Cliente deletado com sucesso");
        location.href = "visualizar_clientes.php";
    </script>
    <?php
}
else
{
    ?>
    <script>
        alert("Cliente não encontrado");
        location.href = "visualizar_clientes.php";
    </script>
    <?php
}
?>