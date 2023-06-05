<?php
include_once "PHPconfig.php";

$cpf = $_POST["cpf"];
$funcao = $_POST["funcao"];

if ($funcao == "odontologista")
{
    $sql = "DELETE FROM odontologista WHERE cpf = '$cpf';";
    $result = $conn->query($sql);
}
else if ($funcao == "secretaria")
{
    $sql = "DELETE FROM odontologista WHERE cpf = '$cpf';";
    $result = $conn->query($sql);
}

if ($result === TRUE)
{
    ?>
    <script>
        alert("Funcionário deletado com sucesso");
        //location.href = "tela_administracao.php";
    </script>
    <?php
}
else
{
    ?>
    <script>
        alert("Funcionário não encontrado");
        //location.href = "tela_administracao.php";
    </script>
    <?php
}
?>