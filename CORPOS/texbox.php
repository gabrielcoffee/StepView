<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registro_cliente.css">
    <title>Registrar Cliente</title>
</head>
<body>
   <div class="lateral_esquerdo">

        <form method="POST" action="PHPregistrar_cliente.php" class="inputs">
            <div class="bola">
                
            </div>
            <div class="inputClass">
                <input type="text" name="id" placeholder="Id">
            </div>
            <div class="inputClass">
                <input type="text" name="nome" placeholder="Nome">
            </div>
            <div class="inputClass">
                <input type="text" name="email" placeholder="E-mail">
            </div>
            <div class="inputClass">
                <input type="text" name="datacadastro" placeholder="Data cadastro">
            </div>
            <fieldset class="InputCheckbox">
                <legend>Sexo do cliente</legend>
                <input type="checkbox" name="sexo">Masculino
                <input type="checkbox" name="sexo">Feminino   
                <input type="checkbox" name="sexo">Outro
            </fieldset>
            <div class="InputBotao">
                <button type="">Criar</button>
                <button type="">Alterar</button>
                <button type="">Excluir</button>
            </div>
            
        </form>
   </div>
   <div class="lateral_direita">
        <!-- <form class="form_buscar" method="POST" action="registrar_cliente_dados.php">
            <input type="text" name="nome" placeholder="Nome do Cliente">
            <button type="">Buscar</button>
        </form> -->
        <h3>Agenda</h3>
        <form class="form_comentarios" method="POST" action="">
            <div class="comentario">
                <textarea type="text" value="" name="comentario"></textarea>
                <button type="" onclick="salvarComentario">Salvar</button> 
            </div>
            <fieldset class="estadoCliente">
                <legend>Estado do Cliente</legend>
                <input type="checkbox" name="estado">1
                <input type="checkbox" name="estado">2  
                <input type="checkbox" name="estado">3
                <input type="checkbox" name="estado">4
            </fieldset>
        </form>
   </div>   
</body>
<script src="registro.js">

</script>
</html>