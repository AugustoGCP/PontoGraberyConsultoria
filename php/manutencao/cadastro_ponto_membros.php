<?php
    include_once("../conexao.php");
    //include_once("functions.php");
    session_start();
      
        $data_ponto = Date('Y-m-d');
        $hora_entrada = Date('H:i:s');
        $hora_saida = Date('H:i:s');
        $id_membro = $_POST['membros'] ?? null;

        //Pega o valor do Input tipo Submit.
        $batida_ponto = $_POST['batida_ponto'] ?? null;

        //String de pesquisa no MySql.
        //Puxa a String da pesquisa do Banco em formato SQL
        //Converte a String da Pesquisa do Banco em formato PHP e inseri em uma Array

        $sql = "SELECT * FROM `tb_ponto_membro` WHERE ID_MEMBRO = $id_membro and DATA_PONTO = '$data_ponto'";
        $conex = mysqli_query($conexao, $sql) or die ($conexao);
        $dados = $conex->fetch_array();


          /*   Condição do Botão de Entrada   */


        if ($batida_ponto === "Bater Entrada"){

          $verifica = $dados['DATA_PONTO'] == $data_ponto;

          if ( ($verifica == true) && (empty($dados['HORA_SAIDA'])) ){

            $_SESSION['alert'] = "<script>alert('Você já bateu seu ponto de entrada hoje. Bata sua saída primeiro.')</script>";
            header('Location: ../../index.php');
            //exit();
            //mysqli_close($conexao);

          }
          
          else{
            $_SESSION['alert'] = "<script>alert('Entrada batida com sucesso!')</script>";
            $sql = "insert into tb_ponto_membro (data_ponto, hora_entrada, id_membro)value('$data_ponto','$hora_entrada','$id_membro')";
            header('Location: ../../index.php');
            //exit();
          }
        }


        /*   Condição do Botão de Saída   */


        else if ($batida_ponto === "Bater Saída"){

          $hora_entrada = explode(":",$dados['HORA_ENTRADA']);
          $hora_saida = explode(":",$hora_saida);

          $acumulador1 = ($hora_entrada[0] * 3600) + ($hora_entrada[1] * 60) + $hora_entrada[2];
          $acumulador2 = ($hora_saida[0] * 3600) + ($hora_saida[1] * 60) + $hora_saida[2];
          $resultado = $acumulador2 - $acumulador1;

          $hora_ponto = floor($resultado / 3600);
          $resultado = $resultado - ($hora_ponto * 3600);
          $min_ponto = floor($resultado / 60);
          $resultado = $resultado - ($min_ponto * 60);
          $secs_ponto = $resultado;

          //Grava na variável resultado final
          $uniao = array ($hora_ponto,$min_ponto,$secs_ponto);
          $horas_total = implode(":",$uniao);

          
          if ( (empty($dados['HORA_ENTRADA'])) || (($dados['DATA_PONTO']) != $data_ponto)){
            $_SESSION['alert'] = "<script>alert('Não foi possível bater seu ponto.')</script>";
            header('Location: ../../index.php');         
            //exit ();
            
          }else if((isset($dados['HORA_ENTRADA'])) && (isset($dados['DATA_PONTO']) == $data_ponto) && (isset($dados['HORA_SAIDA']))) {
            $_SESSION['alert'] = "<script>alert('Entrada batida com sucesso.')</script>";
            $sql = "update tb_ponto_membro set HORA_SAIDA = '$hora_saida', TOTAL_HORAS = '$horas_total' where ID_MEMBRO = '$id_membro' and DATA_PONTO = '$data_ponto'";
          }else{
            $_SESSION['alert'] = "<script>alert('Saída batida com sucesso.')</script>";
            $sql = "update tb_ponto_membro set HORA_SAIDA = '$hora_saida', TOTAL_HORAS = '$horas_total' where ID_MEMBRO = '$id_membro' and DATA_PONTO = '$data_ponto'";
          }  

        }else{
          $_SESSION['alert'] ="<script>alert('Ocorreu um erro. Tente novamente.')</script>";
          header('Location: ../../index.php');
        }


        /*   Condicional de Conxão ao Banco de Dados   */

        if(mysqli_query($conexao, $sql)){
          header('Location: ../../index.php');
        }else{
          echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
        }
        mysqli_close($conexao);
        
?>