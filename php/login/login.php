<?php
    session_start();
    include_once("../conexao.php");

    $usuario = $_POST['usuario'];
    $senha =  $_POST['senha'];
     

    if( (empty($usuario)) || (empty($senha)) ){
        $_SESSION['alert'] = "<script>alert('Campos preenchidos incorretamente.')</script>";
        header("Location: ../../include/login.php");
        exit();
        //echo "Bloco 1";
    }

    else if ( (isset($usuario)) && (isset($senha)) ){


        $sql = "SELECT * FROM `tb_usuarios` WHERE NOME_USUARIO = '$usuario' and SENHA_USUARIO = '$senha'";
        $result = mysqli_query($conexao, $sql) or die ($conexao);
        $dados = mysqli_num_rows($result);

        if( $dados === 1 ){
            $_SESSION['usuario'] = $usuario;
            header("Location: ../../include/areaAdm.php");
            exit();
            //echo "Bloco 2" ;
        }else{
            $_SESSION['alert'] = "<script>alert('Não localizado Usuário/Senha ou não cadastrado.')</script>";
            header("Location: ../../include/login.php");
            exit();
            //echo "Bloco 3" ;
        }

    }
    
    else{
        $_SESSION['alert'] = "<script>alert('Algo de muito errado ocorreu. Chame o Suporte.')</script>";
        header("Location: ../../include/login.php");
        exit();
        //echo "Bloco 4";
    }
    
?>