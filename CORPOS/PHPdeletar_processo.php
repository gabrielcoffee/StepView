<?php
include_once "PHPconfig.php";

$id = $_GET["id_pro"];

$sql = "DELETE FROM processo WHERE idProcesso = '$id';";
$result = $conn->query($sql);

if ($result === TRUE)
{
    ?>
    <script>
        alert("Processo deletado com sucesso");
        location.href = "tela_administracao.php";
    </script>
    <?php
}
else
{
    ?>
    <script>
        alert("Processo não encontrado");
        location.href = "tela_administracao.php";
    </script>
    <?php
}
?>