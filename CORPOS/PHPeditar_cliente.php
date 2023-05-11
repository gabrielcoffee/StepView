<?php
include_once "PHPconfig.php";

$cpf = $_POST["cpf"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$sexo = $_POST["sexo"];
$nascimento = $_POST["nascimento"];
$telefone = $_POST["telefone"];

$query = "UPDATE paciente 
          SET nomePaciente = '$nome', emailPaciente = '$email', sexoPaciente = '$sexo', nascimentoPaciente = '$nascimento', telefonePaciente = '$telefone'
          WHERE cpfPaciente = '$cpf';";

$result = $conn->query($query);

if ($result === TRUE) {
    
    ?>
    <script>
        alert("Cliente editado com sucesso!");
        location.href = "visualizar_clientes.php";
    </script>
    <?php

} else {
    ?>
    <script>
        alert("Erro de conexão com servidor, voltando...");
        location.href = "visualizar_clientes.php";
    </script>
    <?php
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>