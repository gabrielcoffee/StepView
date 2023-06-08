<?php
include_once "PHPconfig.php";

$cpf = strval($_GET['cpf']);

// DELETA ODONTOLOGISTAS
$sql = "DELETE FROM odontologista WHERE cpf = '$cpf';";
$result = $conn->query($sql);

if ($result === TRUE)
{
    ?>
    <script>
        alert("Odontologista deletado com sucesso");
        location.href = "tela_administracao.php";
    </script>
    <?php
}
else
{
    // DELETA SECRETARIAS
    $sql = "DELETE FROM secretaria WHERE cpf = '$cpf';";
    $result = $conn->query($sql);

    if ($result === TRUE)
    {
        ?>
        <script>
            alert("Secretaria deletada com sucesso");
            location.href = "tela_administracao.php";
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert("Funcionaria não encontrada");
            location.href = "tela_administracao.php";
        </script>
        <?php
    }
}
?>