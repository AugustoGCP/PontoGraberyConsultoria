<?php
    include_once("../php/conexao.php");
    session_start();
    //var_dump($_SESSION);
    //session_start();

    if(empty($_SESSION['usuario'])){
        header("Location: login.php");
        exit();
    }
?> 
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Area Adminstrativa</title>
</head>

<body>
    <div class="bs-example">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a href="../index.php"><img src="../imgs/logo.png" width="85" height="70" alt=""></a>
            <a href="../index.php" class="navbar-brand">Controle de Ponto</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="login.html" class="nav-item nav-link">Acesso a Área Administrativa</a>
                    <a href="sobre.html" class="nav-item nav-link">Sobre</a>

                </div>
            </div> -->
        </nav>
    </div>
    <div class="espaçamento m-lg-4">
        <div class="container areaAdm">

            <a href="cadastroPessoas.php" class="btn btn-dark btn-lg " role="button" aria-disabled="true">Cadastrar</a>
            <a href="DadosPonto.php" class="btn btn-dark btn-lg " role="button" aria-disabled="true">Exibir dados de
            Membros</a>

            <!-- <a href="index.html" class="btn btn-dark btn-lg " role="button" aria-disabled="true">voltar</a> -->

            <form action="../php/login/logout.php" method="POST">

                <input type="submit" name="sair" value="Sair" class="btn btn-dark btn-lg" aria-disabled="true">

            </form>

        </div>
    </div>


</body>


</html>