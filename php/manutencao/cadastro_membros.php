<?php
    include_once("../conexao.php");
    session_start();

        $nome_membro = $_POST['nome_membro'];
        $curso_membro = $_POST['curso_membro'];


        // var_dump($nome_membro);
        // var_dump($curso_membro);

        
        $sql = "insert into tb_membros (nome_membro, curso_membro)value('$nome_membro','$curso_membro')";
        
        if((empty($nome_membro)) || (empty($curso_membro))){
          $_SESSION['alert'] = "<script>alert('Campos preenchidos incorretamente.')</script>";
          header('Location: ../../include/cadastroPessoas.php');
          //exit();
        
        }else{
            if(mysqli_query($conexao, $sql)){
              $_SESSION['alert'] = "<script>alert('Cadastro feito com sucesso!')</script>";
              header('Location: ../../include/cadastroPessoas.php');
              //exit();
            }
            else{
              echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
            }
          }
        
        mysqli_close($conexao);
        
?>