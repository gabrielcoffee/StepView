<?php
include_once "PHPconfig.php";

$cpf = $_POST["cpf"];

$sql = "DELETE * FROM paciente WHERE cpfPaciente = '$cpf';";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc())
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