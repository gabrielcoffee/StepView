<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ESTILOS/registro_cliente.css">
    <title>Registrar Cliente</title>
</head>
<body>
   <div class="lateral_esquerdo">
    <?php 
        include_once "../CORPOS/PHPconfig.php";

       
        $cpf = $_GET["CPF"];
        



        $sql = "SELECT * FROM cliente WHERE cpf = '$cpf';";
        $result = $conn -> query($sql); 

        $cliente = $result->fetch_assoc();

        $nome       = $cliente["nome"];
        $email      = $cliente["email"];
        $telefone   = $cliente["telefone"];
        $nascimento = $cliente["nascimento"];
        $sexo       = $cliente["sexo"];

        if ($sexo == 'M')
            $sexo = "Masculino";
        else if ($sexo == "F")
            $sexo = "Feminino";
        else
            $sexo = "Outro";


        ?>
        <?php 
        echo"<form>";
       
            echo"<div class='inputClass'>";
                echo"<input type='text' value='$cpf' name='cpf' placeholder='cpf'>";
            echo"</div>";
            echo "<div class='inputClass'>";
                echo"<input type='text' value='$nome' name='nome' placeholder='Nome'>";
            echo"</div>";
            echo"<div class='inputClass'>";
                echo"<input type='text' name='email' value='$email' placeholder='E-mail'>";
            echo"</div>";
            echo"<div class='inputClass'>";
                echo"<input type='date' name='nascimento' value='$nascimento' placeholder='nascimento'>";
            echo"</div>";
            echo"<fieldset class='InputCheckbox'>";
                echo"<legend>Sexo do cliente</legend>";
                echo"<input type='checkbox' name='sexo'>$sexo";
            echo"</fieldset>";
            echo"<div class='InputBotao'>";
                
                echo"<button type=''>Alterar</button>";
                echo"<button type=''>Excluir</button>";
            echo"</div>";
            
        echo"</form>";
        ?>
   </div>
   <div class="lateral_direita">
        <!-- <form class="form_buscar" method="POST" action="registrar_cliente_dados.php">
            <input type="text" name="nome" placeholder="Nome do Cliente">
            <button type="">Buscar</button>
        </form> -->
        <h3>Agenda</h3>
        
        <form class="form_comentarios" method="POST" action="PHPcomentar.php">
            <div class="comentario">
                <?php echo"<input type='hidden' value='$cpf' name='cpf'>";?>
                <input type="text" value="" name="comentario">
                <button type="submit" >Salvar</button> 
            </div>
            <fieldset class="estadoCliente">
                <legend>Estado do Cliente</legend>
                <input type="checkbox" name="estado" ">1
                <input type="checkbox" name="estado" ">2  
                <input type="checkbox" name="estado" ">3
                <input type="checkbox" name="estado" ">4
            </fieldset>
        </form>
    
   </div>   
   
</body>
<script src="registro.js">

</script>
</html>