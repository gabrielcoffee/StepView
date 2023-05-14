<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ESTILOS/agenda.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header>
            <div class="titulo">
                <h2>Cliente</h2>
            </div>
        </header>
        <div class="telaEsquerda">
            <div class="conteudoEsquerda">
                <h2>Estado atual</h2>
                <div class="estados">
                    <form>
                        <label>Ola</label>
                        <input type="checkbox">
                        <label>Ola</label>
                        <input type="checkbox">
                        <label>Ola</label>
                        <input type="checkbox">
                        <label>Ola</label>
                        <input type="checkbox">
                        <div class="botaoEstado">
                            <button>Alterar</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
        <div class="telaDireita">
            <div class="tabelaPegar">
                <?php 
                include_once "../CORPOS/PHPconfig.php";

                $cpf = $_GET["CPF"];



                $sql = "SELECT * FROM processo WHERE fk_Cliente_cpf = '$cpf';";
                $result = $conn -> query($sql);
                while($processo = $result->fetch_assoc()){
                    $tipoProcesso = $processo["tipoProcesso"];
                    $descricao   = $processo["descricao"];
                    $data = $processo["data"];

                    echo "<form action='PHPcomentar.php' method='POST'>";
                    echo "<table>";
                    echo "<td><input type='text' value='$tipoProcesso' name='tipoProcesso' placeholder='Tipo do processo'></td>";
                    echo "<td><input type='text' value='$descricao' name='descricao' placeholder='Descrição'></td>";
                    echo "<td><input type='date' value='$data' name='data'></td>";
                    echo "<td><button>Salvar</button></td>";
                    echo "<td><button>Excluir</button></td>";
                    echo "</table>";
                    echo "</form>";
                }
                ?>
             
            </div>
            <div class='tabelaCriar'>
                
                <?php 
                include_once "../CORPOS/PHPconfig.php";

                $cpf = $_GET["CPF"];
                echo "<form action='PHPcomentar.php' method='POST'>";
                echo "<table>";
                echo "<input type='hidden' value='$cpf' name='cpf'>";
                echo "<td><input type='text' value='' name='tipoProcesso' placeholder='Tipo do processo'></td>";
                echo "<td><input type='text' value='' name='descricao' placeholder='Descrição'></td>";
                echo "<td><input type='date' value='' name='data'></td>";
                echo "<td><button>Salvar</button></td>";
                echo "</table>";
                echo "</form>";
                ?>
        </div>
        </div>


    </div>
</body>
</html>