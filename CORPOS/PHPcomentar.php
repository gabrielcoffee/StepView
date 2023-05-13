<?php
include_once "PHPconfig.php";

$cpf = $_POST["cpf"];
$comentario = $_POST["comentario"];


/*
$query = "INSERT INTO processos(descricao)
 VALUES ('$comentario'); SELECT processos.idProcesso, processos.tipoProcesso, processo.descricao, processos.data, cliente.cpf FROM processos INNER JOIN cliente ON cliente.cpf = processos.fk_Cliente_cpf" ;
*/
$query = "UPDATE cliente
          SET comentario = '$comentario'
          WHERE cpf = '$cpf';";

$result = $conn->query($query);

if ($result === TRUE) {

    ?>
    <script>
        alert("Comentario adicionado com sucesso!");
    </script>
    <?php

} else {
    ?>
    <script>
        alert("Erro de conexão com servidor, voltando...");
    </script>
    <?php
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>