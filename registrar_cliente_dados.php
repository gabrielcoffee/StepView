<?php
include_once "PHPconfig.php";

$nome = $_POST["nome"];

$id = "";
$email = "";
$sexo = "";
$datacadastro = "";

$sql = "SELECT * FROM cliente WHERE nomeCliente = '$nome';";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc())
{

    $id = $row["idCliente"];
    $email = $row["emailCliente"];
    $sexo = $row["sexoCliente"];
    $datacadastro =  $row["dataCadastro"];

    ?>
    <script>
        alert("Cliente encontrado com sucesso");
    </script>
    <?php
}
else
{
    ?>
    <script>
        alert("Cliente não encontrado");
        location.href = "registrar_cliente.html";
    </script>
    <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registro.css">
    <title>Registrar Cliente</title>
</head>
<body>
   <div class="lateral_esquerdo">

        <form method="POST" action="PHPregistrar_cliente.php" class="inputs">
            <div class="bola">
                
            </div>
            <div class="inputClass">
                <input type="text" name="id" placeholder="Id" value="<?php echo $id ?>">
            </div>
            <div class="inputClass">
                <input type="text" name="nome" placeholder="Nome" value="<?php echo $nome ?>">
            </div>
            <div class="inputClass">
                <input type="text" name="email" placeholder="E-mail" value="<?php echo $email ?>">
            </div>
            <div class="inputClass">
                <input type="text" name="sexo" placeholder="sexo" value="<?php echo $sexo ?>">
            </div>
            <div class="inputClass">
                <input type="text" name="datacadastro" placeholder="Data cadastro" value="<?php echo $datacadastro ?>">
            </div>
            <div class="InputBotao">
                <button type="">Criar</button>
                <button type="">Alterar</button>
                <button type="">Excluir</button>
            </div>
        </form>
   </div>
   <div class="lateral_direita">
        <form class="form_buscar" method="POST" action="PHPbuscar_cliente.php">
            <input type="text" name="nome" placeholder="Nome do Cliente">
            <button type="">Buscar</button>
        </form>
   </div>   
</body>
<script src="registro.js">

</script>
</html>