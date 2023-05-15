<?php
include_once "PHPconfig.php";

$cpf = $_POST["cpf"];
$idproc = $_POST["idproc"];

$sql = "DELETE FROM processo WHERE fk_Cliente_cpf = '$cpf' AND idProcesso = '$idproc';";
$result = $conn->query($sql);

if ($result === TRUE)
{
    ?>
    <script>
        alert("Processo deletado com sucesso");
        location.href = "visualizar_clientes.php";
    </script>
    <?php
}
else
{
    ?>
    <script>
        alert("Erro na deleção");
        location.href = "visualizar_clientes.php";
    </script>
    <?php
}
?>