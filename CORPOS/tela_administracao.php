<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ESTILOS/tela_administracao.css">
    <title>Document</title>
</head>
<body>
    <div class="telaModal">
        <div class="botaoSair">
            <button onclick="sairModal()" id="botaoSair">X</button>
        </div>
        <div class="containerModal">
            <div class="titulo">
                
            </div>
            <div class="containerForm">
                <div class="formOdonto">
                    <h1>Adicionar Odontologo</h1>
                    <form action="PHPregistrar_odontologo.php" method="POST">
                        <div>
                            <input name="nome" type="text" placeholder="Nome">
                        </div>  
                        <div>
                            <input name="cpf" type="text" placeholder="Cpf">
                        </div>
                        <div>
                            <input name="crm" type="text" placeholder="Crm">
                        </div>
                     
                        <div>
                            <input name="" type="password" placeholder="Senha">
                        </div>
                        <div>
                            <input name="senha" type="password" placeholder="Senha">
                        </div>
                        <div class="botoes">
                            <button type="submit">Registrar</button>
                        </div>



                        

                    </form>
                </div>
                <div class="formSecre">

                    <div class="titulo">
                        <h1>Registrar Secretaria</h1>
                    </div>
                    <form action="PHPregistrar_secretaria.php" method="POST">
                        <div>
                            <input name="nome" type="text" placeholder="Nome">
                        </div>
                        <div>
                            <input name="cpf" type="text" placeholder="Cpf">
                        </div>
                        <div>
                            <input name="senha" type="password" placeholder="Senha">
                        </div>
                        <div>
                            <input name="senha" type="password" placeholder="Senha">
                        </div>
                        <div class="botoes">
                            <button>Registrar</button>
                        </div>



                        

                    </form>
                </div>
            </div>

        </div>


    </div>
    <div class="container">

    
        <header>
            <h3>Seja bem vindo!</h3>
        </header>
        <nav>
            <button>Visualizar Estados</button>
            <button>Visualizar Clientes</button>
            <button onclick="abrirModal()" class="botaoCriar">
                Registrar funcionario
                </button>
        </nav>
        
        <main>
        
        </main>
        <aside class="assideEsquerdo">
            <h1>StepView</h1>
        </aside>
        <aside class="assideDireito">
            <table>
                
       
            </table>
        </aside>
        <footer>
            <h1>footer</h1>
        </footer>
    </div>
    <script src="../SCRIPTS/tela_administracao.js"></script>
</body>
</html>