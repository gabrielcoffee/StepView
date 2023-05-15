<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ESTILOS/registro_funcionario.css">
    <title>StepView Registro</title>
</head>
<body>
   <div class="lateral_esquerdo">
        
        <form method="POST" action="PHPregistrar_funcionario.php" class="inputs">
            <h2>Registro</h2>
            <div class="inputClass">
                <input type="text" name="cpf" placeholder="CPF" pattern="[0-9]{11}">
            </div>
            <div class="inputClass">
                <input type="text" placeholder="Nome" name="nome">
            </div>
            <div class="inputClass">
                <input type="password" placeholder="Senha" name="senha">
            </div>
            <div class="InputBotao">
                <button type="">Criar</button>
            </div>
        </form>
   </div>
   <div class="lateral_direita">
        <img src="../OUTROS/Pitch meeting-bro.svg">
       
   </div>
   
</body>
</html>