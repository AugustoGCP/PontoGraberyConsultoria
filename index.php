<?php
    include_once("php/conexao.php");
    session_start();

    $sql = "SELECT * FROM tb_membros";
    $conex = mysqli_query($conexao, $sql) or die ($conexao);

    //include_once("../php/manutencao/cadastro_ponto_membros.php");
    //var_dump($_SESSION['alert']);

    if(isset($_SESSION['alert'])){
        echo $_SESSION['alert'];
        session_unset();
        //exit();
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="estilo.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Controle de ponto</title>
    </head>

    <body>
        <div class="bs-example">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                    <img src="imgs/logo.png" width="85" height="70" alt="Cadastro de Ponto Granbery Consultoria">
                <a href="index.html" class="navbar-brand">Controle de Ponto</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="include/login.php" class="nav-item nav-link">Acesso a Área Administrativa</a>
                        <a href="sobre.html" class="nav-item nav-link">Sobre</a>

                    </div>
            
                
                </div>
            </nav>
        </div>

        <div class="container ">
            <div class="card m-lg-3">
                <div class="card-body ">
                    <h5 class="card-title">Selecione Nome:</h5>
                    <form action="php/manutencao/cadastro_ponto_membros.php" method="POST" enctype="multipart/form-data" >
                        <select name="membros" id="membros" class="form-control">
                            <option value="disable" disabled selected>Escolha o nome do Membro</option>
                            <?php while($dados = $conex->fetch_array()) { ?>
                                <option value="<?php echo $dados['ID_MEMBRO'];?>"><?php echo $dados['NOME_MEMBRO'];?></option>
                            <?php } ?>
                        </select>
                        <div class="card-body">
                            <br>
                            <!-- <input type="submit" class="btn btn-dark" name="Bater Entrada" value="Bater Entrada" id="entrada"> -->
                            
                            <input type="submit" id="entrada" name="batida_ponto" value="Bater Entrada" class="btn btn-dark"> 

                            <!-- <input type="submit" class="btn btn-dark" name="Bater Saída" value="Bater Saída" id="saida"> -->

                            <input type="submit" id="saida" name="batida_ponto" value="Bater Saída" class="btn btn-dark">
                        </div>
                    </form>                            
                </div>
            </div>
        </div>


    </body>
</html>