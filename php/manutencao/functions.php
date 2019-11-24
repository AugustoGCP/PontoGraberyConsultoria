<?php

    include_once("../conexao.php");
    //session_start();

    function arquivoPlanilha($conex) {

        $arquivo = "relatorio.xml";

        $html = '';
        $html .= '<table border="1">';
        $html .= '<tr>';
        $html .= '<th colspan ="6">Relatorio de Horas</th>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td>ID</td>';
        $html .= '<td>Nome</td>';
        $html .= '<td>Data</td>';
        $html .= '<td>Hora de Entrada</td>';
        $html .= '<td>Hora de Saida</td>';
        $html .= '<td>Horas Total</td>';
        $html .= '</tr>';

        //var_dump($conex);
        
        while($dados = $conex -> fetch_array()){
            $html .= '<tr>';
            $html .= '<td>'.$dados[0].'</td>';
            $html .= '<td>'.$dados[1].'</td>';
            $html .= '<td>'.$dados[2].'</td>';
            $html .= '<td>'.$dados[3].'</td>';
            $html .= '<td>'.$dados[4].'</td>';
            $html .= '<td>'.$dados[5].'</td>';
            $html .= '</tr>';
        }

        $html.= '</table>';

        header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
        header("Content-Description: PHP Generated Data");
        header("Content-Type: application/x-msexcel");


        echo $html;
        // var_dump($conex);
        // echo "<br><br>";
        
    
        exit;

    }

    function horasMembros(){
        
    // Destincha a String em um Array.

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
    // echo $total_horas;

    //Isola os dados dentro do Array em variáveis sepradas.

    // $hora_in = (int) $separador_entrada['0'];
    // $minuto_in = (int) $separador_entrada['1'];
    // $segundo_in = (int) $separador_entrada['2'];

    // //Isola os dados dentro do Array em variáveis sepradas.

    // $hora_out = (int) $separador_saida['0'];
    // $minuto_out = (int) $separador_saida['1'];
    // $segundo_out = (int) $separador_saida['2'];

    // //Subtrai a diferenca das horas, minutos e segundos.

    // $hora_total = abs($hora_out - $hora_in);
    // $minuto_total = abs($minuto_out - $minuto_in);
    // $segundo_total = abs($segundo_out - $segundo_in);

    // //Uni as variáveis em um Array e converte o Array em um String

    // $uniao = array ($hora_total, $minuto_total, $segundo_total);
    // $horas_total = implode(":", $uniao);

    }


?>