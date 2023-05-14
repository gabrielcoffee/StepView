<?php
include_once "PHPconfig.php";

$cpf = $_POST["cpf"];
$idproc = $_POST["idproc"];

$sql = "DELETE FROM processo WHERE fk_Cliente_cpf = '$cpf';";
$result = $conn->query($sql);

if ($result === TRUE)
{
    ?>
    <script>
        alert("Comentario deletado com sucesso");
        location.href = "visualizar_cliente.php";
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