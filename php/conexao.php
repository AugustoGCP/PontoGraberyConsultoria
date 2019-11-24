<?php
 date_default_timezone_set("America/Sao_Paulo");

    $servidor="localhost";
    $usuario="root";
    $senha="";
    $base="bd_ponto_gc";
    $conexao = mysqli_connect($servidor, $usuario, $senha, $base);

    /* Teste de conexão   */

    if(!$conexao){
       die ("Falha na conexão".mysqli_connect_error());
    }else{
      // echo "Sucesso na conexão";
    }
?>


