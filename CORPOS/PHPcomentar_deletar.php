<?php
include_once "PHPconfig.php";

$cpf = $_POST["cpf"];

$sql = "DELETE FROM processo WHERE fk_Cliente_cpf = '$cpf';";
$result = $conn->query($sql);

if ($result === TRUE)
{
    ?>
    <script>
        alert("Comentario deletado com sucesso");
        location.href = "tela_estados.php";
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