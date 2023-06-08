<?php

// update_estado.php

include_once "PHPconfig.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf = strval($_POST['cpf']);
    $estado = $_POST['estado'];
    if ($estado == "Agendamento solicitado") $estado = 1;
    else if ($estado == "Pagamento realizado") $estado = 2;
    else if ($estado == "Agendamento realizado") $estado = 3;
    else if ($estado == "Procedimento realizado") $estado = 4;

    // Atualiza estado no banco de dados
    $stmt = $conn->prepare('UPDATE cliente SET estado = ? WHERE cpf = ?');
    $stmt->bind_param('is', $estado, $cpf);
    $stmt->execute();
    $stmt->close();
}

?>