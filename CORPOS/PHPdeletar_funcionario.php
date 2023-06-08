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
        alert("Odontologista deletado");
        location.href = "tela_administracao.php";
    </script>
    <?php
}

// DELETA SECRETARIAS
$sql = "DELETE FROM secretaria WHERE cpf = '$cpf';";
$result = $conn->query($sql);

if ($result === TRUE)
{
    ?>
    <script>
        alert("Secretária deletada");
        location.href = "tela_administracao.php";
    </script>
    <?php
}

// CASO NÃO DELETOU NENHUM
?>
<script>
    alert("Ocorreu um erro na deleção");
    location.href = "tela_administracao.php";
</script>
<?php
?>