<?php
    include_once("../php/conexao.php");
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Acessar area/Login</title>
</head>

<body>
    <div class="bs-example">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="../index.php"><img src="../imgs/logo.png" width="85" height="70" alt=""></a>
            <a href="../index.php" class="navbar-brand">Controle de Ponto</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">

                <div class="navbar-nav">

                    <!-- <a href="login.html" class="nav-item nav-link">Acesso a Área Administrativa</a>
                    <a href="sobre.html" class="nav-item nav-link">Sobre</a> -->

                </div>


            </div>
        </nav>
    </div>

    <div class="container ">
        <form action="../php/login/login.php" method="POST">

                <div class="jumbotron m-lg-3">
                        <h1 class="display-4">Log In</h1>
                        <label for="lb_nome">Usuario:</label>

                        <!-- <input type="text" class="form-control" id="textName" aria-describedby="textName"
                        placeholder="Escreva o nome..."> -->

                        <input type="text" value="usuario" name="usuario" class="form-control" placeholder="Digite o usuario...">

                        <small id="emailHelp" class="form-text text-muted">Por favor preencha corretamente o campo.</small>

                        <div class="form-group">

                                <label for="exampleInputPassword1">Senha:</label>

                                <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->

                                <input type="password" value="senha" name="senha" placeholder="Password" class="form-control">
                                
                        </div>
              
                        <!-- <a class="btn btn-dark btn-lg" href="areaAdm.html" role="button">Logar</a> -->

                        <input type="submit" value="Logar" name="Acessar" class="btn btn-dark btn-lg">
                </div>
        </form>
       
    </div>


</body>

</html>