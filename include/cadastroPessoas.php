<?php
    include_once("../php/conexao.php");
    session_start();

    if(empty($_SESSION['usuario'])){
        header("Location: login.php");
        exit();
    }

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
    <link rel="stylesheet" href="css/estilo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de pessoal</title>
</head>

<body>
    <div class="bs-example">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <img src="../imgs/logo.png" width="85" height="70" alt="">
            <a href="../index.php" class="navbar-brand">Controle de Ponto</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="login.php" class="nav-item nav-link">Acesso a Área Administrativa</a>
                    <a href="sobre.html" class="nav-item nav-link">Sobre</a>

                </div>
            </div>
        </nav>
    </div>
    <div class="container areaCadastro m-lg-4">
        <div class="d-flex justify-content-center">
            <div class="form-group">
                    <form action="../php/manutencao/cadastro_membros.php" method="POST" enctype="multipart/form-data" >
                        <label for="lb_nome">Nome do Membro:</label>

                        <!-- <input type="text" class="form-control" id="textName" aria-describedby="textName"
                        placeholder="Escreva o nome..."> -->

                        <input type="text" id="nome_membro" name="nome_membro"  class="form-control" aria-describedby="textName" placeholder= "Escreva o nome...">

                        <small id="emailHelp" class="form-text text-muted">Por favor preencha corretamente o campo.</small>

                        <!--  <label for="lb_nome">E-mail:</label>
                        <input type="text" class="form-control" id="textName" aria-describedby="textName"
                        placeholder="Escreva o E-mail"> 

                        <small id="emailHelp" class="form-text text-muted">Por favor preencha corretamente o campo.</small>

                        <label for="lb_nome">Telefone:</label>
                        <input type="text" class="form-control" id="textName" aria-describedby="textName"
                        placeholder="Telefone"> -->

                        <label for="lb_nome">Curso</label>
                        
                            <!-- <select class="form-control" name="curso_membro">
                                <option disabled selected>Selecione o Curso</option>
                                <option value="Administracao">Administraçao</option>
                                <option value="Sistemas de Informacao">Sistemas de informaçao</option>
                            </select> -->
                            <select class="form-control" name="curso_membro" id="curso_membro">
                                <option value="disabled" selected disabled >Escolha um curso...</option>
                                <option value="Administracao">Administração</option>
                                <option value="Sistemas de Informacao">Sistemas de Informação</option>
                            </select>
                            <br>



                        <!-- <a href="#" class="btn btn-dark btn-lg " role="button" aria-disabled="true">Cadastrar</a> -->

                        <input type="submit" value="Cadastrar" class="btn btn-dark btn-lg " aria-disabled="true">


                        <a href="areaAdm.php" class="btn btn-dark btn-lg " role="button" aria-disabled="true">Voltar a Área
                        Administrativa</a>
                    </form>
                    
                </div>
            </div>

        </div>
    </div>


</body>



</html>